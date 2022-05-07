@extends('layouts.app')
@section('content')
<div class="container tables p-3 mt-5">
    <div class="legendTop d-flex shadowContainer justify-content-center align-items-end px-4 d-none d-sm-flex">
        {{--
        <h3 class="legendHeading">Table Status</h3>
        --}}
        <div class="legendicon">
           <div class="legendItem text-center">
              <img class="legendIconImg withIcon" src="{{ asset('images\legend\available.png') }}" alt="icon">
              <p>Available</p>
           </div>
        </div>
        <div class="legendicon">
           <div class="legendItem text-center">
              <img class="legendIconImg withIcon " src="{{ asset('images\legend\occupied.png') }}" alt="icon">
              <p>Occupied</p>
           </div>
        </div>
        <div class="legendicon">
           <div class="legendItem text-center">
              <img class="legendIconImg withIcon" src="{{ asset('images\legend\timerwaning.png') }}" alt="icon">
              <p>Time Warning</p>
           </div>
        </div>
        <div class="legendicon">
         <div class="legendItem text-center">
            <img class="legendIconImg withIcon" src="{{ asset('images\legend\timeended.png') }}" alt="icon">
            <p>Time Ended</p>
         </div>
      </div>
        <div class="legendicon">
           <div class="legendItem text-center">
              <img class="legendIconImg withIcon" src="{{ asset('images\legend\ordertaken.png') }}" alt="icon">
              <p>Order Taken</p>
           </div>
        </div>
        <div class="legendicon">
           <div class="legendItem text-center">
              <img class="legendIconImg withIcon" src="{{ asset('images\legend\toserve.png') }}" alt="icon">
              <p>To Serve</p>
           </div>
        </div>
        <div class="legendicon">
         <div class="legendItem text-center">
            <img class="legendIconImg withIcon" src="{{ asset('images\legend\ordercomplete.png') }}" alt="icon">
            <p>Orders Complete</p>
         </div>
      </div>
        <button id="menuz" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           <div class="legendItem text-center">
              <p>Change Menu Status</p>
           </div>
        </button>
     </div>
   <div class="row g-1  g-3 g-sm-1 p-lg-5 p-sm-2" >
    @foreach($tables as $table)
    @if($table->table_status_id==1)
    <!-- available -->
    <div class="col-4 col-lg-3 col-xl-2  tableBtnHolder mb-4" id="zindex{{$table->tablename}}">
       <div class="available">
          <button class="btn tableOptionContainer tables availableBtn" onclick="table(this.id)" id="{{$table->tablename}}" data-bs-toggle="modal" data-bs-target="#exampleModal" >
             <h5>{{$table->tablename}}</h5>
             <span class="imgIcon" id="tableStatusIndicatorSpan{{$table->tablename}}" ><img id="tableStatusIndicator{{$table->tablename}}" src="" alt="icon"></span>
             <p class="p-0 timeIntable"><span id="tr{{$table->tablename}}btn"></span></p>
          </button>
       </div>
    </div>
    {{-- @elseif($table->table_status_id==2) --}}
    <!-- Taken -->
    {{-- <div class="col-4 col-lg-3 col-xl-2  tableBtnHolder mb-4">
       <div class=" orderTaken ">
          <button class="btn   tables orderTakenBtn" onclick="tableCashier(this.id)" id="{{$table->tablename}}" >
             <h5 >{{$table->tablename}}</h5>
             <span class="imgIcon"><img src="{{ asset('images\icons\order-taken.png') }}" alt="icon" ></span>
             <p class="p-0 timeIntable"><span id="tr{{$table->tablename}}btn"></span></p>
          </button>
       </div>
    </div> --}}
        {{-- @elseif($table->table_status_id==2) --}}
    <!-- Taken -->
    {{-- <div class="col-4 col-lg-3 col-xl-2  tableBtnHolder mb-4">
       <div class=" orderTaken ">
          <button class="btn   tables orderTakenBtn" onclick="tableCashier(this.id)" id="{{$table->tablename}}" >
             <h5 >{{$table->tablename}}</h5>
             <span class="imgIcon"><img src="{{ asset('images\icons\order-taken.png') }}" alt="icon" ></span>
             <p class="p-0 timeIntable"><span id="tr{{$table->tablename}}btn"></span></p>

          </button>
       </div>
    </div> --}}
    @else
    <!-- Occupied -->
    <div class="col-4 col-lg-3 col-xl-2  tableBtnHolder mb-4">
       <div class=" occupied">
          <button class="btn  tables occupiedBtn tr{{$table->tablename}}btnholder" onclick="table(this.id)" id="{{$table->tablename}}" data-bs-toggle="modal" data-bs-target="#exampleModal" >
             <h5 class="p-0 m-0">{{$table->tablename}}</h5>
             <span class="imgIcon" id="tableStatusIndicatorSpan{{$table->tablename}}" ><img id="tableStatusIndicator{{$table->tablename}}" src="" alt="icon"></span>
             <p class="p-0 timeIntable"><span id="tr{{$table->tablename}}btn"></span></p>
          </button>
       </div>
    </div>
    @endif
    @endforeach
 </div>
