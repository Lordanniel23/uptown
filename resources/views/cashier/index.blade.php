@extends('layouts.app')
@section('content')
@toastr_css


<!-- <div class="nameContainer shadowContainer p-3">
   <h1>  {{ Auth::user()->name }}</h1>
   <p>   @foreach($roles as $role)
       @if($role->id === Auth::user()->role_id)
        {{$role->role}}
       @endif
     @endforeach</p>

   </div> -->



<div class="sidebarCashier sticky-top">
    <nav class="navCashier">
        <ul>
            <li>
                <button class="btn tablesviewBtn" id="closeOrder">
                    <img class="w-75" src="{{ asset('images\icons\tableicon.png') }}" alt="">
                    <p class="text-white">Tables</p>
                </button>
            </li>
            <li>
                <button  class="btn menuDisablebtn " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img class="w-75" src="{{ asset('images\icons\menu.png') }}" alt="">
                    <p class="text-white">Menu</p>
                 </button>
            </li>
            <li>
                <button  class="btn historyBtn" >
                    <img class="w-75" src="{{ asset('images\icons\history.png') }}" alt="">
                    <p class="text-white">History</p>
                 </button>
            </li>
        </ul>
    </nav>
</div>

<div class="tableviews px-3">
   <div class="row g-3">
      <div class="col-7 tableholder px-5 ">
         <div class="TablesContainer pt-5 px-3  ">
            <div class="legendTop d-flex shadowContainer justify-content-center align-items-end px-4 d-none">
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
            <div class="tablePadding pt-5">
               <div class="container tables ">
                  <div class="row g-1" >
                     @foreach($tables as $table)
                     @if($table->table_status_id==1)
                     <!-- available -->
                     <div class="col-4 col-lg-3 col-xl-2  tableBtnHolder mb-4" id="zindex{{$table->tablename}}">
                        <div class="available">
                           <button class="btn tableOptionContainer tables availableBtn" onclick="tableCashier(this.id)" onclick() id="{{$table->tablename}}" >
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
                           <button class="btn  tables occupiedBtn tr{{$table->tablename}}btnholder" onclick="tableCashier(this.id)" id="{{$table->tablename}}" >
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
            </div>
         </div>
      </div>
      <div class="col-5">
         <div class="legendDetails pt-5">
            <div class="row g-2 pb-3">
               <div class="col-4 ">
                  <div class="shadowContainer d-flex legendDetailsContainer  align-items-center">
                     <div class="legendDetailsImgContainer checkIcon">
                        <img class="legendDetailsImg " src="{{ asset('images\icons\available.png') }}" alt="icon">
                     </div>
                     <div>
                        <p class="LegendDetailsText">Available Tables</p>
                        <h4 class="LegendDetailsQuntity" id="availableTableDetails">{{$available}}</h4>
                     </div>
                  </div>
               </div>
               <div class="col-4 ">
                  <div class="shadowContainer d-flex legendDetailsContainer justify-content-center align-items-center">
                     <div class="legendDetailsImgContainer timeIcon">
                        <img class="legendDetailsImg " src="{{ asset('images\icons\timelimit.png') }}" alt="icon">
                     </div>
                     <div>
                        <p class="LegendDetailsText">Timer Started</p>
                        <h4 class="LegendDetailsQuntity" id="TimerStartedDetails">{{$timestarted}}</h4>
                     </div>
                  </div>
               </div>
               <div class="col-4 ">
                  <div class="shadowContainer d-flex legendDetailsContainer justify-content-center align-items-center">
                     <div class="legendDetailsImgContainer listIcon">
                        <img class="legendDetailsImg " src="{{ asset('images\icons\order-taken.png') }}" alt="icon">
                     </div>
                     <div>
                        <p class="LegendDetailsText">Order taken</p>
                        <h4 class="LegendDetailsQuntity" id="OrdertakenDetails">{{ $ordersCount }}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row pb-3">
               <div class="tableInformation">
                  <div class="timedTables shadowContainer p-3">
                    <div id="one"></div>
                    <div id="two"></div>
                    <div id="three"></div>
                     <h4 class="timerH4">Time Ending</h4>
                     <table class="table" id="timeEndingTable">
                        <thead>
                           <tr>
                              <th scope="col">Table#</th>
                              <th scope="col">Time Started</th>
                              <th scope="col">Time Remaining</th>
                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- <div class="row">
               <div class="tableInformation">
                  <div class="timedTables shadowContainer p-3">
                     <h4 class="historyLogs">Recent Activity</h4>
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">Table#</th>
                              <th scope="col">Time Started</th>
                              <th scope="col">Time Remaining</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th scope="row">1</th>
                              <td>12:00</td>
                              <td>10:00 Minutes</td>
                           </tr>
                           <tr>
                              <th scope="row">4</th>
                              <td>12:20</td>
                              <td>30:00 Minutes</td>
                           </tr>
                           <tr>
                              <th scope="row">3</th>
                              <td>12:30</td>
                              <td>30:00 Minutes</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>
<div class="orderView  pt-5 d-none px-5  ">

   <div class="backBtn  shadowContainer d-none">
      <button class="btn bg-primary " id="closeOrder">
         <img  src="{{ asset('images\icons\backIcon.png') }}" alt="icon">
         <p>Back</p>
      </button>
   </div>
   <div class="row g-2">
      <div class="col-8 menuContainerMain px-5 ">
         <div class="p-2 px-3 pr-5">
             <div class="searchMenu d-flex justify-content-between border-bottom pb-2">
                <h1 class="">Menu <span class="h1Span">Category</span></h1>
                <input class="form-control w-50 " type="text" id="myInput" type="text" placeholder="Search for menus..">
             </div>

            <div class=" d-flex categoryContainer  categoryHolder  py-2" id="myDIV">
               @foreach($categories as $category)
                @if ($category->status_id == 1)
                <a class="btn item Category categoryItem shadowContainer  p-2" aria-current="page" category_name="{{$category->name}}" category_id="{{$category->id}}"  href="#" id="category{{$category->id}}"   >
                    <div class="categoryImg d-flex justify-content-center align-items-center">
                       <img  src="{{ $category->image }}" alt="icon">
                    </div>
                    <div class="categoryDetails text-center p-1">
                       <h2 class="categoryName"> {{$category->name}}</h2>
                    </div>
                 </a>
                @endif

               @endforeach
            </div>
            {{--
            <div class="d-flex categoryHolder pt-3 pb-4">
               <div class="categoryItem shadowContainer active p-2">
                  <div class="categoryImg d-flex justify-content-center align-items-center">
                     <img  src="{{ asset('images\icons\alldaybreakfast.png') }}" alt="icon">
                  </div>
                  <div class="categoryDetails text-center p-1">
                     <h2 class="categoryName">All-day Breakfast</h2>
                  </div>
               </div>
            </div>
            --}}
         </div>
         <div class="menuContainer mt-2">
            <h2 class="border-bottom pb-2">Choose <span class="h1Span">Menu</span></h2>
            <div class="menuScrollContainer">
             <div class="menuHolder">
                  <div class="menus notallmenu pt-3 ">
                     <div class="row g-3 g-lg-4">
                        @foreach ($menus as $menu)
                        @if ($menu->Status_id==1)
                        <div class="col-4 col-lg-3 col-xl-2  category" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">
                           <button class="menuItem  btn shadowContainer px-2 py-1 menuitem{{$menu->id}}">
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
                        <div class="col-4 col-lg-3 col-xl-2  " data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}" disabled>
                           <button class="menuItem menuitem{{$menu->id}}  btn shadowContainer px-2 py-1 notAvailableMenu" disabled>
                              <span class="notAvailableText">
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
                        @endforeach
                     </div>
                  </div>
                  <div class="menus menuall  pt-3">
                    @foreach($categories2 as $category)
                    @if ($category->status_id == 1 && $category->id !=6)

                    <div class="row{{$category->id }} menuCatHolderdisplay row g-3 g-lg-4 border-bottom pb-3">
                     <div class="cattext d-flex justify-content-between align-items-center">
                        <p class="mb-3 pt-2">{{$category->name}}</p>
                        <span class="mb-3 pt-2"> {{$category->menu_count}} {{$category->name}} Result</span>
                     </div>

                        @foreach ($menus as $menu)
                        @if ($category->id == $menu->Category_id )
                       @if ($menu->Status_id==1)
                       <div class="col-4 col-lg-3 col-xl-2 divmenu{{$menu->id}}   category" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">
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
                       <div class="col-4 col-lg-3 col-xl-2 divmenu{{$menu->id}} " data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}" disabled>
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


                  <div class="menuQuntity p-3" >
                      <div id="messageCreateorder" class="mt-3">
                          <div class="checkMark bg-success rounded-circle mx-auto ">
                            <img src="{{ asset('images\icons\check.png') }}" alt="close icon">
                          </div>
                          <div class="messageOrderCreate text-center mt-2 pb-3">
                              <p><span id="MenuNameAdd"></span> has been added to the Cart</p>
                          </div>
                      </div>
                     <div id="mainnFormCreateOrder">
                        <div class="text-center card-title  d-flex justify-content-between align-items-center">
                           <h5 id="menuName" class="p-0 m-0">Menu Name</h5>
                           <button class="btn " id="closeQuantity">
                           <img src="{{ asset('images\icons\closeblack.png') }}" alt="close icon">
                           </button>
                        </div>
                        <div class="card-body">
                           <form action="" id="send_ticket">
                              <div class="quntityContainer d-flex justify-content-between align-items-center ">
                                 <input type="hidden" id="menuOrderid">
                                 <input type="hidden" id="tableid">
                                 <input type="hidden" id="user_id" value="{{$user}}">
                                 <input type="hidden" id="ticket_id">
                                 <button class="btn  subCounter" type="button">-</button>
                                 <input type="text" class="form-control inputOrder"  id="counter" value="1">
                                 <button class="btn  addCounter" type="button">+</button>
                              </div>
                        </div>
                        <div class="switchContainer d-flex pt-4 align-items-center">
                        <span class="switchLabel">Discount</span>
                        <div class="switch">
                        <input type="checkbox" name="switch" id="discountSwitch"/>
                        <div></div>
                        </div>
                        </div>
                        <div class="discountTypes">
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
                                 {{-- <div class="radioContainer d-flex justify-content-between px-3">
                                 <div class="form-check">
                                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                 <label class="form-check-label" for="flexRadioDefault1">
                                 Sinior
                                 </label>
                                 </div>
                                 <div class="form-check">
                                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                 <label class="form-check-label" for="flexRadioDefault2">
                                 PWD
                                 </label>
                                 </div>
                                 <div class="form-check">
                                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                 <label class="form-check-label" for="flexRadioDefault2">
                                 Regular
                                 </label>
                                 </div>
                                 </div> --}}
                        </div>
                        <div class="feature-card-footer pt-3">
                        <button class="btn btn-success w-100 py-2 mb-2" id="closeMenuQuantity" type="submit">Add Item</button>
                        </div>
                        </form>
                     </div>
                  </div>
                  {{--
                  <div class="row  pb-4 mt-3 g-3 menuscroll">
                     <div class="col-3">
                        <button class="menuItem  btn shadowContainer p-3">
                           <div class="menuImgContainer">
                              <img  src="{{ asset('images\ukb199\unlimited_cheese.jpg') }}" alt="icon">
                           </div>
                           <div class="menuDetails pt-3">
                              <p>Ukb</p>
                              <p>₱ 199</p>
                           </div>
                        </button>
                     </div>
                  </div>
                  --}}
               </div>
            </div>
         </div>
      </div>
      <div class="col-4 naruto">
         <div class="Tablenumber shadowContainer text-center px-2 py-3 mb-3">
            <h1><span class="tableIcon"><img  src="{{ asset('images\icons\tableicon.png') }}" alt="icon"></span>Table <span class="TableNumber"></span></h1>
         </div>
         <div class="Cart shadowbg shadowContainer  mt-4">
            <div class="title mt-3 d-flex justify-content-between">
               {{-- cart all order button --}}
               <div class="buttonContainer border-bottom w-100 rounded-0 shadow-sm p-0">
                  <div class="btn-group w-100 rounded-0" role="group" aria-label="Basic radio toggle button group  ">
                     <input type="radio" class="btn-check rounded-0" name="cartnav" id="cartNav1" value="cart" autocomplete="off" checked>
                     <label class="cartBtn btn  py-3  rounded-0 border-end" id="cartNav1Label" for="cartNav1">Cart <span id="cartCount" class="cartQuantityCircle">0</span></label>
                     <input type="radio" class="btn-check  rounded-0" name="cartnav" id="cartNav2" value="allOrders" autocomplete="off">
                     <label class="btn cartBtn  py-3 rounded-0" id="cartNav2Label" for="cartNav2">All Orders</label>
                   </div>
               </div>

               <div class="dropdown d-none">
                  <a class="btn " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('images\icons\option.png') }}" alt="">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <li><a class="dropdown-item" onclick="window.print()" href="#" id="editOrder">Print Reciept</a></li>
                     <li><a class="dropdown-item" href="#" id="editOrder">Edit Order</a></li>
                     <li><a class="dropdown-item" href="#" id="editOrder">All Order</a></li>
                     <li><a class="dropdown-item" href="#" id="discount">Discount</a></li>
                     <li><a class="dropdown-item text-danger" href="#">Cansel Order</a></li>
                  </ul>
               </div>
            </div>

           {{-- cart view start --}}
            <div class="CartView">
                {{-- <div class="clearCart d-flex  justify-content-end py-2">
                    <button class="btn btn-danger btn-sm" id="clearCart">Clear Cart</button>
                </div> --}}
                <div class="ClearCartCashier rounded p-4 shadow">

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

             <div class="cancelCartCashier rounded p-4 shadow">

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
             <div class="px-3">
                <table class="table cart-table mt-2 text-center " id="OrderTable">
                    <thead>
                       <tr>
                          <th scope="col">Menu</th>
                          <th scope="col" class="text-center">Qty</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="text-center">Actions</th>
                       </tr>
                    </thead>
                     <tbody >
                    </tbody>
                 </table>
                 <div class="total p-2 border-top-dotted mt-2 ">
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
                       <h3>₱ <span id="supertotal"></span></h3>
                    </div>
                 </div>
             </div>

                <div class="row confimeBtn mt-5 px-3 pb-3 ">
                    <div class="col"><button class="btn btn-danger w-100 rounded-0 py-3 " id="clearCart">Clear Cart</button></div>
                    <form class="col"  action="" id="SendOrderEvent">
                        <input type="hidden" id="ordersToSend">
                        <button class="sendOrder btn btn-primary w-100 rounded-0 py-3" id="sendOrder"  type="submit" >Confirm Order</button>
                     </form>
                </div>
               </div>


               {{-- cart view end --}}
               <div class="allOrdersView">
                <div class="buttonGroupContainer  p-2 border-bottom">
                    <form action="" id="BtngroupAllOrders" class="w-100">
                        <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                           <input type="radio" class="btn-check allOrdersnav" value="1" name="btnradio" id="btnradio1" autocomplete="off" checked>
                           <label class="btn btn-outline-primary rounded-0" for="btnradio1">Confirmed</label>
                           <input type="radio" class="btn-check allOrdersnav" value="2" name="btnradio" id="btnradio2" autocomplete="off">
                           <label class="btn btn-outline-primary rounded-0" for="btnradio2">To Serve</label>
                           <input type="radio" class="btn-check allOrdersnav" value="3" name="btnradio" id="btnradio3" autocomplete="off">
                           <label class="btn btn-outline-primary rounded-0" for="btnradio3">Served</label>
                        </div>
                     </form>
                </div>
                <div class="deliverConfirmCashier rounded p-4 shadow ">
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

                <div class="deliverAllConfirmCashier rounded p-4 shadow ">
                    <input type="hidden" id="tiketIDCartDelivered">
                    <input type="hidden" id="menuIDCartDelivered">
                    <h5 class="text-center">Do you Want to mark all orders on Table "<span class="menuNameDeliverd"></span>" as delivered?</h5>
                    <div class="row mt-5">
                    <div class="col">
                        <button class="btn btn-outline-danger w-100" id="closeDeliverAllmodal">No</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-success w-100"  onclick="deliveryAllItem()">Yes</button>
                    </div>
                    </div>
                </div>



                {{-- <table class="table cart-table mt-2 text-center" id="allOrderTable">
                    <thead>
                       <tr>
                          <th scope="col">Menu</th>
                          <th scope="col" class="text-center">Price</th>
                          <th scope="col" class="text-center">Qty</th>
                          <th scope="col" class="text-center">Total</th>
                       </tr>
                    </thead>
                    <tbody >

                    </tbody>
                 </table> --}}
                 <div class="px-3">
                 <table class="table text-center  mt-3" id="confirmorderlist" >
                    {{-- Confimed --}}
                    <thead class="">
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
                 <table class="table text-center  mt-3" id="deliveredorderlist" >
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
                 {{-- <div class="total p-2">
                    <div class="subtotal d-flex justify-content-between mt-4">
                       <p>Subtotal</p>
                       <p>₱ <span id="subtotal"></span></p>
                    </div>
                    <div class="Discount d-flex justify-content-between m-0 p-0">
                       <p>Discount</p>
                       <p>₱ <span id="discounted"></span></p>
                    </div>
                    <div class="TotalText d-flex justify-content-between mt-4">
                       <h2>Total</h2>
                       <h3>₱ <span id="supertotal"></span></h3>
                    </div>
                 </div> --}}
                </div>
                <div class="row mt-5 px-2 serveAll pb-3">
                    <div class="col">
                        <button id="serveAll" type="submit" class="btn btn-success w-100 py-3 rounded-0" onclick="serveAll()" >Serve All</button>
                    </div>

                </div>
                <div class="row mt-5 cartBtnContainer px-3 pb-2">
                    <div class="ConfirmBtn col  ">
                       <button class="btn btn-primary w-100 p-2 py-2 rounded-0" id="confirmed" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reciept" >Bill Out</button>
                    </div>
                    <div class="PaymentBtn col ">
                       <button class="btn btn-success w-100 p-2 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Settle Payment</button>
                       <!-- Modal -->
                          <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content tablemodal">
                                   <div class="modal-body ">
                                      <h5 class="modal-title text-center" id="exampleModalLabel">Payment</h5>
                                      <p class="text-center pt-5 mt-3 mb-4">Total Amount: ₱<span id="TotalAmount">1000</span></p>
                                      <form action="" id="PaymentSend">
                                         <input class="form-control" type="number" id="UserAmmount" placeholder="Input payment amount">
                                         <p class="text-center pt-5 mt-3 mb-4">Change: ₱<span id="ChangeAmount"></span></p>
                                         <div class="row pt-4 ">
                                            <div class="col"><button id="paymentSubmit" type="submit" class="btn btn-success w-100"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#reciept" >Process</button></div>
                                         </div>
                                   </div>
                                   </form>
                                </div>
                             </div>
                          </div>
                    </div>
                    </div>


                </div>

               </div>
            </div>


         </div>

      </div>
   </div>
