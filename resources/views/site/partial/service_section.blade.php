  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Services</span>
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
          </p>
        </div>
        <div class="row">
          @foreach($services as $service)
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="{{$service->getFirstMediaUrl('service_image', 'thumb')}}" alt="{{$service->title}}">
              </div>
              <div class="detail-box">
                <h5>
                 {{$service->title}}
                </h5>
                <p>
                  {{$service->description}}
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="btn-box">
          <a href="{{url('services')}}">
            See All
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->
