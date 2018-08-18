<footer class="footer footer-white footer-big">
    <div class="container">

        <div class="content">
            <div class="row">

                <div class="col-md-3">
                    <a href="#pablo"><h5>Blog</h5></a>
                    <p>Cool blog posts in one place.</p>
                </div>
                <div class="col-md-2">
                    <h5>About</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Presentation
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Market</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Sales FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                How to Register
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <h5>Legal</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Terms & Conditions
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Subscribe to Newsletter</h5>
                    <p>
                        Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                    </p>
                    <form class="form form-newsletter" method="POST" action="{{ route('subscriber.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Your Email..." required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-rose btn-just-icon">
                            <i class="material-icons">mail</i>
                        </button>

                    </form>
                </div>

            </div>
        </div>

        <hr />

        <ul class="social-buttons">
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
                    <i class="fa fa-google-plus"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-simple btn-youtube">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </li>
        </ul>

        <div class="copyright pull-center">
            Copyright &copy; <script>document.write(new Date().getFullYear())</script> Tanvir Ahassan.
        </div>
    </div>
</footer>
