<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="sidebar-hero">
            <div class="logo">
                <img src="{{ asset('assets/images/student.jpg') }}" alt="logo">
            </div>
            <div class="info">
                <div class="name">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
                <div class="regestered-date">
                    {{ __('pages/admin/global.since') }}
                    {{ Auth::user()->created_at->diffForHumans(now(), true) }}
                </div>
            </div>
            <div class="sidebar-toggler">
                <i class="fa-solid fa-bars-staggered"></i>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-menu">
                @if (Auth::user()->user_type != 'student')
                    <li class="btn">
                        <a href="{{ route('reset-password') }}">Changer le mot de pass</a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'student')
                    <li class="menu-item"><a href="{{ route('student.dashboard') }}">
                            <div class="icon"><i class="fa-solid fa-border-all"></i></div>
                            <div class="title">{{ __('pages/admin/global.dashboard') }}</div>
                        </a>
                    </li>

                    <li class="menu-item"><a href="{{ route('group.my_groupe') }}">
                            <div class="icon"><i class="fa-solid fa-users"></i></div>
                            <div class="title">Mon Groupe</div>
                        </a>
                    </li>

                    <li class="menu-item"><a href="{{ route('students_subjects.index') }}">
                            <div class="icon"><i class="fa-solid fa-file"></i></div>
                            <div class="title">{{ __('pages/admin/global.all_subjects') }}</div>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'chef')
                    <li class="menu-item"><a href="{{ route('chef.dashboard') }}">
                            <div class="icon"><i class="fa-solid fa-border-all"></i></div>
                            <div class="title">{{ __('pages/admin/global.dashboard') }}</div>
                        </a>
                    </li>

                    <li class="menu-item"><a href="{{ route('chef_subjects.index') }}">
                            <div class="icon"><i class="fa-solid fa-file"></i></div>
                            <div class="title">{{ __('pages/admin/global.all_subjects') }}</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Route::is('groups.index') || Route::is('groups.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-sharp fa-solid fa-user-group"></i></div>
                            <div class="title">{{ __('pages/admin/global.groups') }}</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'groups.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('groups.index') }}">{{ __('pages/admin/global.all_groups') }}</a>
                            </li>

                            <li class="list-item <?php if(Route::currentRouteName() == 'groups.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('groups.create') }}">{{ __('pages/admin/global.create') }}
                                    {{ __('pages/admin/global.group') }}</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'groups.filtred_groupes' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('groups.filtred_groupes') }}"> Les Groupe Filtré</a>
                            </li>

                            <li class="list-item <?php if(Route::currentRouteName() == 'groups.finale-list' ){?> menu-active <?php } ?>"><a
                                href="{{ route('groups.finale-list') }}">Liste Finale</a>
                        </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('teachers.index') || Route::is('teachers.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            <div class="title">Professeurs</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'teachers.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('teachers.index') }}">Les Professeurs</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'teachers.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('teachers.create') }}">Ajouter Professeur</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('students.index') || Route::is('students.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-sharp fa-solid fa-graduation-cap"></i></div>
                            <div class="title">Etudiants</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'students.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('students.index') }}">Les Etudiants</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'students.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('students.create') }}">Ajouter Etudiant</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('modules_notes.index') || Route::is('modules_notes.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fas fa-book"></i></div>
                            <div class="title">Modules (Notes)</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'modules_notes.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('modules_notes.index') }}">Les notes</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'modules_notes.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('modules_notes.create') }}">Ajouter
                                    {{ __('pages/admin/global.group') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="menu-item {{ Route::is('semester_notes.index') || Route::is('semester_notes.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-solid fa-stairs"></i></div>
                            <div class="title">Semesters (Notes)</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'semester_notes.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('semester_notes.index') }}">Les notes</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'semester_notes.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('semester_notes.create') }}">Ajouter
                                    {{ __('pages/admin/global.group') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('models.index') || Route::is('models.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-solid fa-list"></i></div>
                            <div class="title">{{ __('pages/admin/global.models') }}</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'models.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('models.index') }}">{{ __('pages/admin/global.all_models') }}</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'models.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('models.create') }}">{{ __('pages/admin/global.create') }}
                                    {{ __('pages/admin/global.model') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="menu-item {{ Route::is('categories.index') || Route::is('categories.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-solid fa-tags"></i></div>
                            <div class="title">Categories</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'categories.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('categories.index') }}">Les Categories</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'categories.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('categories.create') }}">Ajouter Category</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->user_type == 'teacher')
                    <li class="menu-item"><a href="{{ route('teacher.dashboard') }}">
                            <div class="icon"><i class="fa-solid fa-border-all"></i></div>
                            <div class="title">{{ __('pages/admin/global.dashboard') }}</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Route::is('subjects.index') || Route::is('subjects.create') ? 'active' : '' }}">
                        <div class="open-close-icon"> <i class="fa-solid fa-angle-right close"></i>

                        </div>
                        <div class="title">
                            <div class="icon"><i class="fa-solid fa-file-lines"></i></div>
                            <div class="title">{{ __('pages/admin/global.subjects') }}</div>
                        </div>
                        <ul class="list-items">
                            <li class="list-item <?php if(Route::currentRouteName() == 'subjects.index' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('subjects.index') }}">{{ __('pages/admin/global.all_subjects') }}</a>
                            </li>
                            <li class="list-item <?php if(Route::currentRouteName() == 'subjects.create' ){?> menu-active <?php } ?>"><a
                                    href="{{ route('subjects.create') }}">{{ __('pages/admin/global.create') }}
                                    {{ __('pages/admin/global.subject') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item"><a href="{{ route('teacher_groups.index') }}">
                            <div class="icon"><i class="fa-solid fa-users"></i></div>
                            <div class="title">{{ __('pages/admin/global.groups') }}</div>
                        </a>
                    </li>
                @endif
                {{-- <li class="menu-item {{ Route::is('models.index') || Route::is('models.create') ? 'active' : '' }}">
                    <a class="title" href="{{ route('students.export') }}">
                        <div class="icon"><i class="fa-solid fa-export"></i></div>
                        <div class="title">{{ __('pages/admin/global.users') }}</div>
                    </a>
                </li> --}}
            </ul>
            <div class="sidebar-footer">
                <ul class="sidebar-menu">
                    <li class="menu-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div class="icon"> <i class="fa-solid fa-right-from-bracket"></i> </div>
                            <button class="title" type="submit">
                                {{ __('layouts/_navbar.logout') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
