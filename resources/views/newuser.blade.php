<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>UptownGrill</title>
    <link rel="shortcut icon" href="{{url('/logo.png')}}" />
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/text.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/passtrength.css') }}">

   </head>
<body>
  

<div style="height:4em;"></div>
    <div class="home-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">Finish Account Setup</div>
                <div class="card-body">
                    <form method="POST" action="/newuser/{{Auth::user()->id}}" enctype="multipart/form-data" >
                        @csrf 
                        @method('post')
                        <div class="row mb-4">
                            <sdiv class="col-md-4">
                                <center><img src="{{Auth::user()->image}}" style="width: 20em;" alt="" /></center>
                                <div class="mb-3">
								<center><br><label for="formFile" class="">Update Image</label><br><br></center>
									<input class="form-control" name="image[]" type="file" id="formFile" accept="image/*" placeholder="">
                                    <center><span class="text-danger ">file size must be less than 2mb</span></center>
								</div>
                            </sdiv>
                            <div class="col-md-7">
                            <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus disabled/>
                                        <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" required autocomplete="name" hidden />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Username<span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <input  type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required autocomplete="name" autofocus/>
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" value="" required autocomplete="name" autofocus required/>
                                    @if(session()->has('wrongpass'))
                                        <div class=" alert-warning">
                                            {{ session()->get('wrongpass') }}
                                        </div>
                                    @endif
    
                                </div>
                                </div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3">
                                    <label for="password1" class="col-md-4 col-form-label text-md-right">New Password <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <input id="password1" type="password" class="form-control" name="password1" value="" required autocomplete="name" autofocus/>
                                        @if ($errors->has('password1'))
                                            <span class="text-danger">{{ $errors->first('password1') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Repeat Password  <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="password2" type="password" class="form-control" name="password2" value="" required autocomplete="name" autofocus />
                                    <span class="text-danger d-none " id="passwordError">Password does not match!</span>

                                    @if ($errors->has('password2'))
                                        <span class="text-danger">{{ $errors->first('password2') }}</span>
                                    @endif 
                                    </div>
                                </div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 1 <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <select id="question1" name="question1" class="form-select form-control" required> 
                                            <option value="" selected disabled>Choose One</option>
                                            @foreach($questions as $question)
                                            <option value="{{$question->id}}" >{{$question->question}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 1 <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="answer1" type="text" class="form-control" name="answer1" value="" required autocomplete="name" autofocus required/>
                                    @if ($errors->has('answer1'))
                                        <span class="text-danger">{{ $errors->first('answer1') }}</span>
                                    @endif 
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 2 <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                        <select id="question2" name="question2" class="form-select form-control" required>
                                            <option value="" selected disabled>Choose One</option >
                                            @foreach($questions as $question)
                                            <option value="{{$question->id}}" >{{$question->question}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 2 <span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="answer2" type="text" class="form-control" name="answer2" value="" required autocomplete="name" autofocus required/>
                                    @if ($errors->has('answer2'))
                                        <span class="text-danger">{{ $errors->first('answer2') }}</span>
                                    @endif 
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                    <a href="{{ url('/logout') }}"><button type="button" class="btn btn-secondary">Log Out</button></a>
                                    <a href="#updateEmployeeModal"  data-id="{{Auth::user()->id}}"><button type="button" id="savecreate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Finish</button></a>

                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Reminder</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Write down your security question somewhere. This is needed if you forgot your password.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Finish Setup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


<!-- end modal -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery.passtrength.js') }}" ></script>
<script>
$('#password1').passtrength({
     minChars: 8,
     tooltip:true,
     textWeak:"Weak",
     textMedium:"Medium",
     textStrong:"Strong",
     textVeryStrong:"Very Strong",
     eyeImg : "{{ asset('images/eye.svg') }}"
   });
   $('#password2').passtrength({
     minChars: 8,
     tooltip:true,
     textWeak:"Weak",
     textMedium:"Medium",
     textStrong:"Strong",
     textVeryStrong:"Very Strong",
     eyeImg : "{{ asset('images/eye.svg') }}"
   });

   // password equal test
   $('#password2').keyup(function(){
   var pass1=$('#password1').val();
   var pass2=$('#password2').val();
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
   
   $('#password1').keyup(function(){
   var pass1=$('#password1').val();
   var pass2=$('#password2').val();
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
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
</script>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>


@toastr_css
@toastr_js
@toastr_render

