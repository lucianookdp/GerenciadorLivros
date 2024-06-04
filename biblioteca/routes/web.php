<?php

// routes/web.php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LivroController::class, 'home'])->name('home');
Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');
Route::get('/livros/{id}/edit', [LivroController::class, 'edit'])->name('livros.edit');
Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');
Route::get('/relatorios', [LivroController::class, 'relatorios'])->name('livros.relatorios');

Route::get('/admin/login', [LivroController::class, 'showLoginForm'])->name('admin.loginForm');
Route::post('/admin/login', [LivroController::class, 'login'])->name('admin.login');

Route::get('/lista', [LivroController::class, 'lista'])->name('livros.lista');
