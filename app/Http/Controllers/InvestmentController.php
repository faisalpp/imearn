<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\MasterPlan;
use App\Models\Plan;
use Carbon\Carbon;

class InvestmentController extends Controller
{
    public function SendPayment(Request $request){
      $request->validate([
          'plan_id'=>'required',
          'coins'=>'required',
        ]);
     $acc = Account::where('user_name',session()->get('user')['userName'])->first();
     if($acc->coins >= $request['coins']){
       $new_coins = $acc->coins - $request['coins']; 
         try{
         $plan = Plan::where('plan_id',$request['plan_id'])->first();
          // Get the current date and time
        $currentDate = Carbon::now();
        // Add 3 months to the current date to get the expiration date
        $expirationDate = $currentDate->addDays($plan->duration);
        // You can also format the date using the format() method
        $expirationDateFormatted = $expirationDate->format('Y-m-d H:i:s');
          $new_transaction = new Transaction();
          $new_transaction->user_name = session()->get('user')['userName'];
          $new_transaction->type = 'INVEST';
          $new_transaction->status = 'APPROVED';
          $new_transaction->plan_id = $request['plan_id'];
          $new_transaction->expiration_date = $expirationDateFormatted;
          $new_transaction->save();
          if($new_transaction){
            try{
              Account::where('user_name',session()->get('user')['userName'])->update(['coins'=>$new_coins]);
              session()->flash('success',"Plan Purchased Successfully!");
              return redirect()->back();
            }catch(Exception $e){
              return abort(500);
            } 
          }
        }catch(Exception $e){
          return abort(500);
        } 
        }else{
          session()->flash('error','Insufficient Coins Balance!');
          return redirect()->back();
        }
     }

     public function UnlockPlans (Request $request) {
      $request->validate([
        'bank_name'=>'required',
        'proof'=>'required',
        'wallet_address'=>'required',
      ]);
      
       $mplan = MasterPlan::first();
       try{
        $imageName = time().'.'.$request['proof']->extension(); 
                    $path = '/home/u422765265/domains/imeasycash.com/public_html/public/proofs';
        // Store on public folder
        $request->file('proof')->move($path, $imageName);
        // $request->file('proof')->move(public_path('proofs'), $imageName);
       // Get the current date and time
       $currentDate = Carbon::now();
       // Add 3 months to the current date to get the expiration date
       $expirationDate = $currentDate->addDays($mplan->duration);
       // You can also format the date using the format() method
       $expirationDateFormatted = $expirationDate->format('Y-m-d H:i:s');
         $new_transaction = new Transaction();
         $new_transaction->user_name = session()->get('user')['userName'];
         $new_transaction->type = 'MEMBERSHIP FEE';
         $new_transaction->wallet_address = $request['wallet_address'];
         $new_transaction->bank_name = $request['bank_name'];
         $new_transaction->proof = $imageName;
         $new_transaction->amount = $mplan->investment;
         $new_transaction->expiration_date = $expirationDateFormatted;
         $new_transaction->save();

         session()->flash('success',"Plans Unlock Request Sent!");
         return redirect('/user/dashboard');
       }catch(Exception $e){
        return abort(500);
      } 
     }
     public function ExtendDays (Request $request) {
      $request->validate([
        'bank_name'=>'required',
        'proof'=>'required',
        'wallet_address'=>'required',
        'days'=>'required',
      ]);
    
       try{
        $imageName = time().'.'.$request['proof']->extension(); 
                    $path = '/home/u422765265/domains/imeasycash.com/public_html/public/proofs'; 
        // Store on public folder
        $request->file('proof')->move($path, $imageName);
        // $request->file('proof')->move(public_path('proofs'), $imageName);
       
         $new_transaction = new Transaction();
         $new_transaction->user_name = session()->get('user')['userName'];
         $new_transaction->type = 'EXTEND MEMBERSHIP';
         $new_transaction->wallet_address = $request['wallet_address'];
         $new_transaction->bank_name = $request['bank_name'];
         $new_transaction->proof = $imageName;
         $new_transaction->amount = $request['days'] * 100;
         $new_transaction->save();

         session()->flash('success',"Extend Membership Request Sent!");
         return redirect('/user/dashboard');
       }catch(Exception $e){
        return abort(500);
      } 
     }
     
     public function UpdateInvestment($id){
        try{
         Transaction::where('transaction_id',$id)->update(['status'=>'EXPIRED']);
         return response()->json(['message' => 'OK']);
        }catch(Exception $e){
          return abort(500);
        } 
     }
}
