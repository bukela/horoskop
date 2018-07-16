@extends('layouts.manage')
@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-centered">{{ ucwords($post->title) }}</p>
            </div>
        </div>
    </section>

    <table class="table container">

    <thead>
        <th>
            Image
        </th>
        <th>
            Content
        </th>
        <th>
            Edit
        </th>
    </thead>
    <tbody>
        <tr>
            <td>
            <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80px" height="80px">
            </td>
            <td>
                {!! $post->content !!}
            </td>
            <td>
            <a href="{{ route('post.edit', ['id'=>$post->id])  }}" class="button btn is-primary btn-sm">Edit</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection