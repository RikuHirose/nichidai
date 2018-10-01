<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => ['admin.guest']], function () {
        Route::get('sign-in', 'Admin\AuthController@getSignIn')->name('signIn.get');
        Route::post('sign-in', 'Admin\AuthController@postSignIn')->name('signIn.post');
        Route::get('forgot-password', 'Admin\PasswordController@getForgotPassword')->name('forgetPassword.get');
        Route::post('forgot-password', 'Admin\PasswordController@postForgotPassword')->name('forgetPassword.post');
        Route::get('reset-password/{token}', 'Admin\PasswordController@getResetPassword')->name('resetPassword.get');
        Route::post('reset-password', 'Admin\PasswordController@postResetPassword')->name('resetPassword.post');
    });

    Route::group(['middleware' => ['admin.auth']], function () {

        Route::post('sign-out', 'Admin\AuthController@postSignOut')->name('signOut');
        // Route::get('/{any?}', 'Admin\IndexController@index')->name('index')->where('any', '.*');
        Route::get('/', 'Admin\IndexController@index')->name('index');

        Route::resource('lessons', 'Admin\LessonController', ['only' => ['edit', 'update', 'destroy']]);
        // search
        Route::get('/q', 'Admin\IndexController@searchIndexAdmin')->name('q');
        Route::get('/user/q', 'Admin\UserController@searchIndexAdmin')->name('user.q');

        // affiliates
        Route::get('/affiliate/store',  'Admin\LessonController@affiliateStore')->name('affiliate.store');
        Route::put('/affiliate/{affiliate}/update', 'Admin\LessonController@affiliateUpdate')->name('affiliate.update');

        // user
        Route::resource('/user', 'Admin\UserController', ['only' => ['index', 'show', 'edit', 'update', 'delete']]);

        // sidebar
        Route::group(['prefix' => 'sidebar/', 'as' => 'sidebar.'], function () {
            Route::get('/', 'Admin\SideController@index')->name('index');
            Route::get('/recommend', 'Admin\SideController@getRecommend')->name('recommend.get');
            Route::post('/recommend', 'Admin\SideController@postRecommend')->name('recommend.post');
            Route::post('/recommend/{lesson}/delete', 'Admin\SideController@deleteRecommend')->name('recommend.delete');

            Route::get('/popular', 'Admin\SideController@getPopular')->name('popular.get');
            Route::post('/popular', 'Admin\SideController@postPopular')->name('popular.post');
            Route::post('/popular/{lesson}/delete', 'Admin\SideController@deletePopular')->name('popular.delete');

            // Route::get('/other_article', 'Admin\SideController@getOtherArticle')->name('otherArticle.get');
            // Route::post('/other_article', 'Admin\SideController@postOtherArticle')->name('otherArticle.post');
            // Route::post('/other_article/{OtherArticle}/delete', 'Admin\SideController@deleteOtherArticle')->name('popular.delete');
        });
    });
});
