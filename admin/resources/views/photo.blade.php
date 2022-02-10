@extends('layout.app')
@section('title', "Photo Gellary");
@section('content')
<div id="PhotoMainId" class="container">
<div class="row">
<div class="col-md-12 p-3">

	<button id="PhotoAddNewBtn" class="btn btn-sm btn-danger my-3">Add New</button>
	<div class="row" id="photoRow">
	</div>
	<button id="LoadMore" class="btn btn-primary btn-block">Load More</button>
</div>
</div>
</div>


<!-- Insert Photo -->
<div class="modal fade" id="PhotoInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    	<div class="modal-header">
            <h5 class="modal-titl">Add New Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
 
      <div class="modal-body p-5 text-center">
        <input class="w-100" id="ImgInput" type="file" class="form-controll" name="">
        <img class="w-100 mt-3 mb-0" style="height: 350px;" id="ImgPreview" src="{{ asset('images/download.png') }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="SavePhoto" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

	$('#PhotoAddNewBtn').click(function(){
		$('#PhotoInsertModal').modal('show');
	})

	$('#ImgInput').change(function(){
		var reader = new FileReader();
		reader.readAsDataURL(this.files[0]);
		reader.onload=function(event){
			var ImgSourse = event.target.result;
			$('#ImgPreview').attr('src', ImgSourse);
		}
	})


	$('#SavePhoto').on('click', function(){
		$('#SavePhoto').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
		var PhotoFile = $('#ImgInput').prop('files')[0];
		var formData = new FormData();
		formData.append('photo', PhotoFile);

		axios.post("/PhotoUpload", formData)
		.then(function(response){
			$('#SavePhoto').html("Save");
			if(response.status==200 && response.data==1){
				 $('#PhotoInsertModal').modal('hide');
                   toastr.success('Photo Insert Success');
			}else{
				$('#PhotoInsertModal').modal('hide');
                    toastr.error('Photo Insert Fail!');
			}
			
		})
		.catch(function(error){
			$('#PhotoInsertModal').modal('hide');
            toastr.error('Photo Insert Fail!');
		})
	})


	LoadPhoto()
	function LoadPhoto(){
		axios.get('/photoJson').then(function(response){
			$.each(response.data, function(i, item){
            	$("<div class='col-md-3 p-1'>").html(
            		"<img data-id="+item['id']+" style='height: 200px; width: 100%' src="+"http://"+item['location']+">"+
            		"<button data-id="+item['id']+" data-photo="+item['location']+">Delete</button>"
            		).appendTo('#photoRow')
            })

            $('.DeleteBtn').on('click', function(event){
            	let id = $(this).data('id');
            	let photo = $(this).data('photo');
            	PhotoDelete(photo, id);
            	event.preventDefault();
            })
		}).catch(function(error){

		})
	}
	var ImgID = 0;
function LoadByID(FirstImgID, loadMore){
	ImgID=ImgID+4;
	let photoID = ImgID+FirstImgID;
	let URL = "/photoJsonByID/"+photoID;

		loadMore.html("<span class='spinner-border spinner-border-sm' role='status'></span>");
	axios.get(URL).then(function(response){
		loadMore.html("Load More");
			$.each(response.data, function(i, item){
            	$("<div class='col-md-3 p-1'>").html(
            		"<img data-id="+item['id']+" style='height: 200px; width: 100%' src="+"http://"+item['location']+">"+
            		"<button class='btn btn-sm btn-danger DeleteBtn'  data-id="+item['id']+" data-photo="+item['location']+">Delete</button>"
            		).appendTo('#photoRow')
            })

			$('.DeleteBtn').on('click', function(event){
            	let id = $(this).data('id');
            	let photo = $(this).data('photo');
            	PhotoDelete(photo, id);
            	event.preventDefault();
            })
		}).catch(function(error){

		})

}

	$('#LoadMore').on('click', function(){
		var loadMore = $(this);
		var FirstImgID = $(this).closest('div').find('img').data('id');
		LoadByID(FirstImgID, loadMore);
	})

function PhotoDelete(OldPhotoURL, id){
	let URL="/photoDelete";
	let MyFormData = new FormData();
	MyFormData.append('OldPhotoURL', OldPhotoURL);
	MyFormData.append('id', id);
	axios.post(URL, MyFormData).then(function(response){
		if(response.status == 200 && response.data == 1){
			toastr.success('Photo Delete Success');
			$('#photoRow').empty();
			LoadPhoto();
		}else{
			toastr.error('Delete fail Try Again');
		}
	})
	.catch(function(error){
		toastr.error('Delete fail Try Again');
	})
}

	</script>
@endsection