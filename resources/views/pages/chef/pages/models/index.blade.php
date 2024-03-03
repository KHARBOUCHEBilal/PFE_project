@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.all_models') }}</div>
                <div class="other-page">
                    <a href="{{ route('models.create') }}">
                        <span>
                            <i
                                class="fa-solid fa-plus"></i>{{ __('pages/admin/global.create') }}{{ __('pages/admin/global.model') }}
                        </span>
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
                            <table class="table display nowrap table-striped table-bordered " id="models">
                                <thead>
                                    <tr>
                                        <th>{{ __('pages/admin/global.name') }}</th>
                                        <th>{{ __('pages/admin/global.description') }}</th>
                                        <th>{{ __('pages/admin/global.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($models)
                                        @foreach ($models as $model)
                                            <tr>
                                                <td>{{ $model->name }}</td>
                                                <td>{!! $model->description !!}</td>
                                                <td>
                                                    <a href="{{ route('models.edit', $model) }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>

                                                        <a type="button" data-toggle="modal"
                                                        data-target="#models-modal{{ $model->id }}" data-keyboard='false'
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="models-modal{{ $model->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="models-modal{{ $model->id }}Title"
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
                                                                    href="{{ route('models.destroy', $model) }}">
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
