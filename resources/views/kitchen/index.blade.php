@extends('layouts.app')

@section('content')
@toastr_css

<button  class="btn btn-primary mt-5 py-2 px-3 ml-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <div class="legendItem text-center">
                <p>Menu</p>
            </div>
 </button>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kitchen') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
    {{-- <div class="d-flex justify-content-between kitchenDetails rounded bg-warning p-2">
        <div class="">
            <h5>Orders: <span id="OrderCount">1</span></h5>
        </div>
        <div class="">
            <button class="btn btn-primary">Menu</button>
        </div>
    </div> --}}
    <div class="row ordersTable pt-4 g-2">
    <div class="col-2 ticketCard d-none" id="ticketTable">
            <div class="card shadow">
                <h5 class="card-header orderHead bg-primary text-white tableNumber" >Table  </h5>
                <div class="card-body">
                  <table class="table table-responsive menuTables" id="menuTable">
                    <thead>
                      <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody >
                            <tr  class="menuList menuList" id="menuList">
                              <td></td>
                              <td></td>
                              {{-- <td><input class="form-check-input" type="checkbox" name="" id=""></td> --}}
                            </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer p-0">
                    <button class="btn btn-success w-100 ready" id="ready" data-id="">Make all ready</button>
                </div>
              </div>
        </div>


      <!-- start ticket -->
      @foreach($tables as $table)
        @if($table->status_id==2 )
        <div class="col-2 ticketCard" id="ticketTable{{ $table->tablename}}">
            <div class="shadowContainer">
                <div class="card-header orderHead{{ $table->tablename}} bg-primary ">
                    <div class="row">
                        <div class="col-6"><h5 class=" textt-white tableNumber text-white" >Table {{ $table->tablename}}<h5> </div>
                        <div class="col-6"><p class=" text-white text-end" >Ticket #: {{ $table->tiket_id}}</p> </div>
                    </div>
                </div>
                <div class="card-body">

                  <table class="table table-responsive menuTables text-right tablescroll" id="menuTable{{ $table->tablename}}">
                    <div class="messageContainer{{ $table->tablename}} d-none" id="messageContainer">
                        <p class="text-danger text-center ">"Before proceeding, please finish all orders!"</p>

                    </div>
                    <thead>
                      <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody >
                      @if($table->status_id == 2)
                      @foreach($table->menu as $menu)
                            <tr  class="menuList menudisable{{$menu->id}}{{$table->id}}  menuList{{ $table->tablename}}" id="menuList{{ $table->tablename}}">
                              <td>{{$menu->name}}</td>
                              <td>{{$menu->total}}</td>
                              <td>
                                <div class="form-check">
                                    <input type="hidden" id="menu{{ $menu->id}}" value="{{ $menu->id }}">
                                    <input type="hidden" id="tick{{ $menu->id}}" value="{{ $table->tiket_id}}">
                                     <input type="hidden" id="tableName{{ $menu->id}}" value="{{ $table->id}}">
                                    <input class="form-check-input tableDisable{{ $menu->id }}{{$table->id}} tableCheck{{$table->id}}" type="checkbox" value="{{ $table->id}}" onclick="senOrder1(this.id)"  id="{{ $menu->id}}" >
                                </div>
                            </td>
                              {{-- <td><input class="form-check-input" type="checkbox" name="" id=""></td> --}}
                            </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
                <div class="card-footer p-2 bg-white">
                    {{-- <button class="btn btn-primary w-100 p-2 startticket" onclick="startTiket(this.id)" id="start{{ $table->tablename}}" data-id="{{ $table->tablename}}">Start</button> --}}
                    <button class="btn btn-success w-100  ready" onclick="ready(this.id)" id="ready{{ $table->tablename}}" data-id="{{ $table->tablename}}" >Orders Complete</button>
                </div>
              </div>
        </div>
        @endif
      @endforeach
        <!-- end ticket -->
    </div>
</div>


<!-- Modal disable menu -->
<div class="myModal modal modal-fullscreen-xxl-down" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog  modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Disable Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body bg-light">
             <div class="row p-2 ">
                <input class="form-control w-50 " type="text" id="myInput" type="text" placeholder="Search for menus..">
             </div>
             <div class="disablemenuEdit">
                    <div class="row py-3">
                       <h5>Do you want to disable this <span class="menuNameedit"></span>?</h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="closemenuEdit btn btn-outline-danger w-100 px-2">No</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary  disableMenubtn w-100 px-2">Yes</button>
                        </div>
                    </div>
             </div>
             <div class="enablemenuEdit">
                <div class="row py-3">
                   <h5>Do you want to enable this <span class="menuNameedit"></span>?</h5>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button class="closemenuenaEdit btn btn-outline-danger w-100 px-2">No</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary enableMenubtn  w-100 px-2">Yes</button>
                    </div>
                </div>
         </div>

         <div class="menus  pt-3">
                     <div class="row g-3 g-lg-4">
                        @foreach ($menus as $menu)
                        @if ($menu->Status_id==1)
                        <div class="col-4 col-lg-3 col-xl-2" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">

                        <button  data-id="{{$menu->id}}"  id="{{$menu->name}}" class="menuitem{{$menu->id}} menuupdate menuItem archiveButton disableMenuBtnfunction btn shadowContainer px-2 py-1">
                            <span id="span{{$menu->id}}" class="notAvailableText d-none">
                                Not Available
                                </span>
                            <div class="menuImgContainer ">
                                 <img  src="{{$menu->image}}" alt="menu image">
                              </div>
                              <div class="menuDetails mt-3">
                                 <p class="menuName">{{$menu->name}}</p>
                                 <p class="menuPrice">₱{{$menu->price}}</p>
                              </div>
                           </button>
                        </div>
                        @elseif ($menu->Status_id==2)
                        <div class="col-4 col-lg-3 col-xl-2" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">

                        <button  data-id="{{$menu->id}}"  id="{{$menu->name}}" class="menuitem{{$menu->id}} menuupdate archiveButtonenable menuItem enableMenuBtnfunction  btn shadowContainer px-2 py-1 notAvailableMenu">
                              <span id="span{{$menu->id}}" class="notAvailableText">
                              Not Available
                              </span>
                              <div class="menuImgContainer ">
                                 <img  src="{{$menu->image}}" alt="menu image">
                              </div>
                              <div class="menuDetails mt-3">
                                 <p>{{$menu->name}}</p>
                                 <p class="menuPrice">₱ {{$menu->price}}</p>
                              </div>
                           </button>
                        </div>
                        @endif
                        @endforeach
                     </div>
                  </div>
            </div>
      </div>
   </div>
</div>
<!-- confirmation menu disable -->
{{-- <div class="myModal modal" id="disableconfirm" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to mark <u><span class="namemenu"></span></u> as Unavailable ?
      </div>
      <div class="modal-footer">
		  <button type="button" class="mudal btn btn-secondary" data-bs-dismiss="modal">No</button>
		  <form id="disablemenuu" action="" method="POST">
        @csrf
        @method('Post')
        <input type="submit" class="btn btn-warning" value="Yes">
        </form>
	</div>
    </div>
  </div>
</div> --}}
<!-- confirmation menu enable -->
{{-- <div class="myModal modal" id="enableconfirm" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Do you want to mark <u><span class="namemenu"></span></u> as Available ?

      </div>
      <div class="modal-footer">
		  <button type="button" class="mudal btn btn-secondary" data-bs-dismiss="modal">No</button>
		  <form id="enabledconfirm" action="" method="POST">
        @csrf
        @method('Post')
        <input type="submit" class="btn btn-warning" value="Yes">
        </form>
	</div>
    </div>
  </div>
</div> --}}



<style>
.modal-backdrop {position: inherit!important;}
.modal-backdrop.show {opacity: 0;}
.modal-content {border: 7px solid rgba(0, 0, 0, 0.2)!important;}
.namemenu {font-weight: bold;}
</style>
<!-- disable menu -->
<script>
//   $('.menuupdate').on('click', function(e) {
//       e.preventDefault();
// 	  var id = $(this).attr("id");
//      $(".namemenu").text(id);
// 	  console.log(id);
// });
//    $('.archiveButton').on('click', function(e) {
//       e.preventDefault();
// 	  var id = $(this).attr("data-id");

