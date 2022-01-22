<?php

use App\Http\Controllers\channelingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login_page');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/logout', function () {
    if(session()->has('userId')){
        session()->pull('userId');
        session()->pull('user_name');
        session()->pull('user_email');
    }
   return redirect('/');
});
Route::get('/welcome', function () {
    if(session()->has('userId')){
        $all_patient=Patient::all();
        return view('data_table',['all'=>$all_patient]);
    }else{
        return redirect('/');
    }
   
});
Route::get('/welcome/add_patients', function () {
    if(session()->has('userId')){
        return view('register_patients');
    }else{
        return redirect('/');
    }
   
});
Route::post('welcome/add_patients/getdata',[PatientController::class,'register']);
Route::get('/welcome/view_patients/{id}',[PatientController::class,'view']);
Route::post('/welcome/view_patients/add_prescription/{id}',[PrescriptionController::class,'add']);
Route::get('/welcome/edit_patients/{id}',[PatientController::class,'editView']);
Route::post('/welcome/edit_patients/save/{id}',[PatientController::class,'editdata']);
Route::get('/welcome/delete_patients/{id}',[PatientController::class,'remove']);
Route::get('/welcome/view_add_appointment/{id}',[channelingController::class,'addView']);
Route::post('/welcome/view_add_appointment/save/{id}',[channelingController::class,'add']);
Route::get('/welcome/view_appointments',[channelingController::class,'view']);
Route::get('/welcome/accept_appointments/{id}',[channelingController::class,'accept']);
Route::get('/welcome/cancel_appointments/{id}',[channelingController::class,'cancle']);
Route::get('/welcome/accepted_appointments',[channelingController::class,'acceptview']);
Route::get('/welcome/accepted_appointments/cancel_appointments/{id}',[channelingController::class,'delete']);
