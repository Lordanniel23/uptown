@extends('admin/body.body') @section('content')
<style>
   #profile {
    width: 10rem!important;
    height: 12rem!important;
}
</style>
         <div class="row">
            <div class="col-12 col-xl-8">
               <div class="row">
                  <div class="col-8 mb-4">
                     <div class="card border-0 shadow">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col">
                                 <h2 class="fs-5 fw-bold mb-0">Best Seller</h2>
                              </div>
                              <div class="col text-end">
                                 <a href="#" class="btn btn-sm btn-primary">See all</a>
                              </div>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table align-items-center table-flush">
                              <thead class="thead-light">
                                 <tr>
                                    <th class="border-bottom" scope="col">Menu ID</th>
                                    <th class="border-bottom" scope="col">Menu Name</th>
                                    <th class="border-bottom" scope="col">Total Sold</th>
                                    <th class="border-bottom" scope="col">Current Price</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($populars as $popular)
                                 <tr>
                                    <td class="text-gray-900" scope="row">{{$popular->id}}</td>
                                    <td class="text-gray-900" scope="row">{{$popular->Name}}</td>
                                    <td class="fw-bolder text-gray-500">{{$popular->count}}</td>
                                    <td class="fw-bolder text-gray-500">₱ {{$popular->Price}}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-xxl-4 mb-4">
                  <div class="col-12 col-xxl-12 mb-4">
                     <div class="col-12 mb-4 mb-xxl-0">
                        <div class="card border-0 shadow">
                           <div class="card-body">
                              <h2 class="fs-5 fw-normal">Available Tables</h2>
                              <h3 class="fs-1 fw-extrabold mb-1">{{$totaltable[0]->table}}</h3>
                              <div class="d-flex align-items-center">
                                 <span><a href="/admin/table">See More</a></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-xxl-12 mb-4">
                     <div class="col-12 mb-4 mb-xxl-0">
                        <div class="card border-0 shadow">
                           <div class="card-body">
                              <h2 class="fs-5 fw-normal">Active Discounts</h2>
                              <h3 class="fs-1 fw-extrabold mb-1">{{$discount[0]->discount}}</h3>
                              <div class="d-flex align-items-center">
                                 <span><a href="/admin/discount">See More</a></span>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
                  <div class="col-12 col-xxl-8 mb-4">
                     <div class="col-12 mb-4 mb-xxl-0">
                        <div class="card border-0 shadow">
                           <div class="card-body">
                              <h2 class="fs-5 fw-normal">Full Address</h2>
                              <h3 class="fs-6 fw-bold mb-1">{{$address[0]->description}}</h3>
                              <div class="d-flex align-items-center">
                              <span><a data-bs-toggle="modal" data-bs-target="#updateaddress">Update Address</a></span>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-xxl-4 mb-4">
                     <div class="col-12 mb-4 mb-xxl-0">
                        <div class="card border-0 shadow">
                           <div class="card-body">
                              <h2 class="fs-5 fw-normal">Contact Number</h2>
                              <h3 class="fs-2 fw-extrabold mb-1">{{$phonenumber[0]->description}}</h3>
                              <div class="d-flex align-items-center">
                              <span><a data-bs-toggle="modal" data-bs-target="#updatephonenumber">Update Address</a></span>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-xxl-12 mb-4">
                     <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                           <h2 class="fs-5 fw-bold mb-0">Sales tracker</h2>
                           <a href="#" class="btn btn-sm btn-primary">See More</a>
                        </div>
                        <div class="card-body">
                           <!-- Project 1 -->
                           <div class="row mb-4">
                              <div class="col-auto">
                                 <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                 </svg>
                              </div>
                              <div class="col">
                                 <div class="progress-wrapper">
                                    <div class="progress-info">
                                       <div class="h6 mb-0">Yesterday - 0%</div>
                                       <div class="small fw-bold text-gray-500"><span>75 %</span></div>
                                    </div>
                                    <div class="progress mb-0">
                                       <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Project 2 -->
                           <div class="row align-items-center mb-4">
                              <div class="col-auto">
                                 <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                 </svg>
                              </div>
                              <div class="col">
                                 <div class="progress-wrapper">
                                    <div class="progress-info">
                                       <div class="h6 mb-0">Other Day - 0%</div>
                                       <div class="small fw-bold text-gray-500"><span>60 %</span></div>
                                    </div>
                                    <div class="progress mb-0">
                                       <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-xl-4">
            <div class="col-12 mb-4">
                            <div class="card shadow border-0 text-center p-0">
                                <div class="profile-cover rounded-top" data-background="/images/bgsamg.jpg" style="background-image:url(/images/bgsamg.jpg)"></div>
                                <div class="card-body pb-5">
                                    <img src="{{ Auth::user()->image }}" id="profile" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="{{ Auth::user()->name }}">
                                    <h4 class="h3">{{ Auth::user()->name }}</h4>
                                    <!-- <h5 class="fw-normal">{{ Auth::user()->name }}</h5> -->
                                    <p class="text-gray mb-4">{{$role[0]->role}}</p>
                                    <a class="btn btn-sm btn-secondary" href="/settings/{{ Auth::user()->id }}">Account Settings</a>
                                </div>
                             </div>
                        </div>
               <div class="col-12 px-0">
                  <div class="card border-0 shadow">
                     <div class="card-body">
                        <h2 class="fs-5 fw-bold mb-1">Menu Information</h2>
                        <p>Available - Can be ordered / prepare / has stock <br>
                           Unavailable - Cannot be oredered <br>
                           Archived - Soft       </p>
                        <div class="d-block">
                           <div class="d-flex align-items-center me-5">
                              <div class="icon-shape icon-sm icon-shape-success rounded me-3">
                              </div>
                              <div class="d-block">
                                 <label class="mb-0">Available</label>
                                 <h4 class="mb-0">{{$totalmenuavailable[0]->menu}}</h4>
                              </div>
                           </div>
                           <div class="d-flex align-items-center pt-3">
                              <div class="icon-shape icon-sm icon-shape-warning rounded me-3">
                              </div>
                              <div class="d-block">
                                 <label class="mb-0">Disables</label>
                                 <h4 class="mb-0">{{$totalmenuunavailable[0]->menu}}</h4>

                              </div>
                           </div>
                           <div class="d-flex align-items-center pt-3">
                              <div class="icon-shape icon-sm icon-shape-danger rounded me-3">
                              </div>
                              <div class="d-block">
                                 <label class="mb-0">Archived</label>
                                 <h4 class="mb-0">{{$totalmenuarchived[0]->menu}}</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


