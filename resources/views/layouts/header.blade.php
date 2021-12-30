<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor4">
<head>
@php  $user = Auth::guard()->user() @endphp
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset($user['fev_icon']) }}" type="image/png" />
	<link href="{{ asset('assets/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
	<!--plugins-->
	<link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	  
	<script src="{{ asset('assets/js/pace.min.js')}}"></script>




	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
   

	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	 
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.css" rel="stylesheet">

	<title>{{$title}}</title>
</head>

<body onload="info_noti()">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset($user['logo']) }}" class="logo-icon" alt="logo icon" style="width:80%;">
				</div>
				<!--<div>
					<h4 class="logo-text"><img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="logo icon"></h4>
				</div>-->
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
		
			@if($user['user_type']==0)
				<ul class="metismenu" id="menu">
					<li>
						<a href="{{url('/home')}}">
							<div class="parent-icon"><i class='bx bx-home-circle'></i></div>
							<div class="menu-title">Dashboard</div>
						</a>
					</li>
					<li>
						<a href="{{url('manage_user')}}">
							<div class="parent-icon"><i class="fadeIn animated bx bx-group"></i></div>
							<div class="menu-title">Users</div>
						</a>
					</li>
					<li>
						<a href="{{url('manage_coupon')}}">
							<div class="parent-icon"><i class="fadeIn animated bx bx-layer"></i></div>
							<div class="menu-title">Coupon</div>
						</a>
					</li>
					<li>
						<a href="{{url('manage_vendor')}}">
							<div class="parent-icon"><i class='bx bx-user-circle'></i></div>
							<div class="menu-title">Vendor</div>
						</a>
					</li>
					<li>
						<a href="{{url('manage_offer')}}">
							<div class="parent-icon"><i class="fadeIn animated bx bx-gift"></i></div>
							<div class="menu-title">Offers</div>
						</a>
					</li>
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-cart"></i></div>
							<div class="menu-title">Product</div>
						</a>
						<ul>
							<li> <a href="{{url('add_product')}}"><i class="bx bx-right-arrow-alt"></i>Add product</a></li>
							<li> <a href="{{url('manage_product')}}"><i class="bx bx-right-arrow-alt"></i>Manage Product</a></li>
						</ul>
					</li>
					
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-list-ul"></i></div>
							<div class="menu-title">Category</div>
						</a>
						<ul>
							<li> <a href="{{url('manage_category')}}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a></li>
							<li> <a href="{{url('manage_subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Manage Subcategory</a></li>
						</ul>
					</li>
					
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-images"></i></div>
							<div class="menu-title">Banner</div>
						</a>
						<ul>
							<li> <a href="{{url('primary_banner')}}"><i class="bx bx-right-arrow-alt"></i>Primary Banner</a></li>
							<li> <a href="{{url('secondary_banner')}}"><i class="bx bx-right-arrow-alt"></i>Secondary Banner</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-collection"></i></div>
							<div class="menu-title">Content Management</div>
						</a>
						<ul>
							<li> <a href="{{url('terms_condition')}}"><i class="bx bx-right-arrow-alt"></i>Terms and Condition</a></li>
							<li> <a href="{{url('privacy_policy')}}"><i class="bx bx-right-arrow-alt"></i>Privacy Policy</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class='bx bx-bookmark-heart'></i></div>
							<div class="menu-title">Notification Management</div>
						</a>
						
						<ul>
							<li> <a href="{{url('fcm')}}"><i class="bx bx-right-arrow-alt"></i>FCM</a></li>
							<li> <a href="{{url('send_notification')}}"><i class="bx bx-right-arrow-alt"></i>Send Notification</a></li>
						</ul>
					</li>
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="bx bx-detail"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">Report And Block Management</div>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="bx bx-file"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">System Reports</div>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>
						<a href="#">
							<div class="parent-icon"><i class="bx bx-diamond"></i>
							</div>
							<div class="menu-title">Master Settings</div>
						</a>
					</li>-->
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-football"></i></div>
							<div class="menu-title">Settings</div>
						</a>
						<ul>
							<li> <a href="{{url('manage_city')}}"><i class="bx bx-right-arrow-alt"></i>Manage City</a></li>
							<li> <a href="{{url('manage_color')}}"><i class="bx bx-right-arrow-alt"></i>Manage Color</a></li>
							<li> <a href="{{url('manage_size')}}"><i class="bx bx-right-arrow-alt"></i>Manage Size</a></li>
							<li> <a href="{{url('manage_currency')}}"><i class="bx bx-right-arrow-alt"></i>Manage Currency</a></li>
							<li> <a href="{{url('delivery_charge')}}"><i class="bx bx-right-arrow-alt"></i>Delivery Charge</a></li>
							<li> <a href="{{url('order_charge')}}"><i class="bx bx-right-arrow-alt"></i>Order Charge</a></li>
						</ul>
					</li>
				</ul>
		@elseif($user['user_type']==1)
				<ul class="metismenu" id="menu">
					<li>
						<a href="{{url('/home')}}">
							<div class="parent-icon"><i class='bx bx-home-circle'></i></div>
							<div class="menu-title">Dashboard</div>
						</a>
					</li>
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-cube"></i></div>
							<div class="menu-title">Product</div>
						</a>
						<ul>
							<li> <a href="{{url('add_product')}}"><i class="bx bx-right-arrow-alt"></i>Add product</a></li>
							<li> <a href="{{url('manage_product')}}"><i class="bx bx-right-arrow-alt"></i>Manage Product</a></li>
						</ul>
					</li>
					
					<li>
						<a class="has-arrow" href="javascript:;">
							<div class="parent-icon"><i class="fadeIn animated bx bx-list-ul"></i></div>
							<div class="menu-title">Category</div>
						</a>
						<ul>
							<li> <a href="{{url('manage_category')}}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a></li>
							<li> <a href="{{url('manage_subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Manage Subcategory</a></li>
						</ul>
					</li>
					<!--<li>
						<a href="#">
							<div class="parent-icon"><i class="bx bx-diamond"></i>
							</div>
							<div class="menu-title">Add Product</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="parent-icon"> <i class="bx bx-video-recording"></i></div>
							<div class="menu-title">Delete Product</div>
						</a>
					</li> -->
					<li>
						<a href="{{ url('update_stock') }}">
							<div class="parent-icon"><i class="fadeIn animated bx bx-coin-stack"></i>
							</div>
							<div class="menu-title">Update Stock</div>
						</a>
					</li>
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="fadeIn animated bx bx-donate-blood"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">Receive Orders</div>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="fadeIn animated bx bx-check-circle"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">Confirm Orders</div>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="fadeIn animated bx bx-check-double"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">Complete Orders</div>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>-->
					<!--	<a href="#">-->
					<!--		<div class="parent-icon"><i class="fadeIn animated bx bx-credit-card"></i>-->
					<!--		</div>-->
					<!--		<div class="menu-title">Get Payment fromadmin</div>-->
					<!--	</a>-->
					<!--</li>-->
					<li>
						<a href="{{ url('order_history') }}">
							<div class="parent-icon"><i class="fadeIn animated bx bx-history"></i>
							</div>
							<div class="menu-title">Order History</div>
						</a>
					</li>
				</ul>	
	@endif
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-2.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-3.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-4.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-5.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-6.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-7.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-8.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-9.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-10.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('assets/images/avatars/avatar-11.png') }}" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset($user['image']) }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ ucfirst($user['name']) }}</p>
								
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{url('profile')}}"><i class="bx bx-user"></i><span>Profile</span></a></li>
							<li><a class="dropdown-item" href="{{url('/home')}}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>

   
	