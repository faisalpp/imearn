<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPlan;
use App\Models\Plan;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Profile;
use App\Models\Account;
use App\Models\UserAdRequest;
use App\Models\Gateway;
use App\Models\WithdrawGateways;
use Carbon\Carbon;

class AdminDashboard extends Controller
{
    public function Dashboard(){
        $all_users = User::where('user_name','!=','admin')->count();
        $active_users = User::where('user_name', '!=', 'admin')
        ->whereHas('transactions', function ($query) {
            // Apply conditions on the Transaction table here
            $query->where('status', 'APPROVED');
        })
        ->count();
        $coin_trans = Transaction::where('type','INVEST')->where('status','APPROVED')->with('Plan')->get();
        $coins_invest = 0;
        foreach($coin_trans as $coin_tran){
          $coins_invest = $coin_tran->plan->coins + $coins_invest;
        }

        $join_req = Transaction::where('type','MEMBERSHIP FEE')->where('status','PENDING')->count();
        $join_reqs_dl = Transaction::where('type','MEMBERSHIP FEE')->where('status','PENDING')->get();
        $total_join_req = 0;
        foreach($join_reqs_dl as $join_req_dl){
          $total_join_req = $total_join_req + $join_req_dl->amount;
        }
        $join_reqs_cl = Transaction::where('type','MEMBERSHIP FEE')->where('status','APPROVED')->get();
        $total_join_inc = 0;
        foreach($join_reqs_cl as $join_req_cl){
          $total_join_inc = $total_join_inc + $join_req_cl->amount;
        }
        $join_reqs_dl = Transaction::where('type','MEMBERSHIP FEE')->where('status','PENDING')->get();
        $total_join_req = 0;
        foreach($join_reqs_dl as $join_req_dl){
          $total_join_req = $total_join_req + $join_req_dl->amount;
        }
        $withdraw_req = Transaction::where('type','WITHDRAW')->where('status','PENDING')->count();
        $withdraw_reqs_dl = Transaction::where('type','WITHDRAW')->where('status','PENDING')->get();
        $total_withdraw_req = 0;
        foreach($withdraw_reqs_dl as $withdraw_req_dl){
          $total_withdraw_req = $total_withdraw_req + $withdraw_req_dl->amount;
        }
        $all_trans = Transaction::with('Plan')->limit(10)->get();
        return view('adminDashboard.index',compact('total_join_inc','all_users','active_users','coins_invest','join_req','join_req','total_join_req','withdraw_req','total_withdraw_req','all_trans'));
    }
    public function ManageMasterPlan(){
        $master_plan = MasterPlan::first();
        return view('adminDashboard.ManageMasterPlan')->with(compact('master_plan','master_plan'));
    }
    public function UpdateMasterPlan(Request $request){
      $request->validate([
        'id'=>'required',
        'title'=>'required',
        'investment'=>'required',
        'duration'=>'required',
        'join_text'=>'required',
        'withdraw_fee'=>'required',
        'whatsapp'=>'required',
        'daily_income'=>'required',
        'ref_com1'=>'required',
        'ref_com2'=>'required',
        'ref_com3'=>'required',
        'ref_com4'=>'required',
        'ref_com5'=>'required',
        'ref_com6'=>'required',
        'ref_com7'=>'required',
        'ref_com8'=>'required',
        'ref_com9'=>'required',
        'ref_com10'=>'required',
      ]);
      
      try{
          MasterPlan::where('id',$request['id'])->update([
            'title'=>$request['title'],
            'investment'=>$request['investment'],
            'duration'=>$request['duration'],
            'join_text'=>$request['join_text'],
            'withdraw_fee'=>$request['withdraw_fee'],
            'whatsapp'=>$request['whatsapp'],
            'daily_income'=>$request['daily_income'],
            'ref_com1'=>$request['ref_com1'],
            'ref_com2'=>$request['ref_com2'],
            'ref_com3'=>$request['ref_com3'],
            'ref_com4'=>$request['ref_com4'],
            'ref_com5'=>$request['ref_com5'],
            'ref_com6'=>$request['ref_com6'],
            'ref_com7'=>$request['ref_com7'],
            'ref_com8'=>$request['ref_com8'],
            'ref_com9'=>$request['ref_com9'],
            'ref_com10'=>$request['ref_com10'],
          ]);
          session()->flash('success','Master Plan Updated!');
        }catch(Exception $e){
          return abort(500);
          session()->flash('error','Internal Server Error!');
          return redirect('/admin/manage-master-plan');
        }
      return redirect('/admin/manage-master-plan');
    }
    


