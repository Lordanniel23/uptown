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
         <a href="#" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2"  data-bs-toggle="modal" data-bs-target="#createmodal">Create Submenu</a>
   </div>
</div>

<div style="width: 60%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width:100%">
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Name</center></th>
            <th><center>Price</center></th>
            <th><center>Status</center></th>
            <th><center>Action</center></th>
         </tr>
      </thead>
      <tbody>
         @foreach($submenus as $menu)
            @if($menu->status_id != 3)
            <tr>
               <td>
                  <div class="cropped zoom">
                     <img class="rounded mx-auto d-block" src=" /{{$menu->image}}" style="height:50px;max-width:100px">
                  </div>
               </td>
               <td>{{$menu->name}}</td>
               <td>₱ {{$menu->price}}</td>
               @foreach($status as $stats)
                  @if($menu->status_id == $stats->id)
                     @if($stats->id === 1)
                        <td style="color:green"><center>{{$stats->name}}</center></td>
                     @else
                        <td style="color:red"><center>{{$stats->name}}</center></td>
                     @endif
                  @endif
               @endforeach
               <td>
                  <center>


                     <a href="#" class="edit" subid="{{$menu->id}}" subname="{{$menu->name}}" subprice="{{$menu->price}}" subimage="{{$menu->image}}" substatus="{{$menu->status_id}}"><button type="button"  class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button></a>
                     <a href="#deleteEmployeeModal" class="delete archiveButton" data-id="{{$menu->id}}" id="{{$menu->name}}"><button type="button"  class="btn btn-warning" data-bs-toggle="modal"   data-bs-target="#exampleModal">Archive</button></a>
                  </center>
               </td>
            </tr>
         @endif
         @endforeach
      </tbody>
   </table>
</div>


<!-- Create !  -->
<div class="modal fade" id="createmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create New Submenu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" action="/admin/submenu/store" enctype="multipart/form-data">
               @csrf
               <div class="row">
                     <div class="col-md">
                        <div class="row mb-3">
                           <center><img class="img-fluid rounded mx-auto d-block" id="blahblah" style="max-height: 200px;" height="150px" src="/images/submenu.png" alt="No image Found"></center>
                     </div>
                     <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Choose Image<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <input class="form-control" name="image[]" type="file" id="imgcreate" accept="image/*">   
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Submenu Name<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <input type="text" id="name" class="form-control" name="name" value="" required autocomplete="name" autofocus require/>
                           <span class="text-danger d-none " id="menuErrorz">Submenu Name Already Exist</span>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <input type="number" class="form-control" name="price" value="" required autocomplete="name" autofocus />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
            <div class="dropdown me-1">
               <button type="button" class="btn btn-success" id="savecreate" >Save</button>
               <button class="btn btn-success" id="savecreates" hidden>Save</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>


<!-- EDIT !  -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title editmode" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" class="formedit" action=""  enctype="multipart/form-data">
               @csrf
               @method('put')
               <div class="row mb-4">
                  <div class="col-md-5">
                     <center><img class="img-fluid rounded mx-auto d-block" id="submenuimage" style="max-height: 200px;" height="150px" src='' alt="No image Found"></center>
                     <div class="mb-3">
                     </div>
                  </div>
                  <div class="col-md">
                  <div class="row mb-3 mt-5">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Update Image</label>
                        <div class="col-md-8">
                        <input class="form-control impzz" name="image[]" type="file" id="imgInp" accept="image/*">
                        <input class="form-control impzz" name="image[]" type="file" id="imagehidden" accept="image/*" hidden>

                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Submenu</label>
                        <div class="col-md-8">
                           <input id="submenuid" type="text" class="form-control" name="id" value=""  hidden/>
                           <input id="submenuname" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus require/>
                           <span class="text-danger d-none " id="menuErrora">Submenu Name Already Exist</span>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                        <div class="col-md-8">
                           <input id="submenuprice" type="number" class="form-control" name="price" value="" required autocomplete="name" autofocus />
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Submenu Status</label>
                        <div class="col-md-8">
                           <select  name="status" id="submenustatus" class="form-select form-control">
                           @foreach($status as $stat)
                              <option value="{{$stat->id}}" class="statusmenu{{$stat->id}}">{{$stat->name}}</option>
                           @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
            <div class="dropdown me-1">
               <button type="button" class="btn btn-success" id="saveedit" >Save</button>
               <button class="btn btn-success" id="saveedits" hidden>Save</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>


