@extends('admin-layouts._master')
@section('content')
    <div class="students">
        <h1>Dashboard</h1>
        @if ($group)
            @if ($group->status != '2')
                <div class="invetation">
                    <div class="title">Invetation</div>
                    <div class="group">
                        <div class="sub-title"> {{ $group->user1->nom }} {{ $group->user1->prenom }} Inviter vous pour un
                            projet de
                            fine d'etude</div>
                        <div class="description">
                            <ul class="chooses">
                                <li>Choix 1: <span>{{ $group->subject1->title }} <a
                                            href="{{ route('group.show', $group->subject1->id) }}">Voir</a></span></li>
                                <li>Choix 2: <span>{{ $group->subject2->title }} <a
                                            href="{{ route('group.show', $group->subject2->id) }}">Voir</a></span></li>
                                <li>Choix 3: <span>{{ $group->subject3->title }} <a
                                            href="{{ route('group.show', $group->subject3->id) }}">Voir</a></span></li>
                            </ul>
                        </div>
                        <div class="actions">
                            <a class="action approve" href="{{ route('group.approve', $group) }}"
                                class="approve">Approver</a>
                            <a class="action delete" href="{{ route('group.destroy', $group) }}" class="delete">Rejecter</a>
                            <a href="{{ route('group.edit', $group) }}"
                                class="action edit">{{ __('pages/admin/global.edit') }}</a>

                        </div>
                    </div>
                </div>
            @else
                <div class="page-body" id="page-body">
                    <ul class="body-actions">
                        <li class="close-body" id="close-body">
                            <i class="fas fa-close"></i>
                        </li>
                        <li class='minimize' id="hide-body">
                            <i class="fa-solid fa-window-minimize"></i>
                        </li>
                        <li class="fscreen" id="page-full-screen">
                            <i class="fa-solid fa-arrows"></i>
                        </li>
                    </ul>
                    <div class="body-content" id="body-content">

                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')


                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <div class="group">
                                    <div class="title">Subjects</div>
                                    <div class="subjects">
                                        <div class="subject"> Choix 1: {{ $group->subject1->title }} </div>
                                        <div class="subject"> Choix 2: {{ $group->subject2->title }} </div>
                                        <div class="subject"> Choix 3: {{ $group->subject3->title }} </div>
                                    </div>
                                    <div class="title">Members</div>
                                    <div class="members">
                                        @if ($group->user1)
                                            <div class="member">{{ $group->user1->nom }} {{ $group->user1->prenom }}</div>
                                        @endif
                                        @if ($group->user2)
                                            <div class="member">{{ $group->user2->nom }} {{ $group->user2->prenom }}</div>
                                        @endif
                                        @if ($group->user3)
                                            <div class="member">{{ $group->user3->nom }} {{ $group->user3->prenom }}</div>
                                        @endif
                                    </div>
                                    <div class="title">Motivation</div>
                                    <div class="motivation">
                                        {!! $group->motivation !!}
                                    </div>
                                    <br>
                                    {{-- @if ($group->status != '2') --}}
                                    <div class="actions">
                                        <a href="{{ route('group.edit', $group) }}"
                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                        <a href="{{ route('group.destroy', $group) }}"
                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
