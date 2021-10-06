@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1> 
    </div>--}}
    <h1 class="">User</h1> 
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="GET" action="{{ route('users.index') }}">
                                <div class="form-row align-items-center">
                                  <div class="col-auto">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                                  </div>
                                  <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                        <div>
                            <a href="{{ route('users.create') }}" class="float-right">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection