<!-- START NAV -->
{{--<nav class="navbar is-white">--}}
    {{--<div class="container">--}}
        {{--<div class="navbar-brand">--}}
            {{--<div class="navbar-burger burger" data-target="navMenu">--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
<!-- END NAV -->
<br>
<div class="container">
    <div class="columns">
        <div class="column is-3">
            <aside class="menu">
                <ul class="menu-list">
                    {{--<a class="panel-block">--}}
                    <a class="button is-primary is-outlined is-alt is-medium" href="{{route('post.create')}}">Create New Post</a>
                            <hr>
                    <a href="{{route('posts')}}" class="item active"><span class="icon"><i class="fa fa-align-left"></i></span><span class="name">All Posts</span></a>

                    <a href="{{route('category.create')}}" class="item active"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span class="name">Create New Category</span></a>

                    <a href="{{route('categories')}}" class="item active"><span class="icon"><i class="fa fa-align-left"></i></span><span class="name">All Categories</span></a>

                    <a href="{{route('tag.create')}}" class="item active"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span class="name">Create New Tag</span></a>

                    <a href="{{route('tags')}}" class="item active"><span class="icon"><i class="fa fa-align-left"></i></span><span class="name">All Tags</span></a>

                            <hr>

                </ul>

            </aside>
            <aside class="menu">
                <ul class="menu-list">
                    {{--<a class="panel-block">--}}
                    <a class="button is-primary is-outlined is-block is-alt is-centered is-medium" href="{{route('horoscope.create')}}" @click="openAdd">Create New Horoscope</a>
                    <hr>
                    <a href="{{route('horoscopes')}}" class="item active"><span class="icon"><i class="fa fa-inbox"></i></span><span class="name">All Horoscopes</span></a>

                    <hr>

                </ul>

            </aside>
        </div>
        <div class="column is-9">
            <section class="hero is-primary welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Hello, {{Auth::user()->name}}
                        </h1>
                        <h2 class="subtitle">
                            I hope you are having a great day!
                        </h2>
                    </div>
                </div>
            </section>
            <section class="info-tiles">
                <div class="tile is-ancestor has-text-centered">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">439k</p>
                            <p class="subtitle">Users</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">59k</p>
                            <p class="subtitle">Products</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">3.4k</p>
                            <p class="subtitle">Open Orders</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">19</p>
                            <p class="subtitle">Exceptions</p>
                        </article>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
