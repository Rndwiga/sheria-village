<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
	<div class="sidebar-fixed">
			<div class="sidebar-content">

				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a href="#"><img src="{{asset('assets/images/placeholder.jpg')}}" class="img-circle img-responsive" alt=""></a>
								<h6>{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</h6>
								<span class="text-size-small">Santa Ana, CA</span>
							</div>

							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
							</div>
						</div>

						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li><a href="{{route('portal.users.show', ['id' => Auth::user()->id])}}"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
								<li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
								<li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
								<li class="divider"></li>
								<li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
									<li>
										<a href="{{ url('/logout') }}"
												onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
												<i class="icon-switch2"></i><span>Logout</span>
										</a>
										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
									</li>
							</ul>
						</div>
					</div>

					<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">

							<!-- Main -->
							<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
							<li class="active"><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
							<li>
								<a href="#"><i class="icon-people"></i> <span>User pages</span></a>
								<ul>
									<li><a href="user_pages_cards.html">User cards</a></li>
									<li><a href="user_pages_list.html">User list</a></li>
									<li><a href="user_pages_profile.html">Simple profile</a></li>
									<li><a href="user_pages_profile_cover.html">Profile with cover</a></li>
								</ul>
							</li>
							<li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.4</span></span></a></li>
							<!-- /main -->

							<!-- Forms -->
							<li class="navigation-header"><span>Forms</span> <i class="icon-menu" title="Forms"></i></li>
							<li>
								<a href="#"><i class="icon-pencil3"></i> <span>Form components</span></a>
								<ul>
									<li><a href="form_inputs_basic.html">Basic inputs</a></li>
									<li><a href="form_checkboxes_radios.html">Checkboxes &amp; radios</a></li>
								</ul>
							</li>

							<!-- /forms -->

							<!-- Page kits -->
							<li class="navigation-header"><span>Page kits</span> <i class="icon-menu" title="Page kits"></i></li>
							<li>
								<a href="#"><i class="icon-task"></i> <span>Task manager</span></a>
								<ul>
									<li><a href="task_manager_grid.html">Task grid</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-cash3"></i> <span>Invoicing</span></a>
								<ul>
									<li><a href="invoice_template.html">Invoice template</a></li>
								</ul>
							</li>

							<li>
								<a href="#"><i class="icon-user-plus"></i> <span>Login &amp; registration</span></a>
								<ul>
									<li><a href="login_simple.html">Simple login</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-magazine"></i> <span>Timelines</span></a>
								<ul>
									<li><a href="timelines_left.html">Left timeline</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-lifebuoy"></i> <span>Support</span></a>
								<ul>
									<li><a href="support_conversation_layouts.html">Conversation layouts</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-search4"></i> <span>Search</span></a>
								<ul>
									<li><a href="search_basic.html">Basic search results</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-images2"></i> <span>Gallery</span></a>
								<ul>
									<li><a href="gallery_grid.html">Media grid</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="icon-warning"></i> <span>Error pages</span></a>
								<ul>
									<li><a href="error_403.html">Error 403</a></li>
								</ul>
							</li>
							<!-- /page kits -->

						</ul>
					</div>
				</div>
				<!-- /main navigation -->

			</div>
</div>
</div>
<!-- /main sidebar -->
