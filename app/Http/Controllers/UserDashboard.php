<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Gateway;
use App\Models\WithdrawGateways;
use App\Models\MasterPlan;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Profile;
use App\Models\Ad;
use App\Models\UserAdRequest;
use Carbon\Carbon;



class UserDashboard extends Controller
{
    public function Dashboard(){
        // get user membership status
        $membership = Transaction::where('user_name',session()->get('user')['userName'])->where('type','MEMBERSHIP FEE')->where('status','APPROVED')->first();
        // get user account details
        $userAcc = Account::where('user_name',session()->get('user')['userName'])->first();
        // get user all deposits
        $all_deposits = Transaction::where('user_name',session()->get('user')['userName'])->where('type','INVEST')->with('Plan')->get();
        $all_deposit_amount = 0;
        // calculate user all deposit amount
        foreach($all_deposits as $dep_amount){
          $all_deposit_amount = $dep_amount->plan->amount + $all_deposit_amount;
        }
        // get user all deposit which approved
        $all_approved_deposits = Transaction::where('user_name',session()->get('user')['userName'])->where('status','APPROVED')->where('type','INVEST')->with('Plan')->get();
        $approved_deposit_amount = 0;
        foreach($all_approved_deposits as $app_dep){
          $approved_deposit_amount = $app_dep->plan->coins + $approved_deposit_amount;
        }
        // Last Withdraw
        $latest_withdraw = Transaction::where('user_name',session()->get('user')['userName'])->where('status','APPROVED')->where('type','WITHDRAW')->latest()->first();
        $pending_withdraws = Transaction::where('user_name',session()->get('user')['userName'])->where('status','PENDING')->where('type','WITHDRAW')->get();
        $pending_withdraw_amount = 0;
        foreach($pending_withdraws as $pending_withdraw){
          $pending_withdraw_amount = $pending_withdraw->amount + $pending_withdraw_amount;
        }
        // Last Transaction
        $last_deposit = Transaction::where('user_name',session()->get('user')['userName'])->where('status','APPROVED')->whereIn('type',['INVEST','MEMBERSHIP FEE'])->with('Plan')->latest()->first();
        // // Pending Transaction
        $pending_deposits = Transaction::where('user_name',session()->get('user')['userName'])->where('status','PENDING')->where('type','INVEST')->with('Plan')->get();
        $pending_deposit_amount = 0;
        foreach($pending_deposits as $pending_deposit){
          $pending_deposit_amount = $pending_deposit->plan->amount + $pending_deposit_amount;
        }
        // Total Referrals
        $total_referrals = User::where('ref_by',session()->get('user')['userName'])->count();
        // Active Referrals
        $active_referrals = User::where('ref_by',session()->get('user')['userName'])->whereHas('transactions',function($q){
           return $q->where('type','INVEST')->where('status','APPROVED');
        })->count();
        // Latest Referral
        $latest_ref = User::where('ref_by',session()->get('user')['userName'])->latest()->first();
        // All Transactions
        $all_transactions = Transaction::where('user_name',session()->get('user')['userName'])->with('Plan')->limit(10)->get();
        $total_referrals_bonuses = Transaction::where('user_name',session()->get('user')['userName'])->where('type','REFERRAL BONUS')->get();
        $total_ref_bonus = 0;
        foreach($total_referrals_bonuses as $total_referral_bonus){
          $total_ref_bonus = $total_ref_bonus + $total_referral_bonus->amount;
        }
        return view('userDashboard.index',compact('membership','userAcc','all_deposit_amount','approved_deposit_amount','latest_withdraw','pending_withdraw_amount','last_deposit','total_referrals','pending_deposit_amount','active_referrals','latest_ref','all_transactions','total_ref_bonus'));
    }
    public function Transactions(){
        $all_transactions = Transaction::where('user_name',session()->get('user')['userName'])->with('Plan')->paginate(10);
        return view('userDashboard.transactions')->with(compact('all_transactions','all_transactions'));
    }
    public function Plans(){
        $invests = Transaction::where('user_name',session()->get('user')['userName'])->where('type','INVEST')->where('status','APPROVED')->with('Plan')->get();
        $active_plans_id = [];
        foreach($invests as $invest){
          array_push($active_plans_id,$invest->plan_id);
         }

         $active_plans = $invests->map(function ($invest) {
            return [
                    'id' => $invest->transaction_id,
                    'title' => $invest->plan->title,
                    'slogan' => $invest->plan->slogan,
                    'image' => $invest->plan->image,
                    'profit_amount' => $invest->plan->profit_amount,
                    'duration' => $invest->plan->duration,
                    'coins' => $invest->plan->coins,
                    'expiration_date' => Carbon::parse($invest->expiration_date),
                ];
        })->toArray();        
        // print_r($active_plans);

         $gnp = Plan::whereNotIn('plan_id',$active_plans_id)->get();
         $now = Carbon::now();
        $mplan = MasterPlan::first();
        $membership = Transaction::where('type','MEMBERSHIP FEE')->where('user_name',session()->get('user')['userName'])->first();
        return view('userDashboard.plans',compact('now','active_plans','gnp','membership','mplan'));
    }
    public function UnlockPlans(){
        $gateways = Gateway::get();
        return view('userDashboard.unlock',compact('gateways'));
    }
    public function ExtendDays(){
        $gateways = Gateway::get();
        return view('userDashboard.extendDays',compact('gateways'));
    }
    public function InvestHistory(){
        $all_transactions = Transaction::where('type','INVEST')->where('user_name',session()->get('user')['userName'])->with('Plan')->paginate(10);
        return view('userDashboard.investHistory')->with(compact('all_transactions','all_transactions'));
    }
    public function Withdraw(){
        $gateways = WithdrawGateways::get();
        $mplan = MasterPlan::first();
        return view('userDashboard.withdraw',compact('gateways','mplan'));
    }
    public function WithdrawHistory(){
        $withdraws_history = Transaction::where('user_name',session()->get('user')['userName'])->where('type','WITHDRAW')->paginate(10);
        return view('userDashboard.withdrawHistory')->with(compact('withdraws_history','withdraws_history'));
    }
    public function Referrals(){
        $ref_users = User::where('ref_by',session()->get('user')['userName'])->with('Profile')->with('Transactions.Plan')->paginate(10);
        return view('userDashboard.referrals')->with(compact('ref_users','ref_users'));
    }
    public function ReferralsCommission(){
        $refTrans = Transaction::where('type','REFERRAL BONUS')->with('User')->get();
        print($refTrans);
        // return view('userDashboard.referralsCommission')->with(compact('refTrans','refTrans'));
    }

    public function Profile(){
        $user = User::where('user_name',session()->get('user')['userName'])->with('Profile')->first();
        return view('userDashboard.profile')->with(compact('user','user'));
    }
    public function ChangePassword(){
        return view('userDashboard.change-password');
    }


}
