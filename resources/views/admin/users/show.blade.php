@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="{{route('admin.users.create')}}" class="btn btn-success btn-lg btn-block active" role="button" aria-pressed="true">CREATE NEW USER</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$user->id}} </td>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td class="text-center">
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info" role="button" aria-pressed="true">EDIT</a>
                            </td>
                            <td class="text-center">
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