<!-- address update -->
<div class="modal fade" id="updateaddress" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel"><b>Update Address</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
               <div class="container" >
                  <div class="row" style="padding-bottom:1em;">
                  <form action="/filtering/address" method="post">
                  @csrf
               @method('get')
                     <textarea name="address" id="address" cols="52" maxlength="250" class="form-control" rows="5">{{$address[0]->description}}</textarea><br>
                     <input type="submit" id="addresssubmitlegit" class="btn btn-success" value="Confirm" hidden>
                  </form>
               </div>
            </div>
            <div class="modal-footer">
                  <span class="text-danger">Maximum of 250 characters</span>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button id="addresssubmit" class="btn btn-success">Confirm</button>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- phone number update -->
<div class="modal fade" id="updatephonenumber" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel"><b>Update phonenumber</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
               <div class="container" >
                  <div class="row" style="padding-bottom:1em;">
                  <form action="/filtering/phonenumber" method="post">
                  @csrf
               @method('get')
                     <input type="tel" class="form-control" name="address" id="phonenumber" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" value="{{$phonenumber[0]->description}}" required>
                     <input type="submit" id="phonenumbersubmitlegit" class="btn btn-success" value="Confirm" hidden>
                  </form>
               </div>
            </div>
            <div class="modal-footer">
                  <span class="text-danger">Format: 0123-456-7890</span>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button id="phonenumbersubmit" class="btn btn-success">Confirm</button>
            </div>
         </div>
      </div>
   </div>
</div>




<script>

$('#addresssubmit').on('click', function(e) {
         if (confirm('Are you sure you want to update address ?') == true) {
         $( "#addresssubmitlegit" ).click();
         } else {
         }
      });

      $('#phonenumbersubmit').on('click', function(e) {
         if (confirm('Are you sure you want to update phone number ?') == true) {
         $( "#phonenumbersubmitlegit" ).click();
         } else {
         }
      });

//active sidebar
$(window).on('load', function() {
  $('#sidebardashboard').attr('class', "nav-item active");
  document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Dashboard</li>";
  document.getElementById("page-name").innerHTML += "Dashboard";
	console.log("works");
});
</script>
@endsection