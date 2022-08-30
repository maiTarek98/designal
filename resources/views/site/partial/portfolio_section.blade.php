<section class="portfolio_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our <span>Portfolio</span>
        </h2>
        <p>
          There are many variations of passages of Lorem Ipsum available, but the majority
        </p>
      </div>

      <div class="row">
        @foreach($portfolios as $value)
        <div class="col-md-4 col-sm-6">
          <div class="img-box">
            <img src="{{$value->getFirstMediaUrl('portfolio_image', 'thumb')}}" alt="">
            <a href="{{$value->url_link}}" target="_blank">
              <i class="fa fa-share-alt" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="{{url('/portfolio')}}">
          View More
        </a>
      </div>
    </div>
  </section>