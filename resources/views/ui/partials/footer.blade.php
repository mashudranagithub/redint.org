	<!-- Footer Section Start Here -->
    <footer id="Footer">
        <div class="footer-main">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-3">
                        <div class="footer-single-box">
                            <h3>Contacts</h3>
                            <ul class="footer-contacts">
                                <li>
                                    <i class="far fa-clock"></i>
                                    <span> Sun - Thu 9:00 a.m. - 5:00 p.m. <br> Friday and Saturday Closed</span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker"></i>
                                    <span> 21/5 Pallabi, Dhaka 1216 </span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span>E-mail: redltd3@gmail.com</span>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <span>Mobile: +8801782 - 070254</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-single-box">
                            <h3>Our Study Areas</h3>
                            <ul class="footer-service-list">
                                @foreach($footer_s_areas as $f_s_a)
                                <li><i class="fas fa-angle-right"></i><a href="{{route('studyArea', $f_s_a->id)}}">{{$f_s_a->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="footer-single-box">
                            <h3>Quick Links</h3>
                            <ul class="footer-service-list">
                                <li><i class="fas fa-angle-right"></i><a href="{{route('homepage')}}">Home</a></li>
                                <li><i class="fas fa-angle-right"></i><a href="{{route('events')}}">News & Events</a></li>
                                <li><i class="fas fa-angle-right"></i><a href="{{route('publications')}}">Publications</a></li>
                                <li><i class="fas fa-angle-right"></i><a href="{{route('presentations')}}">Presentations</a></li>
                                <li><i class="fas fa-angle-right"></i><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <p class="copyright-text">© 2020, All rights reserved <a href="#">RED Ltd.</a></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="developed-by">Developed by <a href="http://www.mashudrana.com" target="_blank">Mashud Rana</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!-- Footer Section End Here -->




    <!-- Back to Top Start Here -->
    <a href="#" id="top" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
    <!-- Back to Top End Here -->
	



	<script src="{{ asset('ui/assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/all.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/wow.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ui/assets/js/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('ui/assets/js/typer.js') }}"></script>
	<script src="{{ asset('ui/assets/js/red.js') }}"></script>
</body>
</html>