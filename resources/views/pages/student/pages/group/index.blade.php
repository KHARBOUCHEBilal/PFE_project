@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Mon Group</div>
                @if (!isset($group))
                    <div class="other-page">
                        <a href="{{ route('group.create') }}">
                            <span>
                                <i
                                    class="fa-solid fa-plus"></i>{{ __('pages/admin/global.create') }}{{ __('pages/admin/global.group') }}
                            </span>
                        </a>
                    </div>
                @endif
            </div>
            @if (isset($group))
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
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <div class="body-content" id="body-content">


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

                                            <a type="button" data-toggle="modal"
                                            data-target="#group-modal{{ $group->id }}" data-keyboard='false'
                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a> </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="group-modal{{ $group->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="group-modal{{ $group->id }}Title"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content product-modal">
                            <div class="close" type="button" data-dismiss="modal"><a
                                    href="">X</a>
                            </div>
                            <div class="modal-carte-content last-add-product-model">
                                <h3>Voulez-vous vraiment supprimer cet élément</h3>
                                <div class="actions">
                                    <button class="action cancel" type="button"
                                        data-dismiss="modal">
                                        Cancle
                                    </button>
                                    <a class="action save"
                                        href="{{ route('group.destroy', $group) }}">
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@include('includes._dataTable')
