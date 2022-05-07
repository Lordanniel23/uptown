@extends('admin/body.body') @section('content')
<style>
   body {
   overflow: hidden;
   }
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
</style>


<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<div>
   <div class="dropdown">
         <a href="/admin/submenu" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2">Submenu List</a>
   </div>
</div>

<div style="width: 50%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width:100%">
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Name</center></th>
            <th><center>Price</center></th>
            <th><center>Action</center></th>
         </tr>
      </thead>
      <tbody>
         @foreach($submenus as $menu)
            <tr>
               <td>
                  <div class="cropped zoom">
                     <img class="rounded mx-auto d-block" src=" /{{$menu->image}}" style="height:50px;max-width:100px">
                  </div>
               </td>
               <td>{{$menu->name}}</td>
               <td>₱ {{$menu->price}}</td>
               <td>
                  <center>
                     <a href="#deleteEmployeeModal" class="delete archiveButton" data-id="{{$menu->id}}" id="{{$menu->name}}"><button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Restore</button></a>
                  </center>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
</div>


 
<!-- archive -->
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>  Are you sure you want to Restore <u><span class="namesubmenu" style="font-weight:bold"></span></u>  ?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="archive" action="" method='POST'>
               @csrf
               @method('get')
               <input type="number" name="id" value="" hidden>
               <input type="submit" class="btn btn-success" value="Restore">
            </form>
         </div>
      </div>
   </div>
</div>


<script>
   //archived
   $('.archiveButton').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var name = $(this).attr("id");
        $(".namesubmenu").text(name);
        $('#archive').attr('action', "/admin/submenu/restore/"+id);
   	  console.log(id);
   });

   $(document).ready(function() {
       $('#example').DataTable( {
         "columnDefs": [
       { "width": "10%", "orderable": false,  "targets": 0 },
       { "width": "5%",  "orderable": false,  "targets": 3 },
       { "width": "20%", "targets": 1 },
       { "width": "10%", "targets": 2 },
     ] ,
     "order": [[ 1, "asc" ]],
       } );
   } );
   //active sidebar
   $(window).on('load', function() {
     $('#menu').attr('class', "multi-level collapse show");
     $('#menuspan').attr('aria-expanded', "true");
     $('#sidebararchsub').attr('class', "nav-item active");
     $('#submenu-pages').attr('class', "multi-level collapse show");
     $('#menulistspan').attr('aria-expanded', "true");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Menus</li><li class='breadcrumb-item active'>Submenu</li><li class='breadcrumb-item active' aria-current='page'>Archived Submenu</li>";
     document.getElementById("page-name").innerHTML += "Archived Submenu";
   	console.log("works");
   });

   $(window).on('load', function() { // makes sure the whole site is loaded
     $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation
     $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
     $('body').delay(300).css({'overflow':'visible'});
   });




</script>
@endsection