</div>
<!-- Modal -->
<div class=" modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog ">
      <div class="modal-content">
         <form id="PaymentSend" get="post">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3 text-center">
                  <h1>Total: <span id="superTotal"></span> </h1>
               </div>
               <div class="mb-3 ">
                  <label for="exampleInputPassword1" class="form-label">Input amount</label>
                  <input type="number" class="form-control" id="Amount">
               </div>
               <div class="mb-3 text-center">
                  <h3>Change: <span id="userChange"></span></h3>
               </div>
            </div>
            <div class="modal-footer">
               <button id="paymentSubmit" type="submit" onclick="sentPayment()" class="btn btn-success w-100">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--Table option Modal -->
<div class=" modal fade" id="tableoptionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   {{--
   <div class="modal-dialog optionModal modal-dialog-center">
      <div class="modal-content">
         <div class="modal-header ">
            <h5 class="modal-title" id="exampleModalLabel">Table s <span id="TakeOrderTable"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body p-0 m-0">
            <div class="row p-0 m-0">
               <div class="col-6 p-0 m-0 border"><button type="button" class="btn btn-primary w-100 rounded-0 p-2" id="takeOrder" data-bs-dismiss="modal">Take Order</button></div>
               <div class="col-6 p-0 m-0 border"> <button type="button" class="btn btn-secondary w-100 rounded-0 p-2">Disable</button></div>
            </div>
         </div>
      </div>
   </div>
   --}}
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content tablemodal">
         <div class="modal-body ">
            <h5 class="modal-title text-center py-2" id="exampleModalLabel">Table <span id="TableNumber"></span> </h5>
            <!-- <h3 class="text-center pt-5 mt-3 mb-4 d-none" id="timeStatus">Time Remaining: <span>10:00 minutes left</span></h3> -->
            <p class="text-center pt-5 mt-3 mb-4" id="modalText" ></p>
            <div class="row pt-4 ">
               <div class="col"><button type="button" class="btn btn-warning w-100 " data-bs-dismiss="modal">No</button></div>
               <div class="col"><button type="button" class="btn btn-success w-100  " id="takeOrder" data-bs-dismiss="modal">Yes</button></div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- Modal disable menu -->
