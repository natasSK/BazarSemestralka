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

        // Nájdi existujúci komentár používateľa
        $existingComment = Comment::where('user_id', $id)
            ->where('author_id', $user_id)
            ->first();

        // Ak existuje, prepíš text a odporúčanie, ak neexistuje, vytvor nový komentár
        if ($existingComment) {
            $existingComment->update([
                'text' => $request->input('comment'),
                'published_at' => now(),
                'recommendation' => $request->input('recommendation', 0), // 0 alebo 1
            ]);
        } else {
            Comment::create([
                'user_id' => $id,
                'author_id' => $user_id,
                'text' => $request->input('comment'),
                'published_at' => now(),
                'recommendation' => $request->input('recommendation', 0), // 0 alebo 1
            ]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // Validácia vstupov, môžeš pridať ďalšie pravidlá podľa potreby
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Nájdenie komentára
        $comment = Comment::findOrFail($id);

        // Overenie oprávnení (iba autor môže upravovať komentár)
        if (auth()->user()->id !== $comment->author_id) {
            abort(403, 'Nemáte oprávnenie upravovať tento komentár.');
        }

        // Aktualizácia komentára
        $comment->update([
            'text' => $request->input('comment'),
            // Doplniť ďalšie polia, ak je to potrebné
        ]);

        return redirect()->back()->with('success', 'Komentár bol úspešne aktualizovaný.');
    }

    public function destroy($id)
    {
        // Nájdenie komentára
        $comment = Comment::findOrFail($id);

        // Overenie oprávnení (iba autor môže odstrániť komentár)
        if (auth()->user()->id !== $comment->author_id) {
            abort(403, 'Nemáte oprávnenie odstrániť tento komentár.');
        }

        // Odstránenie komentára
        $comment->delete();

        return redirect()->back()->with('success', 'Komentár bol úspešne odstránený.');
    }
}
