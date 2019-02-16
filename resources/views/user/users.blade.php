@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    {{$title}}
                </div>
                <div class="tile-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($id =1)
                        @forelse($users as $user)
                            <tr>
                                <td class="text-center">{{$id++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center"><a href="{{url('user', $user->id)}}" class="btn btn-info btn-sm">Show Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data kosong</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
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
