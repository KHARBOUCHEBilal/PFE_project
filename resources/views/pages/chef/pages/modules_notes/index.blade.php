@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Toutes les notes de modules</div>
                <div class="actions">
                    <a class="import" href="{{ route('modules_notes.import-view') }}">
                        <i class="fa-solid fa-download"></i>import-view
                    </a>

                    <div class="other-page">
                        <a href="{{ route('modules_notes.create') }}">
                            <span>
                                <i class="fa-solid fa-plus"></i>Create modules note
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
                            <table class="table display nowrap table-striped table-bordered " id="groups">
                                <thead>
                                    <tr>
                                        <th>Nom & Prenom</th>
                                        <th>Recherche Operationelle</th>
                                        <th>Conception orientee object </th>
                                        <th>Reseaux</th>
                                        <th>Compilation</th>
                                        <th>Programation oriente object</th>
                                        <th>Base de donner</th>
                                        <th>Moyenne</th>
                                        <th>Status</th>
                                        <th>{{ __('pages/admin/global.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($modules_notes)
                                        @foreach ($modules_notes as $note)
                                            <tr>
                                                <td>{{ $note->student->nom }} {{ $note->student->prenom }}</td>
                                                <td>{{ $note->ro }}</td>
                                                <td>{{ $note->coo }}</td>
                                                <td>{{ $note->reseaux }}</td>
                                                <td>{{ $note->compilation }}</td>
                                                <td>{{ $note->poo }}</td>
                                                <td>{{ $note->db }}</td>
                                                <td>{{ $note->moyenne }}</td>
                                                <td>{{ $note->status }}</td>
                                                <td>

                                                    <a href="{{ route('modules_notes.edit', $note) }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                                        <a type="button" data-toggle="modal"
                                                        data-target="#modules_notes-modal{{ $note->id }}" data-keyboard='false'
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modules_notes-modal{{ $note->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modules_notes-modal{{ $note->id }}Title"
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
                                                                    href="{{ route('modules_notes.destroy', $note) }}">
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

            <div class="modal fade" id="import-modal" tabindex="1" role="dialog" aria-labelledby="import-modalTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="close" type="button" data-dismiss="modal">X
                        </div>
                        <div class="modal-carte-content last-add-product-model">
                            <form action="{{ route('modules_notes.import') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-content">
                                    <div class="title">
                                        Ajouter une réduction
                                    </div>
                                    @csrf
                                    <input type="file" name="file" class="form-control">
                                    <br>

                                    <div class="actions">
                                        <button class="action return" type="button" data-dismiss="modal">
                                            Annuler
                                        </button>
                                        <button class="action save" type="button" data-dismiss="modal">
                                            Import Notes Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
{{-- @include('includes._dataTable') --}}
