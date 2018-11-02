
<!-- Footer -->
<footer id="footer" class="page-footer font-small blue pt-4" style="background-color: #aeaeae;">
  <div class="container">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->
            <!-- <h5 class="text-uppercase" style="color: #fff;">Eco Hack  日本大学経済学部シラバス検索システム</h5> -->
            <p style="font-size: 1.1rem;">{{ config('site.name') }}</p>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none pb-3">

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

              <!-- Links -->
              

          </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

              <!-- Links -->
              <!-- <h5 class="text-uppercase">Links</h5> -->

              <ul class="list-unstyled">
                <li>
                  <a href="{{ route('get.Contact') }}">お問い合せ</a>
                </li>
                <li>
                  <a href="{{ route('get.lessons') }}">授業情報一覧(2018)</a>
                </li>
                <li>
                  <a href="{{ route('term') }}">利用規約</a>
                </li>
                <li>
                  <a href="{{ route('privacy') }}">プライバシーポリシー</a>
                </li>
              </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->
    </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        <p>© 2018  Riku Hirose
        </p>
      </div>
      <!-- Copyright -->
  </div>

  </footer>
  <!-- Footer -->