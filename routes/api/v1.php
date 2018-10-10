<?php

Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function() {
    Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function() {
        Route::get('status', 'IndexController@status')->name('status');

        Route::post('signup', 'AuthController@postSignUp')->name('signUp');
        Route::post('signin', 'AuthController@postSignIn')->name('signIn');

//        Route::post('signin/facebook', 'FacebookAuthController@facebookSignIn');
        Route::post('forgot-password', 'PasswordController@forgotPassword')->name('forgetPassword');

        Route::group(['middleware' => 'api.auth'], function() {
            Route::post('signout', 'AuthController@postSignOut')->name('signOut');

            // Route::group(['prefix' => 'lessons/{lesson}/', 'as' => 'lesson.'], function () {
            //   // favorite
            //   Route::post('favorite', 'FavoriteController@postFavorite')->name('favorite.post');

            // });
        });

        Route::post('/lessons/{lesson}/users/{user}/store', 'HistoryController@postHistory');
        Route::post('/lessons/{lesson}/users/{user}/delete', 'HistoryController@deleteHistory');
    });
});

/* %%ROUTES%% */
