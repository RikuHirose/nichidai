<?php

Route::group([], function () {
    Route::get('/', 'User\IndexController@index')->name('index');

    Route::group(['middleware' => ['user.guest']], function () {
        Route::get('signin', 'User\AuthController@getSignIn')->name('signIn.get');
        Route::post('signin', 'User\AuthController@postSignIn')->name('signIn.post');

        Route::get('signup', 'User\AuthController@getSignUp')->name('signUp.post');
        Route::post('signup', 'User\AuthController@postSignUp')->name('signUp.post');

        Route::get('forgot-password', 'User\PasswordController@getForgotPassword')->name('forgetPassword.get');
        Route::post('forgot-password', 'User\PasswordController@postForgotPassword')->name('forgetPassword.post');

        Route::get('reset-password/{token}', 'User\PasswordController@getResetPassword')->name('resetPassword.get');
        Route::post('reset-password', 'User\PasswordController@postResetPassword')->name('resetPassword.post');


        /* NEW SERVICE AUTH ROOT */
    });

    Route::group(['middleware' => ['user.auth']], function () {
        Route::get('signout', 'User\AuthController@postSignOut')->name('signOut.post');


        Route::group(['prefix' => 'lessons/{lesson}/', 'as' => 'lesson.'], function () {
            // review
            Route::get('review', 'User\LessonController@getReview')->name('review.get');
            Route::post('review', 'User\LessonController@postReview')->name('review.post');

            // favorite
            Route::post('favorite', 'User\FavoriteController@postFavorite')->name('favorite.post');
            Route::post('delete/favorite', 'User\FavoriteController@deleteFavorite');

        });

        Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {
            Route::get('/{user}', 'User\UserController@show')->name('show');
            Route::get('setting/{user}', 'User\UserController@getSetting')->name('setting.get');
            Route::post('setting', 'User\UserController@postSetting')->name('setting.post');
        });
    });

    // lessons
    Route::resource('lessons', 'User\LessonController', ['only' => ['show']]);

    Route::get('/lessons', 'User\LessonController@getLessons')->name('get.lessons');
    Route::get('/lessons/search/q', 'User\LessonController@searchLessons')->name('search.lessons');

    // search
    Route::get('/q', 'User\IndexController@searchIndex');

    // footer Cpntact
    Route::get('/contact', 'User\ContactController@getContact')->name('get.Contact');
    Route::post('/contact/check', 'User\ContactController@postContactCheck')->name('post.contact.check');
    Route::post('/contact/submit', 'User\ContactController@postContactSubmit')->name('post.contact.submit');
});
