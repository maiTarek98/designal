 <!-- footer section -->
  <footer class="footer_section">
    <div class="footer_bg_box">
      <img src="{{url('site')}}/images/footer-bg.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  {{app(App\Models\GeneralSettings::class)->address}}
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call <a href="tel:{{app(App\Models\GeneralSettings::class)->phone}}">{{app(App\Models\GeneralSettings::class)->phone}}</a>
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  {{app(App\Models\GeneralSettings::class)->email}}
                </span>
              </a>
            </div>
          </div>
          <div class="footer_social">
            <a href="{{app(App\Models\GeneralSettings::class)->facebook_link}}">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="{{app(App\Models\GeneralSettings::class)->twitter_link}}">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="{{app(App\Models\GeneralSettings::class)->google_link}}">
              <i class="fa fa-google" aria-hidden="true"></i>
            </a>
            <a href="{{app(App\Models\GeneralSettings::class)->instagram_link}}">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
             {!! \Illuminate\Support\Str::limit(app(App\Models\GeneralSettings::class)->about_us, 300)   !!}
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="active" href="{{url('/')}}">
                Home
              </a>
              <a class="" href="{{url('about-us')}}">
                About
              </a>
              <a class="" href="{{url('services')}}">
                Services
              </a>
              <a class="" href="{{url('portfolio')}}">
                Portfolio
              </a>
              <a class="" href="{{url('contact-us')}}">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Subscribe
          </h4>
          <form action="{{route('storeSubscribe')}}" method="post">
            @csrf
            <input type="email" name="email" required placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="footer-info">
        <p>
          <span id="displayYear"></span> 
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="{{url('site')}}/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{url('site')}}/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="{{url('site')}}/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <!-- Page JS -->
        <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
</script>


</body>

</html>