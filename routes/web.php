<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// public
Route::permanentRedirect('/here', '/there');
Route::get('/', [PublicController::class, 'index']);
Route::get('logout', [AuthController::class, 'logout']);

// Tamu/Guest
Route::middleware(['only_guest'])->group(function () {
 Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:login');
 Route::post('login', [AuthController::class, 'authentication']);
 Route::get('register', [AuthController::class, 'register']);
 Route::post('register', [AuthController::class, 'proses_register']);
});

// jika sudah login
Route::middleware(['auth'])->group(function () {
 Route::get('homepage', [HomepageController::class, 'homepage']);

 // admin
 Route::middleware(['hanya_admin'])->group(function () {
  Route::get('dashboard-admin', [AdminController::class, 'index']);

  Route::get('kategori', [CategoriController::class, 'index']);
  Route::get('tambah-kategori', [CategoriController::class, 'show']);
  Route::post('proses-kategori', [CategoriController::class, 'proses_kategori']);
  Route::get('show-kategori-restore', [CategoriController::class, 'show_kategori_restore']);
  Route::get('restore-data/{slug}', [CategoriController::class, 'restore_kategori']);
  Route::get('edit-kategori/{slug}', [CategoriController::class, 'edit_kategori']);
  Route::put('proses-edit-ktgr/{slug}', [CategoriController::class, 'proses_edit_ktgr']);
  Route::get('del-kategori/{slug}', [CategoriController::class, 'delete_data']);
  Route::get('destroy-kategori/{slug}', [CategoriController::class, 'destroy_data']);
  Route::get('fix-deleted-kategori/{slug}', [CategoriController::class, 'fix_deleted_kategori']);

  Route::get('buku', [BukuController::class, 'index']);
  Route::get('add-buku', [BukuController::class, 'add_buku']);
  Route::post('proses_add_buku', [BukuController::class, 'proses_add_buku']);
  Route::get('edit-buku/{slug}', [BukuController::class, 'edit_buku']);
  Route::post('buku-proses-edit/{slug}', [BukuController::class, 'buku_update']);
  Route::get('hapus-buku/{slug}', [BukuController::class, 'delete_buku']);
  Route::get('destroy-buku/{slug}', [BukuController::class, 'destroy_buku']);
  Route::get('buku-restore', [BukuController::class, 'buku_restore']);
  Route::get('buku-restore/{slug}', [BukuController::class, 'restore_buku']);
  Route::get('fix-deleted-buku/{slug}', [BukuController::class, 'fix_deleted_buku']);

  Route::get('data-pengunjung', [AdminController::class, 'show_data']);
  Route::get('user-non-aktif', [AdminController::class, 'user_non_aktif']);
  Route::get('detail-user/{slug}', [AdminController::class, 'detail_user']);
  Route::get('aktifkan-user/{slug}', [AdminController::class, 'aktifkan_user']);
  Route::get('deleted-user/{slug}', [AdminController::class, 'deleted_user']);
  Route::get('restore-user', [AdminController::class, 'restore_user']);
  Route::get('restore-data-user/{slug}', [AdminController::class, 'restore_data_user']);
  Route::get('permanent-deleted/{slug}', [AdminController::class, 'permanent_deleted']);

  Route::get('peminjaman-buku', [PeminjamanController::class, 'index']);
  Route::post('peminjaman-buku', [PeminjamanController::class, 'store']);
  Route::get('pengembalian-buku', [PeminjamanController::class, 'pengembalian_buku']);
  Route::post('proses-pengembalian-buku', [PeminjamanController::class, 'proses_pengembalian_buku']);

  Route::get('history', [HistoryController::class, 'index']);

  Route::get('/change_password', [AuthController::class, 'change_password']);
  Route::post('/proses_change_password', [AuthController::class, 'proses_change_password']);
 });

 // pengunjung
 Route::middleware(['hanya_pengunjung'])->group(function () {
  Route::get('pengunjung', [PengunjungController::class, 'index']);
  Route::get('change_pass', [PengunjungController::class, 'change_pass']);
  Route::post('process_change_pass', [PengunjungController::class, 'process_change_pass']);
 });
});
