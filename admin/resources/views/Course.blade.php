@extends('layout.app')
@section('content')
<div id="CourseMainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
	<button id="addNewCourseBtn" class="btn btn-sm btn-danger my-3">Add New</button>

<table id="CourseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enroll</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="Course_table">
	

	
  </tbody>
</table>

</div>
</div>
</div>




<div id="CourseloaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>





<div id="CoursewrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Want's to Wrong!</h3>
</div>
</div>
</div>


<!-- Add New Course Modal -->
<div class="modal fade" id="AddNewCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    	<h5 class="modal-title">Add New Course</h5>
    	<button type="button" class="close" data-dismiss="modal" aria-label="close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
   
      <div class="modal-body text-center">

        <div class="container">
        	<div class="row">
        		<div class="col-md-6">
        			<input type="text" id="CourseAddName" class="form-control mb-3" placeholder="Course Name">
        			<input type="text" id="CourseAddDes" class="form-control mb-3" placeholder="Course Description">
        			<input type="text" id="CourseAddFee" class="form-control mb-3" placeholder="Course Fee">
        			<input type="text" id="CourseAddEnroll" class="form-control mb-3" placeholder="Course Enroll">
        		</div>
        		<div class="col-md-6">
        			<input type="text" id="CourseAddClass" class="form-control mb-3" placeholder="Course Class">
        			<input type="text" id="CourseAddLink" class="form-control mb-3" placeholder="Course Link">
        			<input type="text" id="CourseAddImg" class="form-control mb-3" placeholder="Course Img">
        		</div>
        	</div>
        </div>
        

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="AddCourseConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>




<!-- Update Course Modal -->
<div class="modal fade" id="UpdateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    	<h5 class="modal-title">Update Course</h5>
    	<button type="button" class="close" data-dismiss="modal" aria-label="close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
   
      <div class="modal-body text-center">
      	
        <div id="UpdateCourseInput" class="container d-none">
        	<h5 id="CourseUpdateId" class="modal-title d-none"></h5>
        	<div class="row">
        		<div class="col-md-6">
        			<input type="text" id="CourseUpdateName" class="form-control mb-3" placeholder="Course Name">
        			<input type="text" id="CourseUpdateDes" class="form-control mb-3" placeholder="Course Description">
        			<input type="text" id="CourseUpdateFee" class="form-control mb-3" placeholder="Course Fee">
        			<input type="text" id="CourseUpdateEnroll" class="form-control mb-3" placeholder="Course Enroll">
        		</div>
        		<div class="col-md-6">
        			<input type="text" id="CourseUpdateClass" class="form-control mb-3" placeholder="Course Class">
        			<input type="text" id="CourseUpdateLink" class="form-control mb-3" placeholder="Course Link">
        			<input type="text" id="CourseUpdateImg" class="form-control mb-3" placeholder="Course Img">
        		</div>
        	</div>
        </div>
        <img id="CourseEditLoadingimgIcon" class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="CourseWrongId" class="d-none">Something Want's to Wrong!</h5>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="UpdateCourseConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>




<!-- Delete Modal -->
<div class="modal fade" id="CourseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body p-5 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="CourseDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="CoursedeleteBtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>






@endsection

