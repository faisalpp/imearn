@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Manage Ads</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Manage Ads</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Manage Ads</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
@if(session()->has('error'))
<div>
 <h5 class="text-danger text-center mb-2" >{{session()->get('error')}}</h5>
</div>
@endif
<div class="col-sm-12 mb-2">
<form class="row gy-4" action="{{url('/admin/mplan-update')}}" method="post">
            @csrf
              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Title</label>
                  @error('title')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <input type="hidden" id="name" name="id" autocomplete="full_name" class="form-control" value="{{$master_plan->id}}">
                  <input type="text" id="name" name="title" autocomplete="full_name" class="form-control" value="{{$master_plan->title}}">
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="email" class="form-label">Joining Fee</label>
                  @error('investment')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <input type="text" name="investment" id="email" autocomplete="email" class="form-control"
                      value="{{$master_plan->investment}}" >
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="phone" class="form-label">Joining Rule Text</label>
                  @error('join_text')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <div class="input-group">
                      <input type="text" autocomplete="phone" name="join_text" id="phone" class="form-control" value="{{$master_plan->join_text}}">
                  </div>
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Daily Income</label>
                  @error('daily_income')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <input type="text" name="daily_income" class="form-control" autocomplete="wallet_address" value="{{$master_plan->daily_income}}">
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Duration (Days)</label>
                  @error('duration')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <input type="text" name="duration" class="form-control" autocomplete="wallet_address" value="{{$master_plan->duration}}">
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Withdraw Fee</label>
                  @error('wihdraw_fee')
                   <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                  @enderror
                  <div class="input-group input--group">
                       <input type="number" name="withdraw_fee" class="form-group-input form-control form--control bg--section" value="{{$master_plan->withdraw_fee}}" id="modalAmount">
                          <button type="button" class="input-group-text">%</button>
                      </div>
                  </div>


              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">Whatsapp Number</label>
                @error('whatsapp')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="whatsapp" id="city" class="form-control" autocomplete="city" value="{{$master_plan->whatsapp}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">1st Referral Coin Bonus</label>
                @error('ref_com1')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com1" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com1}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">2nd Referral Coin Bonus</label>
                @error('ref_com2')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com2" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com2}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">3rd Referral Coin Bonus</label>
                @error('ref_com3')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com3" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com3}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-labe">4th Referral Coin Bonus</label>
                @error('ref_com4')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com4" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com4}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">5th Referral Coin Bonus</label>
                @error('ref_com5')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com5" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">6th Referral Coin Bonus</label>
                @error('ref_com6')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com6" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">7th Referral Coin Bonus</label>
                @error('ref_com7')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com7" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">8th Referral Coin Bonus</label>
                @error('ref_com8')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com8" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">8th Referral Coin Bonus</label>
                @error('ref_com8')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com8" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">9th Referral Coin Bonus</label>
                @error('ref_com9')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com9" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>
              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">10th Referral Coin Bonus</label>
                @error('ref_com10')
                 <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                @enderror
                <input type="number" name="ref_com10" id="city" class="form-control" autocomplete="city" value="{{$master_plan->ref_com5}}">
              </div>

              <div class="col-sm-12">
                  <div class="text-end">
                      <button type="submit" class="cmn--btn">Update Master Plan</button>
                  </div>
              </div>
            </form>
</div>

@endsection