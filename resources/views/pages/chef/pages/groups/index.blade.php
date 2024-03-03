@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.all_groups') }}</div>
                @if (Auth::user()->user_type == 'chef')
                    <div class="actions">
                        <a class="import create" href="{{ route('groups.create') }}">
                            <span>
                                <i
                                    class="fa-solid fa-plus"></i>{{ __('pages/admin/global.create') }}{{ __('pages/admin/global.group') }}
                            </span>
                        </a>
                        <a class="import delete" href="{{ route('groups.delete-all') }}">
                            <i class="fa-solid fa-trash"></i>Supprimer touts les groupes
                        </a>
                    </div>
                @endif
            </div>
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
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Members</th>
                                        <th>Choix 1</th>
                                        <th>Choix 2</th>
                                        <th>Choix 3</th>
                                        <th>{{ __('pages/admin/global.motivation') }}</th>

                                        @if (Auth::user()->user_type == 'chef')
                                            <th>{{ __('pages/admin/global.actions') }}</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($groups)
                                        @foreach ($groups as $group)
                                            <tr>

                                                <td><span>- {{ $group->user1->nom }} {{ $group->user1->prenom }}</span>
                                                    <br>
                                                    @if ($group->user2)
                                                        <span>- {{ $group->user2->nom }} {{ $group->user2->prenom }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $group->subject1->title }}</td>
                                                <td>{{ $group->subject2->title }}</td>
                                                <td>{{ $group->subject3->title }}</td>
                                                <td>{!! $group->motivation !!}</td>

                                                @if (Auth::user()->user_type == 'chef')
                                                    <td>
                                                        <a href="{{ route('groups.edit', $group) }}"
                                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                                        <a type="button" data-toggle="modal"
                                                            data-target="#groups-modal{{ $group->id }}"
                                                            data-keyboard='false'
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                    </td>
                                                @endif

                                            </tr>
                                            <div class="modal fade" id="groups-modal{{ $group->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="groups-modal{{ $group->id }}Title"
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
                                                                    href="{{ route('groups.destroy', $group) }}">
                                                                    Supprimer
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@include('includes._dataTable')
