<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

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
    return view('landing.ayocurhatwelcome');
});

// Route::get('/login', [AuthController::class, 'login']);

// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::group(['middleware' => 'guest'], function(){
    Route::post('proses-login', [AuthController::class, 'prosesLogin'])->name('proses-login');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register']);
    Route::post('proses-register', [AuthController::class, 'store'])->name('proses-register');
    Route::get("logout", [AuthController::class, "processLogout"]);
    
});
    Route::get("/tamu",[AuthController::class, "tamu"]);

Route::get('/index', function(){
    return view('penyintas_dashboard.index');
});
Route::get('/pengaduan', function(){
    return view('penyintas_dashboard.pengaduan');
});