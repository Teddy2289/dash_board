@extends('layouts.master')
@section('title')
@endsection
@section('content')
    <div class="text-right m-b-5">
        <a href="/user"  class="btn btn-outline-warning">Retour</a>
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
                </tr>
                </thead>
                <tbody>
                @foreach($user as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->is_admin }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection
