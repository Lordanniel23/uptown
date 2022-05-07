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
         <a href="#" class="createmenu btn btn-secondary d-inline-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#createmodal" style="background-color: #f0bc74;border-color: #f0bc74;color:black">Create Menu</a>
   </div>
</div>

<div style="width: 90%; margin-left: auto; margin-right: auto;">
   <table id="example" class="display" style="width:100%">
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Name</center></th>
            <th><center>Price</center></th>
            <th><center>Description</center></th>
            <th><center>Category</center></th>
            <th><center>Status</center></th>
            <th><center>Action</center></th>
         </tr>
      </thead>
      <tbody>
         @foreach($menus as $menu)
         @if($menu->status_id != 3)
         <tr>
            <td>
               <div class="cropped zoom">
                  <img class="rounded mx-auto d-block" src=" /{{$menu->Image}}" style="height:50px;max-width:100px">
               </div>
            </td>
            <td>{{$menu->Name}}</td>
            <td>₱ {{$menu->Price}}</td>
            <td>{{$menu->Description}}</td>
            @foreach($category as $categ)
               @if($menu->Category_ID == $categ->id)
                     <td>{{$categ->name}}</td>
               @endif
            @endforeach
            @foreach($status as $stats)
               @if($menu->status_id == $stats->id)
                  @if($stats->id === 1)
                     <td style="color:green">{{$stats->name}}</td>
                  @else
                     <td style="color:red">{{$stats->name}}</td>
                  @endif
               @endif
            @endforeach

            <td>
               <center>
                  <!-- <a href="#" class="submenubutton"  menuid="{{$menu->id}}" menuname="{{$menu->Name}}"><button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#submenumodal">Inclusion</button></a> -->
                  <a href="#" class="edit" menuid="{{$menu->id}}" menuname="{{$menu->Name}}" menuprice="{{$menu->Price}}" menudesc="{{$menu->Description}}" menucateg="{{$menu->Category_ID}}" menustatus="{{$menu->status_id}}" menuimg="{{$menu->Image}}"><button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button></a>
                  <a href="#deleteEmployeeModal" class="delete archiveButton" data-id="{{$menu->id}}" id="{{$menu->Name}}"><button type="button"  class="btn btn-warning" data-bs-toggle="modal"   data-bs-target="#exampleModal">Archive</button></a>
               </center>
            </td>
         </tr>
         @endif
         @endforeach
      </tbody>
   </table>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to Archive <u><span class="namemenu" style="font-weight:bold"></span></u>  ?</p>
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
<!-- EDIT !  -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title editmode" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" class="menuqid" action=""  enctype="multipart/form-data">
               @csrf
               @method('put')
               <div class="row mb-4">
                  <div class="col-md-5">
                     <center><img class="img-fluid rounded mx-auto d-block" id="blah" style="max-height: 200px;" height="150px" src='' alt="No image Found"></center>
                     <div class="mb-3">
                        <center><br><label for="formFile" class="">Update Image</label><br><br></center>
                        <input class="form-control impzz" name="image[]" type="file" id="imgInp" accept="image/*">
                        <center><span class="text-danger ">file size must be less than 2mb</span></center>

                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Menu</label>
                        <div class="col-md-8">
                           <input id="menuqid" type="text" class="form-control" name="id" value=""  hidden/>
                           <input id="menuqname" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus require/>
                           <span class="text-danger d-none " id="menuError">Menu Name Already Exist</span>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                        <div class="col-md-8">
                           <input id="price" type="number" class="form-control" name="price" value="" required autocomplete="name" autofocus />
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-8">
                           <!-- <input type="text" class="form-control" name="desc" value="" required autocomplete="name" autofocus /> -->
                           <textarea  id="desc" name="desc" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                     </div>
                     <div class="row mb-3">
                     <input id="categhid" type="text" hidden>
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                        <div class="col-md-8">
                           <select name="category" id="category" class="form-select form-control">
                           @foreach($category as $categ)
                           <option class="categedit" value="{{$categ->id}}" id="categoryMenu" >{{$categ->name}}</option>
                           @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Menu Status</label>
                        <div class="col-md-8">
                           <select  name="status" id="menustatus" class="form-select form-control">
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

<!-- Create !  -->
<div class="modal fade" id="createmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create New Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" action="/admin/menu/store" enctype="multipart/form-data">
               @csrf
               <div class="row mb-4">
                  <div class="col-md-5">
                     <center><img class="img-fluid rounded mx-auto d-block" id="blahblah" style="max-height: 200px;" height="150px" src="/images/menu.png" alt="No image Found"></center>
                     <div class="mb-3"><br>
                        <center><br><label for="formFile" class="">Choose Image<span style="color:red;"> *</span></label></center>
                        <input class="form-control" name="image[]" type="file" id="imgcreate" accept="image/*">
                        <center><span class="text-danger ">file size must be less than 2mb</span></center>

                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Menu<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <input type="text" id="name" class="form-control" name="name" value="" required autocomplete="name" autofocus require/>
                           <span class="text-danger d-none " id="menuErrorz">Menu Name Already Exist</span>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <input type="number" class="form-control" name="price" value="" required autocomplete="name" autofocus />
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-8">
                           <textarea name="desc" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                     </div>
                     <div class="row mb-3">
                     <input id="categhid" type="text" hidden>
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <select name="category" id="category" class="form-select form-control">
                           @foreach($category as $categ)
                           <option class="categedit" value="{{$categ->id}}" id="categoryMenu" >{{$categ->name}}</option>
                           @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Menu Status<span style="color:red;"> *</span></label>
                        <div class="col-md-8">
                           <select  name="status" class="form-select form-control">
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
               <button type="button" class="btn btn-success" id="savecreate" >Save</button>
               <button class="btn btn-success" id="savecreates" hidden>Save</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- INCLUSION !  -->
