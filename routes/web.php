<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'tu'], function () {

    // TU
    Route::get('/', 'Administration\DashboardController@index'); // => SHOW DASHBOARD

    // PENGATURAN
    Route::get('/pengaturan', 'Administration\SettingController@edit'); // => SHOW SETTING
    Route::patch('/pengaturan', 'Administration\SettingController@update'); // => UPDATE SETTING

    // SURAT
    Route::group(['prefix' => 'surat'], function () {
        Route::get('/masuk', 'Administration\MailInController@index'); // => SHOW MAIL IN
        Route::get('/masuk/{id}', 'Administration\MailInController@show'); // => SHOW MAIL IN DETAIL
        Route::get('/masuk/tambah', 'Administration\MailInController@create'); // => SHOW CREATE MAIL IN
        Route::post('/masuk', 'Administration\MailInController@store'); // => STORE MAIL IN
        Route::delete('/masuk/{id}', 'Administration\MailInController@destroy'); // => DELETE MAIL IN

        Route::get('/masuk/{id}/download', 'Administration\MailInDownloadController@show'); // => DOWNLOAD MAIL IN

        Route::get('/masuk/{id}/disposisi', 'Administration\MailInDispositionController@index'); // => VIEW DISPOSISI
        Route::get('/masuk/{id}/teruskan/disposisi/tambah', 'Administration\MailInDispositionController@create'); // => CREATE DISPOSITION IF USER FLAGED 
        Route::post('/masuk/{id}/teruskan/disposisi', 'Administration\MailInDispositionController@store'); // => CRETAE DISPOSITION IF USER FLAGED

        Route::get('/masuk/{id}/archive', 'Administration\MailInArchiveController@update'); // => ARCHIVE MAIL IN

        // AKSES SELURUH SURAT
        // SEDANG BERLANGSUNG
        Route::get('/dalam-proses', 'TU\OngoIngMailController@index');
        Route::patch('/dalam-proses/{id}/{action}', 'TU\OngoIngMailController@update')->action;
        Route::delete('/dalam-proses/{id}', 'TU\OngoIngMailController@destroy');

        // ARSIP
        Route::get('/dalam-proses/{id}', 'TU\ArchiveMailController@index');
        Route::get('/dalam-proses', 'TU\ArchiveMailController@destroy');
    });
});

