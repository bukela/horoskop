@if(count($errors) > 0)
    <ul class="panel list-group">
        @foreach($errors->all() as $error)
            <li class="panel-block list-group-item has-text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif