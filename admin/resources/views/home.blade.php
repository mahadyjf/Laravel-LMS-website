@extends('layout.app')
@section('title', "Home");
@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalVisitor}}</h3>
					<h3 class="count-card-text">Total Visitors</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalService}}</h3>
					<h3 class="count-card-text">Total Services</h3>
				</div>
			</div>
		</div>



		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalcourse}}</h3>
					<h3 class="count-card-text">Total Projects</h3>
				</div>
			</div>
		</div>



		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalproject}}</h3>
					<h3 class="count-card-text">Total Course</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalcontact}}</h3>
					<h3 class="count-card-text">Total Contact</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalreview}}</h3>
					<h3 class="count-card-text">Total Reviews</h3>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection