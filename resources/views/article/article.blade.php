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
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($id =1)
                        @forelse($articles as $article)
                            <tr>
                                <td>{{$id++}}</td>
                                <td>{{$article->title_article}}</td>
                                <td>{{str_limit($article->content_article,100)}}</td>
                                <td>{{$article->user->name}}</td>
                                <td>
                                    <a href="{{route('article.edit', $article)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <button id="delete" href="{{route('article.destroy', $article)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data kosong</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="" style="display:none;">
    </form>

@endsection

@section("scripts")
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            // var title = $(this).data('title');

            swal({
                title: "Kamu yakin untuk hapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('deleteForm').action = href;
                        document.getElementById('deleteForm').submit();
                        swal("Data dihapus!", {
                            icon: "success",
                        });
                    }
                });
        });
    </script>
@endsection
