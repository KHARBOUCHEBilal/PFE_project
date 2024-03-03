@extends('admin-layouts._master')
@section('content')
    <div class="page finale-list" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">La liste finale</div>
                <div class="actions">
                    @if ($status->show_finale_list == '0')
                        <a class="import delete" href="{{ route('groups.show-finale-list') }}">
                            <i class="fa-solid fa-eye"></i>Afficher la liste finale au coté client
                        </a>
                    @else
                        <a class="import delete" href="{{ route('groups.show-finale-list') }}">
                            <i class="fa-solid fa-eye"></i>Cacher la liste finale au coté client
                        </a>
                    @endif
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
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Groupe</th>
                                        <th>Sujet</th>
                                        <th>Prof</th>

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
                                                <td class="prof"><span><strong>Prof:
                                                        </strong>{{ $group->Subject->teacher->nom }}
                                                        {{ $group->Subject->teacher->prenom }}</span>
                                                    <span><strong>Email: </strong> {{ $group->Subject->teacher->email }}</span>
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
