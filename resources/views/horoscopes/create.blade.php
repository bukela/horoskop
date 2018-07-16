@extends('layouts.manage')
@section('content')

    <div class="panel">
        <div class="panel-heading text-center">
            Create New Horoscope
        </div>
        <br>
        <div class="panel-body">
            <form action="{{ route('horoscope.store') }}" method="post">
                {{ csrf_field() }}
            <div class="field">
                <label for="category">Horoscope group</label>
                    <div class="select">
                            <select name="horoscopegroup_id" id="horo_groups">
                                    @foreach ($horogroups as $horogroup)
                                <option value="{{ $horogroup->id }}">{{ $horogroup->name }}</option>
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
                                            <option value="{{ $sign->id }}">{{ $sign->name }}</option>
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
                            <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
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
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                    </div>
            </div>
            <hr>
            <div class="field">
                <label class="label">Title</label>
                <input class="input" type="text" name="title" placeholder="Text input">
            </div>

            <div class="field">
                <label class="label">Content</label>
                <textarea class="textarea" name="short_description" id="summernote" cols="10" rows="10"></textarea>
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

//     $('select[name="horoscopegroup_id"]').change(function() {
//     if ($(this).val()=='2') {
//         $('#sign').attr('disabled', false);
//     } 
//     else if ($(this).val()=='3') {
//         $("#sign option[value='1'],option[value='2'],option[value='3'],option[value='4'],option[value='5'],option[value='6']").attr('disabled', true);
//     }
//     else if ($(this).val()=='1') {
//         $('#sign').attr('disabled', true);
//     }
// });
    
</script>
@endsection