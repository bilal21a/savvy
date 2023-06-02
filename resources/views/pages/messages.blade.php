@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times</a>
            {!!$error!!}
        </div>
    @endforeach
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times</a>
        {!!Session::get('success')!!}
    </div>
@endif
@if (Session::has('message'))
    <div class="alert alert-success">
        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times</a>
        {!!Session::get('message')!!}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times</a>
        {!!Session::get('error')!!}
    </div>
@endif
