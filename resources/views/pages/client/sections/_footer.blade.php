<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#191919" fill-opacity="1"
        d="M0,192L60,165.3C120,139,240,85,360,74.7C480,64,600,96,720,128C840,160,960,192,1080,202.7C1200,213,1320,203,1380,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
    </path>
</svg>
<footer class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="box">
                    <div class="logo">
                        <img src="{{ asset('assets/images/fs.png') }}" alt="">
                        <h3>FS</h3>
                    </div>
                    <p class="text">
                        Bienvenue au département d'informatique<span>.</span><br>
                        choisissez votre sujet préféré pour vous Project de Fine D'étude
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box">
                    <ul class="links">
                        <li><a href="{{ route('show_student_login') }}">Student</a></li>
                        <li><a href="{{ route('show_teacher_login') }}">Teacher</a></li>
                        <li><a href="{{ route('show_chef_login') }}">Chef</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-8 col-sm-12">
                <div class="box">
                    <div class="line">
                        <i class="fas fa-envelope"></i>
                        <div class="info">email@gmail.com</div>
                    </div>
                    <div class="line">
                        <i class="fas fa-phone"></i>
                        <div class="info">0666666666</div>
                    </div>
                    <div class="line">
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        <div class="info">
                            FS
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="social">
            <li>
                <a href="mail:haddany2@gmail.com" class="email">
                    <i class="fas fa-envelope"></i>
                </a>
            </li>
            <li>
                <a href="tel:+212766788097" class="whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
            <li>
                <a href="https://web.facebook.com/%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D8%AC%D9%86%D9%88%D8%A8-%D9%84%D9%84%D8%AB%D9%82%D8%A7%D9%81%D8%A9-%D9%88%D8%A7%D9%84%D8%B9%D9%84%D9%88%D9%85-125465711474319/?hc_ref=ARRRBeiICZI3kdyM1360LvnwvHIuunAxGUvVGiXb1JOtQ3NtV6utLFl0cgXRLi4r8ZM&fref=nf&__xts__[0]=68.ARDpLnwdct0_6YDequkCwGgcrCsRldlMuvy5ccuXldvEziEgDIX643u6Ew1vus6i4sz15EkHdN3KINtgeTOJ4W5m5ru10QdISggcZzKKcb2F9OzGE2JGfnbhcIuVTCSLAKPsAXOVl5UGWEFsg4rptp_twNe-qfFgFPaKzfudHjy26QG-ynWKLdkTEn0eooMepmnmWu9LlPRO-XXi_ApCjC_x6rmVbzoZK5hDcVQs7Bx-uH9JoQP9N1kKXDogJIAo5_MlIdZCTdGDPO-Q5xYf1qGDYrCqs_8diJEn0RHThs4HnePkv4Q"
                    class="facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="#" class="twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#" class="youtube">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
            <li>
                <a href="#" class="linkdein">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </li>
        </ul>

        <p class="copyright"> &copy; {{ date('Y') }} All rights reseved</p>
    </div>
</footer>
