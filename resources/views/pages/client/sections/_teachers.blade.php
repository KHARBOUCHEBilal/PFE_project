<section id="teachers" class="teachers">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Professeurs</h2>
            <p>Touts les professeurs de la departement informatique</p>
        </div>

        <div class="teachers-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
            
                @foreach ($teachers as $teacher)
                    <div class="swiper-slide">
                        <div class="teacher" data-aos="fade-up" data-aos-delay="200">
                            <div class="teacher-img">
                                @if($teacher->avatar)
                                <img src="{{$teacher->avatar()}}" class="img-fluid" alt="">
                                @else
                                <img src="{{asset('assets/images/teacher_avatar.png')}}" class="img-fluid" alt="">
                                @endif
                                {{-- <div class="social">
                                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                                </div> --}}
                            </div>
                            <div class="teacher-info">
                                <h4>{{$teacher->nom}} {{$teacher->prenom}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach      
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
