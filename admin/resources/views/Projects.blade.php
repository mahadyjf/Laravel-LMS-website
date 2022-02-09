@extends('layout.app')
@section('content')

<div id="projectMainId" class="container d-none">
<div class="row">
<div class="col-md-12 p-3">

	<button id="ProjectAddNewBtn" class="btn btn-sm btn-danger my-3">Add New</button>

<table id="ProjectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>

  <tbody id="project_table">
 		
  </tbody>
</table>

</div>
</div>
</div>


<div id="ProjectloaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>





<div id="ProjectwrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Want's to Wrong!</h3>
</div>
</div>
</div>






<!-- Delete Modal -->
<div class="modal fade" id="ProjectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body p-5 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="ProjectDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="ProjectDeleteBtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>



<!-- Add New Modal -->
<div class="modal fade" id="ProjectAddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Add New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        
      	
        <div id="ProjectAddInput" class="">
        <input type="text" id="ProjectAddName" class="form-control mb-4" placeholder="Project Name" name="">
        <input type="text" id="ProjectAddDes" class="form-control mb-4" placeholder="Project Description" name="">
        <input type="text" id="ProjectAddLink" class="form-control mb-4" placeholder="Project Description" name="">
        <input type="text" id="ProjectAddImg" class="form-control mb-4" placeholder="Project Image Link" name="">
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="ProjectAddConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>



<!--Project Updata Modal -->
<div class="modal fade" id="ProjecteditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Update Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        <h5 id="ProjectEditId" class="mt-4 d-none"></h5>

        <div id="ProjectEditInput" class="d-none">
        <input type="text" id="ProjectUpdateName" class="form-control mb-4" placeholder="Project Name" name="">
        <input type="text" id="ProjectUpdateDes" class="form-control mb-4" placeholder="Project Description" name="">
        <input type="text" id="ProjectUpdateLink" class="form-control mb-4" placeholder="Project Description" name="">
        <input type="text" id="ProjectUpdateImg" class="form-control mb-4" placeholder="Project Image Link" name="">
        </div>
        <img id="ProjectEditLoadingimgIcon" class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="ProjectUpdateWrongId" class="d-none">Something Want's to Wrong!</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="ProjecteditBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	GetProjectsData();
	function GetProjectsData(){
	axios.get('/GetProjectsData')
	.then(function(response){
		if(response.status == 200){
			$('#projectMainId').removeClass('d-none');
			$('#ProjectloaderDiv').addClass('d-none');

			$('#ProjectDataTable').DataTable().destroy()
            $('#project_table').empty();

            var JSONData= response.data;
            $.each(JSONData, function(i, item){
            	$('<tr>').html(
            		"<td>"+ JSONData[i].project_name+"</td>"+
            		"<td>"+JSONData[i].project_des+"</td>"+
            		"<td><a class='projectEditBtn' data-id=" + JSONData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                    "<td><a class='projectDeleteBtn' data-id=" + JSONData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
            		).appendTo('#project_table')

            	//project Delete
            	$('.projectDeleteBtn').click(function(){
            		var id = $(this).data('id');
            		$('#ProjectDeleteId').html(id);
            		$('#ProjectDeleteModal').modal('show');
            	})

            	//project Update
            	$('.projectEditBtn').click(function(){
            		var id = $(this).data('id');
            		$('#ProjectEditId').html(id);
            		ProjectDetails(id);
            		$('#ProjecteditModal').modal('show');
            	})
            })

            $('#ProjectDataTable').DataTable({"order": false});
            $('.dataTables_length').addClass('bs-select');
            
		}else{
			$('#ProjectloaderDiv').addClass('d-none');
			$('#ProjectwrongDiv').removeClass('d-none');
			
		}

	})
	.catch(function(error){
		$('#ProjectloaderDiv').addClass('d-none');
		$('#ProjectwrongDiv').removeClass('d-none');
	})
}

