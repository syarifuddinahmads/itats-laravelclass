@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@elseif(session('info'))
    <div class="alert alert-info">{{session('info')}}</div>
@endif
