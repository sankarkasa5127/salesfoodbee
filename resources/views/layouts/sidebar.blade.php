<ul class="navbar-nav sidebar sidebar-dark bg-yellow accordion toggled " id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="{{asset('public/img/logo-icon.png')}}" alt="logo">
                </div>
                <div class="sidebar-brand-text mx-1">foodbee.de</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" class="" href="{{route('index')}}">
                    <i class="fas fa-fw fa-tachometer-alt dash-loader"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('reservation_index')}}">
                   <img class="dash-loader" src="{{asset('public/img/booking.png')}}">
                    <span>Reservation</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('orders')}}">
                   <img class="dash-loader" src="{{asset('public/img/restaurant.png')}}">
                    <span>Orders</span>
                </a>
                 <!-- <a class="nav-link" href="{{route('orders')}}">  -->
                 
                  <!--   <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                     <img  src="{{asset('public/img/restaurant.png')}}">
                    <span>Orders</span>
                </a> -->
                    
               <!--  </a> -->
                <!-- <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> -->
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->

                       <!--  <a class="collapse-item active showmyloader" rel-data="show_loader" href="{{route('orders')}}">Orders</a>
                        <a class="collapse-item showmyloader" rel-data="show_loader" href="{{route('AllOrders')}}">Past Orders</a>
                        
                    </div>
                </div> -->
            </li>
			
			<!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{route('items')}}">
                    <img class="dash-loader" src="{{asset('public/img/menu (1).png')}}">
                    <span>Menu</span>
                </a>
            </li>
            <?php $user = Session::get('user');
            // if($user->roleId == '1'){

           // }
            ?>
            <!-- Divider -->
            <!-- <hr class="sidebar-divider my-0">
			
             <li class="nav-item">
                 <a class="nav-link" href="{{route('orders')}}">  -->
                 
                    <!-- <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse123" aria-expanded="true"
                    aria-controls="collapseTwo">
                     <img  src="{{asset('public/img/restaurant.png')}}">
                    <span>Web-site</span>
                </a> -->
                    
               <!--  </a> -->
                <!-- <div id="collapse123" class="collapse " aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded"> -->
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->

                        <!-- <a class="collapse-item active showmyloader" rel-data="show_loader" href="{{route('theme_show')}}">Content</a> -->
                        <!-- <a class="collapse-item showmyloader" rel-data="show_loader" href="{{route('theme_show')}}">Theme Content</a> -->
                        <!-- <a class="collapse-item showmyloader" rel-data="show_loader" href="{{route('web_img_show')}}">Theme Images</a>
                        <a class="collapse-item showmyloader" rel-data="show_loader" href="{{route('allThemeas')}}">Theme's</a>
                        <a class="collapse-item showmyloader" rel-data="show_loader" href="{{route('menu_form')}}">Menu</a> -->
                        
                    <!-- </div>
                </div>
            </li> -->

            <hr class="sidebar-divider d-none d-md-block">


<li class="nav-item">
                <a class="nav-link" href="{{url('report/orders')}}">
                   <img class="dash-loader" src="{{asset('public/img/booking.png')}}">
                    <span>Reports</span>
                </a>
            </li>
            <!-- Divider -->
           
        

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <span class="loader-img  d-none"><img style="margin-left: 24px;" height="45px" width="45px" class="side-img1" src="{{asset('public/img/popup-img/bee-buzzing-bee.gif')}}"><img style="margin-left: 16px;" width="70px" class="side-img1" src="{{asset('public/img/popup-img/Fountain.gif')}}"></span>
        </ul>
        <!-- End of Sidebar -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script type="text/javascript">
            $( document ).ready(function() {
                $( ".dash-loader" ).click(function() {
                  $('.loader-img').removeClass('d-none');
                });
            });

            $( document ).ready(function() {
                $( ".showmyloader" ).click(function() {
                    var dataid = $(this).attr('rel-data');
                    if(dataid){
                      $('.loader-img').removeClass('d-none');  
                    }
                  
                });
            });

        </script>