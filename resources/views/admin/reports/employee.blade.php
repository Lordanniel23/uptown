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

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
.dt-datetime-table{
  font-size: inherit!important;
 box-sizing: inherit!important;
}
div.dt-datetime{
  width:300px;  
}

</style>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<div style="width: 90%; margin-left: auto; margin-right: auto;">

<div style="width: 20%;">
<table border="0" cellspacing="2" cellpadding="5">
        <tbody>
        <tr>
          <td colspan="2">Date Picker</td>
        </tr>  
        <tr>
            <td>From:</td>
            <td><input type="text" id="min" name="min"></td>
            <td>To:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
</div>
    <table id="example" class="display nowrap" style="width:100%">
     <thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Username</th>
						<th>Role</th>
						<th>Date Created</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
                @foreach($users as $user)
					<tr>
						<td><div class="cropped zoom"><img src="{{$user->image}}" alt=""></div></td>
						<td>{{$user->name}}</td>
						<td>{{$user->username}}</td>
						@foreach($roles as $role)
						@if($role->id === $user->role_id)
						<td>{{$role->role}}</td>
						@endif
						@endforeach
						<td>{{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</td>
						<td>
                        @foreach($status as $stat)
                        {{($stat->id === $user->status_id) ? $stat->status : "" }}
                        @endforeach
						</td>
					</tr> 
                @endforeach
				</tbody>
                <tfoot>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Username</th>
						<th>Role</th>
						<th>Date Created</th>
						<th>Status</th>
					</tr>
				</tfoot>
    </table>
    </table>

  </div>

	<script>
$('.archiveButton').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
	  
      $('#archive').attr('action', "/admin/menu/"+id);
	  console.log(id);
});





var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values

  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
     // DataTables initialisation
     var table = $('#example').DataTable();
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
     
 });



 
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    var table = $('#example').DataTable({
      dom: 'Bfrtip',
buttons: [
  {extend: 'pdf',exportOptions: {columns: ':visible'}},
  {extend: 'excel',
    text: 'Spreedsheet',exportOptions: {columns: ':visible'}},
    {extend: 'print',exportOptions: {columns: ':visible'}},
    {extend: 'colvis',exportOptions: {columns: ':visible'}},
        ] ,
      
        initComplete: function () {
            this.api().columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 

         

    $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );




// active sidebar
$(window).on('load', function() {
  $('#sidebaremployeereports').attr('class', "mm-active");
  $('#toptitle:contains("Uptown Grill")').text("Users Reports");
	console.log("works");
});
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').delay(3000).fadeOut('slow'); // will first fade out the loading animation 
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(300).css({'overflow':'visible'});
})



   //active sidebar
   $(window).on('load', function() {
     $('#reportsspan').attr('aria-expanded', "true");
     $('#sidebaremployeereports').attr('class', "nav-item active");
     $('#report-pages').attr('class', "multi-level collapse show");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Reports</li><li class='breadcrumb-item active'>Menu</li>";
     document.getElementById("page-name").innerHTML += "Menus Report";
   	console.log("works");
   });










</script>
@endsection

