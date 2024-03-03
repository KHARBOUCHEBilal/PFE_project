@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.all_groups') }}</div>
                <div class="actions">
                    <a class="import delete" href="{{ route('groups.delete-all-filtred-groups') }}">
                        <i class="fa-solid fa-trash"></i>Supprimer touts les filtred groupes
                    </a>
                    <a href="{{ route('filter_groups') }}" class="import create">
                       <i class="fas fa-cloud"></i> Obtenir les groupes filtrés
                    </a>
                </div>
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
                            <h4>Les groupes qui possèdent un PFE.</h4>
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Groupe</th>
                                        <th>Sujet</th>

                                        @if (Auth::user()->user_type == 'chef')
                                            <th>{{ __('pages/admin/global.actions') }}</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($groups)
                                        @foreach ($groups as $group)
                                            <tr>

                                                <td><span>- {{ $group->student1 }}</span>
                                                    <br>
                                                    @if ($group->student2)
                                                        <span>- {{ $group->student2 }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $group->subject }}</td>


                                                @if (Auth::user()->user_type == 'chef')
                                                    <td>
                                                        <a href="{{ route('groups.destroy', $group) }}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <br>


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
                            <h4>Les groupes qui ne disposent pas d'un PFE.</h4>
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Groupe</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($students)
                                        @foreach ($students as $student)
                                            <td><span>- {{ $student->user1->nom }} {{ $student->user1->prenom }}</span>
                                                <br>
                                                @if ($student->user2)
                                                    <span>- {{ $student->user2->nom }} {{ $student->user2->prenom }}</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <br>

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
                            <h4>Les sujets disponibles jusqu'a présent.</h4>
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Sujet</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($sujets)
                                        @foreach ($sujets as $sujet)
                                            <tr>
                                                <td>
                                                    {{ $sujet->title }}
                                                </td>
                                                <td>
                                                    {!! $sujet->description !!}
                                                </td>
                                            </tr>
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
