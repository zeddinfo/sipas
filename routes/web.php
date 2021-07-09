<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Administration
Route::group(['prefix' => 'tu', 'namespace' => 'App\Http\Controllers\Administration'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('tu.dashboard.index');

    // User Account Setting
    Route::get('/pengaturan/akun', 'AccountSettingController@edit')->name('tu.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountSettingController@update')->name('tu.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail Download
        Route::get('/{id}/download', 'MailDownloadController@download')->name('tu.mail.download');

        // Mail In
        Route::get('/masuk', 'MailInController@index')->name('tu.mail.in.index');
        Route::get('/masuk/tambah', 'MailInController@create')->name('tu.mail.in.create');
        Route::post('/masuk', 'MailInController@store')->name('tu.mail.in.store');
        Route::get('/masuk/{id}', 'MailInController@show')->name('tu.mail.in.show');
        Route::delete('/masuk/{id}', 'MailInController@destroy')->name('tu.mail.in.destroy');

        // Mail In Custom Action
        Route::post('/masuk/{id}/aksi/arsipkan', 'MailInActionController@archive')->name('tu.mail.in.action.archive');
        Route::post('/masuk/{id}/aksi/teruskan', 'MailInActionController@forward')->name('tu.mail.in.action.forward');

        // ??? Mail In Disposition (UNDER CONSIDERATION)
        Route::get('/masuk/{id}/disposisi', 'MailInDispositionController@index')->name('tu.mail.in.disposition.index');
        Route::get('/masuk/{id}/teruskan/disposisi/tambah', 'MailInDispositionController@create')->name('tu.mail.in.disposition.create');
        Route::post('/masuk/{id}/teruskan/disposisi', 'MailInDispositionController@store')->name('tu.mail.in.disposition.store');
        // ??? Mail In Disposition (UNDER CONSIDERATION)

        // Mail Out
        Route::get('/keluar', 'MailOutController@index')->name('tu.mail.out.index');
        Route::get('/keluar/{id}', 'MailOutController@show')->name('tu.mail.out.show');
        Route::get('/keluar/{id}/koreksi', 'MailOutController@edit')->name('tu.mail.out.edit');
        Route::patch('/keluar/{id}', 'MailOutController@update')->name('tu.mail.out.update');
        Route::delete('/keluar/{id}', 'MailOutController@destroy')->name('tu.mail.out.destroy');

        // Mail Out Custom Action
        Route::post('/masuk/{id}/aksi/arsipkan', 'MailOutActionController@archive')->name('tu.mail.out.action.archive');

        // ??? (UNDER CONSIDERATION)
        Route::post('/keluar/{id}/aksi/revisi', 'MailOutActionController@revision')->name('tu.mail.out.action.revision');
        // ??? (UNDER CONSIDERATION)

        // Mail Out Code
        Route::get('/keluar/{id}/kode-surat', 'MailOutCodeController@update')->name('tu.mail.out.code.update');
        Route::patch('/keluar/{id}/kode-surat', 'MailOutCodeController@edit')->name('tu.mail.out.code.edit');

        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('tu.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('tu.mail.archived.index');

        // Mail Master Action
        Route::get('/semua/{id}', 'MailMasterController@show')->name('tu.mail.master.show');
        Route::get('/semua/{id}/ubah', 'MailMasterController@update')->name('tu.mail.master.update');
        Route::patch('/semua/{id}', 'MailMasterController@edit')->name('tu.mail.master.edit');
        Route::delete('/semua/{id}', 'MailMasterController@destroy')->name('tu.mail.master.destroy');
        Route::post('/semua/{id}/arsipkan', 'MailMasterController@archive')->name('tu.mail.master.archive');
    });
});

