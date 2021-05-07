@extends('design')

@section('content')
<!--login form-->
 <!--Errorr message-->
@if(count($errors) > 0)
        <div class="alert alert-danger">
          <ol>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ol>
        </div>
      @endif
       <!--Errorr message-->
      <!--Successfull message-->
      @if(session('Message'))
       <div class="alert alert-success">
          <ol>
            <li>{{ session('Message') }}</li>
          </ol>
        </div>
        @endif
       <!--Successfull message-->
	<form method="post" action="{{url('newstudentac')}}" enctype="multipart/form-data">
		 {{csrf_field()}}
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" name="name" class="form-control" id="name" required="">
		  </div>
		  <div class="form-group">
		    <label for="place">Place</label>
		    <input type="text" name="place" class="form-control" id="place" required="">
		  </div>
		  <div class="form-group">
		    <label for="contact">Contact</label>
		    <input type="number" name="contact" class="form-control" id="contact" required="">
		  </div>
		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea class="form-control" name="address" id="address" required=""></textarea>
		  </div>
		  <div class="form-group">
		    <label for="course">Course</label>
		  <select name="course" class="form-control" id="course" required="">
		  	<option value="">Select Course</option>
		  	<option value="php">php</option>
		  	<option value="python">python</option>
		  	<option value="java">java</option>
		  </select>
		  </div>
		  <div class="form-group">
		    <label for="profile">Profile</label>
		     <input type="file" name="profile" class="form-control-file" id="profile" required="">
		  </div>
		  <div class="form-group">
		    <label for="username">Username</label>
		     <input type="text" name="username" class="form-control" id="username" required="">
		  </div>
		   <div class="form-group">
		    <label for="password">Password</label>
		     <input type="Password" name="password" class="form-control" id="password" required="">
		  </div>
		  <div class="form-group">
		    <label for="cpass">Confirm Password</label>
		     <input type="Password" name="cpass" class="form-control" id="cpass" required="">
		  </div>
		  <button type="submit" class="btn btn-primary">Login</button>
</form>
<!--// login form-->
@endsection