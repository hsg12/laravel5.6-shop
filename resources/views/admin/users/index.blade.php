@extends('layouts-admin.master')
@section('title', "| All users")

@section('content')

<h4 class="mt-3 mb-4">All Users</h4>

@if($users->count() <= 0)
    <h5>Users list is empty</h5>
@else

    <div class="row my-4">
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" id="usersSearch" placeholder="Search User or Admin" autocomplete="off">
            </div> 
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-5" id="usersTable">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                <td>
                    <a href="{{ route('users.edit', ['name' => $user->id]) }}">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="{{ route('users.destroy', ['name' => $user->id]) }}" method="post" class="app-delete-form confirm-plugin-delete">

                        @csrf
                        @method('delete')

                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
    <br>
    <br>
@endif

@endsection
