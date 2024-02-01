<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ForgotPassword;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use App\Models\Plan;
use App\Models\Gateway;
use App\Models\MasterPlan;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
  // $plans = Plan::get();
  // $mplan = MasterPlan::first();
  // return view('index',compact('plans','mplan'));
  // return view('maintanence');
});
Route::get('/plan',function(){
  $plans = Plan::get();
  $mplan = MasterPlan::first();
  return view('plans',compact('plans','mplan'));
});
Route::view('/about','about');
Route::view('/contact','contact');
Route::view('/privacy','policy');
Route::view('/terms','terms');
Route::view('/login','login');
Route::get('/register',[UserAuth::class,'RegisterView']);
//Referral Register Route
Route::get('/register/ref/{refBy}',[UserAuth::class,'RefRegisterView']);

// Auth APi's
Route::post('/login',[UserAuth::class,'Login']);
Route::post('/register',[UserAuth::class,'Register']);
Route::get('/logout',[UserAuth::class,'Logout']);


// Forgot Password Views Routes
Route::view('/forgot-password','forgot-password');
Route::view('/reset-password','reset-password');

// Password Reset Related Routes
Route::post('/forgot-password',[ForgotPassword::class,'submitForgotPassword']);
Route::get('/reset-password/{token}/reset-password',[ForgotPassword::class,'resetPasswordView'])->name('reset-password')->middleware('signed');
Route::post('/reset-password',[ForgotPassword::class,'submitResetPassword']);

// User Dashboard Routes
Route::group(['middleware'=>['isLogin','isBlocked']],function(){
  Route::get('/user/unlock-plans',[UserDashboard::class,'UnlockPlans']);
  Route::get('/user/extend-days',[UserDashboard::class,'ExtendDays']);
  Route::get('/user/dashboard',[UserDashboard::class,'Dashboard']);
  Route::get('/user/transactions', [UserDashboard::class,'Transactions']);
  Route::get('/user/plans',[UserDashboard::class,'Plans']);
  Route::get('/user/invest-history',[UserDashboard::class,'InvestHistory']);
  Route::get('/user/withdraw',[UserDashboard::class,'Withdraw']);
  Route::get('/user/withdraw-history',[UserDashboard::class,'WithdrawHistory']);
  Route::get('/user/invest',[UserDashboard::class,'Invest']);
  Route::get('/user/referrals',[UserDashboard::class,'Referrals']);
  Route::get('/user/referrals-commission',[UserDashboard::class,'ReferralsCommission']);
  Route::get('/user/profile',[UserDashboard::class,'Profile']);
  Route::get('/user/change-password',[UserDashboard::class,'ChangePassword']);
  Route::get('/user/request-ad',[UserDashboard::class,'RequestAd']);


  // Apis
  // Send Payment Api
  Route::get('/transaction/update/{id}',[InvestmentController::class,'UpdateInvestment']);
  Route::post('/user/extend-request',[InvestmentController::class,'ExtendDays']);
  Route::post('/user/unlock-request',[InvestmentController::class,'UnlockPlans']);
  Route::post('/user/invest-request',[InvestmentController::class,'SendPayment']);
  Route::post('/user/withdraw-request',[WithdrawController::class,'WithdrawRequest']);
  Route::post('/user/profile-update',[ProfileController::class,'ProfileUpdate']);
  Route::post('/user/profile-image/update',[ProfileController::class,'UpdateProfileImage']);
  Route::post('/user/change-password',[UserAuth::class,'ChangePassword']);
  Route::post('/user/submit-ad',[UserDashboard::class,'SubmitAd']);
});



