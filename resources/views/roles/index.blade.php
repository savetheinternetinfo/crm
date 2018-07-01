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
                                @csrf
                                <input type="hidden" value="{{$user->name}}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">
                                            {{$user->name}}
                                        </span>
                                    </div>
                                    <select id="role" name="role" class="form-control">
                                        <option value="none">Remove all roles</option>
                                        @foreach($roles as $role)
                                            <option class="form-control" {{ !$user->hasRole($role) ? : 'disabled selected'}} value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Set Role</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection