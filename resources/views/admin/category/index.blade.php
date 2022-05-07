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
    margin-top: 3em!important;
}
</style>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<div>
   <div class="dropdown">
         <a href="#" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2"  data-bs-toggle="modal" data-bs-target="#createmodal"  style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important">Create Category</a>
   </div>
</div>
<div style="width: 60%; margin-left: auto; margin-right: auto;">
<table id="example" class="display" style="width:80%;">
<thead >
					<tr><center></center>
						<th><center>Image</center></th>
						<th><center>Name</center></th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
              @foreach($categories as $category)
					<tr>
						<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$category->image}}" style="height:50px;max-width:100px"></div></td>
						<td>{{$category ->name}}</td>
						<td>
							<center>
								<!-- <a href="/admin/category/{{$category->id}}/edit" class="edit"><button type="button" class="btn btn-primary rounded">Edit</button></a> -->
                <a href="#" class="edit" categid="{{$category ->id}}" categname="{{$category ->name}}" categimg="{{$category->image}}"><button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button></a>

								<a href="#deleteEmployeeModal" class="delete archiveButton" id="{{$category->name}}" data-id="{{$category->id}}"><button type="button"  class="btn btn-warning" data-bs-toggle="modal"   data-bs-target="#exampleModal">Archive</button></a>
							</center>
						</td>
					</tr> 
                @endforeach
				</tbody>
			</table>
      </div>
<!-- Button trigger modal -->
<!-- Modal -->
</style>
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>  Are you sure you want to Archive <u><span class="categg" style="font-weight:bold"></span></u>  ?</p>

      </div>
      <div class="modal-footer">
		  <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
		  <form id="archive" action="" method='POST'>
        @csrf
        @method('DELETE')
        <input type="number" name="id" value="{{$category->id}}" hidden>
        <input type="submit" class="btn btn-warning" value="Archived">
        </form>
	</div>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- Create !  -->
<div class="modal fade" id="createmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create New Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" action="/admin/category/store" enctype="multipart/form-data">
               @csrf
               <div class="row mb-4">
                  <div class="row">
                     <center><img class="img-fluid rounded mx-auto d-block" id="blahblah" style="max-height: 200px;" height="150px" src="\images\icons\alldaybreakfast.png" alt="No image Found"></center>
                     <div class="mb-3">
                        <center><br><label for="formFile" class="">Update Image</label><br><br></center>
                        <input class="form-control" name="image[]" type="file"  value="" accept="image/*">
                     </div>
                  </div>
                  <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-8">
                           <input type="text" id="namecreate" class="form-control" name="name" value="" required autocomplete="name" autofocus require/>
                           <span class="text-danger d-none " id="categErrorz">Category Already Exist</span>
                        </div>
                     </div>
               </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary rounded" type="button" data-bs-dismiss="modal" >Close</button>
            <div class="dropdown me-1">
               <button type="button" class="btn btn-success" id="savecreate" >Save</button>
               <button class="btn btn-success" id="savecreatez" hidden>Save</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- EDIT !  -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="edittitle"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="POST" class="categqid" action=""  enctype="multipart/form-data">
               @csrf
               @method('put')
               <div class="row mb-4">
                  <div class="row">
                     <center><img class="img-fluid rounded mx-auto d-block" id="blue" style="max-height: 200px;" height="150px" src="\images\icons\alldaybreakfast.png" alt="No image Found"></center>
                     <div class="mb-3">
                        <input type="text" id="nameeditid" name="editid" hidden>
                        <center><br><label for="formFile" class="">Update Image</label><br><br></center>
                        <input class="form-control" name="image[]" type="file" id="imgedit" value="" accept="image/*">
                        <input class="form-control" type="file" id="imgeditorig" value="" accept="image/*" hidden>
                     </div>
                  </div>
                  <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-8">
                           <input type="text" id="nameedit" class="form-control" name="name" value=""  autocomplete="name" require/>
                           <span class="text-danger d-none " id="categerrow">Category name already exist</span>
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





	<script>

$('.edit').on('click', function(e) {
        e.preventDefault();
      var id     = $(this).attr("categid");
      var name   = $(this).attr("categname");
      var image  = $(this).attr("categimg");
      console.log(id+name+image);
      $('.categqid').attr('action', "/admin/category/"+id);
      $('#nameeditid').attr('value', id);
      $('#nameedit').attr('value', name);
      $('#imgedit').attr('src','\\' + image);
      $('#imgeditorig').attr('src','\\' + image);
      $('#blue').attr('src','\\' + image);
      $("#edittitle").text('Editing '+name);

      });


$('#saveedit').on('click', function(e) {
         var name  =   $('#nameedit').attr('value');
         if (confirm('Are You sure you want to update ' + name + '?') == true) {
         $( "#saveedits" ).click();
         } else {
         }
      });
      imgedit.onchange = evt => {
         var image  =   $('#imgeditorig').attr('src');
         const [file] = imgedit.files
         if(imgedit.files[0].size < 2000000){
         if (file) {
            blue.src = URL.createObjectURL(file)
            console.log(image);
         }
      }else{
      alert("Image is too big!");
         if(image == "images/icons/alldaybreakfast.png")   {
            document.getElementById("imgedit").value = null;
            blue.src = ("/images/icons/alldaybreakfast.png")
            }
         else
            {
               console.log('else'+image);
               document.getElementById("imgedit").value = null;
               $('#imgedit').attr('src','\\' + image);
               blue.src = (image);
            }
         }
      }

//edit
$('#nameedit').keyup(function(){
   var name=$('#nameedit').val();
   var id=$('#nameeditid').val();
   console.log(name + id); 
  $.ajax({
        url: "/filtering/menucategoryedit",
        type:"GET",
        data:{
            name: name,
            id: id,
        },
        success:function(data){
          var count = data.length;

          if(count==1){
            $('#categerrow').removeClass('d-none');
            $("#saveedit").prop('disabled', true); //disable 

          }else{
            $('#categerrow').addClass('d-none');
            $("#saveedit").prop('disabled', false); //enable

          }
        },
        error: function(error) {
         console.log(error);
        }
       });
      });




//create
$('#name').keyup(function(){
   var name=$('#name').val();
   console.log(name);
  $.ajax({
        url: "/filtering/menucategory",
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







$('.archiveButton').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
    var name = $(this).attr("id");
      $(".categg").text(name);
      $('#archive').attr('action', "/admin/category/"+id);
	  console.log(id);
});
$(document).ready(function() {
    $('#example').DataTable( {
      "columnDefs": [
    { "width": "15%",  "orderable": false,  "targets": 0 },
    {  "width": "30%",   "orderable": false,  "targets": 2 },
  ] ,
     "order": [[ 1, "asc" ]],
    } );
} );


//active sidebar
$(window).on('load', function() {
  $('#menu').attr('class', "multi-level collapse show");
  $('#menuspan').attr('aria-expanded', "true");
  $('#sidebarcategory').attr('class', "nav-item active");
  $('#categ-pages').attr('class', "multi-level collapse show");
  $('#categspan').attr('aria-expanded', "true");
  document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Menus</li><li class='breadcrumb-item active'>Category</li><li class='breadcrumb-item active' aria-current='page'>Category List</li>";
  document.getElementById("page-name").innerHTML += "Category List";
	console.log("works");
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(300).css({'overflow':'visible'});
});
</script>
@endsection