@if(Session::has('success'))
    <div class="panel list-group">
        <p class="panel-block list-group-item is-success">{{ Session::get('success') }}</p>
    </div>
@endif