<!-- archive -->
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>  Are you sure you want to Archive <u><span class="namesubmenu" style="font-weight:bold"></span></u>  ?</p>
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


<script>
   //archived
   $('.archiveButton').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var name = $(this).attr("id");
        $(".namesubmenu").text(name);
        $('#archive').attr('action', "/admin/submenu/"+id);
   	  console.log(id);
   });
      //create
      $('#savecreate').on('click', function(e) {
         if (confirm('Are You sure you want to create new menu ?') == true) {
         $( "#savecreates" ).click();
         } else {
         }
      });

      imgcreate.onchange = evt => {
         const [file] = imgcreate.files
         if(imgcreate.files[0].size < 2000000){
         if (file) {
            blahblah.src = URL.createObjectURL(file)
            console.log('image size');
         }
      }else{
      alert("Image is too big!");
      document.getElementById("imgcreate").value = null;
      blahblah.src = ("/images/menu.png")
         }
      }

$('#name').keyup(function(){
   var name=$('#name').val();
   console.log(name);
  $.ajax({
        url: "/filtering/submenuName",
        type:"GET",
        data:{
            name: name,
        },
        success:function(data){
          var count = data.length;
          if(count==1){
            $('#menuErrorz').removeClass('d-none');
            $("#savecreate").prop('disabled', true); //disable 
          }else{
            $('#menuErrorz').addClass('d-none');
            $("#savecreate").prop('disabled', false); //enable
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
});

// edit
$('.edit').on('click', function(e) {
        e.preventDefault();
      var id      = $(this).attr("subid");
      var name    = $(this).attr("subname");
      var price   = $(this).attr("subprice");
      var image   = $(this).attr("subimage");
      var status  = $(this).attr("substatus");
      $('#submenuimage').attr('src','/' + image);
      $('#imagehidden').attr('src','/' + image);
      $('#submenuid').attr('value', id);
      $('#submenuname').attr('value', name);
      $('#submenuprice').attr('value', price);
      $("#submenustatus [value="+status+"]").prop("selected", "true");

      $('.formedit').attr('action', "/admin/submenu/"+id);
      $(".editmode").text("Editing " + name);
      });

$('#saveedit').on('click', function(e) {
         var name   = $('#submenuname').attr("value");
         if (confirm('Are you sure you want to update '+ name + '?') == true) {
         $( "#saveedits" ).click();
         } else {
         }
      });

      imgInp.onchange = evt => {
         var image = $('#imagehidden').attr('src');
         console.log(image);

         const [file] = imgInp.files
         if(imgInp.files[0].size < 2000000){
         if (file) {
            submenuimage.src = URL.createObjectURL(file)
            console.log('image size');
         }
      }else{
      alert("Image is too big!");
      document.getElementById("imgInp").value = null;
      $('#submenuimage').attr('src', image);

         }
      }
      $('#submenuname').keyup(function(){
   var id=$('#submenuid').val();
   var name=$('#submenuname').val();
   console.log(name);
  $.ajax({
        url: "/filtering/submenuNameedit",
        type:"GET",
        data:{
           id: id,
            name: name,
        },
        success:function(data){
          var count = data.length;
          if(count==1){
            $('#menuErrora').removeClass('d-none');
            $("#saveedit").prop('disabled', true); //disable 
          }else{
            $('#menuErrora').addClass('d-none');
            $("#saveedit").prop('disabled', false); //enable
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
});

















   $(document).ready(function() {
       $('#example').DataTable( {
         "columnDefs": [
       { "width": "10%", "orderable": false,  "targets": 0 },
       { "width": "20%",  "orderable": false,  "targets": 4 },
       { "width": "10%", "targets": 2 },
       { "width": "20%", "targets": 3 },
     ] ,
     "order": [[ 1, "asc" ]],
       } );
   } );
   //active sidebar
   $(window).on('load', function() {
     $('#menu').attr('class', "multi-level collapse show");
     $('#menuspan').attr('aria-expanded', "true");
     $('#sidebarsubmenu').attr('class', "nav-item active");
     $('#submenu-pages').attr('class', "multi-level collapse show");
     $('#menulistspan').attr('aria-expanded', "true");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Menus</li><li class='breadcrumb-item active'>Submenu</li><li class='breadcrumb-item active' aria-current='page'>Submenu List</li>";
     document.getElementById("page-name").innerHTML += "Submenu List";
   	console.log("works");
   });

   $(window).on('load', function() { // makes sure the whole site is loaded
     $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation
     $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
     $('body').delay(300).css({'overflow':'visible'});
   });




</script>
@endsection
