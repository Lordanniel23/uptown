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
   * {box-sizing: border-box;}
         .zoom {transition: transform 0.2s;margin: 0 auto;}
         .zoom:hover {-ms-transform: scale(1.5); /* IE 9 */-webkit-transform: scale(1.5); /* Safari 3-8 */transform: scale(3.5);}
</style>
<div class="py-4">
   <div class="dropdown">
      <a class="btn btn-gray-800 d-inline-flex align-items-center me-2"   style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important" href="/admin/discount">
      Discount List

      </a>
   </div>
</div>
<div id="preloader">
   <div id="status">&nbsp;</div>
</div>
<div style="width: 70%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width: 70%;">

      <thead>
         <tr>
            <th>
               <center>Name</center>
            </th>
            <th>
               <center>Discount</center>
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
               <center>
                  <a href="#deleteEmployeeModal"  class="delete archiveButton" id="{{$discount->name}}" data-id="{{$discount->id}}"><button type="button"  class="btn btn-success" data-bs-toggle="modal"   data-bs-target="#exampleModal">Restore</button></a>
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
            <p>  Are you sure you want to Archive menu: <u><span class="namemenu" style="font-weight:bold"></span></u>  ?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="archive" action="" method='POST'>
               @csrf
               @method('POST')
               <input type="number" name="id" value="" hidden>
               <input type="submit" class="btn btn-warning" value="Archived">
            </form>
         </div>
      </div>
   </div>
</div>

<script>

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
     $('#archive').attr('action', "/admin/discount/restore/"+id);
   console.log(id);
   });
   //edit
   //active sidebar
   $(window).on('load', function() {
    $('#discount-pages').attr('class', "multi-level collapse show");
  $('#sidebararchivediscount').attr('class', "nav-item active");
  $('#discspan').attr('aria-expanded', "true");
   document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Discount</li><li class='breadcrumb-item active'>Archived Discount</li>";
   document.getElementById("page-name").innerHTML += "Archived Discount ";
   console.log("works");
   });
   $(window).on('load', function() { // makes sure the whole site is loaded 
   $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
   $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
   $('body').delay(300).css({'overflow':'visible'});
   })
</script>
@endsection