// Admin Dashboard Routes
Route::group(['middleware'=>['isAdmin']],function(){
Route::get('/admin/dashboard',[AdminDashboard::class,'Dashboard']);
Route::get('/admin/extend-memberships/{filter}',[AdminDashboard::class,'ExtendMembership']);
Route::get('/admin/manage-master-plan',[AdminDashboard::class,'ManageMasterPlan']);
Route::get('/admin/manage-plans',[AdminDashboard::class,'ManagePlans']);
Route::get('/admin/manage-users',[AdminDashboard::class,'ManageUsers']);
Route::get('/admin/manage-gateway',[AdminDashboard::class,'ManageGateway']);
Route::get('/admin/manage-memberships/{filter}',[AdminDashboard::class,'ManageMemberships']);
Route::get('/admin/manage-investments/{filter}',[AdminDashboard::class,'ManageInvestments']);
Route::get('/admin/manage-withdraws/{filter}',[AdminDashboard::class,'ManageWithdraws']);
Route::get('/admin/manage-withdraw-gateways',[AdminDashboard::class,'ManageWithdrawGateway']);
Route::get('/admin/profile',[AdminDashboard::class,'Profile']);
Route::get('/admin/change-password',[AdminDashboard::class,'ChangePassword']);


// Admin Apis
Route::post('/admin/mplan-update',[AdminDashboard::class,'UpdateMasterPlan']);
Route::post('/admin/create-gateway',[AdminDashboard::class,'CreateGateway']);
Route::post('/admin/update-gateway',[AdminDashboard::class,'UpdateGateway']);
Route::get('/admin/delete-gateway/{id}',[AdminDashboard::class,'DeleteGateway']);
Route::post('/admin/create-withdraw-gateway',[AdminDashboard::class,'CreateWithdrawGateway']);
Route::post('/admin/update-withdraw-gateway',[AdminDashboard::class,'UpdateWithdrawGateway']);
Route::get('/admin/delete-withdraw-gateway/{id}',[AdminDashboard::class,'DeleteWithdrawGateway']);
Route::post('/admin/create-plan',[AdminDashboard::class,'CreatePlan']);
Route::post('/admin/update-plan',[AdminDashboard::class,'UpdatePlan']);
Route::post('/admin/block-user',[AdminDashboard::class,'BlockUser']);
Route::post('/admin/unblock-user',[AdminDashboard::class,'UnBlockUser']);
Route::get('/admin/approve-investment/{tid}',[AdminDashboard::class,'ApproveInvestment']);
Route::get('/admin/reject-investment/{tid}',[AdminDashboard::class,'RejectInvestment']);
Route::get('/admin/approve-membership/{tid}',[AdminDashboard::class,'ApproveMembership']);
Route::post('/admin/reject-membership',[AdminDashboard::class,'RejectMembership']);
Route::get('/admin/undo-membership/{tid}',[AdminDashboard::class,'UndoMembership']);
Route::get('/admin/approve-extend-membership/{tid}',[AdminDashboard::class,'ApproveExtendMembership']);
Route::post('/admin/reject-extend-membership',[AdminDashboard::class,'RejectExtendMembership']);
Route::get('/admin/undo-extend-membership/{tid}',[AdminDashboard::class,'UndoExtendMembership']);
Route::get('/admin/approve-withdraw/{wid}',[AdminDashboard::class,'ApproveWithdraw']);
Route::post('/admin/reject-withdraw',[AdminDashboard::class,'RejectWithdraw']);
Route::post('/admin/profile-update',[AdminProfileController::class,'ProfileUpdate']);
Route::post('/admin/profile-image/update',[AdminProfileController::class,'UpdateProfileImage']);
Route::post('/admin/change-password',[AdminProfileController::class,'ChangePassword']);
});

Route::get('/ProfitUpdateCron', function () {
    \Artisan::call('profit:update');
  });

  Route::get('/hash', function () {
    print(Hash::make('admin'));
  });
  Route::get('/test', function () {
     $invests = Transaction::where('user_name',session()->get('user')['userName'])->where('type','INVEST')->where('status','APPROVED')->get();
     $active_plans = [];
     foreach($invests as $invest){
       array_push($active_plans,$invest->plan_id);
      }
      $gap = Plan::whereIn('plan_id',$active_plans)->get();
      $gnp = Plan::whereNotIn('plan_id',$active_plans)->get();
      print_r($gap);
      // print_r($gnp);
  });