// User
Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:User'], 'namespace' => 'App\Http\Controllers\User'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('user.dashboard.index');

    // User Account Setting
    Route::get('/pengaturan/akun', 'AccountSettingController@edit')->name('user.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountSettingController@update')->name('user.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail Download
        Route::post('/{id}/download', 'MailDownloadController@download')->name('user.mail.download');

        // Mail In
        Route::get('/masuk', 'MailInController@index')->name('user.mail.in.index');
        Route::get('/masuk/{id}', 'MailInController@show')->name('user.mail.in.show');
        // ??? (UNDER CONSIDERATION)
        Route::delete('/masuk/{id}', 'MailInController@destroy')->name('user.mail.in.destroy');
        // ??? (UNDER CONSIDERATION)

        // Mail In Custom Action
        Route::post('/masuk/{id}/aksi/teruskan', 'MailInActionController@forward')->name('user.mail.in.action.forward');
        Route::post('/masuk/{id}/aksi/arsipkan', 'MailInActionController@archive')->name('user.mail.in.action.archive');

        // Mail In Disposition
        Route::get('/masuk/{id}/disposisi', 'MailInDispositionController@index')->name('user.mail.in.disposition.index');
        Route::get('/masuk/{id}/teruskan/disposisi/tambah', 'MailInDispositionController@create')->name('user.mail.in.disposition.create');
        Route::post('/masuk/{id}/teruskan/disposisi', 'MailInDispositionController@store')->name('user.mail.in.disposition.store');

        // Mail Out
        Route::get('/keluar', 'MailOutController@index')->name('user.mail.out.index');
        Route::get('/keluar/tambah', 'MailOutController@create')->name('user.mail.out.create');
        Route::post('/keluar', 'MailOutController@store')->name('user.mail.out.store');
        Route::get('/keluar/{mail}', 'MailOutController@show')->name('user.mail.out.show');
        Route::get('/keluar/{mail}/koreksi', 'MailOutController@edit')->name('user.mail.out.edit');
        Route::patch('/keluar/{mail}', 'MailOutController@update')->name('user.mail.out.update');
        Route::delete('/keluar/{mail}', 'MailOutController@destroy')->name('user.mail.out.destroy');

        // Mail Out Custom Action
        Route::post('/keluar/{id}/aksi/teruskan', 'MailOutActionController@forward')->name('user.mail.out.action.forward');

        // Mail Out Revision
        Route::get('/keluar/{mail}/revisi/tambah', 'MailOutRevisionController@create')->name('user.mail.out.revision.create');
        Route::post('/keluar/{mail}/revisi', 'MailOutRevisionController@store')->name('user.mail.out.revision.store');

        //!!! ONLY USER WITH ALL MAIL ACCESS !!!
        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('user.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('user.mail.archived.index');
    });
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin'], 'namespace' => 'App\Http\Controllers\Admin'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');

    // User Account Setting
    Route::get('/pengaturan/akun', 'AccountSettingController@edit')->name('admin.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountSettingController@update')->name('admin.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail Download
        Route::post('/{id}/download', 'MailDownloadController@download')->name('admin.mail.download');

        // Mail Master Action
        Route::get('/semua-surat/{id}', 'MailMasterController@show')->name('admin.mail.master.show');
        Route::get('/semua-surat/{id}/ubah', 'MailMasterController@update')->name('admin.mail.master.update');
        Route::patch('/semua-surat/{id}', 'MailMasterController@edit')->name('admin.mail.master.edit');
        Route::delete('/semua-surat/{id}', 'MailMasterController@destroy')->name('admin.mail.master.destroy');
        Route::post('/semua-surat/{id}/arsipkan', 'MailMasterController@archive')->name('admin.mail.master.archive');

        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('admin.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('admin.mail.archived.index');
    });

    // Setting
    Route::group(['prefix' => 'pengaturan'], function () {
        // User
        Route::get('/pengguna', 'UserSettingController@index')->name('admin.setting.user.index');
        Route::get('/pengguna/tambah', 'UserSettingController@create')->name('admin.setting.user.create');
        Route::post('/pengguna', 'UserSettingController@store')->name('admin.setting.user.store');
        Route::post('/pengguna/{id}', 'UserSettingController@show')->name('admin.setting.user.show');
        Route::get('/pengguna/{id}/ubah', 'UserSettingController@edit')->name('admin.setting.user.edit');
        Route::patch('/pengguna/{id}', 'UserSettingController@update')->name('admin.setting.user.update');
        Route::delete('/pengguna/{id}', 'UserSettingController@destroy')->name('admin.setting.user.destroy');

        // Level
        Route::get('/level-pengguna', 'LevelSettingController@index')->name('admin.setting.level.index');
        Route::get('/level-pengguna/tambah', 'LevelSettingController@create')->name('admin.setting.level.create');
        Route::post('/level-pengguna', 'LevelSettingController@store')->name('admin.setting.level.store');
        Route::post('/level-pengguna/{id}', 'LevelSettingController@show')->name('admin.setting.level.show');
        Route::get('/level-pengguna/{id}/ubah', 'LevelSettingController@edit')->name('admin.setting.level.edit');
        Route::patch('/level-pengguna/{id}', 'LevelSettingController@update')->name('admin.setting.level.update');
        Route::delete('/level-pengguna/{id}', 'LevelSettingController@destroy')->name('admin.setting.level.destroy');

        // Department
        Route::get('/bagian', 'DepartmentSettingController@index')->name('admin.setting.department.index');
        Route::get('/bagian/tambah', 'DepartmentSettingController@create')->name('admin.setting.department.create');
        Route::post('/bagian', 'DepartmentSettingController@store')->name('admin.setting.department.store');
        Route::post('/bagian/{id}', 'DepartmentSettingController@show')->name('admin.setting.department.show');
        Route::get('/bagian/{id}/ubah', 'DepartmentSettingController@edit')->name('admin.setting.department.edit');
        Route::patch('/bagian/{id}', 'DepartmentSettingController@update')->name('admin.setting.department.update');
        Route::delete('/bagian/{id}', 'DepartmentSettingController@destroy')->name('admin.setting.department.destroy');

        // Mail Attribute
        Route::get('/atribut-surat', 'MailAtrributeSettingController@index')->name('admin.setting.mail.attribute.index');
        Route::get('/atribut-surat/tambah', 'MailAtrributeSettingController@create')->name('admin.setting.mail.attribute.create');
        Route::post('/atribut-surat', 'MailAtrributeSettingController@store')->name('admin.setting.mail.attribute.store');
        Route::post('/atribut-surat/{id}', 'MailAtrributeSettingController@show')->name('admin.setting.mail.attribute.show');
        Route::get('/atribut-surat/{id}/ubah', 'MailAtrributeSettingController@edit')->name('admin.setting.mail.attribute.edit');
        Route::get('/atribut-surat/{id}', 'MailAtrributeSettingController@update')->name('admin.setting.mail.attribute.update');
        Route::patch('/atribut-surat/{id}', 'MailAtrributeSettingController@destroy')->name('admin.setting.mail.attribute.destroy');
    });
});

require __DIR__ . '/auth.php';
