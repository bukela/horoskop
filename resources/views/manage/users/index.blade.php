@extends('layouts.manage')
@section('content')

    <div class="container">
        <div class="columns m-t-10">
            <div class="column is-10">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
            <a href="{{route('user.create')}}" class="button is-primary"><i class="fa fa-user-add m-r-10"></i>Create New User </a>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="card">
            <div class="card-content">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toFormattedDateString()}}</td>
                            <td class="has-text-right">
                                <a class="button is-outlined is-primary m-r-5" href="{{route('user.show', $user->id)}}">View</a>
                                <a class="button is-outlined is-info m-r-5" href="{{route('user.edit', $user->id)}}">Edit</a>
                                <a class="button is-outlined is-danger" href="{{ route('user.delete',['id' => $user->id])  }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- end of .card -->

        <div class="columns">
            <div class="column is-2 is-offset-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @endsection