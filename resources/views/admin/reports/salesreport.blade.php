@extends('admin/body.body') @section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">


<div class="app-main__inner" >

<div class="row" >
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-danger">₱&nbsp;{{$today1}}</div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-6">Sales Today</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-warning">₱&nbsp;{{$week1}}</div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-6">Sales This Week</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-success">₱&nbsp;{{$twoweek1}}</div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-6">Sales Two Weeks</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-info">₱&nbsp;{{$month1}}</div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-6">Sales This Month</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="row">
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-danger"><?php echo number_format(($today1/20000)*100,1);?>%</div>
                                    </div><?php $day = ($today1/20000)*100;  ?>
                                    <div class="widget-content-right w-100">
                                       <div class="progress-bar-xs progress">
                                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $day ?>%;"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-10">Target Income (20k)</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-warning"><?php echo number_format(($week1/120000)*100,1);?>%</div>
                                    </div><?php $weekz = ($week1/120000)*100;  ?>
                                    <div class="widget-content-right w-100">
                                       <div class="progress-bar-xs progress">
                                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $weekz ?>%;"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-10">Target Income (120k)</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-success"><?php echo number_format(($twoweek1/240000)*100,1);?>%</div>
                                    </div><?php $twoweekz = ($twoweek1/240000)*100;?>
                                    <div class="widget-content-right w-100">
                                       <div class="progress-bar-xs progress">
                                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $twoweekz ?>%;"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-10">Expenses Target (240k)</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                           <div class="widget-content">
                              <div class="widget-content-outer">
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left pr-2 fsize-1">
                                       <div class="widget-numbers mt-0 fsize-3 text-info"><?php echo number_format(($month1/480000)*100,1);?>%</div>
                                    </div><?php $month = ($twoweek1/480000)*100;  ?>
                                    <div class="widget-content-right w-100">
                                       <div class="progress-bar-xs progress">
                                          <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $month ?>%;"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="widget-content-left fsize-1">
                                    <div class="text-muted opacity-10">Totals Target (480k)</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div style="width: 70%; margin-left: auto; margin-right: auto;">
<button type="button" class="btn btn-success" id="one"   >Today</button>
<button type="button" class="btn btn-warning" id="two"   >Last Week</button>
<button type="button" class="btn btn-warning" id="three" >Last 2 Weeks</button>
<button type="button" class="btn btn-warning" id="four"  >This Month</button>


<table id="example" class="display d-show" style="">
      <thead >
         <tr>
            <center></center>
            <th><center>Image</center></th>
            <th><center>Menu Name</center></th>
            <th><center>Category</center></th>
            <th><center>Price</center></th>
            <th><center>Sale Count</center></th>
            <th><center>Total Sales</center></th>
         </tr>
      </thead>
      <tbody>
         @foreach($todays as $menu)
         @for($i=0 ; $i < count($menu); $i++)
         <tr>
						<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$menu[$i]->Image}}" style="height:50px;max-width:100px"></div></td>
            <td>{{$menu[$i]->Name}}</td>
            <td>{{$menu[$i]->Category_ID}}</td>
            <td>₱ {{$menu[$i]->Price}}</td>
            @if($menu[$i]->popular == null)
            <td>0</td>
            @else
            <td>{{$menu[$i]->popular}}</td>
            @endif
            <td>{{$menu[$i]->Price * $menu[$i]->popular}}</td>
         </tr>
         @endfor
         @endforeach
      </tbody>
   </table>



   <table id="example1" class="display d-none" >
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Menu Name</center></th>
            <th><center>Category</center></th>
            <th><center>Price</center></th>
            <th><center>Sale Count</center></th>
            <th><center>Total Sales</center></th>

         </tr>
      </thead>
      <tbody>
         @foreach($weeks as $menu)
         @for($i=0 ; $i < count($menu); $i++)
         <tr>
				<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$menu[$i]->Image}}" style="height:50px;max-width:100px"></div></td>
            <td>{{$menu[$i]->Name}}</td>
            <td>{{$menu[$i]->Category_ID}}</td>
            <td>₱ {{$menu[$i]->Price}}</td>
            @if($menu[$i]->popular == null)
            <td>0</td>
            @else
            <td>{{$menu[$i]->popular}}</td>
            @endif
            <td>{{$menu[$i]->Price * $menu[$i]->popular}}</td>

         </tr>
         @endfor
         @endforeach
      </tbody>
   </table>


   <table id="example2" class="display d-none">
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Menu Name</center></th>
            <th><center>Category</center></th>
            <th><center>Price</center></th>
            <th><center>Sale Count</center></th>
            <th><center>Total Sales</center></th>

         </tr>
      </thead>
      <tbody>
         @foreach($twoweeks as $menu)
         @for($i=0 ; $i < count($menu); $i++)
         <tr>
				<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$menu[$i]->Image}}" style="height:50px;max-width:100px"></div></td>
            <td>{{$menu[$i]->Name}}</td>
            <td>{{$menu[$i]->Category_ID}}</td>
            <td>₱ {{$menu[$i]->Price}}</td>
            @if($menu[$i]->popular == null)
            <td>0</td>
            @else
            <td>{{$menu[$i]->popular}}</td>
            @endif
            <td>{{$menu[$i]->Price * $menu[$i]->popular}}</td>

         </tr>
         @endfor
         @endforeach
      </tbody>
   </table>
   
   <table id="example3" class="display d-none">
      <thead >
         <tr>
            <th><center>Image</center></th>
            <th><center>Menu Name</center></th>
            <th><center>Category</center></th>
            <th><center>Price</center></th>
            <th><center>Sale Count</center></th>
            <th><center>Total Sales</center></th>

         </tr>
      </thead>
      <tbody>
         @foreach($months as $menu)
         @for($i=0 ; $i < count($menu); $i++)
         <tr>
				<td><div class="cropped zoom"><img class="rounded mx-auto d-block" src=" /{{$menu[$i]->Image}}" style="height:50px;max-width:100px"></div></td>
            <td>{{$menu[$i]->Name}}</td>
            <td>{{$menu[$i]->Category_ID}}</td>
            <td>₱ {{$menu[$i]->Price}}</td>
            @if($menu[$i]->popular == null)
            <td>0</td>
            @else
            <td>{{$menu[$i]->popular}}</td>
            @endif
            <td>{{$menu[$i]->Price * $menu[$i]->popular}}</td>

         </tr>
         @endfor
         @endforeach
      </tbody>
   </table>
</div>
 
<script>

$(window).on('load', function() {
$("#example1").addClass("d-none");
$("#example1_wrapper").addClass("d-none");
$("#example2").addClass("d-none");
$("#example2_wrapper").addClass("d-none");
$("#example3").addClass("d-none");
$("#example3_wrapper").addClass("d-none");
   });
$("#one").click(function(){
   $("#one").removeClass("btn-warning");
   $("#one").addClass("btn-success");
   $("#two").addClass("btn-warning");
   $("#two").removeClass("btn-success");
  $("#three").addClass("btn-warning");
  $("#three").removeClass("btn-success");
  $("#four").addClass("btn-warning");
  $("#four").removeClass("btn-success");

  $("#example").removeClass("d-none");
  $("#example_wrapper").removeClass("d-none");
  $("#example1").removeClass("d-show");
  $("#example1_wrapper").removeClass("d-show");
  $("#example2").removeClass("d-show");
  $("#example2_wrapper").removeClass("d-show");
  $("#example3").removeClass("d-show");
  $("#example3_wrapper").removeClass("d-show");
  
  $("#example").addClass("d-show");
  $("#example_wrapper").addClass("d-show");
  $("#example1").addClass("d-none");
  $("#example1_wrapper").addClass("d-none");
  $("#example2").addClass("d-none");
  $("#example2_wrapper").addClass("d-none");
  $("#example3").addClass("d-none");
  $("#example3_wrapper").addClass("d-none");


});
$("#two").click(function(){
  $("#one").addClass("btn-warning");
  $("#one").removeClass("btn-success");
  $("#two").removeClass("btn-warning");
  $("#two").addClass("btn-success");
  $("#three").addClass("btn-warning");
  $("#three").removeClass("btn-success");
  $("#four").addClass("btn-warning");
  $("#four").removeClass("btn-success");

  $("#example").removeClass("d-show");
  $("#example_wrapper").removeClass("d-show");
  $("#example1").removeClass("d-none");
  $("#example1_wrapper").removeClass("d-none");
  $("#example2").removeClass("d-show");
  $("#example2_wrapper").removeClass("d-show");
  $("#example3").removeClass("d-show");
  $("#example3_wrapper").removeClass("d-show");
  
  $("#example").addClass("d-none");
  $("#example_wrapper").addClass("d-none");
  $("#example1").addClass("d-show");
  $("#example1_wrapper").addClass("d-show");
  $("#example2").addClass("d-none");
  $("#example2_wrapper").addClass("d-none");
  $("#example3").addClass("d-none");
  $("#example3_wrapper").addClass("d-none");


});
$("#three").click(function(){
  $("#one").addClass("btn-warning");
  $("#one").removeClass("btn-success");
  $("#two").addClass("btn-warning");
  $("#two").removeClass("btn-success");
  $("#three").removeClass("btn-warning");
  $("#three").addClass("btn-success");
  $("#four").addClass("btn-warning");
  $("#four").removeClass("btn-success");

  $("#example").removeClass("d-show");
  $("#example_wrapper").removeClass("d-show");
  $("#example1").removeClass("d-show");
  $("#example1_wrapper").removeClass("d-show");
  $("#example2").removeClass("d-none");
  $("#example2_wrapper").removeClass("d-none");
  $("#example3").removeClass("d-show");
  $("#example3_wrapper").removeClass("d-show");
  
  $("#example").addClass("d-none");
  $("#example_wrapper").addClass("d-none");
  $("#example1").addClass("d-none");
  $("#example1_wrapper").addClass("d-none");
  $("#example2").addClass("d-show");
  $("#example2_wrapper").addClass("d-show");
  $("#example3").addClass("d-none");
  $("#example3_wrapper").addClass("d-none");

});
$("#four").click(function(){
  $("#one").addClass("btn-warning");
  $("#one").removeClass("btn-success");
  $("#two").addClass("btn-warning");
  $("#two").removeClass("btn-success");
  $("#three").addClass("btn-warning");
  $("#three").removeClass("btn-success");
  $("#four").removeClass("btn-warning");
  $("#four").addClass("btn-success");

  $("#example").removeClass("d-show");
  $("#example_wrapper").removeClass("d-show");
  $("#example1").removeClass("d-show");
  $("#example1_wrapper").removeClass("d-show");
  $("#example2").removeClass("d-show");
  $("#example2_wrapper").removeClass("d-show");
  $("#example3").removeClass("d-none");
  $("#example3_wrapper").removeClass("d-none");
  
  $("#example").addClass("d-none");
  $("#example_wrapper").addClass("d-none");
  $("#example1").addClass("d-none");
  $("#example1_wrapper").addClass("d-none");
  $("#example2").addClass("d-none");
  $("#example2_wrapper").addClass("d-none");
  $("#example3").addClass("d-show");
  $("#example3_wrapper").addClass("d-show");
  
});


   $('.archiveButton').on('click', function(e) {
         e.preventDefault();
   	  var id = $(this).attr("data-id");
         $('#archive').attr('action', "/admin/menu/"+id);
   	  console.log(id);
   });

   $(document).ready(function() {
       $('#example').DataTable( {
           "order": [[ 5, "desc" ]],
           "pageLength": 7,
           dom: 'Bfrtip',
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 
               {
                   extend: 'print',
                   stripHtml : false,
                   exportOptions: {
                       columns: [ 1,2,3,4]
                   }
               },
           ]
       } );
   } );
   $(document).ready(function() {
       $('#example1').DataTable( {
           "order": [[ 5, "desc" ]],
           dom: 'Bfrtip',
           "pageLength": 7,
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 
               {
                   extend: 'print',
                   stripHtml : false,
                   exportOptions: {
                       columns: [ 1,2,3,4]
                   }
               },
           ]
       } );
   } );
   $(document).ready(function() {
       $('#example2').DataTable( {
           "order": [[ 5, "desc" ]],
           dom: 'Bfrtip',
           "pageLength": 7,
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 
               {
                   extend: 'print',
                   stripHtml : false,
                   exportOptions: {
                       columns: [ 1,2,3,4]
                   }
               },
           ]
       } );
   } );
   $(document).ready(function() {
       $('#example3').DataTable( {
           "order": [[ 5, "desc" ]],
           dom: 'Bfrtip',
           "pageLength": 7,
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 
               {
                   extend: 'print',
                   stripHtml : false,
                   exportOptions: {
                       columns: [ 1,2,3,4]
                   }
               },
           ]
       } );
   } );
   
</script>
<script>
//active sidebar
$(window).on('load', function() {
  $('#sidebarsales').attr('class', "mm-active");
  $('#toptitle:contains("Uptown Grill")').text("Sales Report");
	console.log("works");
});

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


</script>
@endsection