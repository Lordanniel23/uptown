<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Uptown Grill</title>
      <link rel="shortcut icon" href="{{url('/logo.png')}}" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="{{ asset('css/dashboard/volt.css') }}" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/datatable/jquery.dataTables.min.css') }}"rel="stylesheet">
      <link href="{{ asset('css/datatable/buttons.dataTables.min.css') }}"rel="stylesheet">
      <link href="{{ asset('css/datatable/dataTables.dateTime.min.css') }}"rel="stylesheet">

      <script src="{{ asset('js/datatable/jquery-3.5.1.js') }}" ></script>
      <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/jszip.min.js') }}" ></script>
      <script src="{{ asset('js/datatable/pdfmake.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/vfs_fonts.js') }}"  ></script>
      <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/buttons.print.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/buttons.colVis.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/moment.min.js') }}"  ></script>
      <script src="{{ asset('js/datatable/dataTables.dateTime.min.js') }}"  ></script>

      <style>
         .modal { background: rgba(000, 000, 000, 0.4); }
         .modal-backdrop {position: inherit!important;}
         .modal-backdrop.show {opacity: 0!important;}
         .flex-container {display: flex;}
         .flex-container > div {margin: 10px;padding: 20px;font-size: 30px;}
                  table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                  }
                  td, th {
                  text-align: left!important;
                  padding: 8px!important;
                  }

                  tr:nth-child(even) {
                  background-color: #dddddd!important;
                  }
                  .cropped {
                     width: 50px; /* width of container */
                     height: 50px; /* height of container */
                     overflow: hidden;
                     border: 1px solid black;
                     border-radius: 15px;
                     background-color:white;
                  }
                  .cropped img {
                     max-width:50px;
                  }
                  .zoom {
                     transition: transform .2s;
                     margin: 0 auto;
                     }
                  .zoom:hover {
                     -ms-transform: scale(1.5); /* IE 9 */
                     -webkit-transform: scale(1.5); /* Safari 3-8 */
                     transform: scale(3.5); 
                  }
                  .navbar .navbar-nav .dropdown .dropdown-menu {
                     top: 55%!important;
                  }
                  .avatar {
                     width: inherit!important;
                     height: 3rem;
                  }
                  .btn-gray-800 {
                     color: #ffffff!important;
                     background-color: #1F2937!important;
                  }
                  .dropdown-toggle::after {
                      display: inherit!important;
                  }
                  .font-small {
                  font-size: 1rem;
                  }
                  .btn-primary
                  {
                  display:initial;
                  border-radius:0px;
                  box-shadow:0px 0px 0px 0px rgba(0,0,0,0.2);
                  margin-top:0px;
                  }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
         <div class="navbar-brand me-lg-5">
         <img class="navbar-brand-dark" src="{{url('/logo.png')}}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{url('/logo.png')}}" alt="Volt logo" />
         </div>
         <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
         </div>
      </nav>
      <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
         <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
               <div class="d-flex align-items-center">
                  <div class="avatar-lg me-4">
                     <img src="../../assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
                        alt="Bonnie Green">
                  </div>
               </div>
               <div class="collapse-close d-md-none">
                  <a href="#sidebarMenu" data-bs-toggle="collapse"
                     data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                     aria-label="Toggle navigation">
                     <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                     </svg>
                  </a>
               </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
               <li class="nav-item" style="padding-left:1em;padding-top: 1em;padding-top: 1em;">
                  <span class="sidebar-icon">
                  <img src="{{url('/logo.png')}}" height="40" width="40" alt="Volt Logo">
                  </span>
                  <span class="mt-1 ms-1 sidebar-text">Uptown Grill</span>
               </li>
               <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
               <li id="sidebardashboard" class="nav-item">
                  <a href="/admin"  class="nav-link">
                     <span class="sidebar-text">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <span id="menuspan"
                     class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                     data-bs-toggle="collapse" data-bs-target="#menu">
                     <span>
                        <span class="sidebar-text">Menus</span>
                     </span>
                     <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </span>
                  </span>
                  <div class="multi-level collapse " role="list"
                     id="menu" aria-expanded="false">
                     <ul class="flex-column nav">
                        <li id="menuul" class="nav-item">
                           <span id ="menulistspan"
                              class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                              data-bs-toggle="collapse" data-bs-target="#menu-pages">
                              <span>
                                 <span class="sidebar-text">Menu</span>
                              </span>
                              <span class="link-arrow">
                                 <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                 </svg>
                              </span>
                           </span>
                           <div class="multi-level collapse " role="list"
                              id="menu-pages" aria-expanded="false">
                              <ul class="flex-column nav">
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                                 <li id="sidebarmenu" class="nav-item">
                                    <a class="nav-link" href="/admin/menu" >
                                    <span class="sidebar-text" style="padding-left: 1em;">Menu List</span>
                                    </a>
                                 </li>
                                 <li id="submenuarchul" class="nav-item">
                                    <a class="nav-link" href="/admin/menu/archived" id="sidebararchivesubmenu">
                                    <span class="sidebar-text" style="padding-left: 1em;">Archived Menu</span>
                                    </a>
                                 </li>
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                              </ul>
                           </div>
                        </li>

                        <ul class="flex-column nav">
                        <!-- <li id="submenuul" class="nav-item">
                           <span id ="menulistspan"
                              class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                              data-bs-toggle="collapse" data-bs-target="#submenu-pages">
                              <span>
                                 <span class="sidebar-text">Submenu</span>
                              </span>
                              <span class="link-arrow">
                                 <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                 </svg>
                              </span>
                           </span>
                           <div class="multi-level collapse " role="list"
                              id="submenu-pages" aria-expanded="false">
                              <ul class="flex-column nav">
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                                 <li id="sidebarsubmenu" class="nav-item">
                                    <a class="nav-link" href="/admin/submenu" >
                                    <span class="sidebar-text" style="padding-left: 1em;">Submenu List</span>
                                    </a>
                                 </li>
                                 <li id="sidebararchsub" class="nav-item">
                                    <a class="nav-link" href="/admin/submenu/archived" >
                                    <span class="sidebar-text" style="padding-left: 1em;">Archived Submenu</span>
                                    </a>
                                 </li>
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                              </ul>
                           </div>
                        </li> -->
                        <li class="nav-item">
                           <span id ="categspan"
                              class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                              data-bs-toggle="collapse" data-bs-target="#categ-pages">
                              <span>
                                 <span class="sidebar-text">Category</span>
                              </span>
                              <span class="link-arrow">
                                 <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                 </svg>
                              </span>
                           </span>
                           <div class="multi-level collapse " role="list"
                              id="categ-pages" aria-expanded="false">
                              <ul class="flex-column nav">
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                                 <li id="sidebarcategory" class="nav-item">
                                    <a class="nav-link" href="/admin/category" >
                                    <span class="sidebar-text" style="padding-left: 1em;">Category List</span>
                                    </a>
                                 </li>
                                 <li id="sidebararchivedcategory" class="nav-item">
                                    <a class="nav-link" href="/admin/category/archived" >
                                    <span class="sidebar-text" style="padding-left: 1em;">Archived Category</span>
                                    </a>
                                 </li>
                                 <li role="separator" class="dropdown-divider border-gray-700"></li>
                              </ul>
                           </div>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="nav-item">
                  <span id="empspan"
                     class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                     data-bs-toggle="collapse" data-bs-target="#users-pages">
                     <span>
                        <span class="sidebar-text">Users</span>
                     </span>
                     <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </span>
                  </span>
                  <div class="multi-level collapse " role="list"
                     id="users-pages" aria-expanded="false">
                     <ul class="flex-column nav">
                     <li role="separator" class="dropdown-divider border-gray-700"></li>
                        <li id="sidebaremployee" class="nav-item">
                           <a class="nav-link" href="/admin/employee" >
                           <span class="sidebar-text">User List</span>
                           </a>
                        </li>
                        <li id="sidebararchiveemployee" class="nav-item">
                           <a class="nav-link" href="/admin/employee/archived" >
                              <span class="sidebar-text">Archived Users</span>
                           </a>
                        </li>
                        <li role="separator" class="dropdown-divider border-gray-700"></li>
                     </ul>
                  </div>
               </li>
               <li class="nav-item">
                  <span id="discspan"
                     class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                     data-bs-toggle="collapse" data-bs-target="#discount-pages">
                     <span>
                        <span class="sidebar-text">Discount</span>
                     </span>
                     <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </span>
                  </span>
                  <div class="multi-level collapse " role="list"
                     id="discount-pages" aria-expanded="false">
                     <ul class="flex-column nav">
                        <li role="separator" class="dropdown-divider border-gray-700"></li>
                        <li id="sidebardiscount" class="nav-item">
                           <a class="nav-link" href="/admin/discount" >
                           <span class="sidebar-text">Discount List</span>
                           </a>
                        </li>
                        <li id="sidebararchivediscount" class="nav-item">
                           <a class="nav-link" href="/admin/discount/archived" >
                           <span class="sidebar-text">Archived Discount</span>
                           </a>
                        </li>
                        <li role="separator" class="dropdown-divider border-gray-700"></li>
                     </ul>
                  </div>
               </li>
               <li id="sidebartable"  class="nav-item ">
                  <a href="/admin/table" class="nav-link">
                     <span class="sidebar-text">Tables</span>
                  </a>
               </li>
               <!-- <li id="sidebartable"  class="nav-item ">
                  <a href="/admin/system" class="nav-link">
                     <span class="sidebar-text">Settings</span>
                  </a>
               </li> -->
               <li class="nav-item">
                  <span id="reportsspan"
                     class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                     data-bs-toggle="collapse" data-bs-target="#report-pages">
                     <span>
                        <span class="sidebar-text">Reports</span>
                     </span>
                     <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </span>
                  </span>
                  <div class="multi-level collapse " role="list"
                     id="report-pages" aria-expanded="false">
                     <ul class="flex-column nav">
                     <li role="separator" class="dropdown-divider border-gray-700"></li>
                     <!-- <li class="nav-item">
                           <a class="nav-link" href="/admin/bestseller" id="sidebarbestseller">
                           <span class="sidebar-text">Best Seller</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/admin/sales" id="sidebarsales">
                           <span class="sidebar-text">Sales Report</span>
                           </a>
                        </li> -->
                        <li class="nav-item" id="sidebarmenureports">
                           <a class="nav-link" href="/admin/menureports" >
                           <span class="sidebar-text">Menus</span>
                           </a>
                        </li>
                        <li class="nav-item" id="sidebaremployeereports">
                           <a class="nav-link" href="/admin/usersreports" >
                           <span class="sidebar-text">Users</span>
                           </a>
                        </li>
                        <li class="nav-item" id="sidebarbestsellerreports">
                           <a class="nav-link" href="/admin/bestsellerreports" >
                           <span class="sidebar-text">Best Seller</span>
                           </a>
                        </li>
                        <li role="separator" class="dropdown-divider border-gray-700"></li>
                     </ul>
                  </div>
               </li>
               <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            </ul>
         </div>
      </nav>
      <main class="content">
         <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
               <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                  <div class="d-flex align-items-center">
                  <div class="py-2">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol id="bread" class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class='breadcrumb-item'>
                            <a href='/admin'>
                                <svg class='icon icon-xxs' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'></path></svg>
                            </a>
                        </li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="mb-3 mb-lg-0">
                        <h1 id="page-name" class="h4"></h1>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
                  </div>
                  <!-- Navbar links -->
                  <ul class="navbar-nav align-items-center">
                     <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                           <div class="media d-flex align-items-center">
                              <img class="avatar rounded-circle" alt="Image placeholder" src="{{ Auth::user()->image }}">
                              <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                 <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }}</span>
                              </div>
                           </div>
                        </a>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1" style="padding:15px">
                           <a class="dropdown-item d-flex align-items-center" href="/settings/{{ Auth::user()->id }}">
                              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                              </svg>
                              My Profile
                           </a>
                           <div role="separator" class="dropdown-divider my-1"></div>
                           <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                              </svg>
                              <span class="links_name">Log out</span>
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                        </div>
                     </li>
                  </ul>
               </div> 
            </div>
         </nav>

               @yield('content')
               <!-- <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
         </footer> -->
      </main>
      <script src="{{ asset('js/dashboard/@popperjs/core/dist/umd/popper.min.js') }}" ></script>
      <script src="{{ asset('js/dashboard/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
      <script src="{{ asset('js/dashboard/onscreen/dist/on-screen.umd.min.js') }}" ></script>
      <script src="{{ asset('js/dashboard/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}" ></script>
      <script src="{{ asset('js/dashboard/simplebar/dist/simplebar.min.js') }}" ></script>
      <script src="{{ asset('js/dashboard/volt.js') }}" ></script>

   </body>
</html>
<script>
   var uploadField = document.getElementById("formFile");
   uploadField.onchange = function() {
      if(this.files[0].size > 2000000){
         alert("Image is too big! Must be 2mb below");
         this.value = "";
    };
};
</script>
@toastr_css
@toastr_js
@toastr_render