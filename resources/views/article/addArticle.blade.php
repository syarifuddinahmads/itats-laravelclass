@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    Create Article
                </div>
                <div class="tile-body">
                    <form action="" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="" class="label-control">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group">
                            <label for="" class="label-control">Content</label>
                            <textarea name="content" id="" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection