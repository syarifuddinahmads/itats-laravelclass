@extends('layouts.app')
@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($articles as $article)
                <div class="post-preview">
                    <a href="{{url('article-detail', $article['id'])}}">
                        <h2 class="post-title">
                            {{$article->title_article}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{str_limit($article->content_article, 150)}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$article->user->name}}</a>
                        on {{date_format($article->created_at, 'd M y')}}</p>
                </div>
                <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
