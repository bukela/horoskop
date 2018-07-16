@extends('layouts.manage')

    @section('content')

        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <p class="title">All Posts</p>
                </div>
            </div>
        </section>
            <div class="demo">
                    <form action="" method="get">
                            {{ csrf_field() }}
                <div class="searchblock panel-block">
                    <p class="searchlist control has-icons-left is-pulled-right">
                        <input class="input is-small is-primary"  name="q" id="q" type="search" placeholder="Search">
                        <span class="icon is-small is-left">
                        <i class="fa fa-search"></i>
                        </span>
                    </p>
                    <button class="search-button button is-small is-primary" type="submit">SEARCH</button>
                </div>
            </form>
        <br>
                            <table class="table container ">
                                <thead>
                                <tr>
                                    <th>Image</th>

                                    <th>Title</th>

                                    <th>Edit</th>

                                    <th>Delete</th>

                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80px" height="80px">
                                            </td>
                                            <td>
                                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('post.edit', ['id' => $post->id])  }}" class="button btn is-right is-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('post.delete',['id' => $post->id])  }}" class="button btn is-right is-danger btn-sm">Delete</a>
                                            </td>
                                            <td>
                                                <a class="button is-inverted is-static">{{$post->status}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="5" class="text-center underline"><h3><u>No posts created</u></h3></th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="columns">
                                <div class="column is-2 is-offset-5">
                                    {{ $posts->links() }}
                                </div>
                              </div>
                            
            </div>

@endsection