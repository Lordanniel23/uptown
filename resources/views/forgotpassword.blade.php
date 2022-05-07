<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>UptownGrill</title>
    <link rel="shortcut icon" href="{{url('/logo.png')}}" />
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/text.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
   </head>
<body>
  

<div style="height:10em;"></div>
    <div class="home-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card" style="width: 60%; margin-left: auto; margin-right: auto;">
                <div class="card-header"><h4>Recover Account</h4> </div>
                <div class="card-body">
                    <form method="POST" action="/forgotpassword/check">
                        @csrf 
                        @method('post')
                            <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Username<span style="color:red;"> *</span></label>
                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control rounded-0 @error('email') is-invalid @enderror" name="username" value="" required autocomplete="name" autofocus/>
                
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div> 
                     
                                <div class="row mb-3"></div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 1<span style="color:red;"> *</span></label>
                                    <div class="col-md-8">
                                        <select id="question1" name="question1" class="form-select form-control" required> 
                                        <option value="" selected disabled>Choose One</option >
                                            @foreach($questions as $question)
                                            <option value="{{$question->id}}" >{{$question->question}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 1<span style="color:red;"> *</span></label>
                                    <div class="col-md-8">
                                    <input id="answer1" type="text" class="form-control" name="answer1" value="" required autocomplete="name" autofocus required/>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 2<span style="color:red;"> *</span></label>
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
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 2<span style="color:red;"> *</span></label>
                                    <div class="col-md-8">
                                    <input id="password2" type="text" class="form-control" name="answer2" value="" required autocomplete="name" autofocus required/>
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="/"data-id=""><button type="button" class="btn btn-secondary" >Back</button></a>
                                        <a href="#updateEmployeeModal" data-id=""><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Check</button></a>

                                        <!-- Button trigger modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Continue?</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </form>

<!-- end modal -->

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>        

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

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

</body>
</html>

@toastr_css
@toastr_js
@toastr_render

