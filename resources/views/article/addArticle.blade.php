@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    Create Article
                    <div class="pull-right">
                        {{--<a href="{{route('article.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Article</a>--}}
                    </div>
                </div>
                <div class="tile-body">
                    <form action="{{route('article.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="" class="label-control">Title</label>
                            <input type="text" class="form-control {{$errors->has('title_article') ? 'is-invalid':''}}" name="title_article" value="{{old('title_article')}}">
                            @if($errors->has('title_article'))
                                <div class="form-control-feedback">{{$errors->first('title_article')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="" class="label-control">Content</label>
                            <textarea name="content_article" id="" class="form-control {{$errors->has('content_article') ? 'is-invalid':''}}">{{old('content_article')}}</textarea>
                            @if($errors->has('content_article'))
                                <div class="form-control-feedback">{{$errors->first('content_article')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Article</button>
                            <a href="{{route('article.index')}}" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
