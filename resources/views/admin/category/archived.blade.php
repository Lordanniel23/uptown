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
.app-main .app-main__outer {
    margin-top: 4em;
}
</style>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a href="/admin/category" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2" style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important">Category List</a>
<div style="width: 60%; margin-left: auto; margin-right: auto;margin-top: 5em!important">
<table id="example" class="display" style="width:70%">

<thead>
					<tr>
						<th><center>Image</center></th>
						<th><center>Category Name</center></th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
                @foreach($categories as $category)
					<tr>

						<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$category->image}}" style="height:50px;max-width:100px"></div></td>
						<td>{{$category->name}}</td>
						<td>
						<center>
								<a href="#deleteEmployeeModal" ><button type="button"  class="restore btn btn-success" data-bs-toggle="modal" data-bs-target="#restore" data-id="{{$category->id}}" id="{{$category->name}}">Restore</button></a>
							</center>
						</td>
					</tr> 
                @endforeach
				</tbody>
			</table>
</div>
<!-- Button trigger modal -->
<!-- Modal restore-->
<div class="modal fade" id="restore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel"><b>Restore</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Restore <u><span class="categg" style="font-weight:bold"></span></u> ?</p>
      </div>
	  <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<form id="restor" action="" method='POST'>
        @csrf
		@method('post')
        <input type="number" name="id" value="" hidden>
        <input type="submit" class="btn btn-success" value="Restore">
        </form>
	</div>
    </div>
  </div>
</div>
<!-- Modal delete-->
<script>
$('.restore').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
    var name = $(this).attr("id");
      $(".categg").text(name);
	  $('#restor').attr('action', "/admin/categ/restore/" + id);
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
  $('#sidebararchivedcategory').attr('class', "nav-item active");
  $('#categ-pages').attr('class', "multi-level collapse show");
  $('#categspan').attr('aria-expanded', "true");
  document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Menus</li><li class='breadcrumb-item active'>Category</li><li class='breadcrumb-item active' aria-current='page'>Archived Category</li>";
  document.getElementById("page-name").innerHTML += "Archived Category";
	console.log("works");
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(300).css({'overflow':'visible'});
})
</script>

@endsection