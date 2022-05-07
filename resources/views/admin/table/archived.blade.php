@extends('admin/body.body') @section('content')


<table id="example" class="display" style="width:90%">

<thead>
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>Image</th>
						<th>price</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                @foreach($menus as $menu)
                @if($menu->status_id === 3)
					<tr>
						<td>{{$menu->id}}</td>
						<td><center class="zoom"><img class="rounded mx-auto d-block" src="/{{$menu->Image}}" style="height:50px;max-width:100px"></center></td>
						<td>{{$menu->Name}}</td>
						<td>₱ {{$menu->Price}}</td>
						<td>{{$menu->Description}}</td>
						<td>
						<center>
								<a href="#deleteEmployeeModal" ><button type="button"  class="restore btn btn-success" data-bs-toggle="modal" data-bs-target="#restore" data-id="{{$menu->id}}">Restore</button></a>
								<a href="#deleteEmployeeModal" ><button type="button"  class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" data-id="{{$menu->id}}">Delete</button></a>
							</center>
						</td>
					</tr> 
                @endif
                @endforeach
				</tbody>
			</table>
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
        Are you sure you want to Restore "user" ?
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
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete "user" ?
      </div>
	  <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <form id="delet" action="" method='POST'>
        @csrf
		@method('post')
        <input type="number" name="id" value="" hidden>
        <input type="submit" class="btn btn-danger" value="Delete">
        </form>
	</div>
    </div>
  </div>
</div>

<script>
$('.restore').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
	  $('#restor').attr('action', "/admin/menu/archived/" + id);
	  console.log(id);
});

$('.delete').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
	  $('#delet').attr('action', "/admin/menu/archived/delete/" + id);
	  console.log("delete" + id);
});

$(document).ready(function() {
    $('#example').DataTable( {
    } );
} );

</script>

@endsection