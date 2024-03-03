@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Semester Notes</div>
                <div class="actions">
                    <a class="import" href="{{ route('semester_notes.import-view') }}">
                        <i class="fa-solid fa-download"></i>import-view
                    </a>
                    <div class="other-page">
                        <a href="{{ route('semester_notes.create') }}">
                            <span>
                                <i class="fa-solid fa-plus"></i>Ajouter semester note
                            </span>
                        </a>
                    </div>
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
                            <table class="table display nowrap table-striped table-bordered " id="semester_notes">
                                <thead>
                                    <tr>
                                        <th>CNE</th>
                                        <th>S1</th>
                                        <th>S2</th>
                                        <th>S3</th>
                                        <th>S4</th>
                                        <th>S5</th>
                                        <th>S6</th>
                                        <th>{{ __('pages/admin/global.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($semester_notes)
                                        @foreach ($semester_notes as $note)
                                            <tr>
                                                <td>{{ $note->student->nom }} {{ $note->student->prenom }}</td>
                                                <td>{{ $note->S1 }}</td>
                                                <td>{{ $note->S2 }}</td>
                                                <td>{{ $note->S3 }}</td>
                                                <td>{{ $note->S4 }}</td>
                                                <td>{{ $note->S5 }}</td>
                                                <td>{{ $note->S6 }}</td>
                                                <td>
                                                    <a href="{{ route('semester_notes.edit', $note) }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                                        <a type="button" data-toggle="modal"
                                                        data-target="#semester_notes-modal{{ $note->id }}" data-keyboard='false'
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="semester_notes-modal{{ $note->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="semester_notes-modal{{ $note->id }}Title"
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
                                                                    href="{{ route('semester_notes.destroy', $note) }}">
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
