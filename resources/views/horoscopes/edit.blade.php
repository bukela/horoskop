@extends('layouts.manage')
@section('content')

    <div class="panel">
        <div class="panel-heading text-center">
            Edit Horoscope
        </div>
        <br>
        <div class="panel-body">
            <form action="{{ route('horoscope.update',['id' => $horoscope->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="field">
                    <label for="category">Horoscope group</label>
                    <div class="select">
                            <select name="horoscopegroup_id" id="horo_groups">
                                    @foreach ($horo_groups as $horo_group)
                                        <option value="{{ $horo_group->id }}"
                                                @if($horoscope->horoscopegroup_id == $horo_group->id)
                                                        selected
                                                @endif
                                        >{{ $horo_group->name }}</option>
                                    @endforeach
                                </select>
                    </div>
                </div>
                <hr>
                <div class="field">
                        <label for="category">Horoscope sign</label>
                        <div class="select">
                                <select name="sign_id" id="sign">
                                        @foreach ($signs as $sign)
                                        <option value="{{ $sign->id }}"
                                                @if($horoscope->sign_id == $sign->id)
                                                selected
                                                @endif
                                        >{{ $sign->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                    </div>
                    <hr>

                <div class="field">
                    <label for="category">Horoscope schedule</label>
                    <div class="select">
                            <select name="schedules" id="schedules">
                                    @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}"
                                                @foreach($horoscope->schedules as $item)
                                                    @if($schedule->id == $item->id)
                                                    selected
                                                     @endif
                                                @endforeach
                                        >{{ $schedule->name }}</option>
                                    @endforeach
                                </select>
                    </div>
                </div>
                <hr>

                <div class="field">
                    <label for="category">Horoscope type</label>
                    <div class="select">
                            <select name="types" id="type">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                                @foreach($horoscope->types as $item)
                                                    @if($type->id == $item->id)
                                                    selected
                                                    @endif
                                                @endforeach
                                        >{{ $type->name }}</option>
                                    @endforeach
                                </select>
                    </div>
                </div>
                <hr>
                <div class="field">
                    <label class="label">Title</label>
                    <input class="input" type="text" name="title" value="{{ $horoscope->title }}">
                </div>

                <div class="field">
                    <label class="label">Content</label>
                    <textarea class="textarea" name="short_description" id="summernote" cols="10" rows="10">{{ $horoscope->short_description }}</textarea>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection