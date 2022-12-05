<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPengawasanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PkptController;
use App\Http\Controllers\NonPkptController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\SuratPerintahController;
use App\Http\Controllers\KertasKerjaController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\EvaluasiController;


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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/Dashboard', [DashboardController::class, 'index']);
    Route::get('/modal', [DashboardController::class, 'modal']);
    Route::post('/store', [DashboardController::class, 'store']);
    Route::get('/create', [DashboardController::class, 'create']);
    Route::get('/get_data', [DashboardController::class, 'get_data']);
    Route::get('/delete', [DashboardController::class, 'delete']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('master-data')->group(function () {
        Route::group(['prefix' => 'role'],function(){
            Route::get('/', [RoleController::class, 'index'])->name('role');
            Route::get('/modal', [RoleController::class, 'modal']);
            Route::post('/store', [RoleController::class, 'store']);
            Route::get('/create', [RoleController::class, 'create']);
            Route::get('/get-data', [RoleController::class, 'getdata']);
            Route::get('/delete-data', [RoleController::class, 'delete']);
        });

        Route::group(['prefix' => 'user'],function(){
            Route::get('/', [UserController::class, 'index']);
            Route::get('/modal', [UserController::class, 'modal']);
            Route::post('/store', [UserController::class, 'store']);
            Route::get('/create', [UserController::class, 'create']);
            Route::get('/get-data', [UserController::class, 'getdata']);
            Route::get('/delete-data', [UserController::class, 'delete']);
        });

        Route::group(['prefix' => 'jenis-pengawasan'],function(){
            Route::get('/', [JenisPengawasanController::class, 'index']);
            Route::get('/modal', [JenisPengawasanController::class, 'modal']);
            Route::post('/store', [JenisPengawasanController::class, 'store']);
            Route::get('/create', [JenisPengawasanController::class, 'create']);
            Route::get('/get-data', [JenisPengawasanController::class, 'getdata']);
            Route::get('/delete-data', [JenisPengawasanController::class, 'delete']);
        });

        Route::group(['prefix' => 'opd'],function(){
            Route::get('/', [OpdController::class, 'index']);
            Route::get('/modal', [OpdController::class, 'modal']);
            Route::post('/store', [OpdController::class, 'store']);
            Route::get('/create', [OpdController::class, 'create']);
            Route::get('/get-data', [OpdController::class, 'getdata']);
            Route::get('/delete-data', [OpdController::class, 'delete']);
        });
    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('perencanaan')->group(function () {
        Route::group(['prefix' => 'pkpt'],function(){
            Route::get('/', [PkptController::class, 'index']);
            Route::get('/modal', [PkptController::class, 'modal']);
            Route::post('/store', [PkptController::class, 'store']);
            Route::get('/create', [PkptController::class, 'create']);
            Route::get('/get-data', [PkptController::class, 'getdata']);
            Route::get('/delete-data', [PkptController::class, 'delete']);
        });

        Route::group(['prefix' => 'non-pkpt'],function(){
            Route::get('/', [NonPkptController::class, 'index']);
            Route::get('/modal', [NonPkptController::class, 'modal']);
            Route::post('/store', [NonPkptController::class, 'store']);
            Route::get('/create', [NonPkptController::class, 'create']);
            Route::get('/get-data', [NonPkptController::class, 'getdata']);
            Route::get('/delete-data', [NonPkptController::class, 'delete']);
        });

        Route::group(['prefix' => 'program-kerja-pengawasan'],function(){
            Route::get('/', [ProgramKerjaController::class, 'index']);
            Route::get('/modal', [ProgramKerjaController::class, 'modal']);
            Route::post('/store', [ProgramKerjaController::class, 'store']);
            Route::get('/create', [ProgramKerjaController::class, 'create']);
            Route::get('/get-data', [ProgramKerjaController::class, 'getdata']);
            Route::get('/delete-data', [ProgramKerjaController::class, 'delete']);
        });

        Route::group(['prefix' => 'surat-perintah'],function(){
            Route::get('/', [SuratPerintahController::class, 'index']);
            Route::get('/modal', [SuratPerintahController::class, 'modal']);
            Route::post('/store', [SuratPerintahController::class, 'store']);
            Route::get('/create', [SuratPerintahController::class, 'create']);
            Route::get('/get-data', [SuratPerintahController::class, 'getdata']);
            Route::get('/delete-data', [SuratPerintahController::class, 'delete']);
        });
    });
});  

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('pelaksanaan')->group(function () {
        Route::group(['prefix' => 'kertas-kerja-pemeriksaan'],function(){
            Route::get('/', [KertasKerjaController::class, 'index']);
            Route::get('/modal', [KertasKerjaController::class, 'modal']);
            Route::post('/store', [KertasKerjaController::class, 'store']);
            Route::get('/create', [KertasKerjaController::class, 'create']);
            Route::get('/get-data', [KertasKerjaController::class, 'getdata']);
            Route::get('/delete-data', [KertasKerjaController::class, 'delete']);
        });
        Route::group(['prefix' => 'approve-kertas-kerja'],function(){
            Route::get('/', [KertasKerjaController::class, 'index']);
            Route::get('/modal', [KertasKerjaController::class, 'modal']);
            Route::post('/store', [KertasKerjaController::class, 'store']);
            Route::get('/create', [KertasKerjaController::class, 'create']);
            Route::get('/get-data', [KertasKerjaController::class, 'getdata']);
            Route::get('/delete-data', [KertasKerjaController::class, 'delete']);
        });
    });
});      
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('pelaporan')->group(function () {
        Route::group(['prefix' => 'review'],function(){
            Route::get('/', [ReviewController::class, 'index']);
            Route::get('/modal', [ReviewController::class, 'modal']);
            Route::post('/store', [ReviewController::class, 'store']);
            Route::get('/create', [ReviewController::class, 'create']);
            Route::get('/get-data', [ReviewController::class, 'getdata']);
            Route::get('/delete-data', [ReviewController::class, 'delete']);
        });

        Route::group(['prefix' => 'monitoring'],function(){
            Route::get('/', [MonitoringController::class, 'index']);
            Route::get('/modal', [MonitoringController::class, 'modal']);
            Route::post('/store', [MonitoringController::class, 'store']);
            Route::get('/create', [MonitoringController::class, 'create']);
            Route::get('/get-data', [MonitoringController::class, 'getdata']);
            Route::get('/delete-data', [MonitoringController::class, 'delete']);
        });

        
        Route::group(['prefix' => 'pemeriksaan'],function(){
            Route::get('/', [PemeriksaanController::class, 'index']);
            Route::get('/modal', [PemeriksaanController::class, 'modal']);
            Route::post('/store', [PemeriksaanController::class, 'store']);
            Route::get('/create', [PemeriksaanController::class, 'create']);
            Route::get('/get-data', [PemeriksaanController::class, 'getdata']);
            Route::get('/delete-data', [PemeriksaanController::class, 'delete']);
        });
        
        Route::group(['prefix' => 'evaluasi'],function(){
            Route::get('/', [EvaluasiController::class, 'index']);
            Route::get('/modal', [EvaluasiController::class, 'modal']);
            Route::post('/store', [EvaluasiController::class, 'store']);
            Route::get('/create', [EvaluasiController::class, 'create']);
            Route::get('/get-data', [EvaluasiController::class, 'getdata']);
            Route::get('/delete-data', [EvaluasiController::class, 'delete']);
        });
    });
});  
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
