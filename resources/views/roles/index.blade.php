@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Set User Permissions</div>

                    <div class="card-body">
                        @foreach($users as $user)
                            <form class="row" action="{{route('editRole')}}" method="POST">
                                <input type="hidden" value="{{$user->name}}">
                                <p>{{$user->name}}</p>
                                <select id="role" name="role" class="form-control col-md-4">
                                    <option value="none">Remove all roles</option>
                                    @foreach($roles as $role)
                                        <option class="form-control" value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Set Role</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection