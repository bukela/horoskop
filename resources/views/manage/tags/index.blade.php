@extends('layouts.manage')

@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title">All Tags</p>
            </div>
        </div>
    </section>


                        <table class="table container">
                            <thead>
                            <tr>
                                <th>Tag Name</th>

                                <th>Edit</th>

                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($tags->count() > 0)
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>
                                            {{ $tag->tag }}
                                        </td>
                                        <td>
                                            <a href="{{ route('tag.edit', $tag->slug)  }}" class="button btn is-right is-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('tag.delete',['id' => $tag->id])  }}" class="button btn is-right is-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="5" class="text-center underline"><h3><u>No tag created</u></h3></th>
                                </tr>
                            @endif
                            </tbody>
                        </table>


@endsection