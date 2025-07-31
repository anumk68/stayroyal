<div class="footer-area" data-cue="zoomIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer-widget-contact">
                    <div class="footer-widget-logo" style="padding: 5px; display: inline-block;">
                        <a href="https://stayroyal.in/"><img src="{{ asset('public/assets/images/inner/stay-logo.png') }}"
                                alt="Logo"></a>
                    </div>
                    <div class="footer-widget-content">
                        <div class="footer-widget-title">
                            <h4>Contact Info</h4>
                        </div>
                        <div class="footer-widget-contact-info">
                            <ul>
                                <li><a href="tel:+91 7006022986"><i class="bi bi-telephone-fill"></i>+91 7006022986</a>
                                </li>
                                <li><a href="mailto:royalstaybnbofficial@gmail.com"><i
                                            class="bi bi-envelope"></i>royalstaybnbofficial@gmail.com</a></li>
                                <li><i class="bi bi-geo-alt-fill"></i>Villa 87, Sector 125, Jhungiyan, Kharar, Punjab
                                    140301</li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget-social-icon">
                        <ul>
                            <li><a href="https://www.facebook.com/royalstaybnb"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li><a href="https://x.com/stayroyalbnb"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/stayroyalbnb/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/@stayroyalbnb" target="_blank"><i
                                        class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-widget-content upper">
                    <div class="footer-widget-title">
                        <h4>Useful Links</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <!-- <li><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="{{ url('/about') }}">About Hotel</a></li> -->
                            <li><a href="{{ route('rooms') }}">Rooms</a></li>
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                            <li><a href="{{ route('contacts') }}">Contact</a></li>
                            <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('refund') }}">Refund Policy</a></li>
                            <li><a href="{{ route('termsconditions') }}">Terms & Conditions </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Gallery</h4>
                    </div>
                    <!-- <div class="footer-widget-gallery">
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/1fg.webp') }}"
                                alt=""></a>
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/2fg.webp') }}"
                                alt=""></a>
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/3fg.webp') }}"
                                alt=""></a>
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/4fg.webp') }}"
                                alt=""></a>
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/5fg.webp') }}"
                                alt=""></a>
                        <a class="g"><img src="{{ asset('public/assets/images/home-1/5fg.webp') }}"
                                alt=""></a>
                    </div> -->
                      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <!-- Gallery Item -->
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/5footer-g.jpg') }}" data-caption="Luxury Suite">
                        <img src="{{ asset('public/assets/images/room/5footer-g.jpg') }}" alt="Luxury Suite">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <!-- Repeat for images -->
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/1footer-g.jpg') }}" data-caption="Cozy Lobby">
                        <img src="{{ asset('public/assets/images/room/1footer-g.jpg') }}" alt="Cozy Lobby">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/2footer-g.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/2footer-g.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/3footer-g.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/3footer-g.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/4footer-g.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/5footer-g.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/6footer-g.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/6footer-g.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
            </div>


                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Newsletter</h4>
                    </div>
                    <p>Subscribe our Newsletter</p>
                    <form id="subscribe-form" method="POST">
    @csrf
    <input type="hidden" name="is_subscribe" value="1">
    <div class="single-newsletter-box">
        <input type="email" name="email" placeholder="Enter E-Mail">
        <button type="submit">Subscribe Now</button>
        <div id="error-message" style="color: red; margin-top: 5px;"></div>
        <div id="success-message" style="color: green; margin-top: 5px;"></div>
    </div>
</form>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-bottom-content">
                    <h4>© 2025, Stayroyal. All Rights Reserved.</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="curser"></div>
<div class="curser2"></div>
<div class="prgoress_indicator active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 270.456;">
        </path>
    </svg>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('public/assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('public/assets/js/wow.js') }}"></script>
<script src="{{ asset('public/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('public/venobox/venobox.js') }}"></script>
<script src="{{ asset('public/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('public/assets/js/animated-text.js') }}"></script>
<script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('public/assets/js/theme.js') }}"></script>
<script src="{{ asset('public/assets/js/coustom.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.barfiller.js') }}"></script>
<script src="{{ asset('public/assets/js/scrollCue.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/venobox@2.0.5/dist/venobox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('mustLoginModal'));
        modal.show();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];

        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        // Disable past dates
        startDateInput.min = today;
        endDateInput.min = today;

        // Optional: open calendar on full input click
        [startDateInput, endDateInput].forEach(input => {
            input.addEventListener('click', () => {
                if (input.showPicker) input.showPicker();
            });
        });

        // Auto set end_date to same or after start_date
        startDateInput.addEventListener('change', () => {
            endDateInput.min = startDateInput.value;
            if (endDateInput.value < startDateInput.value) {
                endDateInput.value = startDateInput.value;
            }
        });
    });
</script>
<script>
    const thumbsSwiper = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });


    const topSwiper = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbsSwiper,
        },
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.has-sub').forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                item.classList.add('open');
            });
            item.addEventListener('mouseleave', function() {
                item.classList.remove('open');
            });
        });


        var toggleBtn = document.querySelector('.toggle-btn');
        var navUl = document.querySelector('.navbar ul');
        toggleBtn.addEventListener('click', function() {
            navUl.classList.toggle('show');
        });


        document.querySelectorAll('.has-sub > a').forEach(function(link) {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    link.parentElement.classList.toggle('open');
                }
            });
        });
    });
