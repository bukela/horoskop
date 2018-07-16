@extends('layouts.manage')
@section('content')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-centered">{{ ucwords($horoscope->title) }}</p>
            </div>
        </div>
    </section>

    <table class="table container">

        <thead>
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
                {!! $horoscope->short_description !!}
            </td>
            <td>
                <a href="{{ route('horoscope.edit', ['id'=>$horoscope->id])  }}" class="button btn is-primary is-outlined btn-sm">Edit</a>
            </td>
        </tr>
        </tbody>
    </table>

@endsection