<div class="myModal modal modal-fullscreen-xxl-down" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Disable Menu</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body bg-light">
              <div class="row p-2 ">
                 <input class="form-control w-50 " type="text" id="myInput" type="text" placeholder="Search for menus..">
              </div>
              <div class="disablemenuEdit">
                     <div class="row py-3">
                        <h5>Do you want to disable this <span class="menuNameedit"></span>?</h5>
                     </div>
                     <div class="row mt-3">
                         <div class="col">
                             <button class="closemenuEdit btn btn-outline-danger w-100 px-2">No</button>
                         </div>
                         <div class="col">
                             <button class="btn btn-primary  disableMenubtn w-100 px-2">Yes</button>
                         </div>
                     </div>
              </div>
              <div class="enablemenuEdit">
                 <div class="row py-3">
                    <h5>Do you want to enable this <span class="menuNameedit"></span>?</h5>
                 </div>
                 <div class="row mt-3">
                     <div class="col">
                         <button class="closemenuenaEdit btn btn-outline-danger w-100 px-2">No</button>
                     </div>
                     <div class="col">
                         <button class="btn btn-primary enableMenubtn  w-100 px-2">Yes</button>
                     </div>
                 </div>
          </div>

          <div class="menus  pt-3">
                      <div class="row g-3 g-lg-4">
                         @foreach ($menus as $menu)
                         @if ($menu->Status_id==1)
                         <div class="col-4 col-lg-3 col-xl-2" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">

                         <button  data-id="{{$menu->id}}"  id="{{$menu->name}}" class="menuitem{{$menu->id}} menuupdate menuItem archiveButton disableMenuBtnfunction btn shadowContainer px-2 py-1">
                             <span id="span{{$menu->id}}" class="notAvailableText d-none">
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
                         @elseif ($menu->Status_id==2)
                         <div class="col-4 col-lg-3 col-xl-2" data-category="{{$menu->Category_Name}}" menu-id="{{$menu->id}}" menu-name="{{$menu->name}}" data-id="{{$menu->Category_id}}">

                         <button  data-id="{{$menu->id}}"  id="{{$menu->name}}" class="menuitem{{$menu->id}} menuupdate archiveButtonenable menuItem enableMenuBtnfunction  btn shadowContainer px-2 py-1 notAvailableMenu">
                               <span id="span{{$menu->id}}" class="notAvailableText">
                               Not Available
                               </span>
                               <div class="menuImgContainer ">
                                  <img  src="{{$menu->image}}" alt="menu image">
                               </div>
                               <div class="menuDetails mt-3">
                                  <p>{{$menu->name}}</p>
                                  <p class="menuPrice">₱ {{$menu->price}}</p>
                               </div>
                            </button>
                         </div>
                         @endif
                         @endforeach
                      </div>
                   </div>
             </div>
       </div>
    </div>
 </div>


<!-- confirmation menu disable -->
<div class="myModal modal" id="disableconfirm" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Disable Menu : <span class="namemenu"></span> ?
      </div>
      <div class="modal-footer">
		  <button type="button" class="mudal btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <form id="disablemenuu" action="" method="POST">
        @csrf
        @method('Post')
        <input type="submit" class="btn btn-warning" value="Disable">
        </form>
	</div>
    </div>
  </div>
</div>
<!-- confirmation menu enable -->
<div class="myModal modal" id="enableconfirm" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="exampleModalLabel"><b>Warning</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Enable menu : <span class="namemenu"></span> ?
      </div>
      <div class="modal-footer">
		  <button type="button" class="mudal btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <form id="enabledconfirm" action="" method="POST">
        @csrf
        @method('Post')
        <input type="submit" class="btn btn-warning" value="Enable">
        </form>
	</div>
    </div>
  </div>
</div>
<script>
var today = new Date();
var petsa = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
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
                                    <p class="pb-4 pt-4" style="font-size:11px">{{$address[0]->description}}</p>
                                    <div class="row">
                                       <small class="col-6">{{$contactnumber[0]->description}}</small>
                                       <small class="col-6"><script>document.write(petsa)</script></small>
                                       <small class="col-6">Server: <span id="recieptauth"></span></small>
                                        <small class="col-6">Ticket Id:<span id="recieptticketid"></span></small>
                                 </div>
                                    <hr/>
                                 </div>
                                 <div class="orderitems">
                                 <table class="taas" style="width:100%">
                                   <thead>
                                      <tr>
                                          {{-- <th style="width:10%">#</th> --}}
                                          <th style="width:30%"><center>ORDERS</center></th>
                                          <th style="width:30%"><center>UNIT PRICE</center></th>
                                          <th style="width:30%"><center>LINE TOTAL<br><span class="discount" style="font-size: 10px;">discount not included</span></center></th>
                                      </tr>
                                    </thead>
                                    <tbody class="recieptmodal">
                                      <tr>
                                          <!-- <td>1</td>
                                          <td><b> UKB199 x10 </b><br><span class="discount" style="font-size: 10px;">SRCTZN 3x, PWD 3x</span></td>
                                          <td class="text-top"><center class="text-top">P199</center></td>
                                          <td style="text-align:center!important"><center>P 1990</center></td> -->
                                      </tr>
                                    </tbody>
                                    {{-- <tfoot>
                                      <tr>
                                          <td colspan="2"></td>
                                          <td><hr/></td>
                                      </tr>
                                      <tr>
                                          <td colspan="1"></td>
                                          <th style="text-align:right!important">Subtotal</th>
                                          <td  style="text-align:center!important"><center class="recieptsubtotal"></center></td>
                                      </tr>
                                      <tr class="discountlistreciept">
                                          <td colspan="3"><hr/></td>
                                      </tr>
                                          <!-- <tr>
                                             <td colspan="1"></td>
                                             <td style="text-align:right!important">SRCTZN 20%</td>
                                             <td style="text-align:center!important">-119.4</td>
                                         </tr> -->
                                         <tr>
                                           <td colspan="2"></td>
                                           <td style="text-align:center!important"><hr/></td>
                                         </tr>
                                         <tr>
                                         <td colspan="1"></td>
                                           <th style="text-align:right!important">Discount Total</th>
                                           <td style="text-align:center!important">408.15</td>
                                         </tr>
                                      <tr>
                                        <td colspan="3"><hr/></td>
                                      </tr>
                                      <tr>
                                      <td colspan="1"></td>
                                        <th style="text-align:right!important">Total</th>
                                        <td style="text-align:center!important">4,071.85</td>
                                      </tr>
                                      </tfoot> --}}
                                  </table>
                                  <div class="pt-4">
                                     <center>
                                        <small class="pt-4">Note: This is not an official Reciept!</small>
                                        <p>Thank You for Dining With Us. <br>Please Come Again!</p>
                                     </center>
                                    </div>
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



<!-- RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO  -->
                              <div class="resibo resieptContainer" id="resieptContainer">
                                 <div class="logodiv d-flex justify-content-center">
                                    <img src="{{ asset('images\icons\logo.png') }}" alt="">
                                 </div>
                                 <div class="companyname text-center">
                                    <h1>Uptown Grill</h1>
                                 </div>
                                 <div class="Receiptdetails text-center">
                                    <p class="pb-4 pt-4" style="font-size:11px">{{$address[0]->description}}</p>
                                    <div class="row">
                                       <small class="col-6">{{$contactnumber[0]->description}}</small>
                                       <small class="col-6"><script>document.write(petsa)</script></small>
                                       <small class="col-6">Server: Lordan Lingat</small>
                                        <small class="col-6">Ticket Id: <span id="recieptticketid"></span></small>
                                 </div>
                                    <hr/>
                                 </div>
                                 <div class="orderitems">
                                 <table class="taas" style="width:100%">
                                   <thead>
                                      <tr>
                                          <th style="width:10%">#</th>
                                          <th style="width:30%"><center>ORDERS</center></th>
                                          <th style="width:30%"><center>UNIT PRICE</center></th>
                                          <th style="width:30%"><center>LINE TOTAL<br><span class="discount" style="font-size: 10px;">discount not included</span></center></th>
                                      </tr>
                                    </thead>
                                    <tbody >
                                      <tr>
                                          <!-- <td>1</td> -->
                                          <td><b> UKB199 x10 </b><br><span class="discount" style="font-size: 10px;">SRCTZN 3x, PWD 3x</span></td>
                                          <td class="text-top"><center class="text-top">P199</center></td>
                                          <td style="text-align:center!important"><center>P 1990</center></td>
                                      </tr>
                                      <tr>
                                          <td colspan="2"></td>
                                          <td><hr/></td>
                                      </tr>
                                      <tr>
                                          <td colspan="1"></td>
                                          <th style="text-align:right!important">Subtotal</th>
                                          <td style="text-align:center!important"><center>P 4480</center></td>
                                      </tr>
                                      <tr>
                                          <td colspan="3"><hr/></td>
                                      </tr>
                                      <tr>
                                         <tr>
                                         <td colspan="1"></td>
                                            <th style="text-align:right!important">SRCTZN 20%</th>
                                             <td style="text-align:center!important">-119.4</td>
                                         </tr>
                                         <tr>
                                         <td colspan="1"></td>
                                            <th style="text-align:right!important">PWD 15%</th>
                                           <td style="text-align:center!important">-288.75</td>
                                         </tr>
                                         <tr>
                                           <td colspan="2"></td>
                                           <td style="text-align:center!important"><hr/></td>
                                         </tr>
                                         <tr>
                                         <td colspan="1"></td>
                                           <th style="text-align:right!important">Discount Total</th>
                                           <td style="text-align:center!important">408.15</td>
                                         </tr>
                                      </tr>
                                      <tr>
                                        <td colspan="3"><hr/></td>
                                      </tr>
                                      <tr>
                                      <td colspan="1"></td>
                                        <th style="text-align:right!important">Total</th>
                                        <td style="text-align:center!important">4,071.85</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="pt-4">
                                     <center>
                                        <small class="pt-4">Note: This is not an official Reciept!</small>
                                        <p>Thank You for Dining With Us. <br>Please Come Again!</p>
                                     </center>
                                    </div>
                                 </div>
                              </div>
<!-- RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO RESIBO  -->
<style>
.modal-backdrop {position: inherit!important;}
.modal-backdrop.show {opacity: 0;}
.modal-content {border: 7px solid rgba(0, 0, 0, 0.2)!important;}
.namemenu {font-weight: bold;}
.centered {
    text-align: center;
    align-content: center;
}
hr {
    display: block;
    height: 1px;
    background: transparent;
    width: 100%;
    border: none;
    border-top: solid 1px black;
}
.resibo {
   display:none;
   font-size:12px!important;
}
.taas th,.taas td{
   font-size:12px!important;
   vertical-align: text-top!important;
}
.taas thead {
   width: auto!important;
}
.recieptmodal {
   display: table!important;
    height: inherit!important;
}
.discount{
      top: -10px;
    position: relative;
}
.ticket img {
    max-width: inherit;
    width: inherit;
}
@media print {
   .resibo {
   display:block;
   margin-left:150px;
   margin-right:150px;
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
</style>
<script>

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

//message websocket

    function messageCompleted(table,menu){
                $('.successMessagage').removeClass('d-none');
                $('#NotifTable').html(table);
                $('.NotifTime').html(new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}));
                $('.NotifMenu').html("");
                var text='Order has been completed successfully on Table '+table;
                $('#mainText').html(text);
                $('.eventText').html(menu+" has been addes to the cart.");
                $("#notif").show().delay(2000).fadeOut();

              }
$('.menuupdate').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("id");
     $(".namemenu").text(id);
	  console.log(id);
});
$('.menuupdate').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("id");
     $(".namemenu").text(id);
	  console.log(id);
});
   $('.archiveButton').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");
	  var name = $(this).attr("id");
     document.getElementsByClassName("namemenu").textContent=name;
      $('#disablemenuu').attr('action', "/cashier/disable/"+id);
	  console.log(id);
	  console.log(name);
});
$('.archiveButtonenable').on('click', function(e) {
      e.preventDefault();
	  var id = $(this).attr("data-id");

      $('#enabledconfirm').attr('action', "/cashier/enable/"+id);
	  console.log(id);
});
</script>
<script src="./js/app.js"></script>
<script  type="application/javascript" >

   function checkTime(i) {
     if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
     return i;
   }

        const tableid=document.getElementById('tableid');
       const userid=document.getElementById('user_id');
       const ticketform=document.getElementById('send_ticket');
       const quantity= document.getElementById('counter');
       const sendOrderForm=document.getElementById('SendOrderEvent');
       const paymentOrderForm=document.getElementById('PaymentSend');
       const tableidInOrder=document.getElementById('tableidOrder');

       paymentOrderForm.addEventListener('submit', function(e){

         var tableid =$('.TableNumber').html();
         var total=$('#TotalAmount').html();
         var receive=$('#UserAmmount').val();
         var change=$('#ChangeAmount').html();
         $('#PrintAmountChange').html(change);
         $('#PrintAmountPaid').html(receive);
         console.log('asdsadsadsadsa');
       //   const menusssss =$('#ordersToSend').val();
       //   var array = JSON.parse("[" + menusssss + "]");
           console.log('asdasdasdas');
         e.preventDefault();
         const option3={
           method:'post',
           url:'paymentEvent',
           data:{
               table_id:tableid,
               price:total,
               receive:receive,
               change:change
           },
           transformResponse: [(data)=> {
               return data;
           }]
       }
       axios(option3);
       });


       function disable(){
           $('body').on('click','.disableClick',
               function (e) {
                      $(this).attr("disabled", true);
               }
           );
       }
       $( "#sample" ).click(function() {
           alert( "test" );
       });

       var tableStatus;

       function tableCashier(id)
       {

          if($("#"+id).hasClass("orderTakenBtn")==true){
            $("#modalText").text("Do you want to view orders?");
            $("#timeStatus").addClass("d-none");
          }
          else if($("#"+id).hasClass("occupiedBtn")==true){
            $("#modalText").text("Do you want to view orders?");
            $("#timeStatus").removeClass("d-none");
          }
          else {
            $("#modalText").text("Do you want to occupy this table?");
            $("#timeStatus").addClass("d-none");
          }



          $('.orderView').removeClass('d-none');

          $('.tableviews').hide();

         $('#option'+id).fadeIn();
         $('#zindex'+id).addClass("top");
         $('#TakeOrderTable').html(id);
         $('#takeOrder').attr('data-id',id);
         $('.TableNumber').html(id);

           tableOrdersCart(id);
           $('#TableNumber').html(id);
           console.log(id);

       }


       function tableOrdersCart(id){
        $.get('cartquanity1/'+id,function(data){
            console.log(data);
             console.log(data['ticketCount'][0]['ticket_count']);
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
                   var table = document.getElementById("OrderTable");
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
                       cell4.innerHTML ='<button onclick="editItemCart(this.id)" id="'+data['confirm'][i-1][0]['menu_id']+'" class="btn btn-outline-primary rounded-0">Edit</button> <button class="btn btn-danger rounded-0" id="'+data['confirm'][i-1][0]['menu_id']+'" onclick="clearItemCart(this.id)">X</button> <input id="menu'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="menuName" value="'+data['confirm'][i-1][0]['name']+'"><input id="ticket'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="ticketid" value="'+data['confirm'][i-1][0]['ticket_id']+'"><input id="menuID'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="menuid" value="'+data['confirm'][i-1][0]['menu_id']+'"><input id="userID'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="userId" value="'+data['confirm'][i-1][0]['user']+'"><input id="qty'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="quantity" value="'+data['confirm'][i-1][0]['quantity']+'"><input id="table'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="tableid" value="'+data['confirm'][i-1][0]['tableid']+'"><input id="Order_id'+data['confirm'][i-1][0]['menu_id']+'" type="hidden" name="order_id" value="'+data['confirm'][i-1][0]['order_id']+'">';
                       var add = data['confirm'][i-1][0]['quantity']*data['confirm'][i-1][0]['price'];
                       // var DISCOUNT=total-data['confirm'][i-1][0]['Total'];
                       var disCount=data['confirm'][i-1][0]['discount'];

                       console.log(dis);
                       total=total + parseInt(add);
                       row.classList.add('menulist');
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
                   allOrdersview();



            }

            });
       }

       Echo.channel('readyOrderEvent')
                 .listen('.readyOrderEvent', (e)=>{
                //    if(e.addTimer.length>0){
                //    $('#Timer'+e.table_id).html(e.time);
                //    $('#imgIcon'+e.table_id).attr('src','http://192.168.2.118/images/icons/timelimit.png');
                //    }
                //    else if(e.addTimer.length==0){
                //      $('.imgIcon'+e.table_id).addClass('d-none');
                //    }
                   console.log(e);
                   getCashierStatus();
                   allOrdersview();
                   document.getElementById('myaudio').play();
                   timending();
                    timeEndingTables();
                    // baka ma tripan mo . kesa bobo si odan hahahahah
                    //  toastr.success('Food is ready on table ' +e.table_id , 'Kitchen')
                  //   alert('Bobo si Odan');
                  tableStatusIndicator();
                 });

       $( "#takeOrder" ).click(function() {
           $('.orderView').removeClass('d-none');
           $('.tableviews').hide();
           console.log('working');
           $('#tableoptionModal').modal('hide');
           var id= $(this).attr('data-id');
           console.log(id);
           // $(".menulist").remove();

       });
       $( "#closeOrder" ).click(function() {
           $('.orderView').addClass('d-none');
           $('.tableviews').show();
           $('#subTotal').text('0.00');
           $('#total').text(0.00);
           $('#userChange').html('');
       });
       $('#payment').hide();
       $( "#showpayment" ).click(function() {
           $('#payment').show();
           $('#showpayment').hide();
       });


       $('#messageCreateorder').hide();

       Echo.channel('createOrder')
                .listen('.createOrder', (e)=>{
                  //   messageCompleted(e.table,e.menuOnly[0]['name']);
                    console.log(e.menuOnly);
                    //hide main form
                    $('#mainnFormCreateOrder').hide();
                    $('#messageCreateorder').show();
                    $('#MenuNameAdd').text(e.menuOnly[0]['name']);

                    $('.menuQuntity').delay(1000).fadeOut(0);
                    // getCashierStatus();
                    tableOrdersCart(e.table);

                    console.log("create order event");
                });


        Echo.channel('confirmOrderEvent')
            .listen('.confirmOrderEvent', (e)=>{
            //    tableCashier(e.table_id);
               getCashierStatus();
               tableStatusIndicator();
               allOrdersview()
               tableOrdersCart(e.table);

            //    document.getElementById('myaudio').play();

        });

        Echo.channel('serveAllEvent')
            .listen('.serveAllEvent', (e)=>{
                allOrdersview()
               getCashierStatus();
               tableStatusIndicator();
               console.log(e.table);




            //    document.getElementById('myaudio').play();
        });

       Echo.channel('createTicket')
        .listen('.createTicket', (e)=>{
          console.log(e.status.length);
          if(e.status.length==1){
            // tableCashier(e.table);
            console.log("table on event"+e.table);
          }else{

         $('#table'+e.table).val(e.ticket_id);
         $('#ticket_id').val(e.ticket_id);

           change(e.table);
          }
          getCashierStatus();

        });

        Echo.channel('DeliverEvent')
        .listen('.DeliverEvent', (e)=>{
          console.log(e);
          allOrdersview();
          console.log('serveed');
        //   $('#imgIcon'+e.table).attr('src','http://192.168.2.118/images/icons/timelimit.png');
          document.getElementById('myaudio').play();
          timending();
          timeEndingTables();
          tableStatusIndicator();

        });

        Echo.channel('paymentEvent')
        .listen('.paymentEvent', (e)=>{
          console.log(e);
        });
        function change(tablenumber){
         $('#'+tablenumber).removeClass("availableBtn");
         $('#'+tablenumber).addClass("orderTakenBtn");
         $('#t'+tablenumber).removeClass("available");
         $('#t'+tablenumber).addClass("orderTaken");
       }

       $('select').on('change', function() {
           var subtotal = $('#subTotal').html();
           var discount=$(this).val()/100;
           var less = subtotal*discount;
           var Total = subtotal-less;
           $('#total').html(Total);
           $('#superTotal').html(Total);
           console.log(Total);
       });

       $('#Amount').on('keyup', function(){
           var Total = $('#superTotal').html();
           var amount =$('#Amount').val();
           $('#userChange').html((amount-Total).toFixed(2));
       });
       $(".menuQuntity").hide();
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

       $(".category").click(function() {

         $('#menuOrderid').val($(this).attr('menu-id'));
         var tableid =$('.TableNumber').html();
         console.log(tableid);
         var menuname=$(this).attr('menu-name');
         var ticketid=$('#table'+tableid).val();
         $('#ticket_id').val(ticketid);
         $('#tableid').val(tableid);
         $('#menuName').text(menuname);
         $(".menuQuntity").show();
         $('#mainnFormCreateOrder').show();
         $('#messageCreateorder').hide();
         $('#counter').val(1);


       });

       $( ".addCounter" ).click(function() {
         var count = $('#counter').val();
         var curcount=parseInt(count)+1;
         $('#counter').val(curcount);
       });

       $( ".subCounter" ).click(function() {
         var count = $('#counter').val();
         var curcount=count-1;
         $('#counter').val(curcount);
       });

       $("#closeQuantity").click(function() {
           $(".menuQuntity").fadeOut();
           $('#counter').val(1);
       });

       ticketform.addEventListener('submit', function(e){
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
    //    for(var a=0;a<quantity.value;a++){


    //    }

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
        //resent counter
       $('#counter').val(1);
       allOrdersview()

   });

   // $('.qtyForm').hide();
   // $('#showQtyForm').click(function(){
   //     $('.qtyForm').show();
   //     $('.qty').hide();
   // });
      //  $( "#PrintDiv" ).click(function() {
      //      print1();
      //      location.reload();
      //  });
      //  function print1(){
      //      var divToPrint= document.getElementById('resieptContainer');
      //  var newWin=window.open('','Print-Window');
      //  newWin.document.open();
      //  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      //  newWin.document.close();
      //  setTimeout(function(){newWin.close();},10);
      //  }
   // function printDiv()
   // {
   //   var divToPrint=document.getElementById('DivIdToPrint');
   //   var newWin=window.open('','Print-Window');
   //   newWin.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );
   //   newWin.document.open();
   //   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
   //   newWin.document.close();
   //   setTimeout(function(){newWin.close();},10);
   // //   DivIdToPrint
   // }

   // cart
   $("#confirmed").click(function(){
               $(".QtyContainer").addClass("d-none");
               // $("#confirmed").addClass("d-none");
               $(".PaymentBtn").removeClass("d-none");
               $(".Qtyspan").removeClass("d-none");
               $(".discountEdit").addClass("d-none");
               var total = $('#supertotal').html();
               $('#TotalAmount').html(total);
               console.log(total);
               });
               $("#discount").click(function(){
               $(".discountEdit").removeClass("d-none");
               $(".PaymentBtn").addClass("d-none");
               $("#confirmed").removeClass("d-none");
                });
                $("#editOrder").click(function(){
               $(".QtyContainer").removeClass("d-none");
               $(".discountEdit").removeClass("d-none");
               $(".PaymentBtn").addClass("d-none");
               $("#confirmed").removeClass("d-none");
               $(".Qtyspan").addClass("d-none");
               });

   // switch
   $(".discountTypes").hide();
   $("#discountSwitch").click(function () {
               if ($(this).is(":checked")) {
                   $(".discountTypes").slideDown();

               } else {
                   $(".discountTypes").slideUp();

               }
           });
   $('#UserAmmount').keyup(function(){
   var change=$('#UserAmmount').val();
   var total=$('#TotalAmount').html();
   var subtotal=change-total;
   $('#ChangeAmount').html(subtotal);
   console.log(subtotal);
   });

   function getCashierStatus() {
    $.ajax({
               url:"/getCashierStatus",
               method:'GET',
               data: {
               },
               success:function(result){
                    console.log(result);
                    console.log("number of available table :"+ result['available']);
                    $('#availableTableDetails').text(result['available']);
                    $('#TimerStartedDetails').text(result['timerStarted']);
                    $('#OrdertakenDetails').text(result['ordertaken']);
               }
           });

   }