    public function ManagePlans(){
      $plans = Plan::get();
      return view('adminDashboard.ManagePlans')->with(compact('plans','plans'));
    }
  public function CreatePlan(Request $request){
      $request->validate([
          'title'=>'required',
          'sub-title'=>'required',
          'coins'=>'required',
          'profit_amount'=>'required',
          'duration'=>'required',
          'image'=>'required',
      ]);

      try{
        $imageName = time().'.'.$request['image']->extension();
        // $path = '/home/u862688958/domains/elitclick.com/public_html/public/plans';
        $request->file('image')->move(public_path('plans'), $imageName);
      }catch(Excetpion $e){
        return abort(500);
      }

      try{
       $newPlan = new Plan();
       $newPlan->title = $request['title'];
       $newPlan->slogan = $request['sub-title'];
       $newPlan->coins = $request['coins'];
       $newPlan->profit_amount = $request['profit_amount'];
       $newPlan->duration = $request['duration'];
       $newPlan->image = $imageName;
       $newPlan->save();
       session()->flash('success','Plan Created Successfully!');
      }catch(Excetpion $e){
          return abort(500);
      }
      return redirect()->back();
  }

  public function UpdatePlan(Request $request){
    $request->validate([
      'plan_id'=>'required',
      'title'=>'required',
      'sub-title'=>'required',
      'coins'=>'required',
      'profit_amount'=>'required',
      'duration'=>'required',
    ]);
    try{
      Plan::where('plan_id',$request['plan_id'])->update([
        'title'=>$request['title'],
        'slogan'=>$request['sub-title'],
        'coins'=>$request['coins'],
        'profit_amount'=>$request['profit_amount'],
        'duration'=>$request['duration'],
      ]);
     session()->flash('success','Plan Updated Successfully!');
    }catch(Excetpion $e){
        return abort(500);
    }
    return redirect('/admin/manage-plans');
  }

  public function ManageUsers(){
    $users = User::where('is_admin',0)->get();
    return view('adminDashboard.ManageUsers')->with(compact('users','users'));
  }

  public function BlockUser(Request $request){
    $request->validate([
      'user_id'=>'required'
    ]);
    try{
        User::where('user_id',$request['user_id'])->update(['is_blocked'=>1]);
        session()->flash('success','User Blocked Successfully!');
      }catch(Exception $e){
        return abort(500);
      }
    return redirect('/admin/manage-users');
  }
  public function UnBlockUser(Request $request){
    $request->validate([
      'user_id'=>'required'
    ]);
    try{
      User::where('user_id',$request['user_id'])->update(['is_blocked'=>0]);
        session()->flash('success','User UnBlocked Successfully!');
      }catch(Exception $e){
        return abort(500);
      }
    return redirect('/admin/manage-users');
  }

  public function ManageGateway(){
    $gateways = Gateway::get();
    return view('adminDashboard.ManageGateway',compact('gateways'));
  }
  public function CreateGateway(Request $request){
    $request->validate([
        'acc_holder'=>'required',
        'acc_number'=>'required',
        'bank_name'=>'required',
    ]);

    try{
     $newGateway = new Gateway();
     $newGateway->acc_holder = $request['acc_holder'];
     $newGateway->acc_number = $request['acc_number'];
     $newGateway->bank_name = $request['bank_name'];
     $newGateway->save();
     session()->flash('success','Gateway Created Successfully!');
    }catch(Excetpion $e){
        return abort(500);
    }
    return redirect()->back();
}
  public function CreateWithdrawGateway(Request $request){
    $request->validate([
        'acc_holder'=>'required',
        'acc_number'=>'required',
        'bank_name'=>'required',
    ]);

    try{
     $newGateway = new WithdrawGateways();
     $newGateway->acc_holder = $request['acc_holder'];
     $newGateway->acc_number = $request['acc_number'];
     $newGateway->bank_name = $request['bank_name'];
     $newGateway->save();
     session()->flash('success','Withdraw Gateway Created!');
    }catch(Excetpion $e){
        return abort(500);
    }
    return redirect()->back();
}
public function UpdateGateway(Request $request){
  $request->validate([
      'id'=>'required',
      'acc_holder'=>'required',
      'acc_number'=>'required',
      'bank_name'=>'required',
  ]);

  try{
    Gateway::where('id',$request['id'])->update([
      'acc_holder'=>$request['acc_holder'],
      'acc_number'=>$request['acc_number'],
      'bank_name'=>$request['bank_name'],
    ]);
   session()->flash('success','Gateway Updated Successfully!');
  }catch(Excetpion $e){
      return abort(500);
  }
  return redirect()->back();
}
public function UpdateWithdrawGateway(Request $request){
  $request->validate([
      'id'=>'required',
      'acc_holder'=>'required',
      'acc_number'=>'required',
      'bank_name'=>'required',
  ]);

  try{
    WithdrawGateways::where('id',$request['id'])->update([
      'acc_holder'=>$request['acc_holder'],
      'acc_number'=>$request['acc_number'],
      'bank_name'=>$request['bank_name'],
    ]);
   session()->flash('success','Withdraw Gateway Updated!');
  }catch(Excetpion $e){
      return abort(500);
  }
  return redirect()->back();
}

public function DeleteGateway($id){
  try{
    Gateway::where('id',$id)->delete();
   session()->flash('success','Gateway Deleted!');
  }catch(Excetpion $e){
      return abort(500);
  }
  return redirect()->back();
}
public function DeleteWithdrawGateway($id){
  try{
    WithdrawGateways::where('id',$id)->delete();
   session()->flash('success','Withdraw Gateway Deleted!');
  }catch(Excetpion $e){
      return abort(500);
  }
  return redirect()->back();
}
  public function ManageMemberships($filter){
    $memberships;
    switch($filter){
      case 'approved':
      $memberships = Transaction::where('type','MEMBERSHIP FEE')->where('status','APPROVED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'pending':
      $memberships = Transaction::where('type','MEMBERSHIP FEE')->where('status','PENDING')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'rejected':
      $memberships = Transaction::where('type','MEMBERSHIP FEE')->where('status','REJECTED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'all':
      $memberships = Transaction::where('type','MEMBERSHIP FEE')->where('user_name','!=','admin')->paginate(15);
      break;
    }
    return view('adminDashboard.ManageMembership',compact('memberships'));
  }
  public function ExtendMembership($filter){
    $memberships;
    switch($filter){
      case 'approved':
      $memberships = Transaction::where('type','EXTEND MEMBERSHIP')->where('status','APPROVED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'pending':
      $memberships = Transaction::where('type','EXTEND MEMBERSHIP')->where('status','PENDING')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'rejected':
      $memberships = Transaction::where('type','EXTEND MEMBERSHIP')->where('status','REJECTED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'all':
      $memberships = Transaction::where('type','EXTEND MEMBERSHIP')->where('user_name','!=','admin')->paginate(15);
      break;
    }
    return view('adminDashboard.ExtendMembership',compact('memberships'));
  }
  public function ManageCom($refUser,$mplan,$level) {
   $acc = Account::where('user_name',$refUser)->first();
   $new_coins;

   switch($level){
     case 'ref_com1':
      $new_coins = $acc->coins + $mplan->ref_com1;
      break;   
     case 'ref_com2':
      $new_coins = $acc->coins + $mplan->ref_com2;
      break;   
     case 'ref_com3':
      $new_coins = $acc->coins + $mplan->ref_com3;
      break;   
     case 'ref_com4':
      $new_coins = $acc->coins + $mplan->ref_com4;
      break;   
     case 'ref_com5':
      $new_coins = $acc->coins + $mplan->ref_com5;
      break;   
     case 'ref_com6':
       $new_coins = $acc->coins + $mplan->ref_com6;
       break;   
     case 'ref_com7':
      $new_coins = $acc->coins + $mplan->ref_com7;
      break;   
     case 'ref_com8':
      $new_coins = $acc->coins + $mplan->ref_com8;
      break;   
     case 'ref_com9':
      $new_coins = $acc->coins + $mplan->ref_com9;
      break;   
     case 'ref_com10':
      $new_coins = $acc->coins + $mplan->ref_com10;
      break;   
   }

   Account::where('user_name',$refUser)->update(['coins'=>$new_coins]);
  }

  public function ManageComRev($refUser,$mplan,$level) {
    $acc = Account::where('user_name',$refUser)->first();
    $new_coins;
 
    switch($level){
      case 'ref_com1':
       $new_coins = $acc->coins - $mplan->ref_com1;
       break;   
      case 'ref_com2':
       $new_coins = $acc->coins - $mplan->ref_com2;
       break;   
      case 'ref_com3':
       $new_coins = $acc->coins - $mplan->ref_com3;
       break;   
      case 'ref_com4':
       $new_coins = $acc->coins - $mplan->ref_com4;
       break;   
      case 'ref_com5':
       $new_coins = $acc->coins - $mplan->ref_com5;
       break;   
      case 'ref_com6':
       $new_coins = $acc->coins - $mplan->ref_com6;
       break;   
      case 'ref_com7':
       $new_coins = $acc->coins - $mplan->ref_com7;
       break;   
      case 'ref_com8':
       $new_coins = $acc->coins - $mplan->ref_com8;
       break;   
      case 'ref_com9':
       $new_coins = $acc->coins - $mplan->ref_com9;
       break;   
      case 'ref_com10':
       $new_coins = $acc->coins - $mplan->ref_com10;
       break;   
    }
 
    Account::where('user_name',$refUser)->update(['coins'=>$new_coins]);
   }

  public function ApproveMembership($tid){
    $mplan = MasterPlan::first();
    $transaction = Transaction::where('transaction_id',$tid)->first();
    $update_trans = Transaction::where('transaction_id',$tid)->update(['status'=>'APPROVED']);
    $user;
    $user = User::where('user_name',$transaction->user_name)->first();
    for ($i = 1; $i <= 10; $i++) {
      if ($user->ref_by === 'self') {
          break;
      }
  
      $refUser = User::where('user_name', $user->ref_by)->first();
      $this->ManageCom($refUser->user_name, $mplan, "ref_com$i");
      $user = $refUser;
    }
    session()->flash('success','Membership Approved!');
    return redirect()->back();
  }
  public function RejectMembership(Request $request){
    //   print_r($request['tid']);
    $request->validate([
      'tid'=>'required',
      'message'=>'required',
  ]);
    $transactions = Transaction::where('transaction_id',$request['tid'])->update(['status'=>'REJECTED','message'=>$request['message']]);
    session()->flash('success','Membership Rejected!');
    return redirect()->back();
  }
  public function ApproveExtendMembership ($tid){
    $trans = Transaction::where('transaction_id',$tid)->where('type','EXTEND MEMBERSHIP')->first();
    $mplan = Transaction::where('user_name',$trans->user_name)->where('type','MEMBERSHIP FEE')->where('status','APPROVED')->first();
    
    $old_date = Carbon::parse($mplan->expiration_date);
    $expirationDate = $old_date->addDays($trans->amount / 100);
    Transaction::where('user_name',$trans->user_name)->where('type','MEMBERSHIP FEE')->where('status','APPROVED')->update([
      'expiration_date'=>$expirationDate,
    ]);
    Transaction::where('transaction_id',$tid)->update([
      'status'=>'APPROVED',
    ]);
    // print_r(expiration_date);
    // session()->flash('success','Membership Extended!');
    return redirect()->back();
    
  }
  public function UndoMembership($tid){
    $mplan = MasterPlan::first();
    $transaction = Transaction::where('transaction_id',$tid)->first();
    if($transaction->status === 'REJECTED'){
        $update_trans = Transaction::where('transaction_id',$tid)->update(['status'=>'PENDING']);
        session()->flash('success','Undo Successfull!');
        return redirect()->back();
    }
    
    $update_trans = Transaction::where('transaction_id',$tid)->update(['status'=>'PENDING']);
    $user;
    $user = User::where('user_name',$transaction->user_name)->first();

    for ($i = 1; $i <= 10; $i++) {
      if ($user->ref_by === 'self') {
          break;
      }
  
      $refUser = User::where('user_name', $user->ref_by)->first();
      $this->ManageComRev($refUser->user_name, $mplan, "ref_com$i");
      $user = $refUser;
    }

    session()->flash('success','Undo Successfull!');
    return redirect()->back();
  }
  public function UndoExtendMembership($tid){
    $trans = Transaction::where('transaction_id',$tid)->first();
    $mplan = Transaction::where('user_name',$trans->user_name)->where('type','MEMBERSHIP FEE')->where('status','APPROVED')->first();
    
    $old_date = $mplan->expiration_date;
    $carbon_old_date = Carbon::parse($old_date);
    $expirationDate = $carbon_old_date->subDays($trans->amount / 100);
    
    Transaction::where('user_name',$trans->user_name)->where('type','MEMBERSHIP FEE')->where('status','APPROVED')->update([
      'expiration_date'=>$expirationDate,
    ]);
    Transaction::where('transaction_id',$tid)->update([
      'status'=>'PENDING',
    ]);
    session()->flash('success','Membership Undo Successfull!');
    return redirect()->back();
  }
  public function RejectExtendMembership(Request $request){
    $request->validate([
      'tid'=>'required',
      'message'=>'required',
  ]);
    $transactions = Transaction::where('transaction_id',$tid)->update(['status'=>'REJECTED','message'=>$request['message']]);
    session()->flash('success','Membership Extension Rejected!');
    return redirect()->back();
  }
  public function ManageInvestments(){
    $investments;
    switch($filter){
      case 'approved':
      $investments = Transaction::where('type','INVEST')->where('status','APPROVED')->where('user_name','!=','admin')->with('Plan')->paginate(15);
      break;
      case 'pending':
      $investments = Transaction::where('type','INVEST')->where('status','PENDING')->where('user_name','!=','admin')->with('Plan')->paginate(15);
      break;
      case 'rejected':
      $investments = Transaction::where('type','INVEST')->where('status','REJECTED')->where('user_name','!=','admin')->with('Plan')->paginate(15);
      break;
      case 'all':
      $investments = Transaction::where('type','INVEST')->where('user_name','!=','admin')->with('Plan')->paginate(15);
      break;
    }
    $investments = Transaction::where('type','INVEST')->where('user_name','!=','admin')->with('Plan')->get();
    return view('adminDashboard.ManageInvestments')->with(compact('investments','investments'));
  }
  public function ApproveInvestment($tid){
    $transactions = Transaction::where('transaction_id',$tid)->update(['status'=>'APPROVED']);
    session()->flash('success','Investment Approved!');
    return redirect()->back();
  }
  public function RejectInvestment($tid){
    $transactions = Transaction::where('transaction_id',$tid)->update(['status'=>'REJECTED']);
    session()->flash('success','Investment Rejected!');
    return redirect()->back();
  }
  public function ManageWithdraws($filter){
    $withdraws;
    switch($filter){
      case 'approved':
      $withdraws = Transaction::where('type','WITHDRAW')->where('status','APPROVED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'pending':
      $withdraws = Transaction::where('type','WITHDRAW')->where('status','PENDING')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'rejected':
      $withdraws = Transaction::where('type','WITHDRAW')->where('status','REJECTED')->where('user_name','!=','admin')->paginate(15);
      break;
      case 'all':
      $withdraws = Transaction::where('type','WITHDRAW')->where('user_name','!=','admin')->paginate(15);
      break;
    }
    
    return view('adminDashboard.ManageWithdraws')->with(compact('withdraws','withdraws'));
  }
  public function ApproveWithdraw($wid){
    $transactions = Transaction::where('transaction_id',$wid)->update(['status'=>'APPROVED']);
    session()->flash('success','Withdraw Approved!');
    return redirect()->back();
  }
  public function RejectWithdraw(Request $request){
    $request->validate([
      'wid'=>'required',
      'message'=>'required',
  ]);

    $getTrans = Transaction::where('transaction_id',$request['wid'])->first();
    $transaction = Transaction::where('transaction_id',$request['wid'])->update(['status'=>'REJECTED','message'=>$request['message']]);
    $userAcc = Account::where('user_name',$getTrans->user_name)->first();
    $new_acc_bal = $userAcc->balance + $getTrans->amount;
    Account::where('user_name',$userAcc->user_name)->update(['balance'=>$new_acc_bal]);
    session()->flash('success','Withdraw Rejected!');
    return redirect()->back();
  }

  public function ManageWithdrawGateway(){
    $gateways = WithdrawGateways::get();
    return view('adminDashboard.ManageWithdrawGateway',compact('gateways'));
  }

  public function Profile(){
    $user = User::where('user_name',session()->get('user')['userName'])->with('Profile')->first();
    return view('adminDashboard.profile')->with(compact('user','user'));
  }

  public function ChangePassword(){
    return view('adminDashboard.change-password');
}


}
