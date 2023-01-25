<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("v1/employee")->group(function () {

### get all employess 
Route::get('/get-employees',[EmployeeController::class,'getAllEmployees']);

### create new employee
Route::post('/create-employees',[EmployeeController::class,'createEmployees']);

### get emaployee id wise data
Route::get('/get-employee/{id}',[EmployeeController::class,'getEmployee']);

### update emaployee id wise data
Route::post('/update-employees/{id}',[EmployeeController::class,'updateEmployees']);

### soft delete emaployee 
Route::delete('/delete-employees/{id}',[EmployeeController::class,'deleteEmployees']);

});