</div>
<div class="container-fluid legend d-none ">
   <div class="row">
      <div class="col-4 ">
         <div class="icon Available d-flex justify-content-center align-items-center">
            <img src="{{ asset('images\icons\available.png') }}" alt="icon">
         </div>
         <p>Available</p>
      </div>
      <div class="col-4">
         <div class="icon Pending-Order d-flex justify-content-center align-items-center">
            <img src="{{ asset('images\icons\order-taken.png') }}" alt="icon">
         </div>
         <p>Pending Order</p>
      </div>
      <div class="col-4">
         <div class="icon Delivered d-flex justify-content-center align-items-center">
            <img src="{{ asset('images\icons\timelimit.png') }}" alt="icon">
         </div>
         <p>Delivered</p>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade removeOverflow" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg waiterModalDialog">
      <div class="modal-content waiterMenuModal" id="modalContent">
         <div class="modal-header p-2 d-flex justify-between align-items-center headerwaiter bg-white">
            {{--
            <div class="MenuBackBtn">
               <button type="button" class=" btn  w-100 h-100 " data-bs-dismiss="modal" id="modalClose">
                  <img  src="{{ asset('images\icons\backIcon.png') }}" alt="icon">
                  <p>Back</p>
               </button>
            </div>
            --}}
            <button type="button" class=" btn  MenuBackBtn" data-bs-dismiss="modal" id="modalClose">
               <img  src="{{ asset('images\icons\backIcon.png') }}" alt="icon">
               <p>Back</p>
            </button>
            <button class="Cart btn  MenuBackBtn" id="cartBack" onclick="showmenu()">
               <img  src="{{ asset('images\icons\backIcon.png') }}" alt="icon">
               <p>Back</p>
            </button>
            <h5 class="tablename" >Table: <span id="menuid"></span></h5>
            <button class="Cart btn MenuCartBtn  cartBtn" id="cart"  onclick="hidemenu()">
               <img  src="{{ asset('images\icons\cart.png') }}" alt="icon">
               <p>Cart</p>
               <span class="cartQuantity d-none" id="cartCount">2</span>
               {{-- <span class="cartQuantity d-none" id="cartCCount"></span> --}}
            </button>
         </div>
         <div class="modal-body menu-modal-body ">
            <div class="menuHolder">
               <h1 class=" pb-2">Menu <span class="h1Span">Category</span></h1>
               <div class="Cathold">
                  {{-- <button class="btn btn-primary nextBtn">></button> --}}
                  {{-- <button class="btn btn-primary prevBtn"><</button> --}}
                  <div class=" d-flex categoryContainer  categoryHolder shadow-sm   py-2" id="myDIV">
                     @foreach($categories as $category)
                     <a class="btn item  Category categoryItem shadowContainer  p-2" aria-current="page" category_name="{{$category->name}}" category_id="{{$category->id}}"  href="#" id="category{{$category->id}}"   >
                        <div class="categoryImg d-flex justify-content-center align-items-center">
                           <img  src="{{$category->image}}" alt="icon">
                        </div>
                        <div class="categoryDetails text-center p-1">
                           <h2 class="categoryName"> {{$category->name}}</h2>
                        </div>
                     </a>
                     @endforeach
                  </div>
               </div>
               <div class="menus menuall  pt-3">
                @foreach($categories2 as $category)
                @if ($category->status_id == 1 && $category->id !=6)

                <div class="row{{$category->id }} menuCatHolderdisplay row g-3 g-lg-4 border-bottom pb-3">
                 <div class="cattext d-flex justify-content-start align-items-center">
                    {{-- <p class="mb-3 pt-2">{{$category->name}}</p> --}}
                    <span class="mb-3 pt-2"> {{$category->menu_count}} {{$category->name}} Result</span>
                 </div>

                    @foreach ($menus as $menu)
                    @if ($category->id == $menu->Category_id )
                   @if ($menu->Status_id==1)
                   <div class="col-4 col-lg-3 col-xl-3 divmenu{{$menu->id}}   category" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">
                      <button class="menuItem  menuitem{{$menu->id}}  btn shadowContainer px-2 py-1">
                        <span id="span{{$menu->id}}" class="notAvailableText d-none">Not Available</span>
                         <div class="menuImgContainer ">
                            <img  src="{{$menu->image}}" alt="menu image">
                         </div>
                         <div class="menuDetails mt-3">
                            <p class="menuName">{{$menu->name}}</p>
                            <p class="menuPrice">₱{{$menu->price}}</p>
                         </div>
                      </button>
                   </div>
                   @elseif ($menu->Status_id==2)
                   <div class="col-4 col-lg-3 col-xl-3 divmenu{{$menu->id}} " data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}" disabled>
                      <button class="menuItem menuitem{{$menu->id}}   btn shadowContainer px-2 py-1 notAvailableMenu nopointerEvents" >
                         <span id="span{{$menu->id}}" class="notAvailableText">
                         Not Available
                         </span>
                         <div class="menuImgContainer ">
                            <img  src="{{$menu->image}}" alt="menu image">
                         </div>
                         <div class="menuDetails mt-3">
                            <p class="menuName">{{$menu->name}}</p>
                            <p class="menuPrice">₱{{$menu->price}}</p>
                         </div>
                      </button>
                   </div>
                   @endif
                   @endif
                   @endforeach
                </div>
                @endif
                @endforeach
              </div>



                  <div class="menuConfirmationmesage shadow-sm">
                     <button class="btn closeMesage" id="closeQuantityMessage">
                     <img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon">
                     </button>
                     <div class="text-center">
                        <img class="successImg" src="{{ asset('images\icons\successIcon.png') }}" alt="close icon">
                        <p><span id="menuName"></span> is successfully added to the cart</p>
                     </div>
                  </div>
                  <div class="menuQuntity p-2" >
                     <div class="menuQUantityModal " >
                        <div class="text-center card-title p-2 border-bottom d-flex justify-content-between align-items-center">
                           <h5 id="menuName">Menu Name</h5>
                           <button class="btn " id="closeQuantity">
                           <img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon">
                           </button>
                        </div>
                        <div class="card-body">
                           <div class="quntityContainer waiterQuantity d-flex justify-content-between align-items-center px-3">
                              <input type="hidden" id="menuOrderid">
                              <input type="hidden" id="tableid">
                              <input type="hidden" id="user_id" value="{{$user}}">
                              <input type="hidden" id="ticket_id">
                              <button class="btn  subCounter" type="button">-</button>
                              <input type="text" class="form-control inputOrder"  id="counter" value="1">
                              <button class="btn  addCounter" type="button">+</button>
                           </div>
                        </div>
                        <div class="discount-Container py-3">
                           <form action="" id="send_ticket" class="px-2">
                              @foreach($discs as $disc)
                              <div class="form-check form-check-inline dis">
                                 @if($disc->id==3)
                                 <label class="form-check-label" for="inlineRadio1" checked>{{$disc->name}}</label>
                                 <input class="form-check-input" type="radio" name="discount" id="discount{{$disc->id}}" value="{{$disc->id}}" checked>
                                 @else
                                 <label class="form-check-label" for="inlineRadio1">{{$disc->name}}</label>
                                 <input class="form-check-input" type="radio" name="discount" id="discount{{$disc->id}}" value="{{$disc->id}}" >
                                 @endif
                              </div>
                              @endforeach
                        </div>
                        <div class="feature-card-footer px-2 pt-3">
                        <button class="btn btn-success w-100 " id="showMessage" type="submit">Add</button>
                        </div>
                        </form>
                     </div>
                  </div>

                </div>
            <div class="cartHolder p-0 m-0">
               <div class="cart">
                  <div class="d-flex bg-white navigatortop">
                     <button class="btn " id="unconfirmedBtn">Cart</button>
                     <button class="btn  " id="confirmedBtn">All Order</button>
                     <input type="hidden" id="tableidOrder">
                  </div>
                  <div class="Carteditedit rounded p-4 shadow">

                    <h5 class="text-center pt-3">Are you sure you want to edit this item ? <span id="menuNameCartcart"></span></h5>
                    <div class="row mt-5">
                        <div class="col">
                            <button class="btn btn-outline-danger w-100" id="canselcloseEDitCart">No</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-success w-100" onclick="editItemCartcart()">Yes</button>
                        </div>
                   </div>
                 </div>

                  <div class="editCartCashier rounded p-2 shadow">
                    <input type="hidden" id="tiketIDcansel">
                    <input type="hidden" id="menuIDcansel">
                    <input type="hidden" id="userIDcansel">
                    <div class=" d-flex justify-content-between align-items-center border-bottom  p-2">
                        <h5 class="menuNameHeader">sample menu</h5>
                        <button class="btn closeEditCart"><img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon"></button>
                    </div>
                    <div class="inputEditholder p-2 px-3 ">
                        <div class="regularContainer mt-2 cartInputEDit row">
                            <p class="col-4 align-middle">Regular</p>
                            <div class="inputHolderEdit col-6">
                                <div class="discountInputEDit  d-flex justify-content-between align-items-center">
                                    <button class="btn   EDitsubCounter" disc="3" type="button">-</button>
                                    <input id="disc3" type="text" class="form-control inputOrder"   value="0">
                                    <button class="btn  EDitaddCounter" disc="3" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-center">
                                <button  disc="3"   class="btn clearDiscount "><img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon"></button>
                            </div>
                        </div>
                        <p class="border-bottom pb-1 w-100 mt-3">Discounted</p>
                        @foreach($discount2 as $disc2)
                         <div class="discounted cartInputEDit row">
                            <p class="col-4 align-middle">{{$disc2->name}}</p>
                            <div class="inputHolderEdit col-6">
                                <div class="discountInputEDit  d-flex justify-content-between align-items-center">
                                    <button class="btn   EDitsubCounter" disc="{{$disc2->id}}" type="button">-</button>
                                    <input id="disc{{$disc2->id}}" type="text" class="form-control inputOrder"  value="0">
                                    <button class="btn  EDitaddCounter" disc="{{$disc2->id}}" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end align-items-center">
                            <button class="btn clearDiscount"  disc="{{$disc2->id}}" ><img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon"></button>
                            </div>

                        </div>

                        @endforeach
                    </div>

                    <div class="totalEdit p-2 mt-2">
                        <h5>Total: <span class="editTotal"></span></h5>
                    </div>
                    <div class="submit mt-2">
                        <button id="conFirmCartEdit" class="btn btn-primary w-100 py-2">Confirm Edit</button>
                    </div>
                 </div>

                  <div class="cancelCartCashier waitercansel rounded p-4 shadow">

                    <input type="hidden" id="tiketIDcansel">
                    <input type="hidden" id="menuIDcansel">
                    <input type="hidden" id="userIDcansel">

                    <h5 class="text-center pt-3">Are you sure you want to cancel this item? <span id="menuNameCancel"></span></h5>
                    <div class="row mt-5">
                        <div class="col">
                            <button class="btn btn-outline-danger w-100" id="canselcloseClearCart">No</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-success w-100" onclick="cancelItemCart()">Yes</button>
                        </div>
                   </div>
                 </div>
                  <div class="cartItem row pt-2  confirmedview px-2">
                     <div class="navBtnAllorders w-100" >
                        {{--
                        <div class="btn-group" role="group" aria-label="Basic example">
                           <button type="button" class="btn btn-outline-primary " id="btnConfirmed" >Confirmed</button>
                           <button type="button" class="btn btn-outline-primary" id="btnForDelivery">For Delivery</button>
                           <button type="button" class="btn btn-outline-primary" id="btnDelivered">Delivered</button>
                        </div>
                        --}}
                        <form action="" id="BtngroupAllOrders">
                           <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                              <input type="radio" class="btn-check" value="1" name="btnradio" id="btnradio1" autocomplete="off" checked>
                              <label class="btn btn-outline-primary rounded-0" for="btnradio1">Confirmed</label>
                              <input type="radio" class="btn-check" value="2" name="btnradio" id="btnradio2" autocomplete="off">
                              <label class="btn btn-outline-primary rounded-0" for="btnradio2">For Delivery</label>
                              <input type="radio" class="btn-check" value="3" name="btnradio" id="btnradio3" autocomplete="off">
                              <label class="btn btn-outline-primary rounded-0" for="btnradio3">Delivered</label>
                           </div>
                        </form>
                     </div>

                     <table class="table text-center   mt-3" id="confirmorderlist" >
                        {{-- Confimed --}}
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-center">Total</th>
                             </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <table class="table text-center  mt-3" id="deliveryorderlist" >
                        {{-- For delivery --}}
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">Actions</th>
                             </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <table class="table text-center mt-3" id="deliveredorderlist" >
                        {{-- deliverd --}}
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-center">Total</th>
                             </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>

                     <div class="cartedit p-3 rounded bg-white shadow ">
                        <div class="menunameCartEdit d-flex justify-content-between align-items-center border-bottom pb-2">
                           <h2 id="cartMenuName">Menu name <span>x</span><span classs="iteCArtmquntity">2</span></h2>
                           <button type="button" id="closeEditCart" class="btn-close" aria-label="Close"></button>
                        </div>

                        <div class="qtyEdit  border-bottom">
                           <form action="" id="cartEdit">
                              <input type="hidden" id="tiketIDCart">
                              <input type="hidden" id="menuIDCart">
                              <h3 class="text-center mb-2 mt-2">QTY</h3>
                              <div class="CartQuantityForm">
                                 <button class="btn cartminus">-</button>
                                 <input type="number" id="EditCartIput" class="form-control"  value="1">
                                 <button class="btn cartAdd">+</button>
                              </div>
                              <div class="form-check form-switch mt-3 mb-2">
                                 <label class="form-check-label" for="disCountDrop">Discount</label>
                                 <input class="form-check-input" type="checkbox" id="disCountDrop">
                              </div>
                        </div>

                        <div class="discountContainer border-bottom py-2">
                        <div class="discountType mb-3">
                        <p class="text-center">Sinior</p>
                        <div class="CartQuantityForm">
                        <button class="btn ">-</button>
                        <input type="text" class="form-control">
                        <button class="btn">+</button>
                        </div>
                        </div>
                        <div class="discountType">
                        <p class="text-center">PWD</p>
                        <div class="CartQuantityForm">
                        <button class="btn ">-</button>
                        <input type="text" class="form-control">
                        <button class="btn">+</button>
                        </div>
                        </div>
                        </div>
                        {{-- <div class="tableCartEDIT mt-3">
                        <table class="table ">
                        <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Dicount Type</th>
                        <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                        <button class="btn btn-danger btn-sm">Cansel</button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        </tr>
                        </tbody>
                        </table>
                        </div> --}}
                        {{-- <button type="submit" class="btn btn-success w-100 mt-4">Proceed</button> --}}
                        </form>
                     </div>

                     {{-- clear cart modal --}}

                     <div class="deliverConfirm rounded p-4 shadow ">
                        <input type="hidden" id="tiketIDCartDelivered">
                        <input type="hidden" id="menuIDCartDelivered">
                        <h5 class="text-center">Do you Want to mark "<span class="menuNameDeliverd"></span>" as delivered?</h5>
                        <div class="row mt-5">
                           <div class="col">
                              <button class="btn btn-outline-danger w-100" id="closeDelivermodal">No</button>
                           </div>
                           <div class="col">
                              <button class="btn btn-success w-100"  onclick="deliveryItem()">Yes</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cartItem row  pt-2  unconfirmedview px-2">
                     {{-- <div class="clearCartBTNCo d-flex justify-content-end">
                        <button class="btn btn-sm btn btn-danger btn-sm clearCartBtn" id="clearCart" >Clear Cart</button>
                     </div> --}}

                     {{-- clear cartItem --}}
                     <div class="ClearCart rounded p-4 shadow">

                        <input type="hidden" id="tiketIDCartDelivered">
                        <input type="hidden" id="menuIDCartDelivered">

                        <h5 class="text-center">Are you sure you want to clear Cart?</h5>
                        <div class="row mt-5">
                            <div class="col">
                                <button class="btn btn-outline-danger w-100" id="closeClearCart">No</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-success w-100" onclick="clearCart()">Yes</button>
                            </div>
                       </div>
                 </div>
                     <table class="table text-center  mt-5 " id="unconfirmorderList">
                        <thead>
                            <tr>
                                <th colspan="2" scope="col">Menu</th>
                                <th scope="col" class="text-center">Qty</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">Actions</th>
                             </tr>

                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <div class="cartedit p-3 rounded bg-white shadow ">
                        <div class="menunameCartEdit d-flex justify-content-between align-items-center border-bottom pb-2">
                           <h2 id="cartMenuName1"><span></span><span classs="iteCArtmquntity"></span></h2>
                           <button type="button" id="closeEditCart" class="btn-close" aria-label="Close"></button>
                        </div>

                        <div class="qtyEdit  border-bottom">
                           <form action="" id="cartEdit">
                              <input type="hidden" id="tiketIDCart">
                              <input type="hidden" id="menuIDCart">
                              <h3 class="text-center mb-2 mt-2">QTY</h3>
                              <div class="CartQuantityForm">
                                 <button class="btn cartminus">-</button>
                                 <input type="number" id="cartEditInput"class="form-control" value="1">
                                 <button class="btn cartAdd">+</button>
                              </div>
                              <div class="form-check form-switch mt-3 mb-2">
                                 <label class="form-check-label" for="CheckDRop">Discount</label>
                                 <input class="form-check-input" type="checkbox" id="CheckDRop">
                              </div>
                        </div>

                        <div class="discountContainer border-bottom py-2">
                        <div class="discountType mb-3">
                        <p class="text-center">Sinior</p>
                        <div class="CartQuantityForm">
                        <button class="btn ">-</button>
                        <input type="text" class="form-control">
                        <button class="btn">+</button>
                        </div>
                        </div>
                        <div class="discountType">
                        <p class="text-center">PWD</p>
                        <div class="CartQuantityForm">
                        <button class="btn ">-</button>
                        <input type="text" class="form-control">
                        <button class="btn">+</button>
                        </div>
                        </div>
                        </div>
                        {{-- <div class="tableCartEDIT mt-3">
                        <table class="table" id="CancelTable">
                        <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Discount Type</th>
                        <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        </div> --}}
                        <button type="submit" class="btn btn-success w-100 mt-4" id="editCartSubmit">Proceed</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="confirmOrderBtnContainer">

                <div class="total p-2 border-top-dotted mt-2 px-3 ">
                    <div class="subtotal d-flex justify-content-between mt-3">
                       <p>Subtotal</p>
                       <p>₱ <span id="subtotal"></span></p>
                    </div>
                    <div class="Discount d-flex justify-content-between m-0 p-0">
                       <p>Discount</p>
                       <p>₱ <span id="discounted"></span></p>
                    </div>
                    <div class="TotalText d-flex justify-content-between mt-3">
                       <h2>Total</h2>
                       <h3>₱ <span id="cartPriceValue"></span></h3>
                    </div>
                 </div>

                <div class="row confimeBtn  px-3 pb-3 ">
                    <div class="col"><button class="btn btn-sm btn btn-danger w-100 rounded-0 py-3  clearCartBtn" id="clearCart" >Clear Cart</button></div>

                    <form class="col"  action="" id="SendOrderEvent">
                        <input type="hidden" id="ordersToSend">
                        <button class="sendOrder btn btn-primary w-100 rounded-0 py-3" id="sendOrder"  type="submit" >Confirm Order</button>
                     </form>
                </div>
             </div>
         </div>
      </div>

   </div>
