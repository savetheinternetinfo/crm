@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Notiz hinzufügen
            </div>
            <form class="card-body" action="{{ route('edited', ['id' => $note->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="title" placeholder="Titel" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{$note->title}}">
                    </div>
                    <table class="table table-sm">
                        <tbody>
                        <tr>
                            <td class="border-0">Erstellt von: <span class="badge badge-light">{{DB::table('users')->find($note->createdBy)->name}} am {{$note->created_at}}</span></td>
                        </tr>
                        <tr>
                            <td class="border-0">Bearbeitet von: <span class="badge badge-light">{{DB::table('users')->find($note->editedBy)->name}} am {{$note->updated_at}}</span></td>
                            @can('remove notes')
                            <td class="float-right border-0">
                                <a href="{{ route('delete', ['id' => $note->id])}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            @endcan
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Text Editor -->
                <textarea name="content-body">{{$note->content}}</textarea>
                <div class="mt-3">
                    <input id="tags" name="tags" data-role="tagsinput" placeholder="Tag hinzufügen" class="form-control" value="
                        @foreach(json_decode($note->tags) as $tag)
                            {{$tag->name->en}},
                        @endforeach
                            " >
                </div>
                <button class="btn btn-danger btn-sm float-right" type="submit">Aktualisieren!</button>
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