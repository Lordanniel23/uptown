@extends('admin/body.body') @section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/passtrength.css') }}">
<script src="{{ asset('js/jquery.passtrength.js') }}" ></script>
<style>
   body {
   overflow: hidden;
   }
   table {
   font-family: arial, sans-serif;
   border-collapse: collapse;
   width: 100%;
   }
   /* Preloader */
   #preloader {
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #fff;
   z-index: 99;
   }
   #status {
   width: 200px;
   height: 200px;
   position: absolute;
   left: 50%;
   top: 50%;
   background-image: url('/logo.gif');
   background-repeat: no-repeat;
   background-position: center;
   margin: -100px 0 0 -100px;
   }
   .dataTables_wrapper {
   margin-top: 1em!important;
   }
   .passtrengthMeter.medium::after {
   content: '';
   background-color: yellow;
   width: 50%; 
   }
   .passtrengthMeter.medium .tooltip {
   background-color: yellow;
   color:black;
   }
   .passtrengthMeter.strong::after {
   content: '';
   background-color: green;
   width: 75%;
   }
   .passtrengthMeter.strong .tooltip {
   background-color: green;
   color:black;
   }
</style>
<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<div>
   <div class="dropdown">
      <a href="#" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2"  data-bs-toggle="modal" data-bs-target="#createmodal"  style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important">Create User</a>
   </div>
</div>
<div style="width: 90%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width:100">
      <thead>
         <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Date Created</th>
            <th>
               <center>Action</center>
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach($users as $user)
         @if($user->status_id != 3)
         <tr>
            <td>
               <div class="cropped zoom"><img src="{{$user->image}}" alt=""></div>
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            @foreach($roles as $role)
            @if($role->id === $user->role_id)
            <td>{{$role->role}}</td>
            @endif
            @endforeach
            <td><span hidden>{{\Carbon\Carbon::parse($user->created_at)->format('Y m d')}}</span>{{\Carbon\Carbon::parse($user->created_at)->format('d M y')}}</td>
            <td>
               <center>
                  <!-- <a href="/admin/employee/{{$user->id}}/edit" class="edit "><button type="button" class="btn btn-primary rounded">Edit</button></a> -->
                  <a href="#" class="edit"  userid="{{$user->id}}" user-name="{{$user->name}}" username="{{$user->username}}" userrole="{{$user->role_id}}" ><button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button></a>
                  <a href="#deleteEmployeeModal" class="delete archiveButton" id="{{$user->name}}" data-id="{{$user->id}}"><button type="button"  class="btn btn-warning" data-bs-toggle="modal"   data-bs-target="#exampleModal">Archive</button></a>
                  <a href="#reset" class="reset"  id="{{$user->name}}" data-id="{{$user->id}}"><button type="button"  class="btn btn-danger" data-bs-toggle="modal"   data-bs-target="#reset">Reset</button></a>
               </center>
            </td>
         </tr>
         @endif
         @endforeach
      </tbody>
   </table>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Are you sure you want to archive <u><span class="nameemp" style="font-weight:bold"></span></u>  ?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="deleteArchive" action="/admin/employee/{{$user->id}}" method='POST'>
               @csrf
               @method('DELETE')
               <input type="number" name="id" value="{{$user->id}}" hidden>
               <input type="submit" class="btn btn-warning" value="Archived">
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Reset Account -->
<div class="modal fade" id="reset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>  Are you sure you want to reset <u><span class="nameempz" style="font-weight:bold"></span></u>  ?</p>
            <p> Password will be "<span style="color:red"><b><u>uptowngrill</b></u></span>" <br>
               Security Questions will be "<span><b><u>Reset</b></u></span>" <br>
               User needs to fill new account settings 
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="resetz" action="" method='POST'>
               @csrf
               @method('post')
               <input type="number" name="id" value="{{$user->id}}" hidden>
               <input type="submit" class="btn btn-danger" value="Reset">
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Create !  -->
<div class="modal fade" id="createmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" action="/admin/employee/create">
               @csrf
               @method('POST')
               <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name<span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                     <span class="text-danger d-none " id="employeeError">Employee Name Already Exist</span>
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="username" class="col-md-4 col-form-label text-md-right">Username <span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                     <span class="text-danger d-none " id="UsernameError">Username Not Available</span>
                     <span class="text-danger d-none " id="usernamemin">Minimum of 8 character</span>
                     @error('username')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Passowrd<span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password <span style="color:red;">*</span></label>
                  <div class="col-md">
                     <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                     <span class="text-danger d-none " id="passwordError">Password does not match!</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }} <span style="color:red;">*</span></label>
                  <div class="col-md">
                     <select name="role" class="form-select form-control @error('role') is-invalid @enderror" aria-label=".form-select-lg example" require>
                        <option selected disabled >Please Select Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Cashier</option>
                        <option value="3">Waiter</option>
                        <option value="4">Kitchen</option>
                     </select>
                     @error('role')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-0">
                  <div class="col-md offset-md-4">
                     <button id="existing" type="submit" class="btn btn-primary" hidden>
                     Register
                     </button>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
         <div class="dropdown me-1">
         <button type="button" class="btn btn-success" id="savecreate" >Save</button>
         <button class="btn btn-success" id="savecreates" hidden>Save</button>
         </div>
         </form>
         </div>
      </div>
   </div>
</div>
<!-- end modal -->
<!-- edit !  -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="edittitle">Create New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" id="editform" action="">
               @csrf
               <input type="text" id="editid" name="editid" hidden>
               <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name <span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <input id="editname" type="text" class="form-control @error('name') is-invalid @enderror" name="editname" value="" required >
                     <span class="text-danger d-none " id="editemployeeError">Employee Name Already Exist</span>
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="username" class="col-md-4 col-form-label text-md-right">Username <span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <input id="editusername" type="text" class="form-control @error('username') is-invalid @enderror" name="editusername" value="" required autocomplete="username">
                     <span class="text-danger d-none " id="editUsernameError">Username Not Available</span>
                     <span class="text-danger d-none " id="editusernamemin">Minimum of 8 character</span>
                     @error('username')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="role" class="col-md-4 col-form-label text-md-right">Role <span style="color:red;"> *</span></label>
                  <div class="col-md">
                     <select id="editrole" name="editrole" class="form-select form-control @error('role') is-invalid @enderror" aria-label=".form-select-lg example" require>
                        <option value="1">Admin</option>
                        <option value="2">Cashier</option>
                        <option value="3">Waiter</option>
                        <option value="4">Kitchen</option>
                     </select>
                     @error('role')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-0">
                  <div class="col-md offset-md-4">
                     <button id="editexisting" type="submit" class="btn btn-primary" hidden>
                     </button>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
         <div class="dropdown me-1">
         <button type="button" class="btn btn-success" id="saveedit" >Save</button>
         <button class="btn btn-success" id="saveedits" hidden>Save</button>
         </div>
         </form>
         </div>
      </div>
   </div>
</div>
<!-- end modal -->
<script>
   //edit
   $('.edit').on('click', function(e) {
           e.preventDefault();
         var id     = $(this).attr("userid");
         var name   = $(this).attr("user-name");
         var username   = $(this).attr("username");
         var userrole  = $(this).attr("userrole");
         console.log(name);
   
         $("#edittitle").text("Editing " + name);
         $('#editusername').attr('value', username);
         $('#editid').attr('value', id);
         $('#editname').attr('value', name);
         $('#editname').attr('value', name);
         $('#editform').attr('action','/admin/employee/update/' + id);
         $("#editrole [value="+userrole+"]").prop("selected", "true");
   
         });
   
   $('#saveedit').on('click', function(e) {
           var name = $('#editname').attr('value');
           console.log(name);
           if (confirm('Are you sure you want to update '+ name + '?') == true) {
               $( "#editexisting" ).click();
           } else {
           }
         });
   
   
   // editusername minimum 8
   $('#editusername').keyup(function(){
   var name=$('#editusername').val();
   var count = name.length;
   console.log(name);
   if (count <= 7) {
     console.log('lessthan');
         $('#editusernamemin').removeClass('d-none');
         $("#editsavecreate").prop('disabled', true); //disable 
       }else{
         console.log("1match");
         $('#editusernamemin').addClass('d-none');
         $("#editsavecreate").prop('disabled', false); //enable
         $.ajax({
           url: "/filtering/employeeUsername",
           type:"GET",
           data:{
               name: name
           },
           success:function(data){
             var count = data.length;
   
             if(count==1){
               $('#UsernameError').removeClass('d-none');
               $("#savecreate").prop('disabled', true); //disable 
   
             }else{
               $('#UsernameError').addClass('d-none');
               $("#savecreate").prop('disabled', false); //enable
   
             }
           },
           error: function(error) {
            console.log(error);
           }
          });
       }  
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $('#password').passtrength({
     minChars: 8,
     tooltip:true,
     textWeak:"Weak",
     textMedium:"Medium",
     textStrong:"Strong",
     textVeryStrong:"Very Strong",
     eyeImg : "{{ asset('images/eye.svg') }}"
   });
   $('#password-confirm').passtrength({
     minChars: 8,
     tooltip:true,
     textWeak:"Weak",
     textMedium:"Medium",
     textStrong:"Strong",
     textVeryStrong:"Very Strong",
     eyeImg : "{{ asset('images/eye.svg') }}"
   });
   
   //create button
   $('#savecreate').on('click', function(e) {
            if (confirm('Are You sure you want to create new user?') == true) {
            $( "#existing" ).click();
            } else {
            }
         });
   
   
   // password equal test
   $('#password-confirm').keyup(function(){
   var pass1=$('#password').val();
   var pass2=$('#password-confirm').val();
   var count = pass1.length;
   console.log('count' + count);
   if (count >= 1) {
     console.log('pass1' + pass1);
     console.log('pass2' + pass2);
       if (pass1 != pass2) {
         
         $('#passwordError').removeClass('d-none');
         $("#savecreate").prop('disabled', true); //disable 
       }else{
         console.log("2match");
         $('#passwordError').addClass('d-none');
         $("#savecreate").prop('disabled', false); //enable
       }  
   }else{
         $('#passwordError').addClass('d-none');
         $("#savecreate").prop('disabled', false); //enable
   }
   });
   $('#password').keyup(function(){
   var pass1=$('#password').val();
   var pass2=$('#password-confirm').val();
   var count = pass2.length;
   console.log('count' + count);
   if (count >= 1) {
     console.log('pass1' + pass1);
     console.log('pass2' + pass2);
       if (pass1 != pass2) {
         
         $('#passwordError').removeClass('d-none');
         $("#savecreate").prop('disabled', true); //disable 
       }else{
         console.log("1match");
         $('#passwordError').addClass('d-none');
         $("#savecreate").prop('disabled', false); //enable
       }  
   }else{
         $('#passwordError').addClass('d-none');
         $("#savecreate").prop('disabled', false); //enable
   }
   });
   // username minimum 8
   $('#username').keyup(function(){
   var name=$('#username').val();
   var count = name.length;
   console.log(name);
   if (count <= 7) {
     console.log('lessthan');
         $('#usernamemin').removeClass('d-none');
         $("#savecreate").prop('disabled', true); //disable 
       }else{
         console.log("1match");
         $('#usernamemin').addClass('d-none');
         $("#savecreate").prop('disabled', false); //enable
         $.ajax({
           url: "/filtering/employeeUsername",
           type:"GET",
           data:{
               name: name
           },
           success:function(data){
             var count = data.length;
   
             if(count==1){
               $('#UsernameError').removeClass('d-none');
               $("#savecreate").prop('disabled', true); //disable 
   
             }else{
               $('#UsernameError').addClass('d-none');
               $("#savecreate").prop('disabled', false); //enable
   
             }
           },
           error: function(error) {
            console.log(error);
           }
          });
       }  
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $('.archiveButton').on('click', function(e) {
         e.preventDefault();
   	  var id = $(this).attr("data-id");
   	  var name = $(this).attr("id");
         $(".nameemp").text(name);
         $('#deleteArchive').attr('action', "/admin/employee/"+id);
   	  console.log(id);
   });
   
   $('.reset').on('click', function(e) {
         e.preventDefault();
   	  var id = $(this).attr("data-id");
   	  var name = $(this).attr("id");
       $(".nameempz").text(name);
         $('#resetz').attr('action', "/admin/employee/reset/"+id);
   	  console.log('reset');
   });
   
   $(document).ready(function() {
       $('#example').DataTable( {
   		"columnDefs": [
       	{ "width": "20%", "targets": 5 }],
         "order": [[ 1, "asc" ]],
       } );
   } );
   
   //active sidebar
   $(window).on('load', function() {
     $('#users-pages').attr('class', "multi-level collapse show");
     $('#sidebaremployee').attr('class', "nav-item active");
     $('#empspan').attr('aria-expanded', "true");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Users</li><li class='breadcrumb-item active'>User List</li>";
     document.getElementById("page-name").innerHTML += "User List";
   	console.log("works");
   });
   $(window).on('load', function() { // makes sure the whole site is loaded 
     $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
     $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
     $('body').delay(300).css({'overflow':'visible'});
   })
</script>
@endsection