Route::group(['prefix' => 'pengguna'], function () {

    // PENGGUNA
    Route::get('/', 'User\DashboardController@index');

    // PENGATURAN
    Route::get('/', 'User\SettingController@edit');
    Route::patch('/', 'User\SettingController@update');

    // SURAT
    // MASUK
    Route::group(['prefix' => 'surat'], function () {
        Route::get('/masuk', 'User\MailInController@index');
        Route::get('/masuk/{id}', 'User\MailInController@show');
        Route::delete('/masuk/{id}', 'User\MailInController@destroy');

        Route::post('/masuk/{id}/aksi/download', 'User\MailInActionController@download');
        Route::post('/masuk/{id}/aksi/teruskan', 'User\MailInActionController@forward');
        Route::post('/masuk/{id}/aksi/arsipkan', 'User\MailInActionController@archive');

        Route::get('/masuk/{id}/disposisi', 'User\MailInDispositionController@index');
        Route::get('/masuk/{id}/teruskan/disposisi/tambah', 'User\MailInDispositionController@create');
        Route::post('/masuk/{id}/teruskan/disposisi', 'User\MailInDispositionController@store');

        // KELUAR
        Route::get('/keluar', 'User\MailOutController@index');
        Route::get('/keluar/{id}', 'User\MailOutController@show');
        Route::get('/keluar/tambah', 'User\MailOutController@create');
        Route::post('/keluar', 'User\MailOutController@store');
        Route::delete('/keluar/{id}', 'User\MailOutController@destroy');

        Route::post('/keluar/{id}/aksi/download', 'User\MailOutActionController@download');
        Route::post('/keluar/{id}/aksi/teruskan', 'User\MailOutActionController@forward');
        Route::post('/keluar/{id}/aksi/resivi', 'User\MailOutActionController@revision');
        Route::post('/keluar/{id}/aksi/koreksi', 'User\MailOutActionController@correction');

        Route::get('/keluar/{id}/reivisi', 'User\MailOutRevisionController@create');
        Route::post('/keluar/{id}', 'User\MailOutRevisionController@store');

        Route::get('/keluar/{id}/koreksi', 'User\MailOutController@edit');
        Route::patch('/keluar/{id}', 'User\MailOutController@update');

        // AKSES SELURUH SURAT
        // SEDANG BERLANGSUNG
        Route::get('/dalam-proses', 'User\OngoingMailController@index');
        Route::patch('/dalam-proses/{id}/{action}', 'User\OngoingMailController@update')->action;
        Route::delete('/dalam-proses/{id}', 'User\OngoingMailController@destroy');
        // ARSIP
        Route::get('/dalam-proses/{id}', 'User\ArchivedMailController@index');
        Route::delete('/dalam-proses/{id}', 'User\ArchivedMailController@destroy');
    });
});

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    // SURAT
    Route::group(['prefix' => 'surat'], function () {
        // AKSES SELURUH SURAT
        // SEDANG BERLANGSUNG
        Route::get('/dalam-proses', 'Admin\OngoingMailController@index');
        Route::patch('/dalam-proses/{id}/{action}', 'Admin\OngoingMailController@update')->action;
        Route::delete('/dalam-proses/{id}', 'Admin\OngoingMailController@destroy');
        // ARSIP
        Route::get('/dalam-proses/{id}', 'Admin\ArchivedMailController@index');
        Route::delete('/dalam-proses/{id}', 'Admin\ArchivedMailController@destroy');
    });


    // SETTING
    Route::group(['prefix' => 'pengaturan'], function () {
        // SETTING PENGGUNA
        Route::get('/pengguna', 'Admin\UserController@index');
        Route::post('/pengguna/{id}', 'Admin\UserController@show');
        Route::get('/pengguna/tambah', 'Admin\UserController@create');
        Route::post('/pengguna', 'Admin\UserController@store');
        Route::get('/pengguna/{id}/ubah', 'Admin\UserController@edit');
        Route::patch('/pengguna/{id}', 'Admin\UserController@update');
        Route::delete('/pengguna/{id}', 'Admin\UserController@destroy');

        // SETTING LEVEL PENGGUNA
        Route::get('/level-pengguna', 'Admin\LevelController@index');
        Route::post('/level-pengguna/{id}', 'Admin\LevelController@show');
        Route::get('/level-pengguna/tambah', 'Admin\LevelController@create');
        Route::post('/level-pengguna', 'Admin\LevelController@store');
        Route::get('/level-pengguna/{id}/ubah', 'Admin\LevelController@edit');
        Route::patch('/level-pengguna/{id}', 'Admin\LevelController@update');
        Route::delete('/level-pengguna/{id}', 'Admin\LevelController@destroy');

        // SETTING BIDANG/BAGIAN
        Route::get('/bagian', 'Admin\DepartmentController@index');
        Route::post('/bagian/{id}', 'Admin\DepartmentController@show');
        Route::get('/bagian/tambah', 'Admin\DepartmentController@create');
        Route::post('/bagian', 'Admin\DepartmentController@store');
        Route::get('/bagian/{id}/ubah', 'Admin\DepartmentController@edit');
        Route::patch('/bagian/{id}', 'Admin\DepartmentController@update');
        Route::delete('/bagian/{id}', 'Admin\DepartmentController@destroy');

        // SETIINNG ATRIBUT SURAT
        Route::get('/atribut-surat', 'Admin\MailAtrributeController@index');
        Route::post('/atribut-surat/{id}', 'Admin\MailAtrributeController@show');
        Route::get('/atribut-surat/tambah', 'Admin\MailAtrributeController@create');
        Route::post('/atribut-surat', 'Admin\MailAtrributeController@store');
        Route::get('/atribut-surat/{id}/ubah', 'Admin\MailAtrributeController@edit');
        Route::get('/atribut-surat/{id}', 'Admin\MailAtrributeController@update');
        Route::patch('/atribut-surat/{id}', 'Admin\MailAtrributeController@destroy');
    });
});
