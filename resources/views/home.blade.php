<x-page-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Quizzes Light | Home
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/home.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        @if (session('deleteMessage'))
            {{-- Start Of Account Deleted Confirmation Message --}}
            <div class="account-delete-confirm">
                <p>Your account has been deleted successfully! <span><i class="fa-solid fa-check"></i></span></p>
                <div class="delete-message-bar"></div>
            </div>
        @endif
        <!-- Start Of Promo Video Section -->
        <div class="promo-video-section">
            <div class="promo-video-text">
                <div class="header">
                    <span>Brighten Your Skills</span>
                    <span>Quiz by Quiz</span>
                </div>
                <div class="description">
                    <p><span><span>Quizzes</span> Light</span> transforms learning into an adventure, where curiosity
                        drives exploration, and
                        <span>every quiz feels like a spark of inspiration.</span>
                    </p>
                    <p>Whether you're a student looking to master a subject or a lifelong learner eager to explore new
                        topics, <span><span>Quizzes</span> Light</span> is your ultimate destination for <span>enjoyable
                            and rewarding learning experiences.</span></p>
                </div>
                <div class="register-button">
                    <a href="{{ url('guards') }}">Register now!</a>
                </div>
            </div>
            <div class="promo-video">
                <video controls autoplay muted>
                    <source
                        src="{{ Storage::disk('s3')->url(config('app.name') . '/videos/Quizzes Light promo video.mp4') }}"
                        type="video/mp4">
                    Your browser does not support video tag.
                </video>
            </div>
        </div>
        <!-- Start Of Services Section -->
        <div class="services" id="services-section">
            <div class="container">
                <div class="main-heading">
                    <h2>Services</h2>
                    <p>
                        We provide the best in class services for our customers
                    </p>
                </div>
                <div class="services-container">
                    <div class="srv-box">
                        <i class="fas fa-desktop fa-3x"></i>
                        <div class="text">
                            <h3>Create, reuse, repeat. Save time like never before!</h3>
                            <p>
                                Quizzes Light allows teachers, trainers, and businesses to
                                create custom
                                tests and
                                quizzes with the most flexible features available in any online exam creator and
                                marking tool since 2006
                                Customise your testing with advanced settings like time limits, public and private
                                access, randomized questions, instant feedback, surveys, and more.
                                Explore our how-to videos for step-by-step instructions.
                            </p>
                        </div>
                    </div>
                    <div class="srv-box">
                        <i class="fas fa-cog fa-3x"></i>
                        <div class="text">
                            <h3>Secure & Reliable: Focus on testing, not troubleshooting</h3>
                            <p>
                                Reliability is not an option, it's a must-have feature. Our platform ensures your
                                quizzes run smoothly, with over 99% uptime and 24/7 monitoring
                                Your data is confidential and locked to your account, with the option to remove it
                                anytime.
                                Quizzes Light is GDPR and CCPA-compliant, ensuring the privacy
                                and security
                                of your
                                custom online assessments and data. Contact us for a copy of our Data Protection
                                Agreement.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Of Design Section -->
        <div class="design">
            <div class="text">
                <h2>Our Features Comes With...</h2>
                <ul>
                    <li>easy to create tests online </li>
                    <li>public or private options with time limits </li>
                    <li>efficient automated grading with real time states </li>
                    <li>Affordable Quize software for all organizations</li>
                </ul>
            </div>
        </div>
        <!-- Start Of Subscribe Section -->
        <div class="subscribe">
            <div class="container">
                <div class="cont">
                    <form action="">
                        <i class="far fa-envelope fa-lg"></i>
                        <input type="email" name="mail" placeholder="Your Email" required />
                        <input type="submit" value="Subscribe" />
                    </form>
                </div>
                <div class="main-heading">
                    <h3>
                        Subscribe to our newsletter
                    </h3>
                </div>
            </div>
        </div>
        <!-- Start Of Contact Section -->
        <div class="contact" id="contact-section">
            <div class="container">
                <div class="main-heading">
                    <h2>Contact Us</h2>
                    <p>
                        Need to get in touch with us? fill out the form with your inquiry.
                    </p>
                </div>
                <div class="content">
                    <form action="">
                        <input class="main-input" type="text" name="name" placeholder="Your Name" required />
                        <input class="main-input" type="email" name="mail" placeholder="Your Email" required />
                        <textarea class="main-input" name="message" placeholder="Your Message" required></textarea>
                        <input type="submit" value="Send Message" />
                    </form>
                    <div class="info">
                        <h4>Get In Touch</h4>
                        <span class="phone">+20 123.456.789</span>
                        <span class="phone">+20 123.456.789</span>
                        <h4>Where We Are</h4>
                        <address>Sheikh Zayed<br />Giza, 6th Of October<br />123-4567-890<br />Egypt</address>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        @if (session('deleteMessage'))
            <script src="{{ asset('JavaScript/delete-account-confirm-message.js') }}"></script>
        @endif
    </x-slot:javaScript>
</x-page-layout>
