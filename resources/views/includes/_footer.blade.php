<script src="{{asset('/vendor/bootstrap/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/assets/js/main.js')}}"></script>
<script src="{{asset('/vendor/aos/aos.js')}}"></script>
<script src="{{asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>

@vite(['resources/js/app.js'])
<script>
    AOS.init();
</script>
@yield('javascript')
</body>
</html>