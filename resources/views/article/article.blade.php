@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    List Article
                    <div class="pull-right">
                        <a href="{{route('article.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Article</a>
                    </div>
                </div>
                <div class="tile-body">

                </div>
            </div>
        </div>
    </div>

@endsection