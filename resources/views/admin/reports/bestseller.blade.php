@extends('admin/body.body') @section('content')
<style>
.modal-backdrop {position: inherit!important;}
.modal-backdrop.show {opacity: 0;}
.modal-content {border: 7px solid rgba(0, 0, 0, 0.2)!important;}
.namemenu {font-weight: bold;}
.centered {
    text-align: center;
    align-content: center;
}
.resibo {
   display:none;
}
.ticket img {
    max-width: inherit;
    width: inherit;
}
@media print {
   .resibo {
   display:block;
   margin-left:200px;
   margin-right:200px;
   padding:20px;
   border: 1px solid black;
}
   .canvas , .modal , #app , .orderView , .tableviews , .tablecontainer , .menuContainerMain , .legendDetails , #reciept{
       display:none!important;
    }
    #reciept{
       display:block!important;
    }
}
tr:nth-child(even) {
    background-color: white!important;
}
</style>
<div class="col"><button id="paymentSubmit" type="submit" class="btn btn-success w-100"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reciept" >Process</button></div>
<script>
var today = new Date();
var petsa = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
</script>
<div class=" modal fade" id="reciept" tabindex="-1" aria-labelledby="reciept" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                     <div class="modal-content ">
                        <div class="modal-body " class="ticket">
                           <form action="">
                              <div class="resieptContainer" id="resieptContainer">
                                 <div class="logodiv d-flex justify-content-center">
                                    <img src="{{ asset('images\icons\logo.png') }}" alt="">
                                 </div>
                                 <div class="companyname text-center">
                                    <h1>Uptown Grill</h1>
                                 </div>
                                 <div class="Receiptdetails text-center">
                                    <p>Upper Ground Umipig Building, Quezon Street, Brgy. San Roque <span class="babaprint"> ( 2nd Level of Motorzone Castillejos) 2208 Castillejos, Philippines</span></p>
                                    <p>0916 777 7524</p>
                                    <p><script>print petsa</script></p>
                                    <hr/>
                                 </div>
                                 <div class="orderitems">
                                 <table style="width:100%">
                                   <thead>
                                      <tr>
                                          <th style="width:10%"><center>#</center></th>
                                          <th style="width:30%"><center>ORDERS</center></th>
                                          <th style="width:30%"><center>UNIT PRICE</center></th>
                                          <th style="width:30%"><center>LINE TOTAL<br><span style="font-size: 10px;">discount not included</span></center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td><b> UKB199 x10 </b><br><span style="font-size: 10px;">SRCTZN 3x, PWD 3x</span></td>
                                          <td><center>P199</center></td>
                                          <td style="text-align:right!important"><center>P 1990</center></td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td><b> UKB259 x10</b><br><span style="font-size: 10px;">PWD 3x</span></td>
                                          <td><center>P259</center></td>
                                          <td style="text-align:right!important"><center>P 2490</center></td>
                                      </tr>
                                      <tr>
                                          <td colspan="3"></td>
                                          <td><hr/></td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <th colspan="2"><center>Subtotal</center></th>
                                          <td style="text-align:right!important"><center>P 4480</center></td>
                                      </tr>
                                      <tr>
                                          <td colspan="4"><hr/></td>
                                      </tr>
                                      <tr>
                                         <tr>
                                             <td></td>
                                             <th colspan="2"><center> SRCTZN 20%</center></th>
                                             <td style="text-align:right!important">-119.4</td>
                                         </tr>
                                         <tr>
                                           <td></td>
                                           <th colspan="2"><center> PWD 15%</center></th>
                                           <td style="text-align:right!important">-288.75</td>
                                         </tr>
                                         <tr>
                                           <td colspan="3"></td>
                                           <td style="text-align:right!important"><hr/></td>
                                         </tr>
                                         <tr>
                                           <td></td>
                                           <th colspan="2"><center> Discount Total</center></th>
                                           <td style="text-align:right!important">408.15</td>
                                         </tr>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><hr/></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <th colspan="2"><center>Subtotal</center></th>
                                        <td style="text-align:right!important">4,071.85</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  
                                 </div>
                              </div>
                              <div class="row pt-4 ">
                                 <div class="col">
                                    <button class="btn btn-secondary hidden-print w-100" data-bs-dismiss="modal" onclick="window.print()">Print bill</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        </div>
                        </div>
                     </div>
@endsection