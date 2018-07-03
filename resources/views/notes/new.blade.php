@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Notiz hinzufügen
            </div>
            <form class="card-body" action="{{ route('create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="title" placeholder="Titel" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <!-- Text Editor -->
                <textarea name="content-body"></textarea>
                <div class="mt-3">
                    <input id="tags" name="tags" data-role="tagsinput" placeholder="Tag hinzufügen" class="form-control">
                </div>
                <button class="btn btn-danger btn-sm float-right" type="submit">Erstellen</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('content-body');
        });
    </script>
@endsection