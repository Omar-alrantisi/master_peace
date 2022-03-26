

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted pt-3">
    <!-- Section: Social media -->
    <section
        class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Networx
                    </h6>
                    <p>
                        Sometimes, getting started is the hardest part. That’s why we created Project Guides full of advice from Networx workers. Find out what things cost, how long they take and who you should hire.
                    </p>
                </div>
                <!-- Grid column -->

{{--                {{$categories=\App\Domains\Lookups\Models\Category::all()}}--}}
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->

                    <h6 class="text-uppercase fw-bold mb-4">
                        Categories
                    </h6>
                    @foreach ($categories as $category)
                    <p>
                        <a href="{{ route('frontend.single_category',$category->id )}}" class="text-reset">{{$category->title}}</a>
                    </p>
                    @endforeach

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="{{route('frontend.join_as_worker')}}" class="text-reset">Join as a worker</a>
                    </p>
                    <p>
                        <a href="{{route('frontend.index')}}" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="{{route('frontend.categories')}}" class="text-reset">Explore</a>
                    </p>
                    <p>
                        <a href="{{route('frontend.about')}}" class="text-reset">About</a>
                    </p>
                    <p>
                        <a href="{{route('frontend.contact')}}" class="text-reset">Contact</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Amman,Jordan</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        omaratef.alratisi@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 962 777 7481 29 </p>
                    <p><i class="fas fa-print me-3"></i> + 962 787 3188 31</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Omar Al-Rantisi</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // 2222222

    $(document).ready(function () {
        var silder = $(".owl-carousel");
        silder.owlCarousel({
            autoPlay: false,
            items: 1,
            center: false,
            nav: true,
            margin: 40,
            dots: false,
            loop: true,
            navText: ["<i class='fa fa-arrow-left' aria-hidden='true'></i>", "<i class='fa fa-arrow-right' aria-hidden='true'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                575: { items: 1 },
                768: { items: 2 },
                991: { items: 3 },
                1200: { items: 4 }
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