@section('script')
<script type="text/javascript">
	GetCoursesData();

	function GetCoursesData(){
    axios.get('/GetCoursesData')
    .then(function(response){
        if(response.status == 200){
            $('#CourseMainDiv').removeClass('d-none');
            $('#CourseloaderDiv').addClass('d-none');

            $('#CourseDataTable').DataTable().destroy()
            $('#Course_table').empty()

            var JSONData = response.data;
            $.each(JSONData, function(i, item){
                $('<tr>').html(
                    "<td>"+JSONData[i].course_name+"</td>"+
                    "<td>"+JSONData[i].course_fee+"</td>"+
                    "<td>"+JSONData[i].course_totalclass+"</td>"+
                    "<td>"+JSONData[i].course_totalenroll+"</td>"+
                    "<td><a class='CoursEditBtn' data-id="+ JSONData[i].id +"  ><i class='fas fa-edit'></i></a></td>"+
                    "<td><a class='CoursDeleteBtn' data-id=" + JSONData[i].id + "  ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#Course_table');
            });

                //Delete Model
                $('.CoursDeleteBtn').click(function(){
                     var id = $(this).data('id');
                     $('#CourseDeleteId').html(id);
                     $('#CourseDeleteModal').modal('show');
                })

                //Update Model
                $('.CoursEditBtn').click(function(){
                     var id = $(this).data('id');
                     $('#CourseUpdateId').html(id);
                     GetCourseDetails(id);
                     $('#UpdateCourseModal').modal('show');
                })

                $('#CourseDataTable').DataTable({"order": false});
                $('.dataTables_length').addClass('bs-select');

        }else{
            $('#CourseloaderDiv').addClass('d-none');
            $('#CoursewrongDiv').removeClass('d-none');
        }

    })
    .catch(function(error) {
            $('#CourseloaderDiv').addClass('d-none');
            $('#CoursewrongDiv').removeClass('d-none');
        });
}


//Insert Button Click
$('#addNewCourseBtn').click(function(){
    $('#AddNewCourseModal').modal('show');
})

//Get Insert Data From Form ID
$('#AddCourseConfirmBtn').click(function(){
    var Name   = $('#CourseAddName').val();
    var Des    = $('#CourseAddDes').val();
    var Fee    = $('#CourseAddFee').val();
    var Enroll = $('#CourseAddEnroll').val();
    var Class  = $('#CourseAddClass').val();
    var Link   = $('#CourseAddLink').val();
    var Img    = $('#CourseAddImg').val();
    CourseAdd(Name,Des,Fee,Enroll,Class,Link,Img);
})

function CourseAdd(Coursename,Coursedes,Coursefee,Coursetotalenroll,CoursetotalClass,Courselink,Courseimg){
    if(Coursename.length == 0){
        toastr.error('Course Name Is Empty!')
    }else if(Coursedes.length == 0){
        toastr.error('Course Description Is Empty!')
    }else if(Coursefee.length == 0){
        toastr.error('Course Fee Is Empty!')
    }else if(Coursetotalenroll.length == 0){
        toastr.error('Course Enroll Is Empty!')
    }else if(CoursetotalClass.length == 0){
        toastr.error('Course Class Is Empty!')
    }else if(Courselink.length == 0){
        toastr.error('Course Link Is Empty!')
    }else if(Courseimg.length == 0){
        toastr.error('Course Img Is Empty!')
    }else{
        $('#AddCourseConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>");//Animation

        axios.post('/CourseAdd', {
            name: Coursename,
            des: Coursedes,
            fee: Coursefee,
            totalenroll: Coursetotalenroll,
            totalClass: CoursetotalClass,
            link: Courselink,
            img: Courseimg,
        })
        .then(function(response){
            $('#AddCourseConfirmBtn').html("Save");
            if(response.status == 200){
                if(response.data == 1){
                    $('#AddNewCourseModal').modal('hide');
                    toastr.success('Insert Success!')
                    GetCoursesData()

                }else{
                    $('#AddNewCourseModal').modal('hide');
                    toastr.error('Insert faill!')
                    GetCoursesData()
                }

            }else{
                 $('#AddNewCourseModal').modal('hide');
                    toastr.error('Something Wants to Wrong !');
            }
        })
        .catch(function(error){
            $('#AddNewCourseModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        })
    }
}
//Course Delete
$('#CoursedeleteBtn').click(function(){
    var id = $('#CourseDeleteId').html();
    CourseDelete(id);
})
function CourseDelete(id){
    $('#AddCourseConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>");//Animation
    axios.post('/CourseDelete', {
        id: id
    })
    .then(function(response){
        $('#AddCourseConfirmBtn').html("Yes");
        if(response.status == 200){
            if(response.data == 1){
                $('#CourseDeleteModal').modal('hide');
                toastr.success('Delete Success');
                GetCoursesData()
            }else{
                $('#CourseDeleteModal').modal('hide');
                toastr.error('Delete faill');
                GetCoursesData()
            }
        }else{
            $('#CourseDeleteModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        }
    })
    .catch(function(error){
        $('#CourseDeleteModal').modal('hide');
        toastr.error('Something Wants to Wrong !');
    })
}

//GetCourseDetails for update
function GetCourseDetails(UpdateId){
    axios.post('/CourseDetails', {
        id: UpdateId
    })
    .then(function(response){
        if(response.status == 200){
            $("#UpdateCourseInput").removeClass('d-none');
            $("#CourseEditLoadingimgIcon").addClass('d-none');
            var JSONData = response.data;
            $('#CourseUpdateName').val(JSONData[0].course_name);
            $('#CourseUpdateDes').val(JSONData[0].course_des);
            $('#CourseUpdateFee').val(JSONData[0].course_fee);
            $('#CourseUpdateEnroll').val(JSONData[0].course_totalenroll);
            $('#CourseUpdateClass').val(JSONData[0].course_totalclass);
            $('#CourseUpdateLink').val(JSONData[0].course_link);
            $('#CourseUpdateImg').val(JSONData[0].course_img);

        }else{

            $("#CourseEditLoadingimgIcon").addClass('d-none');
            $("#CourseWrongId").removeClass('d-none');
        }
    })
    .catch(function(error){
        $("#CourseEditLoadingimgIcon").addClass('d-none');
        $("#CourseWrongId").removeClass('d-none');
    })
}

//update click
$('#UpdateCourseConfirmBtn').click(function(){
    var id = $('#CourseUpdateId').html();
    var Name   = $('#CourseUpdateName').val();
    var Des    = $('#CourseUpdateDes').val();
    var Fee    = $('#CourseUpdateFee').val();
    var Enroll = $('#CourseUpdateEnroll').val();
    var Class  = $('#CourseUpdateClass').val();
    var Link   = $('#CourseUpdateLink').val();
    var Img    = $('#CourseUpdateImg').val();
    CourseUpdate(id,Name,Des,Fee,Enroll,Class,Link,Img);
})

//Update course
function CourseUpdate(CourseID,Coursename,Coursedes,Coursefee,Coursetotalenroll,CoursetotalClass,Courselink,Courseimg){
    if(CourseID.length == 0){
        toastr.error('Course ID Is Not Found!')
    }
    else if(Coursename.length == 0){
        toastr.error('Course Name Is Empty!')
    }else if(Coursedes.length == 0){
        toastr.error('Course Description Is Empty!')
    }else if(Coursefee.length == 0){
        toastr.error('Course Fee Is Empty!')
    }else if(Coursetotalenroll.length == 0){
        toastr.error('Course Enroll Is Empty!')
    }else if(CoursetotalClass.length == 0){
        toastr.error('Course Class Is Empty!')
    }else if(Courselink.length == 0){
        toastr.error('Course Link Is Empty!')
    }else if(Courseimg.length == 0){
        toastr.error('Course Img Is Empty!')
    }else{
        $('#UpdateCourseConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>");//Animation
        axios.post('/CourseUpdate', {
            id: CourseID,
            name: Coursename,
            des: Coursedes,
            fee: Coursefee,
            totalenroll: Coursetotalenroll,
            totalClass: CoursetotalClass,
            link: Courselink,
            img: Courseimg,
        })
        .then(function(response){
            $('#UpdateCourseConfirmBtn').html("Save");
            if(response.status == 200){
                if(response.data == 1){
                    $('#UpdateCourseModal').modal('hide');
                     toastr.success('Update Success');
                    GetCoursesData()
                }else{
                    $('#UpdateCourseModal').modal('hide');
                     toastr.error('Update faill');
                    GetCoursesData()
                }
            }else{
                $('#UpdateCourseModal').modal('hide');
                toastr.error('Something Wants to Wrong !');
            }
        })
        .catch(function(error){
            $('#UpdateCourseModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        })
    }
}
</script>
@endsection