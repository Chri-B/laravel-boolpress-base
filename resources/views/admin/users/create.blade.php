@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form  action="{{route('admin.users.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                        <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" value="salva">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
