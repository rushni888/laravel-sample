@extends('admin.adminnav')

@section('content')

<!-- {{session('adminid')}} -->
<br>
<!--search-->
<form class="form-inline" method="post" action="{{url('adminserch')}}">
	 {{csrf_field()}}
  <div class="form-group mb-2">
    <input type="text" class="form-control" id="srt" placeholder="Enter Name, Place Or Contact" name="search" required style="width: 300px">
  </div>
  <button type="submit" class="mx-sm-4 btn btn-primary mb-2">Search</button>
  <a href="{{url('stdview')}}"><button type="button" class="mx-sm-4 btn btn-primary mb-2">View All</button></a>
</form>
<!--search-->
<div class="row">
	<div class="col-sm-12">
<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>PLACE</th>
								<th>CONTACT</th>
								<th>ADDRESS</th>
								<th>COURSE</th>
								<th>PROFILE</th>
								<th>DELETE</th>
							</tr>
						</thead>
						<tbody>
							<!-- {{$student}} -->
							@foreach($student as $stud)
							<tr>
								<td>{{$stud->id}}</td>
								<td>{{$stud->name}}</td>
								<td>{{$stud->place}}</td>
								<td>{{$stud->contact}}</td>
								<td>{{$stud->address}}</td>
								<td>{{$stud->course}}</td>
								<td><img style="height: 100px;width: 100px" class="img img-thumbnail" src="/storage/profile/{{$stud->image}}"></td>
								<td><a onclick="return confirm('Are you sure you want to delete this item?');" href="{{url('delac/'.$stud->id)}}"><button style="background-color: white;border-style: none;"><i style="color: red;font-size: 20px" class="fa fa-trash"></i></button></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
	</div>
</div>
@endsection