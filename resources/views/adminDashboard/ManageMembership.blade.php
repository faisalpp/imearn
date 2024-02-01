@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Manage Investments</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Manage Memberships</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Manage Memberships</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif

<script>
    function ApproveMembership(id,index){
     
      const loader = document.getElementById(`membership_loader${index}`);
      const actions = document.getElementById(`membership_actions${index}`);
      
      loader.style.display = 'block'
      
      actions.style.display = 'none'
      const url = `{{url('/admin/approve-membership')}}/${id}`
        
      // Make a GET request using Fetch API
      fetch(url)
      .then(data => {
          toastr.success("Membership Approved!", 'Success', {
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000 // Time in milliseconds (3 seconds)
        });
          loader.style.display = 'none'
          actions.style.display = 'flex'
          location.reload();
      })
      .catch(error => {
         loader.style.display = 'none'
          actions.style.display = 'flex'
          location.reload();
        console.log('There was a problem with the API operation:', error);
      });
      
    }
    
    function UndoMembership(id,index){
     
      const loader = document.getElementById(`undo_membership_loader${index}`);
      const actions = document.getElementById(`undo_membership_actions${index}`);
      
      loader.style.display = 'block'
      
      actions.style.display = 'none'
      const url = `{{url('/admin/undo-membership')}}/${id}`
        
      // Make a GET request using Fetch API
      fetch(url)
      .then(data => {
          toastr.success("Membership Undo Successful!", 'Success', {
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000 // Time in milliseconds (3 seconds)
        });
          loader.style.display = 'none'
          actions.style.display = 'flex'
          location.reload();
      })
      .catch(error => {
         loader.style.display = 'none'
          actions.style.display = 'flex'
        toastr.error("Something Went Wrong!", 'Success', {
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000 // Time in milliseconds (3 seconds)
        });
      });
      
    }
</script>

<div class="d-flex justify-content-end" >
  <div class="d-flex align-items-center bg-white mb-2 px-2 py-2 rounded" style="border:1px solid red;" >
    <span class="mx-2" >Filters:</span>
    <a href="{{url('/admin/manage-memberships/approved')}}" ><button type="button" style="font-size:12px;border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button" >Approved</button></a>
    <a href="{{url('/admin/manage-memberships/pending')}}" ><button type="button" style="font-size:12px;border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button mx-2" >Pending</button></a>
    <a href="{{url('/admin/manage-memberships/rejected')}}" ><button type="button" style="font-size:12px;border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button mx-2" >Rejected</button></a>
    <a href="{{url('/admin/manage-memberships/all')}}" ><button type="button" style="font-size:12px;border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button" >All</button></a>
  </div>
</div>

<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                  <th>UserName</th>
                  <th>Bank Name</th>
                  <th>Sender Number</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Proof</th>
                  <th>Action</th>
                  <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @if(isset($memberships))
              @foreach($memberships as $membership)
              <tr>
               <td data-label="Date"><div>{{$membership->user_name}}</div></td>
               <td data-label="Date"><div>{{$membership->bank_name}}</div></td>
               <td data-label="Date"><div>{{$membership->wallet_address}}</div></td>
               <td data-label="Date"><div>{{$membership->amount}}</div></td>
               <td data-label="Date"><div>{{$membership->status}}</div></td>
               <td data-label="Date">
                <!-- Button trigger modal -->
                <button type="button" style="border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->index}}">Proof</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Image Proof
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body text-center">
                    <img id="img" src="{{url('/proofs')}}/{{$membership->proof}}" style="width:260px;height:350px" alt="">
                   </div>
                  </div>
                 </div>
                </div>
              
               </td>
               
               @if($membership->status == 'PENDING')
               <td data-label="Date" style="display:flex" class=" justify-content-center">
              <a style="display:block" id="membership_actions{{$loop->index}}" onclick="ApproveMembership('<?php echo $membership->transaction_id ?>','<?php echo $loop->index ?>')" >
               <span style="display:flex;justify-content:center;align-items:center;width:25px;height:25px;background-color:rgb(164, 247, 164);border-radius:100%;" class="mx-2">
                <i class="fa fa-check" style="color: green;cursor: pointer;" ></i>
               </span>
              </a>
              
              <span id="membership_loader{{$loop->index}}" style="display:none;justify-content:center;align-items:center;width:25px;height:25px;background-color:rgb(164, 247, 164);border-radius:100%;" class="mx-2">
                <img   src="{{url('/loader-bg.gif')}}" style="height:18px"  />
              </span>

                <!-- Button trigger modal -->
                <button type="button" style="display:flex;justify-content:center;border:none;align-items:center;width:25px;height:25px;background-color:rgb(250, 148, 148);border-radius:100%;" data-bs-toggle="modal" data-bs-target="#exampleModalRejectMembership{{$loop->index}}">
                <i class="fa fa-ban" style="color: red;cursor: pointer;" ></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalRejectMembership{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Membership Rejection
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <form class="row gy-4 px-3" action="{{url('/admin/reject-membership')}}" method="post">
                   @csrf
                   <div class="pt-3 pb-2">
                    <label for="amount" class="form-label" style="color:black" >Rejection Message</label>
                    <div class="d-flex justify-content-center input-group input--group" style="width:100%">
                    @error('mesage')
                      <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                     @enderror
                     <input type="hidden" name="tid" value="{{$membership->transaction_id}}" />
                     <textarea type="number" name="message" placeholder="Write Rejection Message" style="width:200px !important" class="form-group-input form-control form--control bg--section" id="modalAmount"></textarea>
                    </div>
                   </div>
                    <div class="d-flex justify-content-center" >   
                     <button type="submit" style="width:fit-content;" class="mb-4 btn bg-danger text-white " >Reject</button>
                     <!--<button type="button" style="width:fit-content;" class="mb-4 btn bg-danger text-white " ><img   src="{{url('/loader-bg.gif')}}" style="height:18px"  /></button>-->
                    </div> 
                  </form>

                  </div>
                 </div>
                </div>
               </td>
               @else
               <td data-label="Date" style="display:flex" class=" justify-content-center">
                 <a style="display:block" id="undo_membership_actions{{$loop->index}}" onclick="UndoMembership('<?php echo $membership->transaction_id ?>','<?php echo $loop->index ?>')" >
                  <span style="display:flex;justify-content:center;align-items:center;width:25px;height:25px;background-color:yellow;border-radius:100%;" class="mx-2">
                   <i class="fa fa-undo" style="color: green;cursor: pointer;" ></i>
                  </span>
                 </a>
                 
                 <span id="undo_membership_loader{{$loop->index}}" style="display:none;justify-content:center;align-items:center;width:25px;height:25px;background-color:yellow;border-radius:100%;" class="mx-2">
                <img   src="{{url('/loader-bg.gif')}}" style="height:18px"  />
              </span>
                
                
               </td>
               @endif
               <td data-label="Date"><div>{{$membership->created_at->format('j F,Y')}}</div></td>
             </tr>
              @endforeach
              @else
              <tr>
                <td colspan="12">
                 <h4 class="text-center m-0 py-2">No Data Found</h4>
                </td>
               </tr>
              @endif    
          </tbody>
        </table>
    </div>
    {{$memberships->links('pagination::bootstrap-4')}}    
    
</div>



@endsection