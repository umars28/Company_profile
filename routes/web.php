<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/Dashboard', 'Admin\AdminDashboardController@index')->name('admin.dashboard.index');

    Route::group(['prefix' => 'About'], function () {
        Route::get('/', 'Admin\AdminAboutController@index')->name('admin.about.index');
        Route::post('about/update/{id}', 'Admin\AdminAboutController@update')->name('admin.about.update');
    });

    Route::group(['prefix' => 'Article'], function () {
        Route::get('/categories', 'Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::get('/categories/create', 'Admin\AdminCategoryController@create')->name('admin.category.create');
        Route::post('/categories/store', 'Admin\AdminCategoryController@store')->name('admin.category.store');
        Route::get('/categories/delete/{id}', 'Admin\AdminCategoryController@delete')->name('admin.category.delete');
        Route::get('/categories/edit/{id}', 'Admin\AdminCategoryController@edit')->name('admin.category.edit');
        Route::post('categories/update/{id}', 'Admin\AdminCategoryController@update')->name('admin.category.update');
        Route::get('/', 'Admin\AdminArticleController@index')->name('admin.article.index');
        Route::get('/create', 'Admin\AdminArticleController@create')->name('admin.article.create');
        Route::post('/store', 'Admin\AdminArticleController@store')->name('admin.article.store');
        Route::get('/delete/{id}', 'Admin\AdminArticleController@delete')->name('admin.article.delete');
        Route::get('/edit/{id}', 'Admin\AdminArticleController@edit')->name('admin.article.edit');
        Route::post('/update/{id}', 'Admin\AdminArticleController@update')->name('admin.article.update');
        Route::get('/search', 'Admin\AdminArticleController@search')->name('admin.article.search');
    });

    Route::group(['prefix' => 'Services'], function () {
        Route::get('/', 'Admin\AdminServiceController@index')->name('admin.service.index');
        Route::get('/create', 'Admin\AdminServiceController@create')->name('admin.service.create');
        Route::post('/store', 'Admin\AdminServiceController@store')->name('admin.service.store');
        Route::get('/delete/{id}', 'Admin\AdminServiceController@delete')->name('admin.service.delete');
        Route::get('/edit/{id}', 'Admin\AdminServiceController@edit')->name('admin.service.edit');
        Route::post('/update/{id}', 'Admin\AdminServiceController@update')->name('admin.service.update');
    });

    Route::group(['prefix' => 'Portofolio'], function () {
        Route::get('/', 'Admin\AdminPortofolioController@index')->name('admin.portofolio.index');
        Route::get('/create', 'Admin\AdminPortofolioController@create')->name('admin.portofolio.create');
        Route::post('/store', 'Admin\AdminPortofolioController@store')->name('admin.portofolio.store');
        Route::get('/delete/{id}', 'Admin\AdminPortofolioController@delete')->name('admin.portofolio.delete');
        Route::get('/edit/{id}', 'Admin\AdminPortofolioController@edit')->name('admin.portofolio.edit');
        Route::post('/update/{id}', 'Admin\AdminPortofolioController@update')->name('admin.portofolio.update');
    });

    Route::group(['prefix' => 'Profile'], function () {
        Route::get('/', 'Admin\AdminProfileController@index')->name('admin.profile.index');
        Route::get('/create', 'Admin\AdminProfileController@create')->name('admin.profile.create');
        Route::post('/store', 'Admin\AdminProfileController@store')->name('admin.profile.store');
        Route::get('/delete/{id}', 'Admin\AdminProfileController@delete')->name('admin.profile.delete');
        Route::get('/edit/{id}', 'Admin\AdminProfileController@edit')->name('admin.profile.edit');
        Route::post('/update/{id}', 'Admin\AdminProfileController@update')->name('admin.profile.update');
    });

    Route::group(['prefix' => 'Testimoni'], function () {
        Route::get('/', 'Admin\AdminTestimoniController@index')->name('admin.testimoni.index');
        Route::get('/edit/{id}', 'Admin\AdminTestimoniController@edit')->name('admin.testimoni.edit');
        Route::post('/update/{id}', 'Admin\AdminTestimoniController@update')->name('admin.testimoni.update');
    });

    Route::group(['prefix' => 'Address'], function () {
        Route::get('/', 'Admin\AdminAddressController@index')->name('admin.address.index');
        Route::post('/update/{id}', 'Admin\AdminAddressController@update')->name('admin.address.update');
    });

    Route::group(['prefix' => 'Contact-Us'], function () {
        Route::get('/', 'Admin\AdminContactController@index')->name('admin.contact.index');
        Route::post('/update/{id}', 'Admin\AdminContactController@update')->name('admin.contact.update');
    });

    Route::group(['prefix' => 'Faqs'], function () {
        Route::get('/', 'Admin\AdminFaqsController@index')->name('admin.faqs.index');
        Route::get('/create', 'Admin\AdminFaqsController@create')->name('admin.faqs.create');
        Route::post('/store', 'Admin\AdminFaqsController@store')->name('admin.faqs.store');
        Route::get('/delete/{id}', 'Admin\AdminFaqsController@delete')->name('admin.faqs.delete');
        Route::get('/edit/{id}', 'Admin\AdminFaqsController@edit')->name('admin.faqs.edit');
        Route::post('/update/{id}', 'Admin\AdminFaqsController@update')->name('admin.faqs.update');
    });

    Route::group(['prefix' => 'Feedbacks'], function () {
        Route::get('/', 'Admin\AdminFeedbacksController@index')->name('admin.feedbacks.index');
    });

    Route::group(['prefix' => 'Profile'], function () {
        Route::get('/index', 'Admin\AdminProfilController@index')->name('admin.profil.index');
        Route::post('/store/{id}', 'Admin\AdminProfilController@store')->name('admin.profil.store');
    });

    Route::group(['prefix' => 'Setting'], function () {
        Route::get('/index', 'Admin\AdminSettingController@index')->name('admin.setting.index');
        Route::post('/update', 'Admin\AdminSettingController@update')->name('admin.setting.update');
    });
});

Route::get('/', 'HomepageController@index')->name('homepage.index');
Route::get('/Article/detail/{slug}', 'ArticleController@detail')->name('article.detail');
Route::get('Article/index/{category}', 'ArticleController@index')->name('article.index');
Route::post('/contact-us/store', 'HomepageController@contactStore')->name('contact.store');

