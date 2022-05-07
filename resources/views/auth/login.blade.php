<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Uptown</title>
      <!-- Scripts -->
      <link rel="shortcut icon" href="{{url('/logo.png')}}" />
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/jquery.js') }}" defer></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      {{-- 
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
   </head>
   <body >
      <div class="d-flex justify-content-center  pt-2 pt-lg-5 bodyHolder">
         <div class="login-box text-center mt-5">
            <div>
               <img class="logoImg" src="/images/logo1.png"  alt="">
               <h2>UPTOWN <span >GRILL</span></h2>
               <h5>UNLIMITED KOREAN BARBEQUE</h5>
            </div>
            <div class="bodies mt-3">
               <h3 style="text-align: center; font-style: normal;
                  font-weight: 600;
                  font-size: 47px;
                  line-height: 32px;
                  /* identical to box height */
                  color: #000000;">Hello <br>
                  <span style="font-size: 15px; font-style: normal;
                     font-weight: normal;
                     font-size: 21px;
                     line-height: 27px;">Log in to your Account</span><br><br>
               </h3>
               <h5 style="color: gray; text-align: center;"></h5>
               <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="user-box">
                     <input  id="username" type="text" class="form-control rounded-0 @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="Username" autofocus>
                     <label class="required">{{ __('Username ') }}</label>
                  </div>
                  <div class="user-box">
                     <input id="password" type="password" class="form-control  rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                     <label class="required">{{ __('Password') }}</label>
                     @if ($errors->has('username'))
                     <span class="text-danger">{{ $errors->first('username') }}</span>
                     @endif
                     @if(session()->has('message'))
                     <div class="alert alert-success">
                        {{ session()->get('message') }}
                     </div>
                     @endif
                  </div>
                  <button id="submit" type="submit" class="btn w-100" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.12); margin-top:1rem; margin-bottom:1rem; border:  2px solid #FD7B15;color: white;padding: 10px 55px;border-radius: 13px;background-color:#FD7B15 ;font-weight: 600;
                     font-size: 19px; ">Log In</button>
                  <div class="row">
                     <div class="col-xl-6">
                        <div class="form-check" style=" float: left">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label class="form-check-label" for="remember">
                           {{ __('Remember Me') }}
                           </label>
                        </div>
                     </div>
                     <div class="col-xl-6">
                        <a style=" float: right;text-decoration:none" href="/forgotpassword" class="text-reset">Forgot Password?</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script>
         $( "#submit" ).click(function() {
                console.log("CLicked");
                console.log($('#username').val());
                console.log($('#password').val());
         if($('#username').val() == null){
            console.log("Not Null");
         }else{
            console.log(" null");
         }
               });
      </script>
      <script src="./js/app.js"></script>
      <script>
         $('#notif').hide();
           function notif(){
              // $('.notifBtn').click(function() {
               $("#notif").show().delay(2000).fadeOut();
          // })
         }
         
         
      </script>
   </body>
</html>
@toastr_css
@toastr_js
@toastr_render