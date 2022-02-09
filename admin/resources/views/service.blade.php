@extends('layout.app')
@section('content')

<div id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-3">

	<button id="addNewBtn" class="btn btn-sm btn-danger my-3">Add New</button>

<table id="ServiceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>

  <tbody id="service_table">
 
  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>





<div id="wrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Want's to Wrong!</h3>
</div>
</div>
</div>





<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body p-5 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="serviceDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="deleteBtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Updata Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Update Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        <h5 id="serviceEditId" class="mt-4 d-none"></h5>

        <div id="serviceEditInput" class="d-none">
        <input type="text" id="ServiceName" class="form-control mb-4" placeholder="Service Name" name="">
        <input type="text" id="ServiceDes" class="form-control mb-4" placeholder="Service Description" name="">
        <input type="text" id="ServiceImg" class="form-control mb-4" placeholder="Service Image Link" name="">
        </div>
        <img id="serviceEditLoadingimgIcon" class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="serviceWrongId" class="d-none">Something Want's to Wrong!</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="editBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>



<!-- Add New Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Add New Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        
      	
        <div id="serviceAddInput" class="">
        <input type="text" id="ServiceAddName" class="form-control mb-4" placeholder="Service Name" name="">
        <input type="text" id="ServiceAddDes" class="form-control mb-4" placeholder="Service Description" name="">
        <input type="text" id="ServiceAddImg" class="form-control mb-4" placeholder="Service Image Link" name="">
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="AddConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('script')
<script type="text/javascript">
	GetServiceData();


	
//For Service Table Get Data
function GetServiceData() {
    axios.get('/GetServiceData')
        .then(function(response) {

            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#ServiceDataTable').DataTable().destroy()
                $('#service_table').empty();

                var JSONData = response.data;

                $.each(JSONData, function(i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + JSONData[i].service_img + "></td>" +
                        "<td>" + JSONData[i].service_name + "</td>" +
                        "<td>" + JSONData[i].service_des + "</td>" +
                        "<td><a class='serviceEditBtn' data-id=" + JSONData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='serviceDeleteBtn' data-id=" + JSONData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#service_table');
                });



                //Service data delet click macanesom
                $('.serviceDeleteBtn').click(function() {
                    var id = $(this).data('id');

                    $('#serviceDeleteId').html(id);
                    $('#deleteModal').modal('show');
                })
               

                //Service data Edit click
                $('.serviceEditBtn').click(function(){
                    var id= $(this).data('id');
                    $('#serviceEditId').html(id);
                    ServiceUpdateDetails(id);
                    $('#editModal').modal('show');
                })
                
                 $('#ServiceDataTable').DataTable({"order": false});
                $('.dataTables_length').addClass('bs-select');

            } else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }

        })
        .catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
}



 //delete Service ID Pssing
 $('#deleteBtn').click(function() {
    var id = $('#serviceDeleteId').html();
    ServiceDelete(id);
})

//For Service Delete
function ServiceDelete(deleteId) {
    $('#deleteBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
    axios.post('/ServiceDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#deleteBtn').html("Yes");
            if(response.status == 200){
                if (response.data == 1) {
                    $('#deleteModal').modal('hide');
                    toastr.success('Delete Success');
                    GetServiceData();
                } else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Delete Fail!');
                    GetServiceData();
                }
            }else{
                $('#deleteModal').modal('hide');
                toastr.error('Something Wants to Wrong !');
            }
        })
        .catch(function(error) {
            $('#deleteModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        })
}


//For Each Service Update Details
function ServiceUpdateDetails(detailsId) {
    axios.post('/ServiceDetails', {
            id: detailsId
        })
        .then(function(response) {
           if(response.status == 200){
            $("#serviceEditInput").removeClass('d-none');
            $("#serviceEditLoadingimgIcon").addClass('d-none');
           var $JSONData = response.data;
           $('#ServiceName').val($JSONData[0].service_name);
           $('#ServiceDes').val($JSONData[0].service_des);
           $('#ServiceImg').val($JSONData[0].service_img);
           }else{
            $("#serviceEditLoadingimgIcon").addClass('d-none');
            $("#serviceWrongId").removeClass('d-none');
           }
        })
        .catch(function(error) {
            $("#serviceEditLoadingimgIcon").addClass('d-none');
            $("#serviceWrongId").removeClass('d-none');
        })
}



//Update Service 
 $('#editBtn').click(function() {
    var id = $('#serviceEditId').html();
    var name = $('#ServiceName').val();
    var des = $('#ServiceDes').val();
    var img = $('#ServiceImg').val();
    ServiceUpdate(id,name,des,img);
 })

//For Service Update 
function ServiceUpdate(serviceId,serviceName,serviceDes,serviceImg) {
        
        if(serviceId.length == 0){
            toastr.error('Service ID Not Found!');
        }else if(serviceName.length==0){
            toastr.error('Service Name Is Empty!');
        }else if(serviceDes.length==0){
            toastr.error('Service Description Is Empty!');
        }else if(serviceImg.length==0){
            toastr.error('Service Image Is Empty!');
        }else{
            $('#editBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
            axios.post('/ServiceUpdate', {
                    id: serviceId,
                    name: serviceName,
                    des: serviceDes,
                    img: serviceImg
                })
                .then(function(response) {
                    $('#editBtn').html("Save");
                    if(response.status == 200){
                         if (response.data == 1) {
                            $('#editModal').modal('hide');
                            toastr.success('Update Success');
                            GetServiceData();
                        } else {
                            $('#editModal').modal('hide');
                            toastr.error('Update Fail!');
                            GetServiceData();
                        }
                    }else{
                        $('#editModal').modal('hide');
                        toastr.error('Something Wants to Wrong !');
                    }
                })

                .catch(function(error) {
                   $('#editModal').modal('hide');
                    toastr.error('Something Wants to Wrong !');
                })
        }
    }

//Add new Button click
$("#addNewBtn").click(function(){
    $("#AddNewModal").modal('show');
})
//ADD Service Get Data From Form 
 $('#AddConfirmBtn').click(function() {
    
    var name = $('#ServiceAddName').val();
    var des = $('#ServiceAddDes').val();
    var img = $('#ServiceAddImg').val();
    ServiceAdd(name,des,img);
 })

 //For Add New Service  
function ServiceAdd(serviceName,serviceDes,serviceImg) {
        
        if(serviceName.length==0){
            toastr.error('Service Name Is Empty!');
        }else if(serviceDes.length==0){
            toastr.error('Service Description Is Empty!');
        }else if(serviceImg.length==0){
            toastr.error('Service Image Is Empty!');
        }else{
            $('#AddConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
            axios.post('/ServiceAdd', {
                    
                    name: serviceName,
                    des: serviceDes,
                    img: serviceImg
                })
                .then(function(response) {
                    $('#AddConfirmBtn').html("Save");
                    if(response.status == 200){
                         if (response.data == 1) {
                            $('#AddNewModal').modal('hide');
                            toastr.success('Insert Success');
                            GetServiceData();
                        } else {
                            $('#AddNewModal').modal('hide');
                            toastr.error('Insert Fail!');
                            GetServiceData();
                        }
                    }else{
                        $('#AddNewModal').modal('hide');
                        toastr.error('Something Wants to Wrong !');
                    }
                })

                .catch(function(error) {
                   $('#AddNewModal').modal('hide');
                    toastr.error('Something Wants to Wrong !');
                })
        }
    }
</script>
@endsection