</div>
<script src="./js/app.js"></script>
<script>

Echo.channel('deliveryEvent')
              .listen('.deliveryEvent', (e)=>{
                console.log(e);
                cart();
              });
Echo.channel('confirmOrderEvent')
              .listen('.confirmOrderEvent', (e)=>{
                console.log(e);
                cart();
                $("#sendOrder").prop("disabled", true).button('refresh');

              });


//table status
$('.imgIcon').hide();
function tableStatusIndicator(){
$.ajax({
url:"/tableStatusIndicator",
method:'GET',
data: {

},

success:function(result){
    console.log(result);
    var  orderTakenIconIndicator = $('#orderTakenIconIndicator').val();
    var toserveIconIndicator  = $('#toserveIconIndicator').val();
    var completedIconIndicator  = $('#completedIconIndicator').val();

    for(var i=1 ;i <=result['tablesStatus'].length;i++){
        if(result['tablesStatus'][i-1]['confirmed'] > 0 && result['tablesStatus'][i-1]['to_serve'] == 0 ){
            $('#tableStatusIndicatorSpan'+result['tablesStatus'][i-1]['table_id']).show();
            $('#tableStatusIndicator'+result['tablesStatus'][i-1]['table_id']).attr('src',orderTakenIconIndicator);
        }else if(result['tablesStatus'][i-1]['to_serve'] > 0 || result['tablesStatus'][i-1]['confirmed'] > 0){
            $('#tableStatusIndicatorSpan'+result['tablesStatus'][i-1]['table_id']).show();
            $('#tableStatusIndicator'+result['tablesStatus'][i-1]['table_id']).attr('src',toserveIconIndicator);
        }
        else if(result['tablesStatus'][i-1]['to_serve'] == 0 && result['tablesStatus'][i-1]['confirmed'] == 0 && result['tablesStatus'][i-1]['delivered'] > 0){
            $('#tableStatusIndicatorSpan'+result['tablesStatus'][i-1]['table_id']).show();
            $('#tableStatusIndicator'+result['tablesStatus'][i-1]['table_id']).attr('src',completedIconIndicator);
        }else{
            $('#tableStatusIndicatorSpan'+result['tablesStatus'][i-1]['table_id']).hide();
        }

    }
    console.log('satus indicatr');
}
});

}
tableStatusIndicator();

   const tableid=document.getElementById('tableid');
   const userid=document.getElementById('user_id');
   const ticketform=document.getElementById('send_ticket');
   const quantity= document.getElementById('counter');
   const sendOrderForm=document.getElementById('SendOrderEvent');
   const tableidInOrder=document.getElementById('tableidOrder');

   sendOrderForm.addEventListener('submit', function(e){
       cart();
     const menusssss =$('#ordersToSend').val();
     var array = JSON.parse("[" + menusssss + "]");

     e.preventDefault();
     const option3={
       method:'post',
       url:'confirmOrder',
       data:{
           order_id:array,
           table_id:tableidInOrder.value
       },
       transformResponse: [(data)=> {
           return data;
       }]
   }
   axios(option3);
   });


   ticketform.addEventListener('submit', function(e){
     console.log(tableid.value);
   e.preventDefault();
   const option={
       method:'post',
       url:'create-ticket',
       data:{
         table:tableid.value,
           ticket_status:2,
           user:userid.value
       },
       transformResponse: [(data)=> {
           return data;
       }]
   }
   axios(option);
   const menu = document.getElementById('menuOrderid');
   var discount=$("input:radio[name=discount]:checked").val();
   console.log(window.lastticket);
   const option1={
       method:'post',
       url:'create-order',
       data:{
           table:tableid.value,
           menu_id:menu.value,
           user_id:userid.value,
           status_id:1,
           discount_id:discount,
           quantity:quantity.value

       },
       transformResponse: [(data)=> {
           return data;
       }]
   }
   axios(option1);


   const option2={
       method:'post',
       url:'unconfirmed',
       data:{
           unconfirmed:quantity.value,
       },
       transformResponse: [(data)=> {
           return data;
       }]
   }
   axios(option2);
   $(".menuQuntity").hide();
   });



   Echo.channel('confirmOrderEvent')
    .listen('.confirmOrderEvent', (e)=>{
     console.log(e);
     var ID = $('#menuid').text();
       cart();

    });

   Echo.channel('createTicket')
    .listen('.createTicket', (e)=>{
      console.log(e.status.length);
      if(e.status.length==1){

      }else{

     $('#table'+e.table).val(e.ticket_id);
     $('#ticket_id').val(e.ticket_id);
     window.lastticket=e.ticket_id;
      }

    });

    // Echo.channel('deliveryEvent')
    //           .listen('.deliveryEvent', (e)=>{
    //             console.log(e);
    //             cart();
    //           });


   Echo.channel('createOrder')
    .listen('.createOrder', (e)=>{
      change(e.table);
     console.log(e);
     success(e.table,e.menuOnly[0]['name']);
     console.log(e.ticket);
      $('#counter').val('1');
      $('#cartCount').html(e.orderCount.length);
      cart();
      cartCountAdd(e.table);
    });

    Echo.channel('readyOrderEvent')
             .listen('.readyOrderEvent', (e)=>{
                // cart();
               if(e.addTimer.length>0){
               $('#Timer'+e.table_id).html(e.time);
               $('#imgIcon'+e.table_id).attr($("#timericon").val());
               console.log($("#timericon").val());
               }
               else if(e.addTimer.length==0){
                 $('.imgIcon'+e.table_id).addClass('d-none');
               }
               console.log(e);

             });

   $('.cartHolder')[0].style.display = 'none';
   // document.getElementById('cartBack').style.display = 'none';

   function hidemenu(){
     cart();
       document.getElementById('cartBack').classList.remove('d-none');
       document.getElementById('sendOrder').classList.remove('d-none');
       document.getElementById('modalClose').classList.add('d-none');
       document.getElementsByClassName('menuHolder')[0].style.display = 'none';
       document.getElementsByClassName('cartHolder')[0].style.display = 'block';
       // document.getElementsById('cartBack').style.display = 'block';
       // document.getElementsById('modalClose').style.display = 'none';
       // document.getElementsByClassName('sendOrder')[0].style.display = 'block';

       if(parseInt( $('#cartCount').text()) > 0){
                        $('#cartCCount').removeClass('d-none');
                        $('#sendOrder').removeAttr("disabled");
                        console.log('greater 0');
                   }else{
                        $("#sendOrder").prop("disabled", true).button('refresh');
                        console.log('less or 0');
                   }


   }

   //get order details
   // $( "#closeMenuQuantity" ).click(function() {
   //     $('.menuQuntity').hide();
   // }
   $( "#cart" ).click(function() {
   $('.cartBtn').css("visibility", "hidden");
   $('#unconfirmedBtn').addClass('cartactive');
   $('.confirmOrderBtnContainer').show();
   });

   function cart(){
     var ID = $('#menuid').text();
       $(".menulist").remove();
       $.get('cartquanity1/'+ID,function(data){
               console.log(data);

            //    var table = document.getElementById("unconfirmorderList");
            //     var tableLength=table.length;
            //     var row = table.getElementsByTagName('tbody')[0].insertRow(tableLength);
               var tid = $('#menuid').html();
               $('#tableidOrder').val(tid);
               $(".menulist").remove();
               var arr=[];

               if(data['ticketCount'][0]['ticket_count'] == 0){


$("#clearCart").prop("disabled", true).button('refresh');
$("#sendOrder").prop("disabled", true).button('refresh');
$('#category1').addClass('disable-click ');
$('.row1').hide();
$('.menulist').remove();

}else{
var total=0;
var dis=0;
var supertotal=0;
var count = 0;
var table = document.getElementById("unconfirmorderList");
var tableLength=table.length;
var row = table.getElementsByTagName('tbody')[0].insertRow(tableLength);
$('.menulist').remove();
if(data['confirm'].length == 0){
    $("#clearCart").prop("disabled", true).button('refresh');
    $("#sendOrder").prop("disabled", true).button('refresh');
    $('#category1').addClass('disable-click ');
    $('.row1').addClass('d-none');
    $('#cartCount').html(0);
}else{
$("#clearCart").prop("disabled", false).button('refresh');
$("#sendOrder").prop("disabled", false).button('refresh');
$('#category1').removeClass('disable-click');
$('.row1').addClass('d-flex');
$('.row1').removeClass('d-none');
$('.menulist').remove();

for(var i =1; i <= data['confirm'].length; i++) {
   var row = table.insertRow(i);
   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
       cell1.innerHTML = '₱'+ data['confirm'][i-1][0]['price']+' '+ data['confirm'][i-1][0]['name']+'<div id="discount'+data['confirm'][i-1][0]['menu_id']+'"><input type="hidden" name="menuid" value="'+data['confirm'][i-1][0]['menu_id']+'"></div>';
       //get discounts

       $.ajax({
        url: "/discountappend",
        type:"GET",
        data:{
            menuId:data['confirm'][i-1][0]['menu_id'],
            tableid:data['confirm'][i-1][0]['tableid'],
            userid:data['confirm'][i-1][0]['user']
        },
        success:function(data){
            console.log(data);


            for(var i =1; i <= data['discounts'].length; i++) {
                if(data['discounts'][i-1]['discount'] == 3){

                }else{

                    $('#discount'+data['discounts'][i-1]['menu_id']).append("<span class='discountpill mr-2'>"+data['discounts'][i-1]['discount_name']+" x"+data['discounts'][i-1]['count_discount']+"</span>");
                }

            }


        },
        error: function(error) {
            console.log(error);
        }
        });

//    cell2.innerHTML = data['confirm'][i-1][0]['price'];
//    cell3.innerHTML = '<form action="" class="d-flex QtyContainer"><button class="btn btn-danger">-</button><input class="form-control inputNumber" type="text" value="'+data['confirm'][i-1][0]['quantity']+'"><button class="btn btn-primary">+</button></form><span class="Qtyspan " ></span>';
//    cell4.innerHTML =data['confirm'][i-1][0]['quantity']*data['confirm'][i-1][0]['price'];
   cell2.innerHTML = data['confirm'][i-1][0]['quantity'];
   cell3.innerHTML ='₱'+data['confirm'][i-1][0]['quantity']*data['confirm'][i-1][0]['price'];
   cell4.innerHTML ='<button onclick="editItemCart(this.id)" id="'+data['confirm'][i-1][0]['menu_id']+'" class="btn btn-sm btn-outline-primary rounded-0">Edit</button> <button class="btn btn-danger btn-sm rounded-0" id="'+data['confirm'][i-1][0]['menu_id']+'" onclick="clearItemCart(this.id)">X</button> <input id="menu'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="menuName" value="'+data['confirm'][i-1][0]['name']+'"><input id="ticket'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="ticketid" value="'+data['confirm'][i-1][0]['ticket_id']+'"><input id="menuID'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="menuid" value="'+data['confirm'][i-1][0]['menu_id']+'"><input id="userID'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="userId" value="'+data['confirm'][i-1][0]['user']+'"><input id="qty'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="quantity" value="'+data['confirm'][i-1][0]['quantity']+'"><input id="table'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="tableid" value="'+data['confirm'][i-1][0]['tableid']+'"><input id="Order_id'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="order_id" value="'+data['confirm'][i-1][0]['order_id']+'">';
   var add = data['confirm'][i-1][0]['quantity']*data['confirm'][i-1][0]['price'];
   // var DISCOUNT=total-data['confirm'][i-1][0]['Total'];
   var disCount=data['confirm'][i-1][0]['discount'];

   console.log(dis);
   total=total + parseInt(add);
   row.classList.add('menulist');
   cell1.classList.add('colspanadd');
   $('.colspanadd').attr('colspan',2);

   if(data['confirm'][i-1][0]['quantity']){
    row.classList.add('menuTrDisable');
   }

   console.log(total);
   var dis=dis+data['confirm'][i-1][0]['Total'];
   $('#subtotal').html(total);
    count = count+data['confirm'][i-1][0]['quantity'];
   supertotal=total-dis;
   $('.PrintMenuList').prepend($('<div class="d-flex justify-content-between"><p>'+data['confirm'][i-1][0]['name']+' x'+data['confirm'][i-1][0]['quantity']+'</p><p> ₱'+add+'</p></div>'));
   $('#PrintTotalItem').html(total);
   $('#cartCount').html(count);
   // arr.push(data['all'][i-1]['id']);
}
}

//confirm orders




//for confirming
var arr=[];
for(var i =1; i <= data['menu'].length; i++) {
    arr.push(data['menu'][i-1]['order_id']);

  }
$('#ordersToSend').val(arr.toString());

console.log("for confiming :" +arr);


var decimal=total-dis;
var change=$('#userChange').html();
var paid=$('#Amount').val();
$('#PrintDiscount').html(decimal.toFixed(2));
$('#discounted').html(decimal.toFixed(2));
$('#PrintTotalItemSuper').html(dis);

$('#supertotal').html(dis);




}

               //  $('#cartPriceValue').text(carttotalValue);

               var carttotal = [];
               for(var k =1; k <= data['unconfirm'].length; k++) {
                   carttotal.push(data['unconfirm'][k-1]['Total']);
               }
               console.log("cart total: "+carttotal);
               var carttotalValue = 0;
               for(var j in carttotal){
                       carttotalValue+=carttotal[j];
                   }
                   console.log(carttotalValue)
               for(var i =1; i <= data['all'].length; i++) {
                   arr.push(data['all'][i-1]['id']);
               }
               $('#cartPriceValue').text(carttotalValue.toString());


               $('#ordersToSend').val(arr.toString());
               var tableconfirm = document.getElementById("confirmorderlist");
                    var tableLength=tableconfirm.length;
                    var row = tableconfirm.getElementsByTagName('tbody')[0].insertRow(tableLength);
                    $('#confirmorderlist .menulist').remove();
                    $('#deliveryorderlist .menulist').remove();
                    $('#deliveredorderlist .menulist').remove();
                    for(var i =1; i <= data['confirmorders'].length; i++) {
                       var row = tableconfirm.insertRow(i);
                       var cell1 = row.insertCell(0);
                       var cell2 = row.insertCell(1);
                       var cell3 = row.insertCell(2);
                       if(data['confirmorders'][i-1][0]['discount']>0){
                        cell1.innerHTML = '₱'+ data['confirmorders'][i-1][0]['price']+' '+ data['confirmorders'][i-1][0]['name']+'<div id="discount'+data['confirmorders'][i-1][0]['menu_id']+'"><input type="hidden" name="menuid" value="'+data['confirmorders'][i-1][0]['menu_id']+'"></div>';

                       }else if(data['confirmorders'][i-1][0]['discount']==0){
                        cell1.innerHTML = '₱'+ data['confirmorders'][i-1][0]['price']+' '+ data['confirmorders'][i-1][0]['name']+'<div id="discount'+data['confirmorders'][i-1][0]['menu_id']+'"><input type="hidden" name="menuid" value="'+data['confirmorders'][i-1][0]['menu_id']+'"></div>';

                       }
                       cell2.innerHTML = data['confirmorders'][i-1][0]['quantity'];
                       cell3.innerHTML ='₱'+data['confirmorders'][i-1][0]['quantity']*data['confirmorders'][i-1][0]['price'];

                       var disCount=data['confirmorders'][i-1][0]['discount'];


                       row.classList.add('menulist');

                   }

                   var tabledelivery = document.getElementById("deliveryorderlist");
                    var tableLength2=tabledelivery.length;
                    var row = tabledelivery.getElementsByTagName('tbody')[0].insertRow(tableLength2);
                  for(var i =1; i <= data['delivery'].length; i++) {
                   var row1 = tabledelivery.insertRow(i);
                   var cell1 = row1.insertCell(0);
                   var cell2 = row1.insertCell(1);
                   var cell3 = row1.insertCell(2);
                   var cell4 = row1.insertCell(3);
                   // var cell4 = row1.insertCell(3);
                   cell1.innerHTML = '<input type="hidden" id="orderId'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['id']+'">'+'<input type="hidden" id="Name'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['name']+'">'+'<input type="hidden" id="TicketId'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['TicketId']+'">'+'₱'+data['delivery'][i-1]['price']+' '+data['delivery'][i-1]['name']+"<span></span><span id='menuItemQuantity"+data['delivery'][i-1]['MenuId']+"'>"+data['delivery'][i-1]['quantity']+"</span>";
                   cell2.innerHTML = data['delivery'][i-1]['quantity'];
                   cell3.innerHTML = "₱"+data['delivery'][i-1]['Total'];
                   cell4.innerHTML ='<button class="btn btn-outline-primary rounded-0 " id="'+data['delivery'][i-1]['MenuId']+'" onclick="EditCartMenudeliver(this.id)">Serve</button>';
                   // cell2.innerHTML = data['delivery'][i-1]['price'];
                   row1.classList.add('menulist');
                 }
                 var deliveredorderlist = document.getElementById("deliveredorderlist");
                    var tableLength3=deliveredorderlist.length;
                    var row = deliveredorderlist.getElementsByTagName('tbody')[0].insertRow(tableLength3);
                  for(var i =1; i <= data['delivered'].length; i++) {
                   var row1 = deliveredorderlist.insertRow(i);
                   var cell1 = row1.insertCell(0);
                   var cell2 = row1.insertCell(1);
                   var cell3 = row1.insertCell(2);
                //    var cell4 = row1.insertCell(3);
                   // var cell4 = row1.insertCell(3);
                   cell1.innerHTML = '<input type="hidden" id="orderId'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['id']+'">'+'<input type="hidden" id="Name'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['name']+'">'+'<input type="hidden" id="TicketId'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['TicketId']+'">'+'₱'+data['delivered'][i-1]['price']+' '+data['delivered'][i-1]['name']+"<span></span><span id='menuItemQuantity"+data['delivered'][i-1]['MenuId']+"'>"+data['delivered'][i-1]['quantity']+"</span>";
                   cell2.innerHTML = data['delivered'][i-1]['quantity'];
                   cell3.innerHTML = "₱"+data['delivered'][i-1]['Total'];
                //    cell4.innerHTML ='<button class="btn btn-outline-primary " id="'+data['delivery'][i-1]['MenuId']+'" onclick="EditCartMenudeliver(this.id)">Serve</button>';
                   // cell2.innerHTML = data['delivery'][i-1]['price'];
                   row1.classList.add('menulist');
                 }
           })

           // if($('#unconfirmedBtn').hasClass('active')){
           //   $('#sendOrder').removeClass('d-none');
           // }else{
           //   $('#sendOrder').addClass('d-none');
           // }




         }


       //  cart active button

       //   if($('#unconfirmedBtn').hasClass('cartactive')){
       //     $('.confirmOrderBtnContainer').show();
       //   }else{
       //     $('.confirmOrderBtnContainer').hide();
       //   }

         $('#unconfirmedBtn').on('click', function(){
           $('#confirmedBtn').removeClass('cartactive');
           $(this).addClass('cartactive');
           $('.confirmOrderBtnContainer').show();
           $('#confirmorderlist').show();
         });

         $('#confirmedBtn').on('click', function(){
           console.log('click');
           $('#unconfirmedBtn').removeClass('cartactive');
           $(this).addClass('cartactive');
           // hide button container
           $('.confirmOrderBtnContainer').hide();
         });
   function change(tablenumber){
     $('#'+tablenumber).removeClass("availableBtn");
     $('#'+tablenumber).addClass("orderTakenBtn");
     $('#t'+tablenumber).removeClass("available");
     $('#t'+tablenumber).addClass("orderTaken");
     $('.imgIcon'+tablenumber).removeClass('d-none');
   }


   function ViewOrder(e){
     var menuId=e.getAttribute("data-menuid");
     var ticketId=e.getAttribute("data-ticketid");

     console.log(menuId, ticketId);
     $.ajax({
       url: "/vieworder",
       type:"GET",
       data:{
           menuId: menuId,
           ticketId:ticketId
       },
       success:function(data){


   // Create an "li" node:
   const node = document.createElement("tr");
   // Create a text node:
   const textnode = document.createTextNode("Water");
   // Append the text node to the "li" node:
   node.appendChild(textnode);
   // Append the "li" node to the list:
   document.getElementById("menu2041").appendChild(node);
          console.log(data);
          console.log('data');
       },
       error: function(error) {
        console.log(error);
       }
      });
   }

   function showmenu(){
       document.getElementById('sendOrder').classList.add('d-none');
       document.getElementById('modalClose').classList.remove('d-none');
       document.getElementById('cartBack').classList.add('d-none');
       document.getElementsByClassName('menuHolder')[0].style.display = 'block';
       document.getElementsByClassName('cartHolder')[0].style.display = 'none';
       $('#cart').css("visibility","visible");
       $('.confirmOrderBtnContainer').hide();
       cartQuantitySpan();
       var table=$('#menuid').html();
       cartCountAdd(table);
       $('#unconfirmedBtn').addClass('cartactive');
       $('#confirmedBtn').removeClass('cartactive');
       $('.unconfirmedview').show();
       $('.confirmedview').hide();



   }

   // table number
   var TABLENUMSPAN;
   function table(id)
   {
     showmenu();
     TABLENUMSPAN = id;

//      const optionT={
//        method:'post',
//        url:'create-ticket',
//        data:{
//          table:id,
//            ticket_status:2,
//            user:userid.value
//        },
//        transformResponse: [(data)=> {
//            return data;
//        }]
//    }
//    axios(optionT);

     document.getElementById("menuid").innerHTML = id;
     document.getElementById('cartBack').classList.add('d-none');
     $.ajax({
       url: "cartcount",
       type:"post",
       data:{
         "_token": $('meta[name="csrf-token"]').attr('content'),
           tableId: id,
       },
       success:function(response){
         console.log("cart count :"+response[0]['count']);
         $('#cartCount').html(response[0]['count']);
          $('#cartCount').removeClass('d-none');
         console.log(response);

       },
       error: function(error) {
        console.log(error);
       }
      });

   }
</script>
<script  type="application/javascript" >



//    $( ".Category" ).click(function() {
//      var categid = $(this).attr('category_id');
//      console.log(categid);
//      $(".category").addClass("d-none");
//      $(".category[data-id="+categid+"]").removeClass("d-none");
//      if(categid==6){
//        $(".category").removeClass("d-none")
//      }
//    });

   $( ".Category" ).click(function() {
         var categid = $(this).attr('category_id');
         console.log(categid);

         $(".menuCatHolderdisplay").addClass("d-none");
         $(".row"+categid).removeClass("d-none");
            if(categid==6){
                $(".menuCatHolderdisplay").removeClass("d-none");
            }





         // if(categid==6){
         //   $(".category").removeClass("d-none")
         //  $(".menusall").show();
         //  $(".notallmenu").hide();
         // }else if(categid !=6){
         // $(".menusall").hide();
         // $(".notallmenu").show();
         // $(".category").addClass("d-none");
         // $(".category[data-id="+categid+"]").removeClass("d-none");
         // }



       });

   $( ".subCounter" ).click(function() {
     var count = $('#counter').val();
     var curcount=count-1;
     $('#counter').val(curcount);
   });

   $( ".addCounter" ).click(function() {
     var count = $('#counter').val();
     var curcount=parseInt(count)+1;
     $('#counter').val(curcount);
   });

   $(".menuQuntity").hide();

   $(".category").click(function() {
     $('#menuOrderid').val($(this).attr('menu-id'));
     var tableid =$('#menuid').html();
     var menuname=$(this).attr('menu-name');
     var ticketid=$('#table'+tableid).val();
     $('#ticket_id').val(ticketid);
     $('#tableid').val(tableid);
     $('#menuName').text(menuname);
     $(".menuQuntity").show();
   });

   $("#closeQuantity").click(function() {
       $(".menuQuntity").hide();
       $('#counter').val(1);
   });
   $('.menuConfirmationmesage').hide();
//    $("#showMessage").click(function() {
//        $('.menuConfirmationmesage').show();
//        cartQuantitySpan();

//    });

   $("#modalClose").click(function() {
     $('#counter').val(1);
   })

   $('.confirmedview').hide();
   $('#confirmedBtn').click(function() {
       $('.confirmedview').show();
       $('.unconfirmedview').hide();
       $('#sendOrder').addClass('d-none');
   })
   $('#unconfirmedBtn').click(function() {
       $('.confirmedview').hide();
       $('.unconfirmedview').show();
       $('#sendOrder').removeClass('d-none');
   });

   //edit button for
   function item(id) {
       $('#acordionUnconfimed'+id).removeClass('d-none');
       $('.itemDropDown'+id).addClass('d-none');
       $('.closeBtn'+id).removeClass('d-none');
   }
   function itemClose(id){
       $('#acordionUnconfimed'+id).addClass('d-none');
       $('.closeBtn'+id).addClass('d-none');
       $('.itemDropDown'+id).removeClass('d-none');

   }

   function switchCart(id){
       if ($(this).is(":checked")) {
           $("#discountdrop"+id).removeClass('d-none');
           console.log('sds');

           } else {
               $("#discountdrop"+id).addClass('d-none');

           }
   }

   // cart edit triggered
   $('.cartedit').hide();
   $(".cartItem").on("click", "#unConfirmEdit", function() {
       $('.cartedit').show();
   });
   //close button edit cart
   $(".menunameCartEdit").on("click", "#closeEditCart", function() {
       $('.cartedit').hide();
   });

   // hide all Order items


     $('#deliveryorderlist').hide();
     $('#deliveredorderlist').hide();

   $("#BtngroupAllOrders").on("change",function(){
     var valoption = $(".btn-check[type='radio']:checked").val();
     console.log(valoption);
     if(valoption == 1){
       $('#confirmorderlist').show();
       $('#deliveryorderlist').hide();
     $('#deliveredorderlist').hide();
     }
     else if (valoption == 2){
       $('#confirmorderlist').hide();
     $('#deliveryorderlist').show();
     $('#deliveredorderlist').hide();
     }else if (valoption == 3){
       $('#confirmorderlist').hide();
     $('#deliveryorderlist').hide();
     $('#deliveredorderlist').show();
     }

   })


   // add minus cart edit quantity
   $(".cartAdd,.cartminus").click(function(e){
       e.preventDefault();
       if($(this).hasClass("cartAdd")){
           var val = parseInt($("#cartEditInput").val()) +1;
           $("#cartEditInput").val( val );
        //    CartMenu=  $("#cartEditInput").val( val );
        console.log(val);
       }else{
           if(parseInt($("#cartEditInput").val()) == 0 ){

           }else{
            var val = parseInt($("#cartEditInput").val()) -1;
           $("#cartEditInput").val( val );
             //CartMenu=  $("#cartEditInput").val( val );
              console.log(val);
           }

       }
   });
   var QUANTITYCARTEDIT;
   var ORDER_ID ;
   var TICKETID ;
   var CartMENUID ;
   var carQuantityBefore;
   function EditCartMenu(id){
      $('.cartedit').show();
      carQuantityBefore = parseInt($('.Quantity'+id).text());
      console.log("cart before: "+carQuantityBefore);
      QUANTITYCARTEDIT = parseInt($('.Quantity'+id).text());
      $("#cartEditInput").val( QUANTITYCARTEDIT );
      $('#cartMenuName1').text($('#Name'+id).val());
       ORDER_ID = $('#orderId'+id).val();
         TICKETID = $('#TicketId'+id).val();
         CartMENUID = id;


//       $(".menuCancellist").remove();
//       var table = document.getElementById("CancelTable");
//       var menuEditval = parseInt($('#menuItemQuantity'+id).text());
//       console.log("menu Item Quantity: "+ menuEditval);
//       $('#cartEditInput').val(menuEditval);
//       $('#cartMenuName').text($('#Name'+id).val());

//       var MENUID = id;
//       var TICKETID =  $('#TicketId'+id).val();
//       var orderID =  $('#orderId'+id).val();
//       console.log("ticket_id: "+TICKETID);
//       console.log("Menu ID: "+id);
//       console.log("Order ID: "+orderID);

   //    $.get('cartgetMenu/'+menuId,ticketId,function(data){
   //        console.log(data);

   //    })

        //    $.ajax({
        //        url:"/cartgetMenu",
        //        method:'GET',
        //        data: {
        //            "ticket_id":TICKETID,
        //            "menu_id":MENUID
        //        },
        //        success:function(result){
        //          for(var a=0;a<result.length;a++){
        //            $('#cartMenuName1').html(result[a]['menu_name']);

        //          var row = table.insertRow(a+1);
        //          var cell1 = row.insertCell(0);
        //          var cell2 = row.insertCell(1);
        //          var cell3 = row.insertCell(2);

        //          cell1.innerHTML = result[a]['menu_name'];
        //          cell2.innerHTML = result[a]['name'];
        //          cell3.innerHTML = '<button onclick="CancelClick(id)" id="Cancel'+result[a]['id']+'" class="btn btn-danger btn-sm CancelMenu" data-id="'+result[a]['id']+'">Cancel</button>';

        //          row.classList.add('menuCancellist');

        //          }

        //            console.log(result);
        //        }
        //    });
   }

      $('#editCartSubmit').click(function(e){
        e.preventDefault();
         var quantitycartedit= $('#cartEditInput').val();
        var orderid = ORDER_ID ;
         var ticket = TICKETID ;
          var menuId = CartMENUID ;
         var tableNum = parseInt($('#menuid').text());
         console.log("table number :"+ tableNum);
         console.log("Order id :"+ ORDER_ID);
         console.log("Ticket id :"+ TICKETID);
         console.log("Menu id :"+ CartMENUID);
         console.log("Quantity :"+ quantitycartedit);


         if(carQuantityBefore>quantitycartedit){
            $.ajax({
               url:"/EditcartQuantity",
               method:'POST',
               data: {
                 "_token": $('meta[name="csrf-token"]').attr('content'),
                   "order_id": orderid,
                   "ticket_id": ticket,
                   "table_num":tableNum,
                   "menu_id":menuId,
                   "quantity":quantitycartedit
               },
               success:function(result){
                //  $('#'+id).closest('.menuCancellist').addClass('d-none');
                //  showmenu();
                 cart();
                   console.log(result);
               }
           });
         }else{
            e.preventDefault();
            var quantityEdit =  quantitycartedit-carQuantityBefore;
            // const menu = document.getElementById('menuOrderid');
            // var discount=$("input:radio[name=discount]:checked").val();
            const addOrder={
                method:'post',
                url:'create-order',
                data:{
                    table:tableNum,
                    menu_id:menuId,
                    user_id:userid.value,
                    status_id:1,
                    discount_id:3
                },
                transformResponse: [(data)=> {
                    return data;
                }]
            }
            for(var a=0;a<quantityEdit;a++){
                axios(addOrder);
            }

         }
         cartQuantitySpan();
      });




   function CancelClick(id){
    var order_id=$('#'+id).attr("data-id");
    $.ajax({
               url:"/cancelMenu",
               method:'post',
               data: {
                 "_token": $('meta[name="csrf-token"]').attr('content'),
                   "orderid":order_id
               },
               success:function(result){
                 $('#'+id).closest('.menuCancellist').addClass('d-none');
                 showmenu();
                 cart();
                   console.log(result);
               }
           });

   }


   //hide confirmed button
   $('.deliverConfirm').hide();

   var DELIVERYTICKETID;
   var DELIVERYMENUID;
   function EditCartMenudeliver(id){
   $('.deliverConfirm').show();
   $('.menuNameDeliverd').text($('#Name'+id).val());
   DELIVERYTICKETID = $('#TicketId'+id).val();;
   DELIVERYMENUID = id;
   $.ajax({
               url:"/cartgetMenu1",
               method:'GET',
               data: {
                   "ticket_id":DELIVERYTICKETID,
                   "menu_id":DELIVERYMENUID
               },
               success:function(result){
                   console.log(result);
               }
           });

   }

   $('#closeDelivermodal').click(function() {
       $('.deliverConfirm').hide();
   })

   function deliveryItem(){
       $('.deliverConfirm').hide();
       cart();
       $.ajax({
               url:"/changeTOdelivered",
               method:'POST',
               data: {
                   "_token": $('meta[name="csrf-token"]').attr('content'),
                   "ticket_id":DELIVERYTICKETID,
                   "menu_id":DELIVERYMENUID
               },
               success:function(result){
                   console.log(result);
               }
           });
   }

   $("#closeQuantityMessage").click(function(){
    $('.menuConfirmationmesage').hide();
   });


   $(".ClearCart").hide();
   $("#clearCart").click(function() {
    $(".ClearCart").show();
   });

   $("#closeClearCart").click(function(){
    $(".ClearCart").hide();
   });

   function clearCart(){
       var tableNum = parseInt($("#menuid").text()) ;
        console.log("table selected: " + tableNum);

        $.ajax({
               url:"/clearcart",
               method:'POST',
               data: {
                   "_token": $('meta[name="csrf-token"]').attr('content'),
                   "table":tableNum

               },
               success:function(result){
                   console.log(result);
                   console.log("cart cleared");
               }
           });
           cart();
           $(".ClearCart").hide();

   }


   function cartQuantitySpan(){
    //   var tableNum = TABLENUMSPAN ;
        console.log("table selected: " + TABLENUMSPAN);
        $.ajax({
               url:"/cartCountQuantity",
               method:'GET',
               data: {
                //    "_token": $('meta[name="csrf-token"]').attr('content'),
                   "table":TABLENUMSPAN

               },
               success:function(result){
                   console.log("cart quantity :" +result);
                   $('#cartCCount').text(result);
                   if(result > 0){
                        $('#cartCCount').removeClass('d-none');
                        $('#sendOrder').removeAttr("disabled");
                   }else{
                        $("#sendOrder").prop("disabled", true).button('refresh');
                   }
               }
           });

   }

   function cartCountAdd(table){
      console.log("table selected: " + table);
        $.ajax({
               url:"/cartCountQuantity",
               method:'GET',
               data: {
                //    "_token": $('meta[name="csrf-token"]').attr('content'),
                   "table":table

               },
               success:function(result){
                   console.log("cart quantity :" +result);
                   $('#cartCCount').text(result);
                   if(result > 0){
                        $('#cartCCount').removeClass('d-none');
                       $('#sendOrder').removeAttr("disabled");
                       console.log('greater 0');
                   }else{
                        $("#sendOrder").prop("disabled", true).button('refresh');
                        console.log('less or 0');
                   }
               }
           });
   }


  //discount drop
   $('.discountContainer').hide();
    var check;
        $("#CheckDRop").on("click", function(){
        check = $("#CheckDRop").is(":checked");
        if(check) {
            console.log("Check");
            $('.discountContainer').show();
        } else {
            console.log("Check not");
            $('.discountContainer').hide();
        }
    });

