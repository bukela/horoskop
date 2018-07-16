@extends('layouts.manage')

@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title">All Horoscopes</p>
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
            <a href="{{route('horoscopes')}}"><button class="search-button button is-small" type="submit"><i class="fa fa-refresh"></i>
            </button></a>
        </div>
    </form>
        </div>
        <br>
        <table class="table container ">
            <thead>
            <tr>
                <th>Title</th>
                <th>Horoscope group</th>
                <th>Sign</th>
                <th>Schedule</th>
                <th>Type</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>
            @if($horoscopes->count() > 0)
                @foreach ($horoscopes as $horoscope)
                    <tr>
                        <td>
                            <a href="{{ route('horoscope.show', $horoscope->id) }}">{{ $horoscope->title }}</a>
                        </td>
                        <td>
                            <p>{{ $horoscope->horoscopegroup->name }}</p>
                        </td>
                        <td>
                            <p>{{ $horoscope->sign->name }}</p>
                        </td>
                        <td>
                            <p>{{ $horoscope->schedules[0]->name }}</p>
                        </td>
                        <td>
                            <p>{{ $horoscope->types[0]->name }}</p>
                        </td>
                        <td>
                            <a href="{{ route('horoscope.edit', ['id' => $horoscope->id])  }}" class="button btn is-right is-outlined is-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('horoscope.delete',['id' => $horoscope->id])  }}" class="button btn is-right is-outlined is-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center underline"><h3><u>No horoscope created</u></h3></th>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="columns">
            <div class="column is-2 is-offset-5">
                {{ $horoscopes->links() }}
            </div>
        </div>

    </div>

@endsection