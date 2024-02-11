<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $user_id = auth()->user()->id;

        $existingComment = Comment::where('user_id', $id)
            ->where('author_id', $user_id)
            ->first();

        if ($existingComment) {
            $existingComment->update([
                'text' => $request->input('comment'),
                'published_at' => now(),
                'recommendation' => $request->input('recommendation', 0),
            ]);
        } else {
            Comment::create([
                'user_id' => $id,
                'author_id' => $user_id,
                'text' => $request->input('comment'),
                'published_at' => now(),
                'recommendation' => $request->input('recommendation', 0),
            ]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);

        if (auth()->user()->id !== $comment->author_id) {
            abort(403, 'Nemáte oprávnenie upravovať tento komentár.');
        }

        $comment->update([
            'text' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Komentár bol úspešne aktualizovaný.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->back()->with('success', 'Komentár bol úspešne odstránený.');
    }
}
