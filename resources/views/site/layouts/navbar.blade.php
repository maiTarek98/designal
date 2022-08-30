<div class="hero_area">

    <div class="hero_bg_box">
      <img src="{{url('site')}}/images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              {{app(App\Models\GeneralSettings::class)->site_name}}
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="{{url('/')}}">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('about-us')}}"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('services')}}">Services</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{url('portfolio')}}">Portfolio <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact-us')}}">Contact Us</a>
              </li>
              <!-- <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form> -->
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
     @if (url()->current() == url('/') )

    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($sliders as $key => $value)
          <div class="carousel-item @if($key == 0) active @endif">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      {{$value->title}}
                    </h1>
                    <p>
                      {{$value->description}}
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{$value->getFirstMediaUrl('slider_image', 'thumb')}}" alt="{{$value->title}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <ol class="carousel-indicators">
          @foreach($sliders as $key => $value)
          <li data-target="#customCarousel{{$key+1}}" data-slide-to="{{$key}}" @if($key == 0)  class="active" @endif></li>
          @endforeach
        </ol>
      </div>

    </section>
    <!-- end slider section -->

    @endif
  </div>