<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#">Tutorial Blog</a>
                    <p class="copyright">Sushan Paudyal @ <?php echo date('Y'); ?>. All rights reserved.</p>
                    <p class="copyright">Developed by <a href="https://paudyalsushan.com" target="_blank">Sushan Paudyal</a></p>
                    <ul class="icons">
                        <li><a href="https://www.facebook.com/profile.php?id=100009601813033" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/sushan-paudyal/" target="_blank"><i class="ion-social-linkedin-outline"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{ route('category.posts', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form method="post" action="{{route('subscriber.store')}}">
                            @csrf

                            <input class="email-input" name="email" type="email" placeholder="Enter your email" required>
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>