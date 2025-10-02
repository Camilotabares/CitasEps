<?php

use App\Http\Controllers\Admin\DoctorController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AppointmentController;

Route::get('/',function(){
    return view('admin.dashboard');
})->name('dashboard');

//Gestion de Roles 
Route::resource('roles',RoleController::class);


//Usuarios

Route::resource('users',UserController::class);

//Pacientes

Route::resource('patients',PatientController::class)
            ->only(['index','edit','update']);

//Doctores
Route::resource('doctors',DoctorController::class)
            ->only(['index','edit','update']);

Route::get('doctors/{doctor}/schedules',[DoctorController::class,'schedules'])
            ->name('doctors.schedules');

Route::resource('appointments',AppointmentController::class);
            