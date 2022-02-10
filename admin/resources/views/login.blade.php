@extends('layout.app2')
@section('title', 'Admin Login')
@section('content')

<div class=""></div>
<div class="container">
	
	<div class="row justify-content-center d-flex mt-5 mb-5">

		<div class="col-md-10 card">

			<div class="row">
				<div class="col-md-6 p-3">
					<form action="" method="post" class="m-5 loginForm" >
						<div class="form-group">
							<label for="username">User Name</label>
							<input required type="text" value="" class="form-control" id="username" placeholder="Enter Your UserName" name="username">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input required type="text" value="" class="form-control" id="password" placeholder="Enter Your Password" name="password">
						</div>

						<div class="form-group">
							<button name="submit" type="submit" class="btn btn-block btn-danger">LogIn</button>
						</div>
					</form>
				</div>
				<div class="col-md-6 bg-light">
				<img class="w-75 m-5" src="images/bannerImg.png">
			</div>
			</div>
			
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">
	$('.loginForm').on('submit', function(event){
		event.preventDefault();
		let formData = $(this).serializeArray();
		let userName = formData[0]['value'];
		let Password = formData[1]['value'];
		let url="/login";

		axios.post(url,{
			user: userName,
			pass: Password
		})
		.then(function(response){
			if(response.status==200 && response.data==1){
				window.location.href="/";
			}else{
				toastr.error('LogIn Faill!')
			}
		})
		.catch(function(error){
			toastr.error('LogIn Faill!')
		})

	})
</script>
@endsection
