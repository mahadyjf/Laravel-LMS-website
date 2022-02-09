@extends('layout.app')
@section('content')

<div id="ContactMainId" class="container d-none">
<div class="row">
<div class="col-md-12 p-3">

	

<table id="ContactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Name</th>
    <th class="th-sm">Mobile</th>
    <th class="th-sm">Email</th>
	  <th class="th-sm">Message</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>

  <tbody id="Contact_table">
 		
  </tbody>
</table>

</div>
</div>
</div>


<div id="ContactloaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>





<div id="ContactwrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Want's to Wrong!</h3>
</div>
</div>
</div>






<!-- Delete Modal -->
<div class="modal fade" id="ContactDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body p-5 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="ContactDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="ContactDeleteBtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  GetContactData();

  function GetContactData(){
  axios.get('/GetContactData')
  .then(function(response){
    if(response.status == 200){
      $('#ContactMainId').removeClass('d-none');
      $('#ContactloaderDiv').addClass('d-none');

      $('#ContactDataTable').DataTable().destroy();
      $('#Contact_table').empty()
      var JSONData = response.data;
      $.each(JSONData, function(i, item){
        $('<tr>').html(
          "<td>"+JSONData[i].contact_name+"</td>"+
          "<td>"+JSONData[i].contact_mobile+"</td>"+
          "<td>"+JSONData[i].contact_email+"</td>"+
          "<td>"+JSONData[i].contact_message+"</td>"+
          "<td><a class='contactDeleteBtn' data-id=" + JSONData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
          ).appendTo('#Contact_table')
      })

      //delete
      $('.contactDeleteBtn').click(function(){
        var id = $(this).data('id');
        $('#ContactDeleteId').html(id);
        $('#ContactDeleteModal').modal('show');
      })

      $('#ContactDataTable').DataTable({"order": false});
      $('.dataTables_length').addClass('bs-select');

    }else{

      $('#ContactloaderDiv').addClass('d-none');
      $('#ContactwrongDiv').removeClass('d-none');
    }

  })
  .catch(function(error){
    $('#ContactloaderDiv').addClass('d-none');
    $('#ContactwrongDiv').removeClass('d-none');
  })
}
//delete
$('#ContactDeleteBtn').click(function(){
  var id = $('#ContactDeleteId').html();
  ContactDelete(id);
})

function ContactDelete(id){
$('#ContactDeleteBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
axios.post('/ContactDelete', {
  id: id
})
.then(function(response){
  $('#ContactDeleteBtn').html("Yes");
            if(response.status == 200){
                if (response.data == 1) {
                    $('#ContactDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    GetContactData()
                } else {
                    $('#ContactDeleteModal').modal('hide');
                    toastr.error('Delete Fail!');
                    GetContactData()
                }
            }else{
                $('#ContactDeleteModal').modal('hide');
                toastr.error('Something Wants to Wrong !');
            }
})
.catch(function(error){

})
}
</script>
@endsection