//     $(".orderTaken").on("click","#"+TABLENUMSPAN, function() {
//         cartQuantitySpan();
//    });



// disable confirmedBtn after send
// $('.sendOrder').click(function(){
//     console.log('clicked');
//     $("#sendOrder").addAttr("disabled").button('refresh');
// })

var minutesToAdd=89;
function timeEndingTables(){

$.ajax({
        url:"/timeEnding",
        method:'GET',
        data: {

        },
        success:function(result){
            //start
            console.log(result);
            function Table(holder) {

                var finished = 'false';

                var controller = {
                    holder: holder,
                    end: null,
                    intervalID:0,
                    display: function () {
                        var _second = 1000;
                        var _minute = _second * 60;
                        var _hour = _minute * 60;
                        var _day = _hour * 24;
                        var msg = "";
                        var now = new Date();
                        var distance = controller.end - now;
                        var warningtime = (controller.end - now) -  minutesToAdd*60000;
                        if (distance < 0) {
                            clearInterval(controller.intervalID);
                            // controller.holder.innerHTML = 'EXPIRED!';
                            $("."+holder.id+"holder").css("background", "red");
                            controller.holder.innerHTML ='Time-out';
                            // document.getElementById('myaudio').play();
                            return;
                        }
                        else if( distance <= (minutesToAdd*60000) ){
                            var days = Math.floor(distance / _day);
                            var hours = Math.floor((distance % _day) / _hour);
                            var minutes = Math.floor((distance % _hour) / _minute);
                            var seconds = Math.floor((distance % _minute) / _second);
                            controller.holder.innerHTML = hours + ' Hour ' + minutes + ' Min';
                            // controller.holder.innerHTML = 'EXPIRED!';
                            $("."+holder.id+"holder").css("background", "#FCBF49");

                            //one time only baby-=-=-=-=---=-==-=--=-=-==--=-=-=-=-=-=-=-=
                            if(finished == 'false'){
                                console.log("WORKS" + holder.id);
                                // document.getElementById('myaudio').play();

                                finished = 'true';
                            }
                            //lesgow -=-=-=-=---=-==-=--=-=-==--=-=-=-=-=-=-=-=

                            return;
                        }
                        // else if( distance > (minutesToAdd*60000) ){
                        //     var days = Math.floor(distance / _day);
                        //     var hours = Math.floor((distance % _day) / _hour);
                        //     var minutes = Math.floor((distance % _hour) / _minute);
                        //     var seconds = Math.floor((distance % _minute) / _second);
                        //     controller.holder.innerHTML = hours + ' Hour ' + minutes + ' Min';
                        //     $("."+holder.id+"holder").css("background", "red");

                        //     return;
                        // }
                        // else if(distance <= (minutesToAdd*60000) && distance >= (minutesToAdd*60000)-1000 ){

                        //     console.log('working');
                        //     return;
                        // }
                    else{

                        var days = Math.floor(distance / _day);
                        var hours = Math.floor((distance % _day) / _hour);
                        var minutes = Math.floor((distance % _hour) / _minute);
                        var seconds = Math.floor((distance % _minute) / _second);

                        if(hours < 0){
                        controller.holder.innerHTML =   minutes + ' Minutes ' + seconds + ' Seconds ';
                        }
                        if(hours < 0 && minutes < 0){
                            controller.holder.innerHTML =   seconds + ' Seconds ';
                        }

                        controller.holder.innerHTML = hours + ' Hour ' + minutes + ' Min';

                        }

                    }
                }
                this.countDown = function (end) {
                    controller.end = end;
                    controller.intervalID = setInterval(controller.display, 1000);
                }
                }

                var tables = {};
                for(var k =1; k <= result['timeEnding'].length; k++) {
                    tables.one= new Table(document.getElementById("tr"+result['timeEnding'][k-1]['tableID']+"btn"));
                    tables.one.countDown(new Date(result['timeEnding'][k-1]['end_time']));
                }

                //end
            }
        });


}
timeEndingTables();

