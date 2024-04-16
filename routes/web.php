<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EngineersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobStatusController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\VisitStatusController;
use Barryvdh\Debugbar\DataCollector\JobsCollector;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return view('home');
    } else {
        return view('auth.login');
    }
});

Auth::routes([
    'login'     => true,
    'register'  => config('settings.account_registration'),
    'reset'     => config('settings.account_password_reset'),
    'verify'    => config('setting.verify'),
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('get_machines', [JobsController::class, 'get_machines'])->name('jobs.get_machines');

Route::resources([
    'roles'         => RoleController::class,
    'users'         => UserController::class,
    'customers'     => CustomersController::class,
    'settings'      => SettingsController::class,
    'profile'       => ProfileController::class,
    'machine'       => MachineController::class,
    'jobs'          => JobsController::class,
    'jobtype'       => JobTypeController::class,
    'jobstatus'     => JobStatusController::class,
    'engineer'      => EngineersController::class,
    'visit'         => VisitsController::class,
    'visitstatus'   => VisitStatusController::class,
]);

