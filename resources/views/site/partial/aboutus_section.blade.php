  <section class="about_section layout_padding layout_margin-top layout_margin-bottom">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{url('site')}}/images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>Us</span>
              </h2>
            </div>
            <p>
              {!! app(App\Models\GeneralSettings::class)->about_us !!} 
            </p>
            <a href="{{url('about-us')}}">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