//delete click
$('#ProjectDeleteBtn').click(function(){
	var id = $('#ProjectDeleteId').html();
	ProjectDelete(id);
})
//Delete Method
function ProjectDelete(deleteID){
	$('#ProjectDeleteBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
    axios.post('/ProjectDelete', {
            id: deleteID
        })
        .then(function(response) {
            $('#ProjectDeleteBtn').html("Yes");
            if(response.status == 200){
                if (response.data == 1) {
                    $('#ProjectDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    GetProjectsData();
                } else {
                    $('#ProjectDeleteModal').modal('hide');
                    toastr.error('Delete Fail!');
                    GetProjectsData();
                }
            }else{
                $('#ProjectDeleteModal').modal('hide');
                toastr.error('Something Wants to Wrong !');
            }
        })
        .catch(function(error) {
            $('#ProjectDeleteModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        })
}


//Insert Click
$('#ProjectAddNewBtn').click(function(){
	$('#ProjectAddName').val('');
	$('#ProjectAddDes').val('');
	$('#ProjectAddLink').val('');
	$('#ProjectAddImg').val('');
	$('#ProjectAddNewModal').modal('show');
})
//Get Data For Insert
$('#ProjectAddConfirmBtn').click(function(){
	var name = $('#ProjectAddName').val();
	var des = $('#ProjectAddDes').val();
	var  link = $('#ProjectAddLink').val();
	var img = $('#ProjectAddImg').val();
	ProjectAdd(name, des, link, img);
})

function ProjectAdd(name, des, link, img){
	if(name.length==0){
		toastr.error('Project Name Is Empty!')
	}else if(des.length==0){
		toastr.error('Project Description Is Empty!')
	}else if(link.length==0){
		toastr.error('Project Link Is Empty!')
	}else if(img.length==0){
		toastr.error('Project Image Is Empty!')
	}else{
		$('#ProjectAddConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
		axios.post('/ProjectAdd', {
			name: name,
			des: des,
			link: link,
			img: img
		})
		.then(function(response){
			$('#ProjectAddConfirmBtn').html("Save");
			if(response.status==200){
				if (response.data == 1) {
					$('#ProjectAddNewModal').modal('hide');
					toastr.success('Data Insert Success');
					GetProjectsData();
				}else{
					$('#ProjectAddNewModal').modal('hide');
					toastr.error('Data Insert Faill');
					GetProjectsData();
				}

			}else{
				$('#ProjectAddNewModal').modal('hide');
				toastr.error('Something Wants to Wrong!');
			}

		})
		.catch(function(error){
			$('#ProjectAddNewModal').modal('hide');
			toastr.error('Something Wants to Wrong!');
		})
	}
}


function ProjectDetails(id){
	axios.post('/ProjectDetails', {
		id: id
	})
	.then(function(response){
		
		if(response.status == 200){
		$('#ProjectEditInput').removeClass('d-none');
		$('#ProjectEditLoadingimgIcon').addClass('d-none');
		var jsonData = response.data;
		$('#ProjectUpdateName').val(jsonData[0].project_name);
		$('#ProjectUpdateDes').val(jsonData[0].project_des);
		$('#ProjectUpdateLink').val(jsonData[0].project_link);
		$('#ProjectUpdateImg').val(jsonData[0].project_img);

		}else{
			$('#ProjectEditLoadingimgIcon').addClass('d-none');
			$('#ProjectUpdateWrongId').removeClass('d-none');
		}

	})
	.catch(function(error){
		$('#ProjectEditLoadingimgIcon').addClass('d-none');
			$('#ProjectUpdateWrongId').removeClass('d-none');
	})
}

//Update data show in form
$('#ProjecteditBtn').click(function(){
	var id = $('#ProjectEditId').html();
	var name = $('#ProjectUpdateName').val();
	var des = $('#ProjectUpdateDes').val();
	var	link = $('#ProjectUpdateLink').val();
	var img = $('#ProjectUpdateImg').val();
	ProjectUpdate(id,name,des,link,img);
})
//Update Method
function ProjectUpdate(id,name,des,link,img){
	if(id.length==0){
		toastr.error('Project ID Not Not Found!')
	}else if(name.length==0){
		toastr.error('Project Name Is Empty!')
	}else if(des.length==0){
		toastr.error('Project Description Is Empty!')
	}else if(link.length==0){
		toastr.error('Project Link Is Empty!')
	}else if(img.length==0){
		toastr.error('Project Image Is Empty!')
	}else{
		$('#ProjecteditBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
		axios.post('/ProjectUpdate', {
			id: id,
			name: name,
			des: des,
			link: link,
			img: img
		})
		.then(function(response){
			$('#ProjecteditBtn').html("Save");
			if(response.status==200){
				if (response.data == 1) {
					$('#ProjecteditModal').modal('hide');
					toastr.success('Data Update Success');
					GetProjectsData();
				}else{
					$('#ProjecteditModal').modal('hide');
					toastr.error('Data Update Faill');
					GetProjectsData();
				}

			}else{
				$('#ProjecteditModal').modal('hide');
				toastr.error('Something Wants to Wrong!');
			}

		})
		.catch(function(error){
			$('#ProjecteditModal').modal('hide');
			toastr.error('Something Wants to Wrong!');
		})
	}
}

</script>
@endsection