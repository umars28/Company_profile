<!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>{{ config('web_config')['WEBSITE_TITLE'] }}</span></h2>
                </div>

                <p>{{ substr($about->description, 0,300) }}</p>
                <div class="footer-icons">
                  <ul>
                      <li>
                          <a href="https://github.com/{{ $contactUs->github }}" target="_blank"><i class="fa fa-github"></i></a>
                      </li>
                    <li>
                      <a href="https://web.facebook.com/{{ $contactUs->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://api.whatsapp.com/send?phone={{ $contactUs->whatsapp }}&text=Assalamualaikum Warahmatullahi Wabarakatuh" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/{{ $contactUs->instagram }}/?hl=id" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <div class="footer-contacts">
                  <p><span>Tel:</span> {{ $contactUs->contact_number }}</p>
                  <p><span>Email:</span> {{ $contactUs->email }}</p>
                    <p><span>Alamat :</span>{{ $address->adress }}, {{ $address->city }}, {{ $address->country }}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Services</h4>
                <div class="flicker-img">
                    <ul>
                        @foreach($services as $service)
                        <li><p>{{ $service->title }}</p></li>
                        @endforeach
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>{{ config('web_config')['WEBSITE_TITLE'] }}</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
