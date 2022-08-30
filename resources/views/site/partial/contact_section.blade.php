<section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact <span>Us</span>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container contact-form">
            <form action="{{route('storeContact')}}" method="post">
              @csrf
              <div>
                <input type="text" required="" name="name" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" required="" name="mobile" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" required="" name="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" required="" name="message" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button type="submit">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>