@extends('layouts.manage')
@section('content')

        <div class="panel">
            <div class="panel-heading text-center">
                Edit Category: <strong>{{ $category->name }}</strong>
            </div>
            <br>
            <div class="panel-body">
                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label">Name</label>
                        <input class="input" type="text" name="name" value="{{ $category->name }}">
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