@extends('admin.layouts.base')

@section('content')

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td></td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-blue-outline"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $users->links() !!}

@endsection
