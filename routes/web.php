<?php

use App\Models\User;
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
Route::group(['prefix' => 'tu',  'middleware' => ['auth', 'role:TU'], 'namespace' => 'App\Http\Controllers\Administration'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('tu.dashboard.index');

    // User Account Setting
    /** DONE ACTION */
    Route::get('/pengaturan/akun', 'AccountController@edit')->name('tu.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountController@update')->name('tu.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail File
        Route::get('/{mail}/lihat', 'MailFileController@show')->name('tu.mail.file.show');
        Route::post('/{mail}/download', 'MailFileController@download')->name('tu.mail.download');

        // Mail In
        Route::get('/masuk', 'MailInController@index')->name('tu.mail.in.index');
        Route::get('/masuk/tambah', 'MailInController@create')->name('tu.mail.in.create');
        Route::post('/masuk', 'MailInController@store')->name('tu.mail.in.store');
        Route::get('/masuk/{mail}', 'MailInController@show')->name('tu.mail.in.show');
        Route::delete('/masuk/{id}', 'MailInController@destroy')->name('tu.mail.in.destroy');

        // Mail In Custom Action
        Route::post('/masuk/{mail}/aksi/arsipkan', 'MailInActionController@archive')->name('tu.mail.in.action.archive');
        Route::post('/masuk/{mail}/aksi/teruskan', 'MailInActionController@forward')->name('tu.mail.in.action.forward');

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
        /** DONE ACTION */
        Route::get('/keluar/{mail}/finalisasi', 'MailOutFinalController@edit')->name('tu.mail.out.final.edit');
        Route::patch('/keluar/{mail}/finalisasi', 'MailOutFinalController@update')->name('tu.mail.out.final.update');

        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('tu.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('tu.mail.archived.index');

        // Mail Master Action
        /** DONE ACTION */
        Route::get('/semua/{mail}', 'MailMasterController@show')->name('tu.mail.master.show');
        Route::get('/semua/{mail}/ubah', 'MailMasterController@edit')->name('tu.mail.master.edit');
        Route::patch('/semua/{mail}', 'MailMasterController@update')->name('tu.mail.master.update');
        Route::delete('/semua/{mail}', 'MailMasterController@destroy')->name('tu.mail.master.destroy');
        Route::post('/semua/{mail}/arsipkan', 'MailMasterController@archive')->name('tu.mail.master.archive');
        Route::post('/semua/{mail}/download', 'MailMasterController@download')->name('tu.mail.master.download');
    });
});

