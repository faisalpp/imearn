<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;

class WithdrawController extends Controller
{
    public function WithdrawRequest(Request $request){
        $request->validate([
         'bank_name'=>'required',
         'withdraw_fee'=>'required',
         'wallet_address'=>'required',
         'acc_holder_name'=>'required',
         'amount'=>'required|numeric',
        ]);
        $userAcc = Account::where('user_name',session()->get('user')['userName'])->first();
        $old_balance = $userAcc->balance;
        if($userAcc->balance >= $request['amount']){
          try{
            $withdraw = new Transaction();
            $withdraw->wallet_address = $request['wallet_address'];
            $withdraw->type = "WITHDRAW";
            $withdraw->amount = $request['amount'];
            $withdraw->acc_holder_name = $request['acc_holder_name'];
            $withdraw->withdraw_fee = $request['withdraw_fee'];
            $withdraw->bank_name = $request['bank_name'];
            $withdraw->user_name = session()->get('user')['userName'];
            $withdraw->save();
            $new_balance = $old_balance - $request['amount'];
            Account::where('user_name',session()->get('user')['userName'])->update(['balance'=>$new_balance]);
          }catch(Exception $e){
            return abort(500);
          }
          session()->flash('success',"Withdraw Request Recieved!");
          return redirect()->back();
        }else{
            session()->flash('error',"Insufficient Account Balance!");
            return redirect()->back();
        }
    }
}