<div class="modal fade" id="submenumodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="submenutitle"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <button id="idko" hidden></button>
         <div class="modal-body">
               <div class="row mb-4">
                  <div style="width: 95%; margin-left: auto; margin-right: auto;">
         <script>
            $('#idko').on('click', function(e) {
               var test = $('#idko').text();
               console.log('gumana?????' + test);
            });
         </script>
                     <table id="submenutable" class="display" style="width:100%">
                        <thead>
                           <tr>
                              <td><center>Action</center></td>
                              <td><center>Submenu</center></td>
                              <td><center>price</center></td>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($submenus as $submenu)
                           <tr>
                              <td><center><input type="checkbox" class="included" name="submenu{{$submenu->id}}" value="{{$submenu->id}}"></center></td>
                              <td><span style="padding-left:1em;">{{$submenu->name}}</span></td>
                              <td>₱ {{$submenu->price}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
            <div class="dropdown me-1">
               <button type="button" class="btn btn-success" id="submenusubmit" >Save</button>
               <form action="/admin/menu/submenu" method="post">
               @csrf
               @method('POST')
                  <input type="text" id="serid" name="id" hidden>
                  <input type="text" id="sername" name="name" hidden>
                  <input type="text" id="sernumber" name="number" hidden>
                  <button type="submit" class="btn btn-success" id="submenusave" hidden>Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


<script>
 $('.submenubutton').on('click', function(e) {
    var id     = $(this).attr("menuid");
    var name   = $(this).attr("menuname");
    console.log(id + name );
      $('#serid').attr('value', id);
      $('#idko').text(id);
      $('#subject').text(id);
      $('#sername').attr('value', name);
      $('#submenutitle').text("Submenu of " + name);
      var subukan = $('#idko').text();
      console.log('gumana? ' + subukan);
      $( "#idko" ).click();

      });


$('#submenusubmit').on('click', function(e) {
   var myArray = [];
    $(":checkbox:checked").each(function() {
        myArray.push(this.value);
        console.log(myArray);
         $('#sernumber').attr('value',myArray);
      });
         var name   = $('#sername').attr("value");
         if (confirm('Are you sure you want to update submenu of '+ name + '?') == true) {
         $( "#submenusave" ).click();
         } else {
         }
      });


   $('.edit').on('click', function(e) {
        e.preventDefault();
      var menuid     = $(this).attr("menuid");
      var menuname   = $(this).attr("menuname");
      var menuprice  = $(this).attr("menuprice");
      var menudesc   = $(this).attr("menudesc");
      var menucateg  = $(this).attr("menucateg");
      var menuimg    = $(this).attr("menuimg");
      var menustatus = $(this).attr("menustatus");
      $('.menuqid').attr('action', "/admin/menu/"+menuid);
      $('#menuqid').attr('value', menuid);
      $('#menuqname').attr('value', menuname);
      $('#price').attr('value', menuprice);
      $('#blah').attr('src',"/"+ menuimg );
      $("#desc").text(menudesc);
      $(".editmode").text("Editing " + menuname);
      $("#category [value="+menucateg+"]").prop("selected", "true");
      $("#menustatus [value="+menustatus+"]").prop("selected", "true");
      });

      $('.archiveButton').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var name = $(this).attr("id");
        $(".namemenu").text(name);
        $('#archive').attr('action', "/admin/menu/"+id);
   	  console.log(id);
   });
   $(document).ready(function() {
       $('#example').DataTable( {
         "columnDefs": [
       { "width": "5%", "orderable": false,  "targets": 0 },
       { "width": "25%",  "orderable": false,  "targets": 6 },
       { "width": "10%", "targets": 2 },
     ] ,
     "order": [[ 1, "asc" ]],
       } );
       $('#submenutable').dataTable( {
         "autoWidth": false, // might need this
  "columns": [
    { "width": "10%" },
    null,
    { "width": "20%" },
  ],
      "columnDefs": [
         { "orderable": false, "targets": 0 },
      ],
     "order": [[ 1, "asc" ]],

      } );
   } );

   //active sidebar
   $(window).on('load', function() {
     $('#menu').attr('class', "multi-level collapse show");
     $('#menuspan').attr('aria-expanded', "true");
     $('#sidebarmenu').attr('class', "nav-item active");
     $('#menu-pages').attr('class', "multi-level collapse show");
     $('#menulistspan').attr('aria-expanded', "true");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Menus</li><li class='breadcrumb-item active'>Menu</li><li class='breadcrumb-item active' aria-current='page'>Menu List</li>";
     document.getElementById("page-name").innerHTML += "Menu List";
   	console.log("works");
   });
   $(window).on('load', function() { // makes sure the whole site is loaded
     $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation
     $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
     $('body').delay(300).css({'overflow':'visible'});
   });

//edit
   $('#saveedit').on('click', function(e) {
         var menuname   = $('#menuqname').attr("value");
         if (confirm('Are you sure you want to update '+ menuname + '?') == true) {
         $( "#saveedits" ).click();
         } else {
         }
      });
   imgInp.onchange = evt => {
         const [file] = imgInp.files
         if(imgInp.files[0].size < 2000000){
         if (file) {
         blah.src = URL.createObjectURL(file)
         console.log('if');
         }
      }else{
      alert("Image is too big!");
      console.log('else');
      document.getElementById("imgInp").value = null;
         }
      }


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
        url: "/filtering/menuName",
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




</script>
@endsection
