<?php

use App\Http\Controllers\AdminMandorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DatalintingController;
use App\Http\Controllers\MandorController;
use App\Http\Controllers\TargetharianController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

Route::get('/example', function () {
    return view('ex');
});
// Sesi Untuk Admin
Route::middleware(['guest'])->group(function(){
    // login mandor
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
    // login admin
    Route::get('/admin', [SessionController::class, 'indexadmin'])->name('loginadmin');
    Route::post('/admin', [SessionController::class, 'loginadmin']);
});

Route::get( '/home', function () {
    return redirect('/wellcome');
});
Route::get('/wellcome', [SessionController::class, 'wellcome'])->name('dashboard');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'userAkses:admin'])->group(function(){
    Route::get('/dashboard', [SessionController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/pekerja', [PekerjaController::class, 'index'])->name('pekerja');
    Route::get('/tambah-pekerja', [PekerjaController::class, 'tambahPekerja'])->name('tambah-pekerja');
    Route::post('/insertdata', [PekerjaController::class, 'insertData'])->name('insertdata');
    Route::get('/tampilkandata/{nip}', [PekerjaController::class, 'tampildata'])->name('tampildata');
    Route::post('/updatedata/{nip}', [PekerjaController::class, 'updatedata'])->name('updatedata');
    Route::get('/deletedata/{nip}', [PekerjaController::class, 'deletedata'])->name('deletedata');

    
    Route::get('/datalinting', [DatalintingController::class, 'index'])->name('datalinting');
    Route::get('/datalinting-blok1', [DatalintingController::class, 'blok1'])->name('datalinting-blok1');
    Route::get('/datalinting-blok2', [DatalintingController::class, 'blok2'])->name('datalinting-blok2');
    Route::get('/datalinting-blok3', [DatalintingController::class, 'blok3'])->name('datalinting-blok3');
    Route::post('/savelinting/{id_linting}', [DatalintingController::class, 'savelinting'])->name('savelinting');
    
    Route::get('/rekapbulan1', [RekapController::class, 'index'])->name('rekapdata1');
    Route::get('/rekapbulan2', [RekapController::class, 'index2'])->name('rekapdata2');
    Route::get('/rekapbulan3', [RekapController::class, 'index3'])->name('rekapdata3');
    
    Route::get('/target', [TargetharianController::class, 'target'])->name('target');
    Route::get('/viewtarget', [TargetharianController::class, 'viewtarget'])->name('viewtarget');
    Route::get('/kelolatarget/{id}', [TargetharianController::class, 'getData'])->name('getData');
    Route::post('/savetarget/{id}', [TargetharianController::class, 'saveData'])->name('saveData');
    
    Route::get('/mandor', [AdminMandorController::class, 'mandor'])->name('mandor');
    Route::post('/updatemandor/{id}', [AdminMandorController::class, 'updatemandor'])->name('updatemandor');

    // Sesi Untuk Mandor
    // Route::get('/wellcome', [SessionController::class, 'wellcome'])->name('wellcome');
});
Route::middleware(['auth', 'userAkses:mandorb1'])->group(function(){
    Route::get('/mandor1', [MandorController::class, 'mandor1']);
    Route::get('/list1', [MandorController::class, 'list1']);
    Route::get('/view1', [MandorController::class, 'view1']);
    Route::match(['get', 'post'], '/save1', [MandorController::class, 'save1']);
});
Route::middleware(['auth', 'userAkses:mandorb2'])->group(function(){
    Route::get('/mandor2', [MandorController::class, 'mandor2']);
    Route::get('/list2', [MandorController::class, 'list2']);
    Route::get('/view2', [MandorController::class, 'view2']);
    Route::match(['get', 'post'], '/save2', [MandorController::class, 'save2']);
});
Route::middleware(['auth', 'userAkses:mandorb3'])->group(function(){
    Route::get('/mandor3', [MandorController::class, 'mandor3']);
    Route::get('/list3', [MandorController::class, 'list3']);
    Route::get('/view3', [MandorController::class, 'view3']);
    Route::match(['get', 'post'], '/save3', [MandorController::class, 'save3']);
});


