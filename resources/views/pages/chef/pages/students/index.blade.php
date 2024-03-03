@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Etudiants</div>
                <div class="actions">
                    <a class="import" href="{{ route('students.import-view') }}">
                        <i class="fa-solid fa-download"></i>Importer un ficher Excel
                    </a>
                    <a class="import create" href="{{ route('students.create') }}">
                        <span>
                            <i class="fa-solid fa-plus"></i>Ajouter Etudiant
                        </span>
                    </a>
                    <a class="import delete" href="{{ route('students.delete-all') }}">
                        <i class="fa-solid fa-trash"></i>Supprimer touts les etudiants
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
                            <table class="table display nowrap table-striped table-bordered " id="student">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>CNI</th>
                                        <th>CNE</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($students)
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->nom }}</td>
                                                <td>{{ $student->prenom }}</td>
                                                <td>{{ $student->CNI }}</td>
                                                <td>{{ $student->CNE }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>
                                                    <a href="{{ route('students.edit', $student) }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                                        <a type="button" data-toggle="modal"
                                                        data-target="#students-modal{{ $student->id }}" data-keyboard='false'
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="students-modal{{ $student->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="students-modal{{ $student->id }}Title"
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
                                                                    href="{{ route('students.destroy', $student) }}">
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
