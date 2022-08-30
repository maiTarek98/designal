@extends('site.index')
@section('content')
   
  @include('site.partial.service_section')

  <!-- about section -->
    @include('site.partial.aboutus_section')

  <!-- end about section -->

  <!-- portfolio section -->
@include('site.partial.portfolio_section')
  

  <!-- end portfolio section -->

  <!-- client section -->

  <section class="client_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          What says our <span>Clients</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          @foreach($client_reviews as $value)
          <div class="item">
            <div class="box">
              <div class="client_id">
                <div class="img-box">
                  <img src="{{$value->getFirstMediaUrl('user_image', 'thumb')}}" alt="{{$value->name}}" class="box-img">
                </div>
                <h5>
                  {{$value->name}}
                </h5>
              </div>
              <div class="detail-box">
                <p>
                  {{$value->review}}
                </p>
                <h6 class="rating">
                  @for($i=0; $i<$value->no_star; $i++)
                  <i class="fa fa-star" aria-hidden="true"></i>
                  @endfor
                </h6>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->
    @include('site.partial.contact_section')

  
  <!-- end contact section -->
@endsection
