@extends('admin-layouts._master')
@section('content')
    <form action="{{ route('semester_notes.import') }}" method="POST" enctype="multipart/form-data">
        <div class="form-content">
            <div class="title">
                Ajouter une fichier excel
            </div>
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <div class="form-actions">
                <button class="action btn btn-warning" type="button">
                    <i class="fas fa-back"></i> {{ __('pages/admin/global.back') }}
                </button>
                <button class="action btn btn-primary" type="submit">
                    <i class="fas fa-save"></i> {{ __('pages/admin/global.save') }}
                </button>
            </div>
        </div>
    </form>
@endsection
