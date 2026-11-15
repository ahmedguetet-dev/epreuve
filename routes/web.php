
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\EprController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Gestion des matières
Route::resource('matieres', MatiereController::class);

// Gestion des épreuves
Route::get('/epreuves', [EprController::class, 'index'])->name('epreuves.index');
Route::post('/epreuves', [EprController::class, 'store'])->name('epreuves.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
