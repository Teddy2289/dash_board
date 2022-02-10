@extends('layouts.master')
@section('title')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Horizontal Form</h4>
        </div>
        <form action="/update_user/{{$user->id}}"  method="POST">
            {{ @csrf_field() }}
            {{@method_field('PUT')}}
                <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="email"  value="{{ $user->email }}">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">User type</label>
                            <div class="col-sm-9">
                            <select name="is_admin" class="form-control">
                                <option value="0">Simple user</option>
                                <option value="1">Admin</option>
                            </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/user"  class="btn btn-warning">cancel</a>
                </div>
        </form>
    </div>
@endsection
@section('script')
@endsection
