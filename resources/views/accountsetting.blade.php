<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Account Settings</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/passtrength.css') }}">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="{{ asset('js/datatable/jquery-3.5.1.js') }}" ></script>
      <script src="{{ asset('js/jquery.passtrength.js') }}" ></script>
   </head>
   <body>
      @toastr_css
      <style>
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
      <section class="py-5 my-5">
         <div class="container">
            <h1 class="mb-5">Account Settings</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
               <div class="profile-tab-nav border-right">
                  <div class="p-4">
                     <div class="img-circle text-center mb-3">
                        <img src="{{Auth::user()->image}}" style="width: 12em;padding:2em" alt="Image">
                     </div>
                     <h4 class="text-center">{{ Auth::user()->name }}</h4>
                  </div>
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                     <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                     Information
                     </a>
                     <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                     Password
                     </a>
                     <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                     Security Questions
                     </a>
                     <a class="nav-link" id="security-tab" href="/cashier" >
                     Back
                     </a>
                  </div>
               </div>
               <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                     <h3 class="mb-4">Account Settings</h3>
                     <div class="row">
                        <div class="col-md-7">
                           <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="form-group">
                              <label>Position</label>
                              @foreach($roles as $role)
                              @if($role->id === Auth::user()->role_id)
                              <input type="text" class="form-control" value="{{$role->role}}" disabled>
                              @endif
                              @endforeach
                           </div>
                        </div>
                        <div class="col-md-7">
                           <form action="/settings/one" method="post" enctype="multipart/form-data">
                              @csrf 
                              @method('post')
                              <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" hidden> 
                                 <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->username }}">
                                 <span class="text-danger d-none " id="UsernameError">Username Not Available</span>
                                 @if ($errors->has('username'))
                                 <span class="text-danger">{{ $errors->first('username') }}</span>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Change Profile Picture</label>                                 
                                 <input class="imaged form-control" name="image[]" type="file"  id="imgInp" accept="image/* ">
                                 <center><span class="text-danger ">file size must be less than 2mb</span></center>
                              </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group mt">
                        <label>Image Preview</label>
                        <center>
                        <img src="{{Auth::user()->image}}" style="max-height: 12em;max-width: 12em;" alt="Profile Picture" id="blah">
                        </center>       
                        </div>
                        </div>
                     </div>
                     <div>
                     <button class="btn btn-primary">Update</button>
                     </div>
                  </div>
                  </form>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                     <form action="/settings/two" method="post">
                        @csrf 
                        @method('post')
                        <h3 class="mb-4">Password Settings</h3>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Old password<span style="color:red;"> *</span></label>
                                 <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" hidden> 
                                 <input id="Password" type="password" name="oldpassword" class="form-control" Required>
                                 @if ($errors->has('oldpassword'))
                                 <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>New password<span style="color:red;"> *</span></label>
                                 <input type="password" id="Password1" name="password" class="form-control" Required>
                                 @if ($errors->has('password'))
                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Confirm New password<span style="color:red;"> *</span></label>
                                 <input id="Password2" type="password" name="password_confirmation" class="form-control" Required>
                              </div>
                           </div>
                        </div>
                        <div>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to change your Password?</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-footer">
                                       <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                       <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </form>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Update</button>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                     <h3 class="mb-4">Security Question</h3>
                     <div class="row">
                        <div class="col-6">
                           <form action="/settings/three" method="post">
                              @csrf 
                              @method('post')
                              <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" hidden> 
                              <div class="form-group">
                                 <label>Question 1<span style="color:red;"> *</span></label>
                                 <select id="question1" name="question1" class="form-select form-control" required>
                                    <option value="" selected disabled>Choose One</option >
                                    @foreach($questions as $question)
                                    <option value="{{$question->id}}" >{{$question->question}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Answer 1<span style="color:red;"> *</span></label>
                                 <input type="text" id="answer1" name="answer1" class="form-select form-control" required>
                              </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                        <label>Question 2<span style="color:red;"> *</span></label>
                        <select id="question2" name="question2" class="form-select form-control" required> 
                        <option value="" selected disabled>Choose One</option >
                        @foreach($questions as $question)
                        <option value="{{$question->id}}" >{{$question->question}}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Answer 2<span style="color:red;"> *</span></label>
                        <input type="text" id="answer2" name="answer2" class="form-select form-control" required>
                        </div>
                        </div>
                     </div>
                     <div>
                     <input type="submit" class="btn btn-primary">
                     </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script>
         $('#Password1').passtrength({
           minChars: 8,
           tooltip:true,
           textWeak:"Weak",
           textMedium:"Medium",
           textStrong:"Strong",
           textVeryStrong:"Very Strong",
           eyeImg : "{{ asset('images/eye.svg') }}"
         });
         $('#Password2').passtrength({
           minChars: 8,
           tooltip:true,
           textWeak:"Weak",
           textMedium:"Medium",
           textStrong:"Strong",
           textVeryStrong:"Very Strong",
           eyeImg : "{{ asset('images/eye.svg') }}"
         });
         
         $('#username').keyup(function(){
         var name=$('#username').val();
         console.log($('#username').val());
           $.ajax({
                 url: "/admin/employee/employeeUsername",
                 type:"GET",
                 data:{
                     name: name,
                 },
                 success:function(data){
                   var count = data.length;
                   console.log('count' . $count );
                   if(count==1){
                     $('#UsernameError').removeClass('d-none');
                   }else{
                     $('#UsernameError').addClass('d-none');
                   }
                 },
                 error: function(error) {
                  console.log(error);
                 }
                });
         });
            imgInp.onchange = evt => {
                  const [file] = imgInp.files
                  if (file) {
                  blah.src = URL.createObjectURL(file)
                  }
                  if(imgInp.files[0].size > 2000000){
                  alert("Image is too big!");
                  imgInp.value = "";
                  console.log('image size');
                  
               };
                  };
         
         
         
         
         
         $('#question1').change(function(){
         var q1=$('#question1').val();
         console.log(q1);
         
         $.ajax({
                 url: "/forgotpass/question1",
                 type:"GET",
                 data:{
                     q1: q1,
                 },
                 success:function(data){
                     var $el = $("#question2");
                     $el.empty(); // remove old options
                     $el.append($("<option disable>Choose One</option>"));
                     $.each(data, function(key,value) {
                     console.log(value);
                     $el.append($("<option></option>")
                         .attr("value", value['id']).text(value['question']));
                     });
                 },
                 error: function(error) {
                  console.log(error);
                 }
                });
         });
         
         
         
                  
               
      </script>
      @jquery
      @toastr_js
      @toastr_render
   </body>
</html>