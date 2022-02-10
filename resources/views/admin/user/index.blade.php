@extends('layouts.master')
@section('title')
@endsection
@section('content')
    <div class="text-right m-b-5">
        <a href="#"  class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Tableau des utilisatuers</h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session('status') }}
                </div>
        </div>
        @endif
        <div class="card-body p-0 ">
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">type</th>
                    <th scope="collapse-2">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $row)
                <tr>

                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->is_admin }}</td>
                    <td>
                        <a href="/list_users" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Voir</a>
                        <a href="/edit-user/{{$row->id}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edite</a>
                        <a href="#" data-toggle="modal" class="btn btn-icon icon-left btn-danger" data-target="#basicModal"><i class="fas fa-times"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/delete_user/{{$row->id}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <h5 class="text-center">Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-secondary" >Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL WITH FORM -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/create" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Gender" name="gender">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nationality</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nationaliter" name="nationality">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="file" class="form-control"  name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
