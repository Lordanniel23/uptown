@extends('layouts.app')

@section('content')

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>
<body> --}}

    <div class="container">
        <input type="text" id="username" placeholder="Input Username">
        <div id=messages></div>
        <form action="" id="message_form">
            <input class="form-control" type="text" name="" id="message_input" placeholder="Message">
            <button class="btn btn-primary" type="submit" id="message_send">Send Message</button>
        </form>
    </div>


    <script src="./js/app.js"></script>
    <script>
       const messages= document.getElementById('messages');
const username_input= document.getElementById('username');
const messages_input= document.getElementById('message_input');
const message_form= document.getElementById('message_form');

message_form.addEventListener('submit', function(e){
    e.preventDefault();
    const options={
        method:'post',
        url:'send-message',
        data:{
            username:username_input.value,
            message:messages_input.value
        },
        transformResponse: [(data)=> {
            return data;
        }]
    }
    axios(options);
});

    //  Echo.channel('chat')
    //  .listen('.message', (e)=>{

    //     console.log(e);
    //     messages.innerHTML +='<div><strong>'+e.username+'</strong>'+e.message+'</div>';
    //  })
    </script>



@endsection
