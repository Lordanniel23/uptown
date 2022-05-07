@extends('admin/body.body') @section('content')

<style>
body {
  overflow: hidden;
}
.app-main .app-main__outer {
    margin-top: 4em;
}

/* Preloader */

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
</style>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a href="/admin/employee" class="createmenu btn btn-gray-800 d-inline-flex align-items-center me-2" style="background-color: #f0bc74!important;border-color: #f0bc74!important;color:black!important">Employee List</a>
<div style="width: 90%; margin-left: auto; margin-right: auto;">
<table id="example" class="display" style="width:100%">

				<thead>
					<tr>
						<th>Name</th>
						<th>Username</th>
						<th>Date Created</th>
						<th>Date Archived</th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
                @foreach($users as $user)
				@if($user->status_id == 3)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->username}}</td>
						<td>{{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</td>
						<td>{{\Carbon\Carbon::parse($user->archived_at)->format('d M Y')}}</td>
						<td>
							<center>
								<a href="#deleteEmployeeModal" ><button type="button"  class="restore btn btn-success" data-bs-toggle="modal" data-bs-target="#restore" id="{{$user->name}}" data-id="{{$user->id}}">Restore</button></a>
							</center>
						</td>
					</tr> 
				@endif
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
        <p>  Are you sure you want to Restore <u><span class="nameempz" style="font-weight:bold"></span></u>  ?</p>

      </div>
	  <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<form id="restor" action="" method='POST'>
        @csrf
		@method('post')
        <input type="number" name="id" value="{{$user->id}}" hidden>
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
    $(".nameempz").text(name);

	  $('#restor').attr('action', "/admin/employee/archived/" + id);
	  console.log(id);
});

// $('.delete').on('click', function(e) {
//       e.preventDefault();
// 	  var id = $(this).attr("data-id");
// 	  $('#delet').attr('action', "/admin/employee/archived/delete/" + id);
// 	  console.log("delete" + id);
// });

$(document).ready(function() {
    $('#example').DataTable( {
      "order": [[ 1, "asc" ]],
    } );
} );

</script>
<script>
//active sidebar
$(window).on('load', function() {
  $('#users-pages').attr('class', "multi-level collapse show");
  $('#sidebararchiveemployee').attr('class', "nav-item active");
  $('#empspan').attr('aria-expanded', "true");
  document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Users</li><li class='breadcrumb-item active'>Archived User</li>";
  document.getElementById("page-name").innerHTML += "Archived User ";
	console.log("works");
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(300).css({'overflow':'visible'});
})
</script>

@endsection