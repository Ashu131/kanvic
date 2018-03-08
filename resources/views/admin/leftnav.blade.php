<div id="sidebar-scroll">
	<div class="sidebar-content">
		<div class="side-header side-content bg-white-op">
			<button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
			<i class="fa fa-times"></i>
			</button>
			<a class="h5 text-white" href="{{route('get.page.list')}}">
				<img src="{{url('resources/assets/images/top-inner-logo.png')}}" style="width:125px;margin:auto;">
			</a>
		</div>
		<div class="side-content">
			<ul class="nav-main">
<li>
<a @if(isset($data['active'])) @if($data['active']=="globalsetting") class="active" @endif @endif href="{{route('globalsetting')}}">Global Setting</a>
</li>
				
                
				<li>
				 	<a @if(isset($data['active']))  @if($data['active']=="page") class="active"  @endif @endif href="{{route('get.page.list')}}"><i class="si si-bag"></i> Pages</a>
				</li>

				<li>
					<a @if(isset($data['active'])) @if($data['active']=="press_release") class="active" @endif @endif href="{{route('get.press-release.list')}}"><i class="si-book-open si"></i>Article</a>
				</li>
				<li>
					<a @if(isset($data['active'])) @if($data['active']=="menu") class="active" @endif @endif href="{{route('show.menu.type')}}"><i class="si-list si"></i>Menu</a></i></a>
				</li>
				<!--
				<li>
					<a @if(isset($data['active'])) @if($data['active']=="gallery") class="active" @endif @endif href="{{route('admin.show.gallery.type.list')}}"><i class="si-film si"></i>Gallery</a></i></a>
				</li>-->
				<!--<li>
					<a @if(isset($data['active'])) @if($data['active']=="form") class="active" @endif @endif href="{{route('show.form.list.view')}}"><i class="si-note si"></i>Form</a>
				</li>-->
				<!--<li>
					<a @if(isset($data['active'])) @if($data['active']=="social-link") class="active" @endif @endif href="{{route('social.link.view')}}"><i class="si-globe-alt si"></i>Social Link</a>
				</li>-->
				<!--<li>
					<a @if(isset($data['active'])) @if($data['active']=="news-letter") class="active" @endif @endif href="{{route('newsletter.list')}}"><i class="si-notebook si"></i>Newsletter Subscribe</a>
				</li>-->
				<!--<li>
					<a @if(isset($data['active'])) @if($data['active']=="testimonial") class="active" @endif @endif href="{{route('admin.testimonial')}}"><i class="si-speech si"></i>Testimonial</a>
				</li>-->
				<li>
					<a @if(isset($data['active'])) @if($data['active']=="logout") class="active" @endif @endif href="{{route('reset.password.view.auth')}}"><i class="si-shuffle si"></i>Change Password</a>
				</li>
				<li>
					<a @if(isset($data['active'])) @if($data['active']=="logout") class="active" @endif @endif href="{{url('logout')}}"><i class="si-logout si"></i>LogOut</a>
				</li>

            <!--<li class="">
                <a href="{{url('admin/home-slider') }}"><i class="fa fa-product-hunt"></i> <span class="nav-label">Home slider</span></a>
            </li>-->



			<ul>
		</div>
	</div>
</div>