$("#category6").prependTo("#myDIV");
$('#category6').addClass('active');
           var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("item");
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            });
            }

            Echo.channel('disablemenuEvent')
              .listen('.disablemenuEvent', (e)=>{
                console.log(e.menuitem);
                $('#span'+e.menuid).removeClass('d-none');
                $('.menuitem'+e.menuid).addClass('notAvailableMenu');
                // $('.menuitem'+e.menuid).addClass('nopointerEvents ');
                $('.divmenu'+e.menuid).addClass('nopointerEvents ');
                $('.menuitem'+e.menuid).addClass('enableMenuBtnfunction');
                $('.menuitem'+e.menuid).removeClass('disableMenuBtnfunction');
                document.getElementById('myaudio').play();
              });

              Echo.channel('enablemenuEvent')
              .listen('.enablemenuEvent', (e)=>{
                console.log("enable"+e.menuitem);
                $('#span'+e.menuid).addClass('d-none');
                $('.menuitem'+e.menuid).removeClass('notAvailableMenu');
                $('.menuitem'+e.menuid).prop("disabled", false).button('refresh');
                // $('.menuitem'+e.menuid).removeClass('nopointerEvents ');
                $('.divmenu'+e.menuid).removeClass('nopointerEvents ');
                $('.menuitem'+e.menuid).removeClass('enableMenuBtnfunction');
                $('.menuitem'+e.menuid).addClass('disableMenuBtnfunction');
                document.getElementById('myaudio').play();
              });


              sendOrderForm.addEventListener('submit', function(e){
            $('#subtotal').text(0);
            var menusssss =$('#ordersToSend').val();
            var orderArray = JSON.parse("[" + menusssss + "]");
            var tableid = parseInt($('.TableNumber').text());
            e.preventDefault();
            const option3={
            method:'post',
            url:'confirmOrder',
            data:{
                order_id:orderArray,
                table_id:tableid
            },
            transformResponse: [(data)=> {
                return data;
            }]
        }
            axios(option3);
        });
        $('#cartNav1Label').addClass('cartactive');
        $('.allOrdersView').hide();
        $('input[name="cartnav"]').click(function(){
            console.log($("input[name='cartnav']:checked").val());
            if($("input[name='cartnav']:checked").val() == 'cart') {
                $('.CartView').show();
                $('.allOrdersView').hide();
                $('#cartNav1Label').addClass('cartactive');
                $('#cartNav2Label').removeClass('cartactive');


            }else{
                $('.CartView').hide();
                $('.allOrdersView').show();
                $('#cartNav2Label').addClass('cartactive');
                $('#cartNav1Label').removeClass('cartactive');
            }
        });

        $(".ClearCartCashier").hide();
   $("#clearCart").click(function() {
    $(".ClearCartCashier").show();
   });

   $("#closeClearCart").click(function(){
    $(".ClearCartCashier").hide();
   });

        function clearCart(){
       var tableNum = parseInt($(".TableNumber").text()) ;
        console.log("table selected: " + tableNum);

        $.ajax({
               url:"/clearcart",
               method:'POST',
               data: {
                   "_token": $('meta[name="csrf-token"]').attr('content'),
                   "table":tableNum

               },
               success:function(result){
                   console.log(result);
                   console.log("cart cleared");
                   tableCashier(tableNum);
               }
           });
           $(".ClearCartCashier").hide();

        }

   var cartCanselid;
   $(".cancelCartCashier").hide();
   function clearItemCart(id){
    $(".cancelCartCashier").show();
    var menuid = id;
    var menuName =  $('#menu'+id).val();
    $('#menuNameCancel').text(menuName);
    cartCanselid = id;
    console.log('clicked');


   }
   $("#canselcloseClearCart").click(function(){
    $(".cancelCartCashier").hide();
   });

   function cancelItemCart(){
    console.log(cartCanselid);
    var ticketid = $('#ticket'+cartCanselid).val();
    var menuid = parseInt($('#menuID'+cartCanselid).val());
    var userId = parseInt($('#userID'+cartCanselid).val());
    var quantity = parseInt( $('#qty'+cartCanselid).val());
    var tableid = parseInt($('#table'+cartCanselid).val());
    console.log(menuid);
    $.ajax({
               url:"/canselcartItem",
               method:'POST',
               data: {
                   "_token": $('meta[name="csrf-token"]').attr('content'),
                   "ticketID":ticketid,
                   "menuID":menuid,
                   "userID":userId,
                   "tableID":tableid,
                   "quantity":quantity
               },
               success:function(result){
                   console.log(result);

                   cart();
                   $(".cancelCartCashier").hide();
               }
           });

   }
   var closeID;
    $(".editCartCashier").hide();

    //edit cart

   var carEditId = 0;

   function editItemCart(id){
    $('.inputOrder').val(0);
    carEditId = id;
    $(".editCartCashier").show();
    var menuName =  $('#menu'+id).val();
    $('.menuNameHeader').text(menuName);
    var ticketid = $('#ticket'+id).val();
    var menuid = parseInt($('#menuID'+id).val());
    var userId = parseInt($('#userID'+id).val());
    var quantity = parseInt( $('#qty'+id).val());
    var tableid = parseInt($('#table'+id).val());
    closeID = id;
    $.ajax({
            url: "/discountappend",
            type:"GET",
             data:{
             menuId:menuid,
             tableid:tableid,
             userid:userId
             },
             success:function(data){
                console.log(data);

                for(var i =1; i <= data['discounts'].length; i++) {
                      $('#disc'+data['discounts'][i-1]['discount']).val(data['discounts'][i-1]['count_discount']);
                    //   cartEdit.push({quantity:data['discounts'][i-1]['count_discount'],discounttype:data['discounts'][i-1]['discount']});
                    }
                      $('.editTotal').text(quantity);
                    //   console.log(cartEdit);

                },

                error: function(error) {
                console.log(error);
                }
                });
            }

   $('.closeEditCart').click(function(){
    $(".editCartCashier").hide();

    var ticketid = $('#ticket'+closeID).val();
    var menuid = parseInt($('#menuID'+closeID).val());
    var userId = parseInt($('#userID'+closeID).val());
    var quantity = parseInt( $('#qty'+closeID).val());
    var tableid = parseInt($('#table'+closeID).val());
    $.ajax({
            url: "/discountappend",
            type:"GET",
             data:{
             menuId:menuid,
             tableid:tableid,
             userid:userId
             },
             success:function(data){
                console.log(data);
                for(var i =1; i <= data['discounts'].length; i++) {
                      $('#disc'+data['discounts'][i-1]['discount']).val(0);
                      }
                 $('.editTotal').text(0);

                },
                error: function(error) {
                console.log(error);
                }
                });
   });

   $('.clearDiscount').click(function() {
                    var id =  $(this).attr('disc');
                    console.log(id);
                    $('#disc'+id).val(0);
                 });


                 $('.Carteditedit').hide();
            $('#conFirmCartEdit').click(function() {
                $('.Carteditedit').show();
                $('.editCartCashier').hide();
            });

            $('#canselcloseEDitCart').click(function() {
                $('.Carteditedit').hide();
                $('.editCartCashier').show();
            });

            function editItemCartcart(){
            var id = carEditId;
            var ticketid = $('#ticket'+id).val();
            var menuid = parseInt($('#menuID'+id).val());
            var userId = parseInt($('#userID'+id).val());
            var quantity = parseInt( $('#qty'+id).val());
            var tableid = parseInt($('#table'+id).val());
            var orderid = parseInt($('#Order_id'+id).val());

            var cartEdit = [];
                $.ajax({
                url: "/discountappend",
                type:"GET",
                data:{
                menuId:menuid,
                tableid:tableid,
                userid:userId
                },
                success:function(data){
                    console.log(data);

                    for(var j =1; j <= data['discounttypes'].length; j++) {
                        cartEdit.push({quantity:0,discounttype:data['discounttypes'][j-1]['id'],newCount: $('#disc'+data['discounttypes'][j-1]['id']).val()});
                    }

                    for(var i =1; i <= data['discounts'].length; i++) {
                        const index = cartEdit.findIndex(cartEdit => cartEdit.discounttype === data['discounts'][i-1]['discount']);
                        cartEdit[index].quantity = data['discounts'][i-1]['count_discount'];
                        // cartEdit.find(i => i.discounttype === data['discount'][i-1]['discount']).quantity = data['discounts'][i-1]['count_discount'] ;
                        // cartEdit.find(item => item.discounttype == data['discount'][i-1]['discount'] ).quantity = data['discounts'][i-1]['count_discount'];
                        // cartEdit.findIndex((obj => obj.discounttype == data['discount'][i-1]['discount']));
                        // cartEdit[objIndex].quantity = data['discounts'][i-1]['count_discount'];
                        // cartEdit.push({quantity:data['discounts'][i-1]['count_discount'],discounttype:data['discounts'][i-1]['discount'],newCount: $('#disc'+data['discounts'][i-1]['discount']).val()});
                        }
                        console.log(cartEdit);
                        editCartEdit(cartEdit,ticketid,tableid,menuid,orderid,userId);
                        $('.Carteditedit').hide();

                    },

                    error: function(error) {
                    console.log(error);
                    }
                    });

           };

           function  editCartEdit(cartEdit,ticketid,tableid,menuid,orderid,userId){
                        console.log(ticketid);
                        console.log(tableid);
                        console.log(menuid);
                        console.log(orderid);
                        var orderid = orderid;
                        var ticket = ticketid;
                        var tableNum = tableid;
                        var menuId = menuid;
                        var userid = userId;

                    cartEdit.forEach(function(cartEdit){
                        if(cartEdit.quantity > cartEdit.newCount){
                            console.log(cartEdit);
                              $.ajax({
                            url:"/EditCartCart",
                            method:'POST',
                            data: {
                                "_token": $('meta[name="csrf-token"]').attr('content'),
                                "order_id": orderid,
                                "ticket_id": ticket,
                                "table_num":tableNum,
                                "menu_id":menuId,
                                "quantity":cartEdit.newCount,
                                "discount":cartEdit.discounttype

                            },
                            success:function(result){
                                console.log('working');
                                cart();

                            }
                          });
                        }else{
                            var quantityEdit =  cartEdit.newCount-cartEdit.quantity;
                            const addOrder={
                                method:'post',
                                url:'create-order',
                                data:{
                                    table:tableNum,
                                    menu_id:menuId,
                                    user_id:userid,
                                    status_id:1,
                                    discount_id:cartEdit.discounttype,
                                    quantity:quantityEdit
                                },
                                transformResponse: [(data)=> {
                                    return data;
                                }]
                            }
                            axios(addOrder);
                            // for(var a=0;a<quantityEdit;a++){

                            // }

                        }
                    });

                    cart();

                 }

                 $('.EDitsubCounter').click(function() {
                var input = $(this).attr('disc');
                var count = parseInt($('#disc'+input).val());
                var curcount=count-1;
                $('#disc'+input).val(curcount);
                console.log($('#disc'+input).val());
           });

           $('.EDitaddCounter').click(function() {
                var input = $(this).attr('disc');
                var count = parseInt($('#disc'+input).val());
                var curcount=count+1;
                $('#disc'+input).val(curcount);
                console.log($('#disc'+input).val());
           });


           function clearCart(){
       var tableNum = parseInt($("#menuid").text()) ;
        console.log("table selected: " + tableNum);

        $.ajax({
               url:"/clearcart",
               method:'POST',
               data: {
                   "_token": $('meta[name="csrf-token"]').attr('content'),
                   "table":tableNum

               },
               success:function(result){
                   console.log(result);
                   console.log("cart cleared");
                   cart();
                   $(".ClearCart").hide();
               }
           });


        }













</script>
@endsection
