	<!-- Sidebar wrapper start -->
		<nav class="sidebar-wrapper">
            <?php 
                $sidebar_action_nav = '<div class="sidebar-actions">
							<a href="public/enquiry.html" class="red">
								<div class="bg-avatar">12</div>
								<h5>New Enquiries</h5>
							</a>
							<a href="public/addmanagement.html" class="red">
								<div class="bg-avatar">'. $total_sum .'</div>
								<h5>Total Ads</h5>
							</a>
						</div>';
            ?>
			<!-- Sidebar content start -->
			<div class="sidebar-tabs">

				<!-- Tabs nav start -->
				<div class="nav" role="tablist" aria-orientation="vertical">
					<a href="public/#" class="logo">
						<img src="<?php echo e(asset('public/img/ihavelogo1.png')); ?>" alt="Uni Pro Admin">
					</a>
					<a class="nav-link <?php if($title=='Dashboard'): ?> active <?php endif; ?>" id="home-tab" data-bs-toggle="tab" href="public/#tab-home" role="tab"
						aria-controls="tab-home" aria-selected="true">
						<i class="icon-home2"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
					<a class="nav-link <?php if($title=='Customer' or  $title=='Service Provider' or  $title=='Car Agent'): ?> active <?php endif; ?>" id="usermanagement-tab" data-bs-toggle="tab" href="public/#tab-usermanagement"
						role="tab" aria-controls="tab-usermanagement" aria-selected="false">
						<i class="icon-users"></i>
						<span class="nav-link-text">User Management</span>
					</a>

					<a class="nav-link" id="addmanagement-tab" data-bs-toggle="tab" href="public/#tab-addmanagement" role="tab"
						aria-controls="tab-addmanagement" aria-selected="false">
						 <!--<i class="icon-font_download"></i> -->
						<!--<i class="fas fa-ad"></i>-->
						<span class="icon-font_download ads_icon_size" ></span>
						<span class="nav-link-text">Ads Management</span>
					</a>
					
					<a class="nav-link <?php if($title=='Privacy Policy' or  $title=='Terms & Conditions' or  $title=='About US'): ?> active <?php endif; ?>" id="contentmanagement-tab" data-bs-toggle="tab" href="public/#tab-contentmanagement"
						role="tab" aria-controls="tab-contentmanagement" aria-selected="false">
						<i class="icon-assignment"></i>
						<span class="nav-link-text">Content Management</span>
					</a>
					<a class="nav-link" id="notifications-tab" data-bs-toggle="tab" href="public/#tab-notifications" role="tab"
						aria-controls="tab-notifications" aria-selected="false">
						<i class="icon-bell"></i>
						<span class="nav-link-text">Notifications</span>
					</a>
					
					<a class="nav-link <?php if($title=='Brands' or  $title=='Country' or  $title=='Plans' or  $title=='Models'): ?> active <?php endif; ?>" id="notifications-tab" data-bs-toggle="tab" href="public/#tab-miscellaneous" role="tab"
						aria-controls="tab-miscellaneous" aria-selected="false">
						<i class="icon-box"></i>
						<span class="nav-link-text">miscellaneous</span>
					</a>

					<a class="nav-link settings" id="settings-tab" data-bs-toggle="tab" href="public/#tab-settings" role="tab"
						aria-controls="tab-authentication" aria-selected="false">
						<i class="icon-settings1"></i>
						<span class="nav-link-text">Settings</span>
					</a>
				</div>
				<!-- Tabs nav end -->

				<!-- Tabs content start -->
				<div class="tab-content">

					<!-- home tab -->
					<div class="tab-pane fade <?php if($title=='Dashboard'): ?> show active <?php endif; ?>" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Dashboard
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>
									<li>
										<a href="<?php echo e(route('adminHome')); ?>" class="<?php if($title=='Dashboard'): ?> current-page <?php endif; ?>">Dashboard</a>
									</li>

								</ul>

							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>

					<!-- usermanagement tab -->
					<div class="tab-pane fade <?php if($title=='Customer' or  $title=='Service Provider' or  $title=='Car Agent'): ?> show active <?php endif; ?>" id="tab-usermanagement" role="tabpanel"
						aria-labelledby="usermanagement-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							User Management
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>
									<li>
										<a href="<?php echo e($base_url); ?>users?type=0"  class="<?php if($title=='Customer'): ?> current-page <?php endif; ?>">Customers</a>
									</li>
									
									<li>
										<a href="<?php echo e($base_url); ?>users?type=1"  class="<?php if($title=='Service Provider'): ?> current-page <?php endif; ?>">Service Provider</a>
									</li>
									
									<li>
										<a href="<?php echo e($base_url); ?>users?type=2"  class="<?php if($title=='Car Agent'): ?> current-page <?php endif; ?>">Car Agents</a>
									</li>

								</ul>

							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>
					
					
					<!-- miscellaneous tab -->
					<div class="tab-pane fade <?php if($title=='Brands' or  $title=='Country' or  $title=='Plans' or  $title=='Models'): ?> show active <?php endif; ?>" id="tab-miscellaneous" role="tabpanel"
						aria-labelledby="miscellaneous-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Miscellaneous
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>
									<li>
										<a href="<?php echo e($base_url); ?>brands"  class="<?php if($title=='Brands'): ?> current-page <?php endif; ?>">Brands</a>
									</li>
									
										<li>
										<a href="<?php echo e($base_url); ?>models"  class="<?php if($title=='Models'): ?> current-page <?php endif; ?>">Models</a>
									</li>
									
										<li>
										<a href="<?php echo e($base_url); ?>country"  class="<?php if($title=='Country'): ?> current-page <?php endif; ?>">Country</a>
									</li>
									
										<li>
										<a href="<?php echo e($base_url); ?>plans"  class="<?php if($title=='Plans'): ?> current-page <?php endif; ?>">Plans</a>
									</li>

								</ul>

							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>

					<!-- addmanagement tab -->
					<div class="tab-pane fade" id="tab-addmanagement" role="tabpanel"
						aria-labelledby="addmanagement-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Ads Management
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>
									<li>
										<a href="public/addmanagement.html">Ads Management</a>
									</li>

								</ul>
							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>


					<!-- content management tab -->
					<div class="tab-pane fade <?php if($title=='Privacy Policy' or  $title=='Terms & Conditions' or  $title=='About US'): ?> show active <?php endif; ?>" id="tab-contentmanagement" role="tabpanel"
						aria-labelledby="contentmanagement-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Content Management
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>
									<li>
										<a href="<?php echo e($base_url); ?>update/about/About US/aboutpage/id/1" class="<?php if($title=='About US'): ?> current-page <?php endif; ?>">About Us</a>
									</li>
									<li>
										<a href="<?php echo e($base_url); ?>update/terms/Terms & Conditions/termspage/id/1" class="<?php if($title=='Terms & Conditions'): ?> current-page <?php endif; ?>">Terms and Conditions</a>
									</li>
									<li>
										<a href="<?php echo e($base_url); ?>update/privacy/Privacy Policy/privecypage/id/1" class="<?php if($title=='Privacy Policy'): ?> current-page <?php endif; ?>">Privacy Policy</a>
									</li>

								</ul>
							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>

					<!-- notifications tab -->
					<div class="tab-pane fade" id="tab-notifications" role="tabpanel"
						aria-labelledby="notifications-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Notifications
						</div>
						<!-- Tab content header end -->

						<!-- Sidebar menu starts -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-menu">
								<ul>

									<li>
										<a href="public/pushnotifications.html">Notifications</a>
									</li>

								</ul>


							</div>
						</div>
						<!-- Sidebar menu ends -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->

					</div>

					<!-- Settings tab -->
					<div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">

						<!-- Tab content header start -->
						<div class="tab-pane-header">
							Settings
						</div>
						<!-- Tab content header end -->

						<!-- Settings start -->
						<div class="sidebarMenuScroll">
							<div class="sidebar-settings">
								<div class="accordion" id="settingsAccordion">
									<div class="accordion-item">
										<h2 class="accordion-header" id="genInfo">
											<button class="accordion-button" type="button" data-bs-toggle="collapse"
												data-bs-target="#genCollapse" aria-expanded="true"
												aria-controls="genCollapse">
												General Info
											</button>
										</h2>
										<div id="genCollapse" class="accordion-collapse collapse show"
											aria-labelledby="genInfo" data-bs-parent="#settingsAccordion">
											<div class="accordion-body">
												<div class="field-wrapper">
													<input type="text" value="admin" />
													<div class="field-placeholder">Full Name</div>
												</div>

												<div class="field-wrapper">
													<input type="email" value="admin@email.com" />
													<div class="field-placeholder">Email</div>
												</div>

												<div class="field-wrapper">
													<input type="text" value="0 0000 00000" />
													<div class="field-placeholder">Contact</div>
												</div>
												<div class="field-wrapper m-0">
													<button class="btn btn-primary stripes-btn">Save</button>
												</div>
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="chngPwd">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#chngPwdCollapse"
												aria-expanded="false" aria-controls="chngPwdCollapse">
												Change Password
											</button>
										</h2>
										<div id="chngPwdCollapse" class="accordion-collapse collapse"
											aria-labelledby="chngPwd" data-bs-parent="#settingsAccordion">
											<div class="accordion-body">
												<div class="field-wrapper">
													<input type="text" value="">
													<div class="field-placeholder">Current Password</div>
												</div>
												<div class="field-wrapper">
													<input type="password" value="">
													<div class="field-placeholder">New Password</div>
												</div>
												<div class="field-wrapper">
													<input type="password" value="">
													<div class="field-placeholder">Confirm Password</div>
												</div>
												<div class="field-wrapper m-0">
													<button class="btn btn-primary stripes-btn">Save</button>
												</div>

											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="sidebarNotifications">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#notiCollapse"
												aria-expanded="false" aria-controls="notiCollapse">
												Notifications
											</button>
										</h2>
										<div id="notiCollapse" class="accordion-collapse collapse"
											aria-labelledby="sidebarNotifications" data-bs-parent="#settingsAccordion">
											<div class="accordion-body">
												<div class="list-group m-0">
													<div class="noti-container">
														<div class="noti-block">
															<div>Alerts</div>
															<div class="form-switch">
																<input class="form-check-input" type="checkbox"
																	id="showAlertss" checked>
																<label class="form-check-label"
																	for="showAlertss"></label>
															</div>
														</div>
														<div class="noti-block">
															<div>Enable Sound</div>
															<div class="form-switch">
																<input class="form-check-input" type="checkbox"
																	id="soundEnable">
																<label class="form-check-label"
																	for="soundEnable"></label>
															</div>
														</div>
														<div class="noti-block">
															<div>Allow Chat</div>
															<div class="form-switch">
																<input class="form-check-input" type="checkbox"
																	id="allowChat">
																<label class="form-check-label" for="allowChat"></label>
															</div>
														</div>
														<div class="noti-block">
															<div>Desktop Messages</div>
															<div class="form-switch">
																<input class="form-check-input" type="checkbox"
																	id="desktopMessages">
																<label class="form-check-label"
																	for="desktopMessages"></label>
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
						<!-- Settings end -->

						<!-- Sidebar actions starts -->
						<?php echo $sidebar_action_nav; ?>

						<!-- Sidebar actions ends -->
					</div>

				</div>
				<!-- Tabs content end -->

			</div>
			<!-- Sidebar content end -->

		</nav>
		<!-- Sidebar wrapper end -->
		
		
		
		
		<div class="main-container">

			<!-- Page header starts -->
			<div class="page-header">

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

						<!-- Search container start -->
						<div class="search-container">

							<!-- Toggle sidebar start -->
							<div class="toggle-sidebar" id="toggle-sidebar">
								<i class="icon-menu"></i>
							</div>
							<!-- Toggle sidebar end -->



							<!-- Search input group start -->
							<div class="ui fluid category search">
								<div class="ui icon input">
									<input class="prompt" type="text" placeholder="Search">
									<i class="search icon icon-search1"></i>
								</div>
								<div class="results"></div>
							</div>
							<!-- Search input group end -->

						</div>
						<!-- Search container end -->

					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

						<!-- Header actions start -->
						<ul class="header-actions">

							<li class="dropdown">
								<a href="public/#" id="userSettings" class="user-settings" data-toggle="dropdown"
									aria-haspopup="true">
									<span class="avatar">
										<img src="<?php echo e(asset('public/img/user.svg')); ?>" alt="User Avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end md head_dropdown_menu" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<!-- <a href="public/user-profile.html"><i class="icon-user1"></i>Profile</a> -->
										<a href="public/account-settings.html"><i class="icon-user1"></i>Settings</a>
										<a href="<?php echo e($base_url); ?>logout"><i class="icon-log-out1"></i>Logout</a>
									</div>
								</div>
							</li>
						</ul>
						<!-- Header actions end -->

					</div>
				</div>
				<!-- Row end -->

			</div>
			<!-- Page header ends -->