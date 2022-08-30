
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/admin/adminLogout')}}" class="nav-link"><i class="fas fa-sign-out"></i>@lang('main.logout')</a>
      </li>
<!--       <li class="nav-item d-none d-sm-inline-block">
      <select onchange="changeLanguage(this.value)"  class="form-control">
            <option {{session()->has('lang_code')?(session()->get('lang_code')=='ar'?'selected':''):''}} value="ar">Arabic</option>
            <option {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">English</option>
        </select>
      </li>
 -->    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
     <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{Auth::guard('admin')->user()->notifications->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth::guard('admin')->user()->notifications->count()}} Notifications</span>
          @foreach(Auth::guard('admin')->user()->notifications as $note)  
          @if($note->type == 'App\Notifications\NotifyNewCouponNotification')
          <div class="dropdown-divider"></div>
          <a href="{{url('/admin')}}/coupons/{{$note->data['data']['coupon_id']}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>{{$note->data['title']}}
            <span class="float-right text-muted text-sm"> @php 
                            $now = \Carbon\Carbon::now();
                            $created= $note->created_at;
                            $x= $created->diffForHumans($now);
                            echo $x;
                            @endphp</span>
          </a>
          @endif
          @if($note->type == 'App\Notifications\NotifyUserContactNotification')
          <div class="dropdown-divider"></div>
          <a href="{{url('/admin')}}/contacts/{{$note->data['data']['id']}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>{{$note->data['title']}}
            <span class="float-right text-muted text-sm"> @php 
                            $now = \Carbon\Carbon::now();
                            $created= $note->created_at;
                            $x= $created->diffForHumans($now);
                            echo $x;
                            @endphp</span>
          </a>
          @endif
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="{{url('/admin/notifications')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
