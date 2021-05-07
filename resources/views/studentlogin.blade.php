@extends('design')

@section('content')
<!--login form-->
 @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ol>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ol>
        </div>
      @endif
	<form method="post" action="{{url('stdlog')}}">
		 {{csrf_field()}}
		  <div class="form-group">
		    <label for="exampleInputuser">Username</label>
		    <input type="text" name="user" class="form-control" id="exampleInputuser" value="{{ request()->input('user') }}">
		  </div>
		  {{ old('user') }}
		  <div class="form-group">
		    <label for="exampleInputPassword">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
		    <p style="color: red">{{ session('errorMessage') }}</p>
		  </div>
		  <button type="submit" class="btn btn-primary">Login</button>
</form>
<!--// login form-->
@endsection