<?php
use App\Http\Controllers\rechargerController;
use App\Http\Controllers\machineController;
use App\Http\Controllers\inverstissementController;
use App\Http\Controllers\retraitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\transactionsController;
use App\Http\Controllers\parrainageController;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/machines', [machineController::class, 'index'])->middleware(['auth', 'verified'])->name('machines');
Route::get('/us', [usercontroller::class, 'index'])->middleware(['auth', 'verified'])->name('us');
Route::get('/us/{id}', [usercontroller::class, 'store'])->middleware(['auth', 'verified'])->name('usid');
Route::get('/machinescreate', [machineController::class, 'create'])->middleware(['auth', 'verified'])->name('machinescreate');
Route::post('/mach', [machineController::class, 'store'])->middleware(['auth', 'verified'])->name('mach');
Route::get('/investissementcreate/{id1}', [inverstissementController::class, 'store'])->middleware(['auth', 'verified'])->name('investissementcreate');
Route::get('/investissement', [inverstissementController::class, 'index'])->middleware(['auth', 'verified'])->name('investissement');

Route::get('/adminTransactions', [transactionsController::class, 'index'])->middleware(['auth', 'verified'])->name('adminTransactions');
Route::get('/adminPrimes', [transactionsController::class, 'index2'])->middleware(['auth', 'verified'])->name('adminPrimes');
Route::get('/adminPrimesIncrement/{id}', [transactionsController::class, 'create'])->middleware(['auth', 'verified'])->name('adminPrimesIncrement');
Route::get('/parrainage', [parrainageController::class, 'index'])->middleware(['auth', 'verified'])->name('parrainage');
Route::get('/parrainageporcentage/{id}/{montant}/{id2}/{id3}', [parrainageController::class, 'store'])->middleware(['auth', 'verified']);


Route::get('/parametres', function () {
    return view('parametres');
})->middleware(['auth', 'verified'])->name('parametres');

Route::get('/recharger', function () {
    return view('recharger');
})->middleware(['auth', 'verified'])->name('recharger');

Route::get('/retrait', function () {
    return view('retrait');
})->middleware(['auth', 'verified'])->name('retrait');

Route::post('/moyendepayement', [rechargerController::class, 'index'])->middleware(['auth', 'verified'])->name('moyendepayement');
Route::post('/moyendepayement2', [retraitController::class, 'index'])->middleware(['auth', 'verified'])->name('moyendepayement2');
Route::post('/moyendepayementeffectif', [rechargerController::class, 'store'])->middleware(['auth', 'verified'])->name('moyendepayementeffectif');
Route::get('/moyendepayementvalider/{id}', [rechargerController::class, 'edit'])->middleware(['auth', 'verified'])->name('moyendepayementvalider');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
