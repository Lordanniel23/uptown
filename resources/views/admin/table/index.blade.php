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
.fixed-sidebar .app-main .app-main__outer {
    z-index: 9;
    padding-left: 290px!important;
    padding-top: 50px!important;
    padding: 100px;
}
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

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<div style="width: 50%; margin-left: auto; margin-right: auto;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Add Table</button>
        
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#archived">Reduce Table</button>
    <table id="example" class="display" style="width: 70%;">
        <thead>
            <tr>
                <th><center>Table</center></th>
                <th><center>Status</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
                @if($table->table_status_id != 5)
                    <tr>
                    <td><center>{{$table->id}}</center></td>
                    @foreach($status_table as $status)
                        @if($table->table_status_id === $status->id)
                            @if($status->id === 4)
                                <td><center class="p-1 rounded " style="color:red"><span ><b>{{$status->name}}</b></span></center></td>
                            @elseif($status->id === 1)
                                <td><center class="p-1 rounded " style="color:green"><span ><b>Table {{$status->name}}</b></span></center></td>
                            @else
                                <td><center class="p-1 rounded" style="color:#fa3c4f"><span ><b>Table Occupied</b></span></center></td>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
            </tr>
        </tbody>
    </table>
</div>
<!-- Button trigger modal -->

<!--enable Modal -->
<!-- <div class="modal fade" id="enable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to Enable Table ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="ens" action="" method="POST">
                @csrf
                    @method('PUT')
                    <input id="disablez" type="number" name="id" value="" hidden />
                    <input name="status" type="text" value="en" hidden />
                    <input type="submit" class="btn btn-primary" value="Enable" />
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- end modal -->


<!--archive Modal -->
<div class="modal fade" id="archived" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to Remove Table  <b><?php echo count($tables); ?></b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="archiveds" action="/admin/table/removetable" method="POST">
                    @csrf @method('DELETE')
                    <input type="number" id="archivedsid" name="id" value="" hidden />
                    <input type="submit" class="btn btn-warning" value="Archive" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add table -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel"><b>Add Table</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <form id="" action="/admin/table/create" method="POST">
                  @csrf @method('PUT')
                </div>
                <div class="modal-body">
                  Add Table <b><?php echo count($tables)+1; ?></b>?
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="/admin/table/create" type="button" class="btn btn-success" >Add Table</a>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

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
	  
      $('#deleteArchive').attr('action', "/admin/employee/"+id);
	  console.log(id);
});

//active sidebar
$(window).on('load', function() {
  $('#sidebartable').attr('class', "nav-item active");
  document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Tables</li>";
  document.getElementById("page-name").innerHTML += "Table List";
	console.log("works");
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(300).css({'overflow':'visible'});
})
</script>

@endsection
