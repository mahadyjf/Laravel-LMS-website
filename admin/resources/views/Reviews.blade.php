@extends('layout.app')
@section('content')

<div id="ReviewMainId" class="container d-none">
<div class="row">
<div class="col-md-12 p-3">

	<button id="ReviewAddNewBtn" class="btn btn-sm btn-danger my-3">Add New</button>

<table id="ReviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>

  <tbody id="Review_table">
 		
  </tbody>
</table>

</div>
</div>
</div>


<div id="ReviewloaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
	<img class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
</div>
</div>
</div>





<div id="ReviewWrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
	<h3>Something Want's to Wrong!</h3>
</div>
</div>
</div>






<!-- Delete Modal -->
<div class="modal fade" id="ReviewDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body p-5 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="ReviewDeleteId" class="mt-4 d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
        <button id="ReviewDeleteBtn" type="button" class="btn btn-danger btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>



<!-- Add New Modal -->
<div class="modal fade" id="ReviewAddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Add New Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        
      	
        <div id="ReviewAddInput" class="">
        <input type="text" id="ReviewAddName" class="form-control mb-4" placeholder="Review Name" name="">
        <input type="text" id="ReviewAddDes" class="form-control mb-4" placeholder="Review Description" name="">
        <input type="text" id="ReviewAddImg" class="form-control mb-4" placeholder="Review Image Link" name="">
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="ReviewAddConfirmBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>



<!--Review Updata Modal -->
<div class="modal fade" id="ReviewEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-titl">Update Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
   
      <div class="modal-body p-5 text-center">
        <h5 id="ReviewEditId" class="mt-4 d-none"></h5>

        <div id="ReviewEditInput" class="d-none">
        <input type="text" id="ReviewUpdateName" class="form-control mb-4" placeholder="Review Name" name="">
        <input type="text" id="ReviewUpdateDes" class="form-control mb-4" placeholder="Review Description" name="">
        <input type="text" id="ReviewUpdateImg" class="form-control mb-4" placeholder="Review Image Link" name="">
        </div>
        <img id="ReviewEditLoadingimgIcon" class="loadingimg-icon m-5" src="{{asset('images/loader.svg')}}">
        <h5 id="ReviewUpdateWrongId" class="d-none">Something Want's to Wrong!</h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
        <button id="RevieweditBtn" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
GetReviewsData();
</script>
@endsection