//       $('#disablemenuu').attr('action', "/kitchen/disable/"+id);
// 	  console.log(id);
// });
// $('.archiveButtonenable').on('click', function(e) {
//       e.preventDefault();
// 	  var id = $(this).attr("data-id");

//       $('#enabledconfirm').attr('action', "/kitchen/enable/"+id);
// 	  console.log(id);
// });

</script>
<script src="./js/app.js"></script>
          <script>
            //     Echo.channel('createOrder')
            //   .listen('.createOrder', (e)=>{
            //     success(e.table,e.menuOnly[0]['name']);
            //   });

              Echo.channel('deliveryEvent')
              .listen('.deliveryEvent', (e)=>{
                console.log(e);

              });


              Echo.channel('createTicket')
              .listen('.createTicket', (e)=>{
                // ticketSuccess(e.table);
                console.log(e.table);
                if(e.status.length==1){

                }else if(e.status.length==0 && e.status.length!=1){
                  var lastid=$('.ticketCard:last').attr('id');
                  var elem = document.querySelector('#'+lastid);
                  var clone = elem.cloneNode(true);
                  clone.id = 'ticketTable'+e.table;
                  elem.after(clone);
                  $('.tableNumber:last').attr("id",'t'+e.table);
                  $('#t'+e.table).html('Table '+e.table);
                  $('.menuTables:last').attr("id",'menuTable'+e.table);
                  $('.startticket:last').attr("id",'start'+e.table);
                  $('.startticket:last').attr("data-id",+e.table);
                  $('.ready:last').attr("id",'ready'+e.table);
                  $('.ready:last').attr("data-id",+e.table);
                  $('.menuList:last').attr("id",'menuList'+e.table);
                  $('#menuTable'+e.table+' .menuList').remove();
                }
                document.getElementById('myaudio').play();
              });

              Echo.channel('confirmOrderEvent')
                .listen('.confirmOrderEvent', (e)=>{
                    location.reload();
                    document.getElementById('myaudio').play();
             });

             //hide message

             $('.ready').on('click', function(e){
               var table=$(this).attr('data-id');
               console.log(table);
               var TABLEID = table;

               var areAllChecked = !$(".tableCheck"+TABLEID).not(':checked').length;
                if (true == areAllChecked) {
                    const option1={
                    method:'post',
                    url:'readyOrder',
                    data:{
                        table_id:table
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }
                     axios(option1);
                }else{
                    $(".messageContainer"+TABLEID).removeClass('d-none');
                    console.log("not checked");
                }


             });

             Echo.channel('readyOrderEvent')
              .listen('.readyOrderEvent', (e)=>{
                console.log('click');
                $('#ticketTable'+e.table_id).remove();

              });

              Echo.channel('disablemenuEvent')
              .listen('.disablemenuEvent', (e)=>{
                console.log(e.menuitem);
                $('#span'+e.menuid).removeClass('d-none');
                $('.menuitem'+e.menuid).addClass('notAvailableMenu');
                $('.menuitem'+e.menuid).addClass('enableMenuBtnfunction');
                $('.menuitem'+e.menuid).removeClass('disableMenuBtnfunction');
                document.getElementById('myaudio').play();
                location.reload();
              });

              Echo.channel('enablemenuEvent')
              .listen('.enablemenuEvent', (e)=>{
                console.log("enable"+e.menuitem);
                $('#span'+e.menuid).addClass('d-none');
                $('.menuitem'+e.menuid).removeClass('notAvailableMenu');
                $('.menuitem'+e.menuid).removeClass('enableMenuBtnfunction');
                $('.menuitem'+e.menuid).addClass('disableMenuBtnfunction');
              });


            //   Ready funtion
              function ready(id){
                var table=$('#'+id).attr('data-id');
                console.log('test');
                console.log(table);
                var TABLEID =  table;

                var areAllChecked = !$(".tableCheck"+TABLEID).not(':checked').length;
                if (true == areAllChecked) {
                    const option1={
                    method:'post',
                    url:'readyOrder',
                    data:{
                        table_id:table
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                }
                axios(option1);
                messageCompleted(table);
                }else{
                    $(".messageContainer"+TABLEID).removeClass('d-none');
                    console.log("not checked");
                }



              }

              function startTiket(id){
                var tableid = $('#'+id).attr('data-id');

                //   $('#'+id).removeClass('btn-primary');
                //   $('#'+id).addClass('btn-success');
                //   $('.orderHead'+tableid).removeClass('bg-primary');
                //   $('.orderHead'+tableid).addClass('bg-success');
                  $('#ready'+tableid).removeClass('d-none');
                  $('#'+id).addClass('d-none');
                  console.log(tableid);
                  var TABLEID =  $('#'+id).attr('data-id');
                  console.log(TABLEID);
                //   disable check box
                  $(".tableCheck"+TABLEID).removeAttr("disabled").button('refresh');
                // $(".tableCheck"+TABLEID).change(function(){
                //     var a = $(".tableCheck"+TABLEID);
                //     if(a.length == a.filter(":checked").length){
                //             console.log("all check box is cheked");
                //             // $("#ready"+TABLEID).removeAttr("disabled").button('refresh');
                //     }
                // });


              }

              function senOrder1(id){

                  var menu_id = $('#menu'+id).val();
                  var table = $('#tableName'+id).val();
                  var tick_id = $('#tick'+id).val();
                  $(".tableDisable"+id+table).prop( "disabled", true ).button('refresh');
                //   $('.menudisable'+menu_id+table).addClass('disablemenu');
                  console.log("menu id:"+menu_id);
                  console.log("tableid :"+table);
                  console.log("ticket:"+tick_id);

                //   $.ajax({
                //     url:"/changeTOdeliveredKitchen",
                //     method:'POST',
                //     data: {
                //         "_token": $('meta[name="csrf-token"]').attr('content'),
                //         "ticket_id":tick_id,
                //         "menu_id":menu_id
                //     },
                //     success:function(result){
                //         console.log("menu id result :"+result);
                //     }


                // });
                const option1={
                    method:'post',
                    url:'deliveryEvent',
                    data:{
                        menu_id:menu_id,
                        ticket:tick_id
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }

                     axios(option1);



              }

              function messageCompleted(table){
                $('.successMessagage').removeClass('d-none');
                $('#NotifTable').html(table);
                $('.NotifTime').html(new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}));
                $('.NotifMenu').html("");
                var text='Order has been completed successfully on Table '+table;
                $('#mainText').html(text);
                $('.eventText').hide();
                $("#notif").show().delay(2000).fadeOut();

              }

              var $search = $("#myInput").on('input',function(){
                var matcher = new RegExp($(this).val(), 'gi');
                $('.menuItem').removeClass('d-none').not(function(){
                    return matcher.test($(this).find('.menuName').text())
                }).addClass('d-none');
             });

            var menuid = 0;
            $('.disablemenuEdit').hide();
            $('.enablemenuEdit').hide();

            $('.menuItem').click(function(){
                 menuid = $(this).attr('data-id');
                 console.log(menuid);
              
                 $('.menuNameedit').text($(this).attr('id'));     
                 
                 if($(this).hasClass('disableMenuBtnfunction')){
                    $('.disablemenuEdit').show();
                 }else{
                    $('.enablemenuEdit').show();
                 }

            });

            $('.closemenuEdit').click(function(){
                $('.disablemenuEdit').hide();
            })
            $('.closemenuenaEdit').click(function(){
                $('.enablemenuEdit').hide();
            })

            $('.disableMenubtn').click(function(){
                const option1={
                    method:'post',
                    url:'diablemenu',
                    data:{
                        menuid:menuid,
                        
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }

                     axios(option1);
                     $('.disablemenuEdit').hide();
                     
            });

            $('.enableMenubtn').click(function(){
                const option1={
                    method:'post',
                    url:'enablemenu',
                    data:{
                        menuid:menuid,
                        
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }

                     axios(option1);
                     $('.enablemenuEdit').hide();
                     
            });





          </script>
@jquery
@toastr_js
@toastr_render
@endsection
