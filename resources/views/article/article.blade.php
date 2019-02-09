@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    {{$title}}
                    <div class="pull-right">
                        <a href="{{route('article.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Article</a>
                    </div>
                </div>
                <div class="tile-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->title_article}}</td>
                                <td>{{$article->content_article}}</td>
                                <td>
                                    <a href="{{route('article.edit', $article)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
