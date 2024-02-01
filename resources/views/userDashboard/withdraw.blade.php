@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Withdraw</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Withdraw</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/user/dashboard')}}">Dashboard</a>
      </li>

      <li>Withdraw</li>
  </ul>
</div>
@if(session()->has('error'))
<div>
    <h5 class="text-danger text-center mb-2" >{{session()->get('error')}}</h5>
</div>
@endif
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<script>
// Set the date we're counting down to


function calc() {
  
  let fee = document.getElementById('fee');
  let amount = document.getElementById('amount');
  let total = document.getElementById('total');
   let totall = (fee.value / 100) * amount.value;        
   total.value = (amount.value - totall).toFixed(2) ;
  console.log(fee.value)
};

</script>
<div class="dashboard--content-item">
  <div class="row g-3">
    <div class="col-12">
      <div class="card default--card">
        <div class="card-body">
          <form id="request-form" action="{{url('/user/withdraw-request')}}" method="post">
                @csrf
                <div class="row gy-3 gy-md-4">
                                      <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label required">Amount</label>
                      @error('amount')
                       <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                      @enderror
                      <input name="aount" onchange="calc()" id="amount" class="form-control " autocomplete="off" type="number" >
                    </div>
                  </div>
                  <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Withdraw Fee</label>
                  @error('wihdraw_fee')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <div class="input-group input--group">
                       <input type="number" name="withdraw_fee" readonly class="form-group-input form-control form--control bg--section" value="{{$mplan->withdraw_fee}}" id="fee">
                          <button type="button" class="input-group-text">%</button>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label required">You Recieve </label>
                      <input name="amount" readonly id="total" class="form-control " autocomplete="off"  type="number" >
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label required">Receiver Account Number</label>
                      @error('wallet_address')
                       <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                      @enderror
                      <input name="wallet_address" id="accountemail" class="form-control " autocomplete="off" type="text">
                    </div>
                  </div>

                  <div class="col-sm-12">
                  <label for="name" class="form-label">Bank Name</label>
                  <select name="bank_name" class="form-control" >
                    @foreach($gateways as $gateway)
                   <option value="{{$gateway->bank_name}}">{{$gateway->bank_name}}</option>
                   @endforeach
                  </select>         
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                     <label class="form-label required">Account Holder Name</label>
                     @error('acc_holder_name')
                      <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                     @enderror
                     <input name="acc_holder_name" id="account_name" class="form-control " autocomplete="off" placeholder="Jhon Doe" type="text">
                     </div>
                  </div>



                  <div class="col-sm-12">
                    <label class="form-label d-none d-sm-block">&nbsp;</label>
                    <button type="submit" class="cmn--btn bg--primary submit-btn w-100 border-0">Wihdraw Now</button>

                  </div>
                </div>

            </form>
        </div>
      </div>
  </div>
  </div>
</div>
@endsection
