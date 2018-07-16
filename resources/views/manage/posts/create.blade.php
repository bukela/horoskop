@extends('layouts.manage')
@section('content')

    <div class="panel">
        <div class="panel-heading text-center">
            Create New Post
        </div>
        <br>
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="field">
                <label class="label">Title</label>
                <input class="input" type="text" name="title" placeholder="Text input">
            </div>

            <div class="field">
                <label class="label">Featured Image</label>
                <input class="" type="file" name="featured">
            </div>
                <div class="columns">
                    <div class="column">
            <div class="field">
                <label class="label checkbox">Select Category</label><br>
                @foreach ($category as $item)
                    <label><input type="checkbox" name="categories[]" value="{{ $item->id }}"> {{ $item->name }}</label> <br>
                @endforeach
            </div>
                    </div>
<hr>
                    <div class="column">
                <div class="field">
                    <label class="label checkbox">Select Tag</label><br>
                    @foreach ($tags as $tag)
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label> <br>
                    @endforeach
                </div>
                    </div>
                <hr>
                </div>
            <div class="field">
                <label class="label">Content</label>
                <textarea class="textarea" name="content" id="summernote" cols="10" rows="10"></textarea>
            </div>

            <div class="field">
                <label class="label">Status</label>
                <select name="status" id="status">
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                        <option value="draft">Draft</option>
                </select>
            </div>

            {{-- <div class="field">
                <div class="control">
                    <label class="radio">
                      <input type="radio" name="status" value="published">
                      {{ $post->status == 'published' ? 'checked' : '' }}
                    </label>
                    <label class="radio">
                      <input type="radio" name="status" value="unpublished">
                      {{ $post->status == 'unpublished' ? 'checked' : '' }}
                    </label>
                    <label class="radio">
                        <input type="radio" name="status" value="draft">
                        {{ $post->status == 'draft' ? 'checked' : '' }}
                      </label>
                  </div>
            </div> --}}

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