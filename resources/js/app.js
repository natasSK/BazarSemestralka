/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
/*
$(document).ready(function() {
    $('.toggle-favorite').click(function(e) {
        e.preventDefault();

        var element = $(this);
        var advertId = element.data('advert-id');
        var csrfToken = element.data('csrf-token');
        var isFavorite = element.data('is-favorite') === 'true';

        var url = isFavorite ? `/favorites/delete/${advertId}` : `/favorites/add/${advertId}`;

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: csrfToken
            },
            success: function(response) {
                updateDOMAfterFavoriteToggle(element, isFavorite);
            },
            error: function(error) {
                console.error('Chyba pri pridávaní/odstraňovaní z obľúbených:', error);
            }
        });
    });

    function updateDOMAfterFavoriteToggle(element, isAdding) {
        if (isAdding) {
           // element.html('<ion-icon style="color: blue; font-size: 32px" name="heart-dislike-circle-outline"></ion-icon>');
            element.data('is-favorite', 'true');
        } else {
           // element.html('<ion-icon style="color: blue; font-size: 32px" name="heart-circle-outline"></ion-icon>');
            element.data('is-favorite', 'false');
        }
    }
});
 */

$(document).ready(function() {
    $('.toggle-favorite').click(function(e) {
        e.preventDefault();

        var element = $(this); // Uložte odkaz na element pre použitie v success callbacku
        var advertId = element.data('advert-id');
        var csrfToken = element.data('csrf-token');
        var isFavorite = element.data('is-favorite') === 'true';

        $.ajax({
            type: 'POST',
            url: '/favorites/toggle/' + advertId,
            data: {
                _token: csrfToken
            },
            success: function(response) {
                updateDOMAfterFavoriteToggle(element, isFavorite);
            },
            error: function(error) {
                console.error('Chyba pri pridávaní/odstraňovaní z obľúbených:', error);
            }
        });
    });

    function updateDOMAfterFavoriteToggle(element, isAdding) {
        if (isAdding) {
            element.html('<ion-icon style="color: red; font-size: 32px" name="heart-dislike-circle-outline"></ion-icon>');
            element.data('is-favorite', 'false'); // Opravené pre obrátenie hodnoty
        } else {
            element.html('<ion-icon style="color: red; font-size: 32px" name="heart-circle-outline"></ion-icon>');
            element.data('is-favorite', 'true'); // Opravené pre obrátenie hodnoty
        }
    }
});


const ratingStars = document.querySelectorAll('.rating > span');

ratingStars.forEach((star) => {
    star.addEventListener('mouseover', function () {
        const ratingValue = this.getAttribute('data-rating');
        ratingStars.forEach((innerStar) => {
            const innerStarIcon = innerStar.querySelector('ion-icon');
            const innerRatingValue = innerStar.getAttribute('data-rating');
            if (innerRatingValue <= ratingValue) {
                innerStarIcon.setAttribute('name', 'star');
            } else {
                innerStarIcon.setAttribute('name', 'star-outline');
            }
        });
    });

    star.addEventListener('mouseout', function () {
        ratingStars.forEach((innerStar) => {
            const innerStarIcon = innerStar.querySelector('ion-icon');
            const innerRatingValue = innerStar.getAttribute('data-rating');
            innerStarIcon.setAttribute('name', 'star-outline');
        });
    });
});



// app.js
/*
$(document).ready(function () {
    const ratingStars = document.querySelectorAll('.rating > span');

    ratingStars.forEach((star) => {
        star.addEventListener('click', function () {
            const ratingValue = this.getAttribute('data-rating');
            const userId = $(this).closest('.rating').data('user-id');
            const csrfToken = $(this).closest('.rating').data('csrf-token');

            $.ajax({
                type: 'POST',
                url: '/profile/' + userId + '/rate',
                data: {
                    'rating': ratingValue,
                    '_token': csrfToken,
                },
                success: function (response) {
                    // Aktualizácia hodnotenia na obrazovke
                    updateRatingDisplay(response.rating);
                },
                error: function (error) {
                    console.error('Chyba pri pridávaní hodnotenia:', error);
                }
            });
        });
    });

    function updateRatingDisplay(rating) {
        const ratingStars = document.querySelectorAll('.rating > span');

        ratingStars.forEach((star, index) => {
            const innerStarIcon = star.querySelector('ion-icon');
            const innerRatingValue = index + 1; // Hodnotenie hviezdičky (1, 2, 3, ...)

            if (innerRatingValue <= rating) {
                innerStarIcon.setAttribute('name', 'star');
            } else {
                innerStarIcon.setAttribute('name', 'star-outline');
            }
        });
    }

});
*/
/*
$(document).ready(function () {
    const userId = $('.rating').data('user-id');
    const csrfToken = $(this).closest('.rating').data('csrf-token');

    // Načítajte priemerné hodnotenie zo servera a aktualizujte stránku
    $.ajax({
        type: 'GET',
        url: '/profile/' + userId + '/average-rating',
        success: function (response) {
            updateAverageRating(response.averageRating);
        },
        error: function (error) {
            console.error('Chyba pri načítaní priemeru hodnotenia:', error);
        }
    });

    const ratingStars = document.querySelectorAll('.rating > span');

    ratingStars.forEach((star) => {
        star.addEventListener('click', function () {
            const ratingValue = this.getAttribute('data-rating');
            const csrfToken = $(this).closest('.rating').data('csrf-token');

            $.ajax({
                type: 'POST',
                url: '/profile/' + userId + '/rate',
                data: {
                    'rating': ratingValue,
                    '_token': csrfToken,
                },
                success: function (response) {
                    // Aktualizácia hodnotenia a priemeru na obrazovke
                    updateRatingDisplay(response.rating);
                    updateAverageRating(response.averageRating);
                },
                error: function (error) {
                    console.error('Chyba pri pridávaní hodnotenia:', error);
                }
            });
        });
    });

    function updateAverageRating(averageRating) {
        // Aktualizácia vizuálneho zobrazenia priemeru hodnotenia na stránke
        $('.user-profile p').text('Average Rating: ' + averageRating);
        console.log(averageRating);
    }

    function updateRatingDisplay(rating) {
        const ratingStars = document.querySelectorAll('.rating > span');

        ratingStars.forEach((star, index) => {
            const innerStarIcon = star.querySelector('ion-icon');
            const innerRatingValue = index + 1; // Hodnotenie hviezdičky (1, 2, 3, ...)

            if (innerRatingValue <= rating) {
                innerStarIcon.setAttribute('name', 'star');
            } else {
                innerStarIcon.setAttribute('name', 'star-outline');
            }
        });
    }
});
*/

$(document).ready(function () {
    const userId = $('.rating').data('user-id');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
/*
    function updateAverageRating() {
        // Načítajte priemerné hodnotenie zo servera a aktualizujte stránku
        $.ajax({
            type: 'GET',
            url: '/profile/' + userId + '/average-rating',
            success: function (response) {
                const averageRating = response.averageRating;
                console.log(averageRating);
                $('.averageRating').text('Average Rating: ' + averageRating);
            },
            error: function (error) {
                console.error('Chyba pri načítaní priemeru hodnotenia:', error);
            }
        });
    }
 */

    function updateAverageRating(averageRating) {
        // Aktualizácia vizuálneho zobrazenia priemeru hodnotenia na stránke
        $('.GlobalAverageRating').text('Priemerné hodnotenie: ' + averageRating);
    }

    const ratingStars = document.querySelectorAll('.rating > span');

    ratingStars.forEach((star) => {
        star.addEventListener('click', function () {

            if (!userId) {
                // Presmerujte neprihláseného používateľa na stránku prihlásenia
                window.location.href = '/login';
                return;
            }

            const ratingValue = this.getAttribute('data-rating');

            $.ajax({
                type: 'POST',
                url: '/profile/' + userId + '/rate',
                data: {
                    'rating': ratingValue,
                    '_token': csrfToken,
                },
                success: function (response) {
                    // Aktualizácia hodnotenia na obrazovke
                    updateRatingDisplay(response.rating);

                    // Aktualizácia priemeru hodnotenia na obrazovke
                    //updateAverageRating();
                    updateAverageRating(response.averageRating);
                },
                error: function (error) {
                    console.error('Chyba pri pridávaní hodnotenia:', error);
                }
            });
        });
    });

    function updateRatingDisplay(rating) {
        const ratingStars = document.querySelectorAll('.rating > span');

        ratingStars.forEach((star, index) => {
            const innerStarIcon = star.querySelector('ion-icon');
            const innerRatingValue = index + 1;

            if (innerRatingValue <= rating) {
                innerStarIcon.setAttribute('name', 'star');
            } else {
                innerStarIcon.setAttribute('name', 'star-outline');
            }
        });
    }
});




