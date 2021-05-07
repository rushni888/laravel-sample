
@extends('student.studentnav')
@section('content')
<form method="post" action="{{url('updatedata/'.$student->id)}}" enctype="multipart/form-data">
		 {{csrf_field()}}
		  <br>
		 	 <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="name">Name</label>
			       <input type="text" name="name" class="form-control" id="name" required="" value="{{$student->name}}">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="place">Place</label>
			       <input type="text" name="place" class="form-control" id="place" required="" value="{{$student->place}}">
			    </div>
			     <div class="form-group col-md-4">
			      <label for="contact">Contact</label>
			       <input type="text" name="contact" class="form-control" id="contact" required="" value="{{$student->contact}}">
			    </div>
 			 </div>
 			 <div class="form-row">
			    <div class="form-group col-md-12">
			      <label for="address">Address</label>
			       <textarea name="address" class="form-control">{{$student->address}}</textarea>
			    </div>
			</div>
			 <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="course">Course</label>
			      <select name="course" class="form-control" id="course" required="">
					  	<option value="">Select Course</option>
					  	<option selected="" value="{{$student->course}}">{{$student->course}}</option>
					  	<option value="php">php</option>
					  	<option value="python">python</option>
					  	<option value="java">java</option>
				  </select>
			    </div>
			     <div class="form-group col-md-2">
			      <label for="course">Profile</label><br>
			       <input type="file" accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
			      <!--  <p><label for="file" style="cursor: pointer;">Upload Image</label></p> -->
			       <label for="file" style="cursor: pointer;"><img class="img img-thumbnail" id="output" width="300" src="/storage/profile/{{$student->image}}" style="height: 100px;width: 100px" ></label>
			    </div>
			     <div class="form-group col-md-4" style="padding-top: 30px">
			     	<button class="btn btn-info">Update</button>
			     </div>
			</div>
</form>
@endsection

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>