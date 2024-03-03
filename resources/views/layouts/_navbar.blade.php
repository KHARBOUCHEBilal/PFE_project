<nav class="navbar navbar-expand-lg @if (isset($home)) home @endif">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="/">
            <img src="{{ asset('assets/images/logo_.png') }}" alt="">
            {{-- FSM --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    @if (Auth::user()->user_type == 'student')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('student.dashboard') }}"><i
                                    class="fa-solid fa-gauge"></i> Dashboard</a>
                        </li>
                    @endif
                    @if (Auth::user()->user_type == 'teacher')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.dashboard') }}"> <i
                                    class="fa-solid fa-gauge"></i>Dashboard</a>
                        </li>
                    @endif
                    @if (Auth::user()->user_type == 'chef')
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('chef.dashboard') }}"><i class="fa-solid fa-gauge"></i>
                                Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link" type="submit"><i
                                    class="fa-solid fa-right-from-bracket"></i>
                                {{ __('layouts/_navbar.logout') }}</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('show_student_login') }}">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show_teacher_login') }}">Teacher</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show_chef_login') }}">Chef</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