//    $('.tables').on('click', function() {
//         $('.orderView').removeClass('d-none');

//         $('.tableviews').hide();
//    });

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

            tableCashier(parseInt($('.TableNumber').text()));
            $('.cartQuantityCircle').text(0);
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

                   tableCashier(tableid);
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

   $('#deliveryorderlist').hide();
   $('#deliveredorderlist').hide();
   $('.cartBtnContainer').hide();
   $('.serveAll').hide();

   $("#BtngroupAllOrders").on("change",function(){
     var valoption = $(".allOrdersnav[type='radio']:checked").val();
     console.log(valoption);
     if(valoption == 1){
       $('#confirmorderlist').show();
       $('#deliveryorderlist').hide();
       $('#deliveredorderlist').hide();
       $('.cartBtnContainer').hide();
       $('.serveAll').hide();
     }
     else if (valoption == 2){
       $('#confirmorderlist').hide();
     $('#deliveryorderlist').show();
     $('#deliveredorderlist').hide();
     $('.cartBtnContainer').hide();
     $('.serveAll').show();
     }else if (valoption == 3){
       $('#confirmorderlist').hide();
     $('#deliveryorderlist').hide();
     $('#deliveredorderlist').show();
     $('.cartBtnContainer').show();
     $('.serveAll').hide();
     }

   });


   function allOrdersview() {
        var id = parseInt($('.TableNumber').text());
      $.get('cartquanity1/'+id,function(data){
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
                    //    var cell4 = row.insertCell(3);

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
                   cell1.innerHTML = '<input type="hidden" id="orderId'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['id']+'">'+'<input type="hidden" id="Name'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['name']+'">'+'<input type="hidden" id="TicketId'+data['delivery'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivery'][i-1]['TicketId']+'">'+'₱'+data['delivery'][i-1]['price']+' '+data['delivery'][i-1]['name']+"<span></span><span class='d-none' id='menuItemQuantity"+data['delivery'][i-1]['MenuId']+"'>"+data['delivery'][i-1]['quantity']+"</span>";
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
                   cell1.innerHTML = '<input type="hidden" id="orderId'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['id']+'">'+'<input type="hidden" id="Name'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['name']+'">'+'<input type="hidden" id="TicketId'+data['delivered'][i-1]['MenuId']+'" name="TicketID" value="'+data['delivered'][i-1]['TicketId']+'">'+'₱'+data['delivered'][i-1]['price']+' '+data['delivered'][i-1]['name']+"<span></span><span class='d-none' id='menuItemQuantity"+data['delivered'][i-1]['MenuId']+"'>"+data['delivered'][i-1]['quantity']+"</span>";
                   cell2.innerHTML = data['delivered'][i-1]['quantity'];
                   cell3.innerHTML = "₱"+data['delivered'][i-1]['Total'];
                //    cell4.innerHTML ='<button class="btn btn-outline-primary " id="'+data['delivery'][i-1]['MenuId']+'" onclick="EditCartMenudeliver(this.id)">Serve</button>';
                   // cell2.innerHTML = data['delivery'][i-1]['price'];
                   row1.classList.add('menulist');
                 }

                });

   }



   $('.deliverConfirmCashier').hide();

   var DELIVERYTICKETID;
   var DELIVERYMENUID;
   function EditCartMenudeliver(id){
   $('.deliverConfirmCashier').show();
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
                   console.log('test');
               }
           });

   }

   $('#closeDelivermodal').click(function() {
       $('.deliverConfirmCashier').hide();
   })

   function deliveryItem(){
       $('.deliverConfirmCashier').hide();
       var table = parseInt($('.TableNumber').text());
    //    $.ajax({
    //            url:"/changeTOdelivered",
    //            method:'POST',
    //            data: {
    //                "_token": $('meta[name="csrf-token"]').attr('content'),
    //                "ticket_id":DELIVERYTICKETID,
    //                "menu_id":DELIVERYTICKETID
    //            },
    //            success:function(result){
    //                console.log(result);
    //            }
    //        });

           const option3={
            method:'post',
            url:'DeliverEvent',
            data:{
                ticket:DELIVERYTICKETID,
                menu_id:DELIVERYMENUID,
                table:table
            },
            transformResponse: [(data)=> {
                return data;
            }]
        }
            axios(option3);
   }

   //time elapse
   var minutesToAdd=43;
   //time today
   var today = new Date();


   function timending(){
      $.ajax({
               url:"/timeEnding",
               method:'GET',
               data: {
                cache: false
               },
               success:function(result){
                   var deliveredorderlist = document.getElementById("timeEndingTable");
                    $('#timeEndingTable .timelist').remove();
                    var tableLength3=deliveredorderlist.length;
                    var row = deliveredorderlist.getElementsByTagName('tbody')[0].insertRow(tableLength3);
                     for(var i =1; i <= result['timeEndingList'].length; i++) {
                        if((new Date(result['timeEnding'][i-1]['end_time']).getTime() - today.getTime()) <= minutesToAdd*60000  ){
                        var row1 = deliveredorderlist.insertRow(i);
                        var cell1 = row1.insertCell(0);
                        var cell2 = row1.insertCell(1);
                        var cell3 = row1.insertCell(2);
                        var cell4 = row1.insertCell(3);
                        // var cell4 = row1.insertCell(3);
                        cell1.innerHTML = result['timeEndingList'][i-1]['tableID'];
                        cell2.innerHTML = result['timeEndingList'][i-1]['start_time'];
                        cell3.innerHTML = '<span id="tr'+result['timeEndingList'][i-1]['tableID']+'"></span>';
                        //    cell4.innerHTML ='<button class="btn btn-outline-primary " id="'+data['delivery'][i-1]['MenuId']+'" onclick="EditCartMenudeliver(this.id)">Serve</button>';
                        row1.classList.add('timelist');
                        console.log('sample');
                        }
                    }
                    console.log(result);

                     }
                 });
     }
   function timeendingList(){

    // $.ajax({
    //            url:"/timeEnding",
    //            method:'GET',
    //            data: {

    //            },
    //            success:function(result){

    //              function Timer(holder) {

    //                 var controller = {
    //                     holder: holder,
    //                     end: null,
    //                     intervalID:0,
    //                     display: function () {
    //                         var _second = 1000;
    //                         var _minute = _second * 60;
    //                         var _hour = _minute * 60;
    //                         var _day = _hour * 24;
    //                         var msg = "";
    //                         var now = new Date();
    //                         var distance = controller.end - now;
    //                         if (distance < 0) {
    //                             clearInterval(controller.intervalID);
    //                             controller.holder.innerHTML = 'EXPIRED!';
    //                             return;
    //                         }
    //                         var days = Math.floor(distance / _day);
    //                         var hours = Math.floor((distance % _day) / _hour);
    //                         var minutes = Math.floor((distance % _hour) / _minute);
    //                         var seconds = Math.floor((distance % _minute) / _second);
    //                         controller.holder.innerHTML = hours+' Hour '+ minutes + ' Minutes ' ;

    //                     }
    //                 }
    //                 this.countDown = function (end) {
    //                     controller.end = end;
    //                     controller.intervalID = setInterval(controller.display, 1000);
    //                 }
    //                 }

    //                 var timers = {};
    //                 for(var j =1; j <= result['timeEnding'].length; j++) {
    //                     if((new Date(result['timeEnding'][j-1]['end_time']).getTime() - today.getTime()) < minutesToAdd*60000  ){
    //                         timers.one= new Timer(document.getElementById("tr"+result['timeEnding'][j-1]['tableID']));
    //                         timers.one.countDown(new Date(result['timeEnding'][j-1]['end_time']));
    //                     }

    //                 }
    //             }
    //         });


   }
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
                                        document.getElementById('myaudio').play();
                                        // success();
                                        timending();
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

   timending();
   timeendingList();
   timeEndingTables();



   $('.notallmenu').hide()
  var $search = $("#myInput").on('input',function(){
        var matcher = new RegExp($(this).val(), 'gi');
        $('.menuItem').show().not(function(){
            return matcher.test($(this).find('.menuName').text())
        }).hide();
    });


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
            $("#category6").prependTo("#myDIV");



            // function tableStatusIndicator(){

            //     $.ajax({
            //     url:"/tableStatusIndicator",
            //     method:'GET',
            //     data: {

            //     },
            //     success:function(result){
            //         console.log(result);
            //         var timeicon  = $('#timeIconIndicator').val();
            //         console.log(timeicon);



            //         for(var i=1 ;i <=result['tablesStatus'].length;i++){
            //             $('#tableStatusIndicator'+result['tablesStatus'][i-1]['table_id']).attr('src',timeicon);
            //         }

            //     }
            //    });

            // }
            // tableStatusIndicator();
                $('.deliverAllConfirmCashier').hide();
                $('#closeDeliverAllmodal').click(function() {
                    $('.deliverAllConfirmCashier').hide();
                })


            function serveAll(){
                $('.deliverAllConfirmCashier').show();
                var tableNum = parseInt($(".TableNumber").text()) ;
                $('.deliverAllConfirmCashier .menuNameDeliverd').text(tableNum);
            }
            function deliveryAllItem(){
                $('.deliverAllConfirmCashier').hide();
                var tableNum = parseInt($(".TableNumber").text()) ;
                console.log("table selected: " + tableNum);

                const option3={
                    method:'post',
                    url:'serveAllEvent',
                    data:{
                        table:tableNum
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                }
                    axios(option3);
            }



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

                    tableCashier(tableNum);

                 }

                 $('.clearDiscount').click(function() {
                    var id =  $(this).attr('disc');
                    console.log(id);
                    $('#disc'+id).val(0);
                 });

                Echo.channel('disablemenuEvent')
              .listen('.disablemenuEvent', (e)=>{
                console.log(e.menuitem);
                $('#span'+e.menuid).removeClass('d-none');
                $('.menuitem'+e.menuid).addClass('notAvailableMenu');
                // $('.menuitem'+e.menuid).addClass('nopointerEvents ');
                $('.divmenu'+e.menuid).addClass('nopointerEvents ');
                $('.menuitem'+e.menuid).addClass('enableMenuBtnfunction');
                $('.menuitem'+e.menuid).removeClass('disableMenuBtnfunction');
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

              });



              var $search = $("#myInput").on('input',function(){
                var matcher = new RegExp($(this).val(), 'gi');
                $('.menuItem').removeClass('d-none').not(function(){
                    return matcher.test($(this).find('.menuName').text())
                }).addClass('d-none');
             });

            var menuid = 0;
            $('.disablemenuEdit').hide();
            $('.enablemenuEdit').hide();

            $('.menuItem').click(function(){
                 menuid = $(this).attr('data-id');
                 console.log(menuid);

                 $('.menuNameedit').text($(this).attr('id'));

                 if($(this).hasClass('disableMenuBtnfunction')){
                    $('.disablemenuEdit').show();
                 }else{
                    $('.enablemenuEdit').show();
                 }
            });
            $('.closemenuEdit').click(function(){
                $('.disablemenuEdit').hide();
            })
            $('.closemenuenaEdit').click(function(){
                $('.enablemenuEdit').hide();
            })
            $('.disableMenubtn').click(function(){
                const option1={
                    method:'post',
                    url:'diablemenu',
                    data:{
                        menuid:menuid,
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }
                     axios(option1);
                     $('.disablemenuEdit').hide();
            });

            $('.enableMenubtn').click(function(){
                const option1={
                    method:'post',
                    url:'enablemenu',
                    data:{
                        menuid:menuid,
                    },
                    transformResponse: [(data)=> {
                        return data;
                    }]
                     }
                     axios(option1);
                     $('.enablemenuEdit').hide();
            });



//recieeeept resibooooooo

$('#confirmed').click(function(){
   var tableid=$('#TableNumber').text();
   console.log("pang reciept works" + tableid);
   $.ajax({
        url: "/filtering/resibolist",
        type:"GET",
        data:{
         tableid: tableid,
        },
        success:function(data){
         // console.log(data);
         // console.log("Nakapasok");
         $('.recieptmodal').empty(); // remove old options
         $.each(data, function(key,value) {
            // console.log("Nakapasok ulit");
                     console.log(value);
                           $('.recieptmodal').append("<tr><td><b> " + value['Name'] +" x" + value['quantity'] + "  </b><br><span class='discount' style='font-size: 10px;'></span></td> <td class='text-top'><center class='text-top'>" + value['price'] + "</center></td><td style='text-align:center!important'><center>P " + value['total'] + "</center></td></tr>");
                     });
        },
        error: function(error) {
         console.log(error);
        }
       });
       $.ajax({
        url: "/filtering/resibolistsubtotal",
        type:"GET",
        data:{
         tableid: tableid,
        },
        success:function(data){
         // console.log(data);
         // console.log("Nakapasok");
         $('.recieptsubtotal').empty();
         $.each(data, function(key,value) {
            console.log("Nakapasok ulit");
                     // console.log(value);
                     $('.recieptsubtotal').append("<span>" + value['sum'] + "</span>");
                     });
        },
        error: function(error) {
         console.log(error);
        }
       });
       $.ajax({
        url: "/filtering/ticketid",
        type:"GET",
        data:{
         tableid: tableid,
        },
        success:function(data){
         // console.log(data);
         // console.log("Nakapasok");
         $('#recieptticketid').empty();
         $.each(data, function(key,value) {
            // console.log("Nakapasok ulit");
                     // console.log(value);
                     $('#recieptticketid').append("<span>" + value['id'] + "</span>");
                     });
        },
        error: function(error) {
         console.log(error);
        }
       });
       $.ajax({
        url: "/filtering/recieptauth",
        type:"GET",
        success:function(data){
         // console.log(data);
         // console.log("Nakapasok");
         $('#recieptauth').empty();
                     $('#recieptauth').append("<span>" + data + "</span>");
        },
        error: function(error) {
         console.log(error);
        }
       });
       $.ajax({
        url: "/filtering/resibolistdiscount",
        type:"GET",
        data:{
         tableid: tableid,
        },
        success:function(result){
         $('.dizcount').empty(); // remove old options

         console.log(result['discounts']);
         for(var i =0; i < result['discounts'].length; i++) {
            console.log(result['discounts'][i].name);
            $('.discountlistreciept').after("<tr class='dizcount'><td colspan='1'></td><td style='text-align:right!important'>"+ result['discounts'][i].name +"</td><td style='text-align:center!important'>-119.4</td>");
         }
        },
        error: function(error) {
         console.log(error);
        }
       });
});














</script>


@jquery
@toastr_js
@toastr_render
@endsection
