@extends('main_layouts.master')

@section('title', 'My blog | Home')

@section('content')
<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @foreach ($posts as $post )
                <div class="block-21 d-flex animate-box post">
                    <a href="#" class="blog-img" style="background-image: url({{ asset('storage/' . $post->image->path ) }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                        <p class="excerpt">{{ $post->excerpt }}</p>
                        <div class="meta">
                            <div class="date"><a href="#"><span class="icon-calendar"></span> {{ $post->created_at->diffForHumans() }}</a></div>
                            <div class=""><a href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                            <div class="comments-count"><a href="#"><span class="icon-chat"></span> {{ $post->comments_count }}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $posts->links() }}
            </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">
                    <div class="side">
                        <h3 class="sidebar-heading">Categories</h3>
                        <div class="block-24">
                            <ul>
                                @forelse ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>{{ $category->posts_count }}</span></a></li>
                                @empty
                                <li>no Categories</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="side">
                        <h3 class="sidebar-heading">Recent Blog</h3>
                        @foreach ($recent_posts as $recent_post)
                        <div class="f-blog">
                            <a href="blog.html" class="blog-img" style="background-image: url({{ asset('storage/' . $recent_post->image->path ) }});">
                            </a>
                            <div class="desc">
                                <p class="admin"><span>{{ $recent_post->created_at->diffForHumans() }}</span></p>
                                <h2><a href="blog.html">{{ Str::limit( $recent_post->title, 20, '...') }}</a></h2>
                                <p>{{ $recent_post->excerpt }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="side">
                        <h3 class="sidbar-heading">Tags</h3>
                        <div class="block-26">
                            <ul>
                                @forelse ($tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                                @empty
                                <li>no Tags</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection