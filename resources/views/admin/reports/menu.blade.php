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
    <table id="example" class="display nowrap" style="width:100%">
    <thead >
					<tr><center></center>
						<th><center>Image</center></th>
						<th><center>Name</center></th>
						<th><center>Price</center></th>
						<th><center>Description</center></th>
						<th><center>Status</center></th>
					</tr>
				</thead>
				<tbody>
              @foreach($menus as $menu)
				  @if($menu->status_id != 3)
					<tr>
						<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$menu->Image}}" style="height:50px;max-width:100px"></div></td>
						<td>{{$menu->Name}}</td>
						<td>₱ {{$menu->Price}}</td> 
						<td>{{$menu->Description}}</td>
            @foreach($status as $stats)
            @if($menu->status_id == $stats->id)
                  @if($stats->id === 1)
                     <center><td style="color:green">{{$stats->name}}</td></center>
                  @else
                  <center><td style="color:red">{{$stats->name}}</td></center>
                  @endif
               @endif
            @endforeach
					</tr> 
          @endif
          @endforeach
				</tbody>
        <tfoot>
            <tr>
						<th><center>Image</center></th>
						<th><center>Name</center></th>
						<th><center>Price</center></th>
						<th><center>Description</center></th>
						<th><center>Status</center></th>
            </tr>
        </tfoot>
    </table>

  </div>

	<script>
$('.archiveButton').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
	  
      $('#archive').attr('action', "/admin/menu/"+id);
	  console.log(id);
});

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    var table = $('#example').DataTable({
         "order": [[ 1, "desc" ]],
        dom: 'Bfrtip',
        buttons: 
        [
        {extend:  'pdf',exportOptions: {columns: ':visible'}},
        {extend:  'excel', text: 'Spreedsheet',exportOptions: {columns: ':visible'}},
        {extend: 'print',exportOptions: {columns: ':visible'}},
        {extend: 'colvis',exportOptions: {columns: ':visible'}},
        ] ,
        "columnDefs": 
        [ {
             "width": "10%", "targets": 2,
        } ],
      
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
 




// active sidebar
$(window).on('load', function() {
  $('#sidebarmenureports').attr('class', "mm-active");
  $('#toptitle:contains("Uptown Grill")').text("Menu Reports");
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
     $('#sidebarmenureports').attr('class', "nav-item active");
     $('#report-pages').attr('class', "multi-level collapse show");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Reports</li><li class='breadcrumb-item active'>Menu</li>";
     document.getElementById("page-name").innerHTML += "Menus Report";
   	console.log("works");
   });




</script>
@endsection