</script>
<script>
    // Setup Modal on click
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', () => {
            const imgSrc = item.getAttribute('data-img');
            const caption = item.getAttribute('data-caption');
            document.getElementById('modalImage').src = imgSrc;
            document.getElementById('modalCaption').textContent = caption;
        });
    });
</script>
<!-- 
<script>
    $(document).ready(function() {
        const today = new Date();

        // Init flatpickr for checkin
        flatpickr("#checkin", {
            minDate: today,
            dateFormat: "m/d/Y",
            onChange: function(selectedDates) {
                if (selectedDates[0]) {
                    checkoutCalendar.set("minDate", selectedDates[0]);
                }
            }
        });

        // Init flatpickr for checkout
        const checkoutCalendar = flatpickr("#checkout", {
            minDate: today,
            dateFormat: "m/d/Y"
        });

        // Guest count logic
        let adults = 1,
            children = 0;

        function getTotalGuests() {
            return adults + children;
        }

        function updateGuestSummary() {
            $('#adultCount').text(adults);
            $('#childCount').text(children);
            $('#adultInput').val(adults);
            $('#childInput').val(children);
            $('#guestSummary').text(`${adults} Adult${adults > 1 ? 's' : ''}, ${children} Children`);
        }

        $('.guest-plus').on('click', function() {
            const type = $(this).data('type');
            const total = getTotalGuests();

            if (total >= 10) {
                alert("You cannot select more than 10 guests in total.");
                return;
            }

            if (type === 'adult') {
                adults++;
            } else {
                if (adults === 0) {
                    alert("Please select at least 1 adult before adding children.");
                    return;
                }
                children++;
            }
            updateGuestSummary();
        });

        $('.guest-minus').on('click', function() {
            const type = $(this).data('type');

            if (type === 'adult') {
                if (adults > 1) {
                    adults--;
                }
                // If adults reduced to 0, reset children
                if (adults === 0) {
                    children = 0;
                }
            }

            if (type === 'child') {
                if (children > 0) {
                    children--;
                }
            }

            updateGuestSummary();
        });

        // Toggle dropdown on summary click only
        $('#guestToggle').on('click', function(e) {
            e.stopPropagation();
            $('#guestDropdown').toggleClass('active');
        });

        // Prevent closing when clicking inside dropdown
        $('#guestDropdown').on('click', function(e) {
            e.stopPropagation();
        });

        // Close when clicking outside
        $(document).on('click', function() {
            $('#guestDropdown').removeClass('active');
        });

        // Init on load
        updateGuestSummary();
    });
</script> -->




<!-- <script>
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('youtubeVideo');
    const videoURL = "https://stayroyal.in/public/assets/video/MicrosoftTeams-video.mp4";

    videoModal.addEventListener('show.bs.modal', () => {
        videoFrame.src = videoURL;
    });

    videoModal.addEventListener('hidden.bs.modal', () => {
        videoFrame.src = "";
    });
</script> -->
<script>
    $(document).ready(function() {
        $('.client-logo-slider').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 2000,
            smartSpeed: 800,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.about_list.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 1000,
            smartSpeed: 3000,
            autoplayHoverPause: false,
            nav: false,
            dots: true
        })
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentUrl = window.location.href;
        const links = document.querySelectorAll(".nav-link");

        links.forEach(link => {
            if (currentUrl.startsWith(link.href)) {
                links.forEach(l => l.classList.remove("active"));
                link.classList.add("active");
            }
            link.addEventListener("click", function() {
                links.forEach(l => l.classList.remove("active"));
                this.classList.add("active");
            });
        });
    });
</script>

<script>
    function toggleDropdown() {
        const menu = document.getElementById("userDropdownMenu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
    document.addEventListener('click', function(event) {
        const dropdown = document.querySelector('.user-dropdown');
        const menu = document.getElementById("userDropdownMenu");
        if (dropdown && !dropdown.contains(event.target)) {
            menu.style.display = 'none';
        }
    });
</script>
<script>
    function toggleDropdownmobile() {
        const menu = document.getElementById("mobileDropdownMenu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    }
    document.addEventListener('click', function(event) {
        const dropdown = document.querySelector('.user-dropdown-mobile');
        const menu = document.getElementById("mobileDropdownMenu");
        if (dropdown && !dropdown.contains(event.target)) {
            menu.style.display = 'none';
        }
    });
</script>

<script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('loader');
        const content = document.getElementById('main-content');
        loader.classList.add('hidden');
        setTimeout(() => loader.remove(), 600);
        content.style.display = 'block';
    });
</script>
<!-- subscribe   -->
 <script>
    $(document).ready(function () {
        $('#subscribe-form').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let submitButton = form.find('button[type="submit"]');

            // Disable button and change text
            submitButton.prop('disabled', true).text('Submitting...');

            // Clear old messages
            $('#error-message').text('');
            $('#success-message').text('');

            $.ajax({
                type: 'POST',
                url: '{{ route('user.subscribe') }}',
                data: form.serialize(),
                success: function (response) {
                    $('#success-message').text(response.message);
                    form[0].reset();

                    // Enable button and reset text
                    submitButton.prop('disabled', false).text('Subscribe Now');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        if (errors.email) {
                            $('#error-message').text(errors.email[0]);
                        }
                    } else {
                        $('#success-message').text('Thank you for subscribing!');
                    }

                    // Enable button and reset text on failure
                    submitButton.prop('disabled', false).text('Subscribe Now');
                }
            });
        });
    });
</script>


</body>

</html>
