@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1> 
    </div>--}}
    <h1 class="">Cities</h1> 
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
                            <form method="GET" action="{{ route('cities.index') }}">
                                <div class="form-row align-items-center">
                                  <div class="col-auto">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Durgapur">
                                  </div>
                                  <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                        <div>
                            <a href="{{ route('cities.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Country Code</th>
                                <th>name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <th>{{ $city->id }}</th>
                                <td>{{ $city->state->name }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success">Edit</a>
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