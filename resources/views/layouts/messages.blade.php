@if (count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="el-alert el-alert--error ">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="el-alert el-alert--success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="el-alert el-alert--error">
        {{session('error')}}
    </div>
@endif

