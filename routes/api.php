<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/sanctum/token', App\Http\Controllers\TokenController::class);
Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/auth/dashboard/data/counts',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/auth/user',App\Http\Controllers\AuthController::class);
Route::get('/auth/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/auth/user/{user}', [App\Http\Controllers\UserController::class, 'show']);
});

/**
 *
 */
Route::controller(App\Http\Controllers\UserRoleController::class)->group(function () {
    Route::get('/user/{user}/roles', 'index')->name('userRolesIndex');
//    Route::get('/user/attach/role', 'create')->name('attachUserRole');
    Route::post('/user/attach/role/store', 'store')->name('attachUserRoleStore');
    Route::post('/user/{user}/detach-role', 'destroy')->name('detachRole');
});
/**
 *
 */
Route::controller(App\Http\Controllers\UserPermissionController::class)->group(function () {
    Route::get('/user/{user}/permissions', 'index')->name('userPermissionsIndex');
//    Route::get('/user/attach/permission', 'create')->name('attachUserPermission')->middleware(['role:super-admin']);
    Route::post('/user/attach/permission/store', 'store')->name('attachUserPermissionStore');
    Route::post('/user/{user}/detach-permission', 'destroy')->name('detachPermission');
});

/**
 *
 */

Route::controller(App\Http\Controllers\RoleController::class)->group(function () {
    Route::get('/roles', 'index')->name('rolesIndex'); //->middleware(['role:super-admin'])
    Route::get('/role/edit/{role}', 'edit')->name('roleEdit');
    Route::post('/role/store', 'store')->name('roleStore');
    Route::put('/role/update/{role}', 'update')->name('roleUpdate');
    Route::delete('/role/destroy/{role}', 'destroy')->name('roleDestroy');
});

Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
    Route::get('/permissions', 'index')->name('permissionsIndex'); //->middleware(['role:super-admin'])
    Route::get('/permission/edit/{permission}', 'edit')->name('permissionEdit');
    Route::post('/permission/store', 'store')->name('permissionStore');
    Route::put('/permission/update/{permission}', 'update')->name('permissionUpdate');
    Route::delete('/permission/destroy/{permission}', 'destroy')->name('permissionDestroy');
});

Route::controller(App\Http\Controllers\RolePermissionController::class)->group(function () {
    Route::get('/role/{role}/permissions', 'index')->name('rolePermissionsIndex');
    Route::get('/role/attach/permission', 'create')->name('roleAttachPermission');
    Route::post('/role/attach/permission/store', 'store')->name('roleAttachPermissionStore');
    Route::post('/role/detach/permission', 'destroy')->name('roleDetachPermission');
});
