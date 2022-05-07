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
    <thead >
					<tr>
          <th><center>Image</center></th>
						<th><center>Name</center></th>
						<th><center>Current Price</center></th>
						<th><center>Category</center></th>
						<th><center>Date</center></th>
						<th><center>Count</center></th>
					</tr>
				</thead>
				<tbody class="tabz">
              @foreach($bestsellers as $bestseller)

					<tr>
						<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$bestseller->Image}}" style="height:50px;max-width:100px"></div></td>
						<td>{{$bestseller->Name}}</td>
						<td><center>₱ {{$bestseller->price}}</center></td>
						<td><center>{{$bestseller->Category}}</center></td>
						<td><center>{{\Carbon\Carbon::parse($bestseller->created_at)->format('d M Y')}}</center></td>
						<td><center>{{$bestseller->count}}</center></td>
					</tr> 
          @endforeach
				</tbody>
        <tfoot>
            <tr>
						<th><center>Image</center></th>
						<th><center>Name</center></th>
						<th><center>Current Price</center></th>
						<th><center>Category</center></th>
						<th><center>Date</center></th>
						<th><center>Count</center></th>
            </tr>
        </tfoot>
    </table>
  </div>
	<script>








var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $(document).ready(function() {
     // Create date inputs
     
     minDate = new DateTime($('#min'), {
        //  format: 'MM-DD-YY'
         format: 'YY-MM-DD'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MM DD YY'
     });
     // DataTables initialisation
     var table = $('#example').DataTable();
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
     
 });

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
         "order": [[ 4, "desc" ]],
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
             "width": "10%", "targets": 0,
             "width": "15%", "targets": 5,
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
 
    $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
        //  console.log(min);
         var max = maxDate.val();
        //  console.log(max);

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





//  $('#min').change(function(){
//          var q1=$('#min').val();
//          console.log(q1);
//          $.ajax({
//                  url: "/filtering/mindate1",
//                  type:"GET",
//                  data:{
//                      q1: q1,
//                  },
//                  success:function(data){
//                     var $tabz = $(".tabz");
//                      $tabz.empty(); // remove old options
//                      $.each(data, function(key,value) {
//                      console.log(value);
//                      $('.tabz').append("<tr><td><div class='cropped zoom'><img class='rounded mx-auto d-block' src=' /"+ value['Image'] +"' style='height:50px;max-width:100px'></div></td><td>"+ value['Name'] +"</td><td><center>₱ "+ value['price'] +"</center></td><td><center>"+ value['Category'] +"</center></td><td><center>"+ value['created_at'] +"</center></td><td><center>"+ value['count'] +"</center></td></tr>");
//                        console.log(data);
//                        $("#example").dataTable();
//                      });
//                  },
//                  error: function(error) {
//                   console.log(error);
//                 }
//                 });
//               });


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
     $('#sidebarbestsellerreports').attr('class', "nav-item active");
     $('#report-pages').attr('class', "multi-level collapse show");
     document.getElementById("bread").innerHTML += "<li class='breadcrumb-item active'>Reports</li><li class='breadcrumb-item active'>Best seller</li>";
     document.getElementById("page-name").innerHTML += "Best Seller Report";
   	console.log("works");
   });




</script>
@endsection

