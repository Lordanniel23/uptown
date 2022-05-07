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

<div style="height:10em;"></div>
    <div class="home-content">
<div class="container" style="padding-left: 20em!important;padding-top: 0em!important;padding-right: 20em!important;">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="POST" action="/changepassword/check">
                        @csrf 
                        @method('post')
                        <div class="row mb-3">
                            <div class="row mb-3"></div>
                            <h4 style="padding-left:1em!important">Good day , 
                            <?php $id = Session::get('ids') ?>
                            @foreach($users as $user)
                              @if($user->id == $id)
                                {{$user->name}}
                              @endif
                              @endforeach
                            !</h4>
                            <div class="row mb-3"></div>
                            <div class="row mb-3"></div>
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password <span style="color:red;"> *</span></label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="id" value="{{Session::get('ids');}}" required autocomplete="name" hidden/>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="name" autofocus required/>
                                    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password<span style="color:red;"> *</span></label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="" required autocomplete="name" autofocus required/>
                                    <span class="text-danger d-none " id="passwordError">Password does not match!</span>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $password_confirmation }}</strong>
                                    </span>
                                @enderror

                                </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                    <input type="submit" id="savecreate" class="btn btn-success" value="Change Password">

                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                    </div>
                                </div>
                    </form>


<!-- end modal -->
<script src="{{ asset('js/jjquery.js') }}" ></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.passtrength.js') }}" ></script>
<script>        





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

</body>
</html>


@toastr_css
@toastr_js
@toastr_render
