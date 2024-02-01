@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Unlock Plans</title>
@endpush
<div class="dashborad--content">
				
<div class="breadcrumb-area">
  <h3 class="title">Extend Days</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/user/dashboard')}}">Dashboard</a>
      </li>
      <li>Extend Days</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<div class="dashboard--content-item">
    <div id="request-form">
    <script>
    // Get references to the input and total fields
    
  // Add an onchange event listener to the input field
  function calculator() {

    
    const inputField = document.getElementById('days');
    const totalField = document.getElementById('total');
      // Get the value from the input field
  const inputValue = parseFloat(inputField.value);
    // Perform the calculation
    const result = inputValue * 100;

    // Update the total field with the calculated result
    totalField.value = result;
}
</script>
    <div class="profile--card">
      <div class="user--profile mb-5">
          

          <form class="row gy-4" enctype="multipart/form-data" action="{{url('/user/extend-request')}}" method="post">
            @csrf
            <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Check Payment Information</label>
                  <div class="col-sm-6">
                      <button type="button" style="background-color:orange !important" data-bs-toggle="modal" data-bs-target="#invest-modal33" class="cmn--btn">Payment Information</button>
                  </div>
              </div>

            <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Bank Name</label>
                  <select name="bank_name" class="form-control" >
                    @foreach($gateways as $gateway)
                   <option value="{{$gateway->bank_name}}">{{$gateway->bank_name}}</option>
                   @endforeach
                  </select>         
              </div>
              <div class="col-sm-6 col-xxl-4">
                  <label for="email" class="form-label">Extending Days</label>
                  <input name="days" type="text" onchange="calculator()" id="days" class="form-control"
                      value="">
              </div>
              <div class="col-sm-6 col-xxl-4">
                  <label for="email" class="form-label">Total Price</label>
                  <input name="price" type="text" id="total" class="form-control"
                      value="" readonly>
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Payment Proof</label>
                  <input type="file" id="name" name="proof" class="form-control" value="">
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="email" class="form-label">Sender Number</label>
                  <input name="wallet_address" type="text" id="email" class="form-control"
                      value="">
              </div>


              <div class="d-flex col-12">
                  <div class="col-sm-12 text-end">
                      <button type="submit" class="cmn--btn">Send Request</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="invest-modal33">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="investForm" action="{{url('/admin/create-gateway')}}" method="post">
                        @csrf
                        <div class="modal-body ">
                            <h4 class="modal-title text-center plan-title">Payment&nbsp;Information</h4>
                            @foreach($gateways as $gateway)
                            <div class="d-flex flex-column mt-2 px-2 py-2" style="border:2px solid blue;border-left:none;border-right:none;" >
                              <div class="d-flex flex-lg-row flex-column align-items-center" >
                               <h5 class="mt-2 text-success" >Bank&nbsp;Name:</h5>
                               <h5 class="mt-2 mx-2" >{{$gateway->bank_name}}</h5>  
                              </div>
                              <div class="d-flex flex-lg-row flex-column align-items-center" >
                                <h5 class="mt-2 text-success" >Receiver Name:</h5>  
                                <h5 class="mt-2 mx-2" >{{$gateway->acc_holder}}</h5>  
                              </div>
                              <div class="d-flex flex-lg-row flex-column align-items-center" >
                                <h5 class="mt-2 text-success" >Account Number:</h5>  
                                <div class="input-group input--group">
                                    <input type="text" class="form-control form--control" readonly
                                        value="{{$gateway->acc_number}}" id="acc{{$loop->index}}">
                                    <input type="hidden" class="form-control form--control" readonly
                                        value="{{$gateway->acc_number}}" id="acc{{$loop->index}}">
                                    <button class="input-group-text px-3 btn--primary border-0" type="button" id="copyBoard" onclick="copy('<?php echo $loop->index ?>')">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                                
                              </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection