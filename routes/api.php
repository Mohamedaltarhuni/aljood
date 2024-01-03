<?php
use App\Http\Controllers\Admin\Adv\ManagementController as AdvManagementController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Order\ManagementController as OrderManagementController;
use App\Http\Controllers\Admin\User\ManagementController as UserManagementController;
use App\Http\Controllers\Admin\Profile\CrudController as ProfileCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Models\Admin;
use App\Models\Feedback;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth:admin-api'], 'prefix' => 'admin'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Update profile
    Route::patch('profile/update', [UserManagementController::class, 'update'])->name('profile.update');

    // Update profile avatar
    Route::patch('profile/update/avatar', [UserManagementController::class, 'updateAvatar'])->name('profile.update.avatar');
});

Route::group(['middleware' => ['auth:employee-api'], 'prefix' => 'employee'], function () {
    // Update profile
    Route::post('profile/update', [UserManagementController::class, 'update'])->name('profile.update');

    // Update profile avatar
    Route::post('profile/update/avatar', [UserManagementController::class, 'updateAvatar'])->name('profile.update.avatar');
});

Route::group(['prefix' => 'admin'], function () {
    // Feedback route
    Route::get('feedback', function () {
        return view('admin.feedback');
    })->name('admin.feedback');
});
