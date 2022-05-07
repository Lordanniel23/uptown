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

   </head>
<body>
  

<div style="height:4em;"></div>
    <div class="home-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">Recover Account</div>
                <div class="card-body">
                    <form method="POST" action="/forgotpassword/check">
                        @csrf 
                        @method('post')


                            <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" required autocomplete="name" autofocus disabled/>
                                    </div>
                                </div>
                     
                                <div class="row mb-3"></div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 1</label>
                                    <div class="col-md-8">
                                        <select name="question1" class="form-select form-control" required> 
                                        <option value="" selected disabled>Choose One</option >
                                            @foreach($questions as $question)
                                            <option value="{{$question->id}}" >{{$question->question}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 1<span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="answer1" type="text" class="form-control" name="answer1" value="" required autocomplete="name" autofocus required/>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Security Question 2</label>
                                    <div class="col-md-8">
                                        <select name="question2" class="form-select form-control" required>
                                        <option value="" selected disabled>Choose One</option >
                                            @foreach($questions as $question)
                                            <option value="{{$question->id}}" >{{$question->question}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Security Answer 1<span style="color:red;">*</span></label>
                                    <div class="col-md-8">
                                    <input id="password2" type="text" class="form-control" name="answer2" value="" required autocomplete="name" autofocus required/>
                                    </div>
                                </div>
                                
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="#updateEmployeeModal" data-id=""><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Check</button></a>

                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Warning</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       Write down your security question somewhere. this is needed if you forgot your password
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
                    </form>


<!-- end modal -->

            <script>
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

