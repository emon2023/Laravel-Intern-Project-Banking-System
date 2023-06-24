<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerToCustomerTransferController;
use App\Http\Controllers\CustomerToAgentTransferController;
use App\Http\Controllers\AgentAuthController;



Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/customer/login',[CustomerAuthController::class,'index'])->name('customer.login');
Route::post('/customer/login',[CustomerAuthController::class,'login'])->name('customer.login');

Route::middleware(['customer.auth'])->group(function () {

    Route::get('/customer/dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
    Route::post('/customer/logout',[CustomerAuthController::class,'logout'])->name('customer.logout');

    Route::get('/customerTransfer/add', [CustomerToCustomerTransferController::class,'index'])->name('customerTransfer.add');
    Route::post('/customerTransfer/create', [CustomerToCustomerTransferController::class,'create'])->name('customerTransfer.create');


    Route::get('/customerAgentTransfer/add', [CustomerToAgentTransferController::class,'index'])->name('customerAgentTransfer.add');
    Route::post('/customerAgentTransfer/create', [CustomerToAgentTransferController::class,'create'])->name('customerAgentTransfer.create');


});



Route::get('/agent/login',[AgentAuthController::class,'index'])->name('agent.login');
Route::post('/agent/login',[AgentAuthController::class,'login'])->name('agent.login');


Route::middleware(['agent.auth'])->group(function () {

    Route::get('/agent/dashboard',[AgentAuthController::class,'dashboard'])->name('agent.dashboard');
    Route::post('/agent/logout',[AgentAuthController::class,'logout'])->name('agent.logout');

    Route::get('/agentTransfer/add', [AgentAuthController::class,'index'])->name('agentTransfer.add');
    Route::post('/agentTransfer/create', [AgentAuthController::class,'create'])->name('agentTransfer.create');



});









Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


    Route::get('/customer/add', [CustomerController::class,'index'])->name('customer.add');
    Route::post('/customer/create', [CustomerController::class,'create'])->name('customer.create');
    Route::get('/customer/manage', [CustomerController::class,'manage'])->name('customer.manage');
    Route::get('/customer/edit/{id}', [CustomerController::class,'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [CustomerController::class,'update'])->name('customer.update');
    Route::get('/customer/delete/{id}', [CustomerController::class,'delete'])->name('customer.delete');




    Route::get('/agent/add', [AgentController::class,'index'])->name('agent.add');
    Route::post('/agent/create', [AgentController::class,'create'])->name('agent.create');
    Route::get('/agent/manage', [AgentController::class,'manage'])->name('agent.manage');
    Route::get('/agent/edit/{id}', [AgentController::class,'edit'])->name('agent.edit');
    Route::post('/agent/update/{id}', [AgentController::class,'update'])->name('agent.update');
    Route::get('/agent/delete/{id}', [AgentController::class,'delete'])->name('agent.delete');



});
