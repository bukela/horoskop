@extends('layouts.manage')

@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title">All Categories</p>
            </div>
        </div>
    </section>

    <div class="demo">
        <br>
        <table class="table container">
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($category->count() > 0)
                @foreach ($category as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td><a href="{{ route('category.edit', $item->slug) }}" class="button btn is-right is-primary btn-sm">Edit</a></td>
                <td><a href="{{ route('category.delete',['id' => $item->id])  }}" class="button btn is-right is-danger btn-sm">Delete</a></td>
            </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center underline"><h3><u>No category created</u></h3></th>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection