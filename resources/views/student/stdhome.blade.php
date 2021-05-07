
@extends('student.studentnav')

@section('content')

<!-- {{$student->name}} -->
<br>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<table class="table table-borderless" style="border="">
			<tr>
				<td></td>
				<td align="center"><img style="border-radius: 50px" height="100" width="100" src="/storage/profile/{{$student->image}}"></td>
				<td></td>
			</tr>
			<tr>
				<td>Name</td>
				<td align="center">:</td>
				<td>{{$student->name}}</td>
			</tr>
			<tr>
				<td>Place</td>
				<td align="center">:</td>
				<td>{{$student->place}}</td>
			</tr>
			<tr>
				<td>Contact</td>
				<td align="center">:</td>
				<td>{{$student->contact}}</td>
			</tr>
			<tr>
				<td>Address</td>
				<td align="center">:</td>
				<td>{{$student->address}}</td>
			</tr>
			<tr>
				<td>Course</td>
				<td align="center">:</td>
				<td>{{$student->course}}</td>
			</tr>
			<tr>
				<td colspan="2" align="right"><a href="{{ url('stdupdate/'.$student->id) }}">Update</a></td>
			</tr>
		</table>
	</div>
	<div class="col-sm-3"></div>
</div>
@endsection