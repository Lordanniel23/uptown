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
   /* change if the mask should have another color then white */
   z-index: 99;
   /* makes sure it stays on top */
   }
   #status {
   width: 200px;
   height: 200px;
   position: absolute;
   left: 50%;
   /* centers the loading animation horizontally one the screen */
   top: 50%;
   /* centers the loading animation vertically one the screen */
   background-image: url('/logo.gif');
   /* path to your loading animation */
   background-repeat: no-repeat;
   background-position: center;
   margin: -100px 0 0 -100px;
   /* is width and height divided by two */
   }
   .fixed-sidebar .app-main .app-main__outer {
   z-index: 9;
   padding-left: 290px!important;
   padding-top: 50px!important;
   padding: 100px;
   }
</style>
<div>
   <div class="dropdown">
         <a href="#" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2"  data-bs-toggle="modal" data-bs-target="#createmodal" style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important">Add Discount</a>
   </div>
</div>

<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<div style="width: 70%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width: 70%;">
      <style>
         * {
         box-sizing: border-box;
         }
         .zoom {
         transition: transform 0.2s;
         margin: 0 auto;
         }
         .zoom:hover {
         -ms-transform: scale(1.5); /* IE 9 */
         -webkit-transform: scale(1.5); /* Safari 3-8 */
         transform: scale(3.5);
         }
      </style>
      <thead>
         <tr>
            <th>
               <center>Name</center>
            </th>
            <th>
               <center>Discount</center>
            </th>
            <th>
               <center>Abbreviation</center>
            </th>
            <!-- <th><center>Status</center></th> -->
            <th>
               <center>Action</center>
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach($discounts as $discount)
         <tr>
            <td>
               <center class="p-1"><span >{{$discount->name}}</span></center>
            </td>
            <td>
               <center class="p-1"><span >{{$discount->Percentage}} %</span></center>
            </td>
            <td>
               <center class="p-1"><span >{{$discount->abbr}}</span></center>
            </td>
            <td>
               <center>
                  <!-- <a href="/admin/discount/{{$discount->id}}/edit" class="edit"><button type="button" class="btn btn-primary rounded">Edit</button></a> -->
                  <a href="#editEmployeeModal" class="edit editButton" id="{{$discount->name}}" discount="{{$discount->Percentage}}" data-id="{{$discount->id}}"><button type="button"  class="btn btn-primary rounded" data-bs-toggle="modal"   data-bs-target="#editmodal">Edit</button></a>
                  <a href="#deleteEmployeeModal"  class="delete archiveButton" id="{{$discount->name}}" data-id="{{$discount->id}}"><button type="button"  class="btn btn-warning" data-bs-toggle="modal"   data-bs-target="#exampleModal">Archive</button></a>
               </center>
            </td>
            @endforeach
         </tr>
      </tbody>
   </table>
</div>
<!-- Button Archived modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>  Are you sure you want to achive  <u><span class="namemenu" style="font-weight:bold"></span></u>  ?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="archive" action="" method='POST'>
               @csrf
               @method('DELETE')
               <input type="number" name="id" value="" hidden>
               <input type="submit" class="btn btn-warning" value="Archived">
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Button create modal -->
<div class="modal fade" id="createmodal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel"><b>Create New Discount</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="/admin/discount/stored" method='POST'>
               @csrf 
               @method('POST')
               <div class="container" >
                  <div class="row"  style="padding-bottom:1em;">
                     <div class="col-4">
                        <label for="name">Name<span style="color:red;"> *</span></label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="text" step="0.01" name="name" required>
                     </div>
                  </div>
                  <div class="row" style="padding-bottom:1em;">
                     <div class="col-4">
                        <label for="discount">Discount<span style="color:red;"> *</span></label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="number" step="0.01" name="discount" min=0 max=100 required>
                     </div>
                  </div>
                  <div class="row" style="padding-bottom:1em;">
                     <div class="col-4">
                        <label for="discount">Abbreviation<span style="color:red;"> *</span></label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="text" step="" name="abbr" min=0 max=100 required>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="number" name="id" value="" hidden>
                  <input type="submit" class="btn btn-success" value="Confirm">
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Button edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel"><b>Edit  <u><span class="nameedit" style="font-weight:bold"></span></u></b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form id="editform" action="" method='POST'>
               @csrf @method('get')
               <div class="container" >
                  <div class="row">
                     <div class="col-4">
                        <label for="name">Name</label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="text" step="0.01" name="name" id="name" value="" required>
                     </div>
                  </div>
                  <div class="row" style="padding-bottom:1em;">
                     <div class="col-4">
                        <label for="discount">Discount</label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="number" step="0.01" id="discount" name="discount" min=0 max=100 required>
                     </div>
                  </div>
                  <div class="row" style="padding-bottom:1em;">
                     <div class="col-4">
                        <label for="discount">Ab</label>
                     </div>
                     <div class="col-8">
                        <input class="form-control" type="text" id="abbr" name="abbr" min=0 max=100 required>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="number" name="id" value="" hidden>
                  <input type="submit" class="btn btn-success" value="Confirm">
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(".arch").on("click", function (e) {
     e.preventDefault();
     var id = $(this).attr("data-id");
     $("#archiveds").attr("action", "/admin/table/1");
     $("#archivedsid").attr("value", id);
     console.log(id);
   });
   $(document).ready(function () {
       
       $("#example").DataTable({
           "searching": false,
       });
   });
   
   $('.archiveButton').on('click', function(e) {
     e.preventDefault();
   var id = $(this).attr("data-id");
   var name = $(this).attr("id");
   $(".namemenu").text(name);
     $('#archive').attr('action', "/admin/discount/"+id);
   console.log(id);
   });
   
   $('.edit').on('click', function(e) {
     e.preventDefault();
   var id = $(this).attr("data-id");
   var name = $(this).attr("id");
   var discount = $(this).attr("discount");
   $(".nameedit").text(name);
   $('#name').attr('value', name);
   $('#discount').attr('value', discount);
   $('#editform').attr('action', "/admin/discount/edit/"+id);
   console.log(test);
   });
   
   //active sidebar
   $(window).on('load', function() {
  $('#discount-pages').attr('class', "multi-level collapse show");
  $('#sidebardiscount').attr('class', "nav-item active");
  $('#discspan').attr('aria-expanded', "true");
   document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Discount</li><li class='breadcrumb-item active'>Discount List</li>";
   document.getElementById("page-name").innerHTML += "Discount List";
   console.log("works");
   });
   $(window).on('load', function() { // makes sure the whole site is loaded 
   $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
   $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
   $('body').delay(300).css({'overflow':'visible'});
   })
</script>
@endsection