// User
Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:User'], 'namespace' => 'App\Http\Controllers\User'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('user.dashboard.index');

    // User Account Setting
    /** DONE ACTION */
    Route::get('/pengaturan/akun', 'AccountController@edit')->name('user.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountController@update')->name('user.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail File
        /** DONE ACTION */
        Route::get('/{mail}/lihat', 'MailFileController@show')->name('user.mail.file.show');
        Route::post('/{mail}/download', 'MailFileController@download')->name('user.mail.download');

        // Mail In
        Route::get('/masuk', 'MailInController@index')->name('user.mail.in.index');
        Route::get('/masuk/{mail}', 'MailInController@show')->name('user.mail.in.show');

        // ??? (UNDER CONSIDERATION)
        Route::delete('/masuk/{id}', 'MailInController@destroy')->name('user.mail.in.destroy');
        // ??? (UNDER CONSIDERATION)

        // Mail In Forward
        /** DONE ACTION */
        Route::get('/masuk/{mail}/aksi/teruskan', 'MailInForwardController@create')->name('user.mail.in.forward.create');
        Route::post('/masuk/{mail}/aksi/teruskan', 'MailInForwardController@store')->name('user.mail.in.forward.store');

        // Mail In Custom Action
        Route::post('/masuk/{mail}/aksi/arsipkan', 'MailInActionController@archive')->name('user.mail.in.action.archive');

        // Mail In Disposition
        /** DONE ACTION */
        Route::get('/masuk/{mail}/disposisi', 'MailInDispositionController@show')->name('user.mail.in.disposition.show');
        Route::get('/masuk/{mail}/teruskan/disposisi/tambah', 'MailInDispositionController@create')->name('user.mail.in.disposition.create');
        Route::post('/masuk/{mail}/teruskan/disposisi', 'MailInDispositionController@store')->name('user.mail.in.disposition.store');

        // Mail Out
        /** DONE ACTION */
        Route::get('/keluar', 'MailOutController@index')->name('user.mail.out.index');
        Route::get('/keluar/tambah', 'MailOutController@create')->name('user.mail.out.create');
        Route::post('/keluar', 'MailOutController@store')->name('user.mail.out.store');
        Route::get('/keluar/{mail}', 'MailOutController@show')->name('user.mail.out.show');
        Route::get('/keluar/{mail}/koreksi', 'MailOutController@edit')->name('user.mail.out.edit');
        Route::patch('/keluar/{mail}', 'MailOutController@update')->name('user.mail.out.update');
        Route::delete('/keluar/{mail}', 'MailOutController@destroy')->name('user.mail.out.destroy');

        // Mail Out Custom Action
        /** DONE ACTION */
        Route::post('/keluar/{mail}/aksi/teruskan', 'MailOutForwardController@store')->name('user.mail.out.forward.store');

        // Mail Out Revision
        /** DONE ACTION */
        Route::get('/keluar/{mail}/revisi/tambah', 'MailOutRevisionController@create')->name('user.mail.out.revision.create');
        Route::post('/keluar/{mail}/revisi', 'MailOutRevisionController@store')->name('user.mail.out.revision.store');
        Route::post('/semua/{mail}/download', 'MailMasterController@download')->name('user.mail.master.download');

        //!!! ONLY USER WITH ALL MAIL ACCESS !!!
        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('user.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('user.mail.archived.index');

        // Mail Master Action
        /** DONE ACTION */
        Route::get('/semua/{mail}', 'MailMasterController@show')->name('user.mail.master.show');
        Route::post('/semua/{mail}/download', 'MailMasterController@download')->name('user.mail.master.download');
    });
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin'], 'namespace' => 'App\Http\Controllers\Admin'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');

    // User Account Setting
    /** DONE ACTION */
    Route::get('/pengaturan/akun', 'AccountController@edit')->name('admin.setting.account.edit');
    Route::patch('/pengaturan/akun', 'AccountController@update')->name('admin.setting.account.update');

    // Mail
    Route::group(['prefix' => 'surat'], function () {
        // Mail Download

        // Mail Master Action
        /** DONE ACTION */
        Route::get('/semua-surat/{mail}', 'MailMasterController@show')->name('admin.mail.master.show');
        Route::get('/semua-surat/{mail}/ubah', 'MailMasterController@edit')->name('admin.mail.master.edit');
        Route::patch('/semua-surat/{mail}', 'MailMasterController@update')->name('admin.mail.master.update');
        Route::delete('/semua-surat/{mail}', 'MailMasterController@destroy')->name('admin.mail.master.destroy');
        Route::post('/semua-surat/{mail}/arsipkan', 'MailMasterController@archive')->name('admin.mail.master.archive');
        Route::post('/semua-surat/{mail}/download', 'MailMasterController@download')->name('admin.mail.master.download');

        // Mail Ongoing 
        Route::get('/dalam-proses', 'OngoingMailController@index')->name('admin.mail.ongoing.index');

        // Mail Archived 
        Route::get('/terarsip', 'ArchivedMailController@index')->name('admin.mail.archived.index');
    });

    // Setting
    Route::group(['prefix' => 'pengaturan'], function () {
        // User
        /** DONE ACTION */
        Route::get('/pengguna', 'UserSettingController@index')->name('admin.setting.user.index');
        Route::get('/pengguna/tambah', 'UserSettingController@create')->name('admin.setting.user.create');
        Route::post('/pengguna', 'UserSettingController@store')->name('admin.setting.user.store');
        Route::get('/pengguna/{user}', 'UserSettingController@show')->name('admin.setting.user.show');
        Route::get('/pengguna/{user}/ubah', 'UserSettingController@edit')->name('admin.setting.user.edit');
        Route::patch('/pengguna/{user}', 'UserSettingController@update')->name('admin.setting.user.update');
        Route::delete('/pengguna/{user}', 'UserSettingController@destroy')->name('admin.setting.user.destroy');

        // Level
        /** DONE ACTION */
        Route::get('/level-pengguna', 'LevelSettingController@index')->name('admin.setting.level.index');
        Route::get('/level-pengguna/tambah', 'LevelSettingController@create')->name('admin.setting.level.create');
        Route::post('/level-pengguna', 'LevelSettingController@store')->name('admin.setting.level.store');
        Route::get('/level-pengguna/{level}', 'LevelSettingController@show')->name('admin.setting.level.show');
        Route::get('/level-pengguna/{level}/ubah', 'LevelSettingController@edit')->name('admin.setting.level.edit');
        Route::patch('/level-pengguna/{level}', 'LevelSettingController@update')->name('admin.setting.level.update');
        Route::delete('/level-pengguna/{level}', 'LevelSettingController@destroy')->name('admin.setting.level.destroy');

        // Department
        /** DONE ACTION */
        Route::get('/bagian', 'DepartmentSettingController@index')->name('admin.setting.department.index');
        Route::get('/bagian/tambah', 'DepartmentSettingController@create')->name('admin.setting.department.create');
        Route::post('/bagian', 'DepartmentSettingController@store')->name('admin.setting.department.store');
        Route::get('/bagian/{department}', 'DepartmentSettingController@show')->name('admin.setting.department.show');
        Route::get('/bagian/{department}/ubah', 'DepartmentSettingController@edit')->name('admin.setting.department.edit');
        Route::patch('/bagian/{department}', 'DepartmentSettingController@update')->name('admin.setting.department.update');
        Route::delete('/bagian/{department}', 'DepartmentSettingController@destroy')->name('admin.setting.department.destroy');

        // Mail Attribute
        /** DONE ACTION */
        Route::get('/atribut-surat', 'MailAtrributeSettingController@index')->name('admin.setting.mail.attribute.index');
        Route::get('/atribut-surat/tambah', 'MailAtrributeSettingController@create')->name('admin.setting.mail.attribute.create');
        Route::post('/atribut-surat', 'MailAtrributeSettingController@store')->name('admin.setting.mail.attribute.store');
        Route::get('/atribut-surat/{mail_attribute}', 'MailAtrributeSettingController@show')->name('admin.setting.mail.attribute.show');
        Route::get('/atribut-surat/{mail_attribute}/ubah', 'MailAtrributeSettingController@edit')->name('admin.setting.mail.attribute.edit');
        Route::patch('/atribut-surat/{mail_attribute}', 'MailAtrributeSettingController@update')->name('admin.setting.mail.attribute.update');
        Route::delete('/atribut-surat/{mail_attribute}', 'MailAtrributeSettingController@destroy')->name('admin.setting.mail.attribute.destroy');
    });
});

Route::get('/', function () {
    return redirect('/login');
})->middleware('guest');

require __DIR__ . '/auth.php';
