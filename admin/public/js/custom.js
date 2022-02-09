function GetReviewsData(){
	axios.get('/GetReviewsData')
	.then(function(response){
		if(response.status == 200){
			$('#ReviewMainId').removeClass('d-none');
			$('#ReviewloaderDiv').addClass('d-none');

			$('#ReviewDataTable').DataTable().destroy()
            $('#Review_table').empty();

            var JSONData= response.data;
            $.each(JSONData, function(i, item){
            	$('<tr>').html(
            		"<td><img class='table-img' src=" + JSONData[i].img + "></td>" +
            		"<td>"+ JSONData[i].name+"</td>"+
            		"<td>"+JSONData[i].des+"</td>"+
            		"<td><a class='ReviewEditBtn' data-id=" + JSONData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                    "<td><a class='ReviewDeleteBtn' data-id=" + JSONData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
            		).appendTo('#Review_table')

            	//Review Delete
            	$('.ReviewDeleteBtn').click(function(){
            		var id = $(this).data('id');
            		$('#ReviewDeleteId').html(id);
            		$('#ReviewDeleteModal').modal('show');
            	})

            	//Review Update
            	$('.ReviewEditBtn').click(function(){
            		var id = $(this).data('id');
            		$('#ReviewEditId').html(id);
            		ReviewDetails(id);
            		$('#ReviewEditModal').modal('show');
            	})
            })

            $('#ReviewDataTable').DataTable({"order": false});
            $('.dataTables_length').addClass('bs-select');
            
		}else{
			$('#ReviewloaderDiv').addClass('d-none');
			$('#ReviewWrongDiv').removeClass('d-none');
			
		}

	})
	.catch(function(error){
		$('#ReviewloaderDiv').addClass('d-none');
		$('#ReviewWrongDiv').removeClass('d-none');
	})
}

//delete click
$('#ReviewDeleteBtn').click(function(){
	var id = $('#ReviewDeleteId').html();
	ReviewDelete(id);
})
//Delete Method
function ReviewDelete(deleteID){
	$('#ReviewDeleteBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
    axios.post('/ReviewDelete', {
            id: deleteID
        })
        .then(function(response) {
            $('#ReviewDeleteBtn').html("Yes");
            if(response.status == 200){
                if (response.data == 1) {
                    $('#ReviewDeleteModal').modal('hide');
                    toastr.success('Delete Success');
                    GetReviewsData();
                } else {
                    $('#ReviewDeleteModal').modal('hide');
                    toastr.error('Delete Fail!');
                    GetReviewsData();
                }
            }else{
                $('#ReviewDeleteModal').modal('hide');
                toastr.error('Something Wants to Wrong !');
            }
        })
        .catch(function(error) {
            $('#ReviewDeleteModal').modal('hide');
            toastr.error('Something Wants to Wrong !');
        })
}


//Insert Click
$('#ReviewAddNewBtn').click(function(){
	
	$('#ReviewAddNewModal').modal('show');
})
//Get Data For Insert
$('#ReviewAddConfirmBtn').click(function(){
	var name = $('#ReviewAddName').val();
	var des = $('#ReviewAddDes').val();
	var img = $('#ReviewAddImg').val();
	ReviewAdd(name, des, img);
})

function ReviewAdd(name, des, img){
	if(name.length==0){
		toastr.error('Review Name Is Empty!')
	}else if(des.length==0){
		toastr.error('Review Description Is Empty!')
	}else if(img.length==0){
		toastr.error('Review Image Is Empty!')
	}else{
		$('#ReviewAddConfirmBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
		axios.post('/ReviewAdd', {
			name: name,
			des: des,
			img: img
		})
		.then(function(response){
			$('#ReviewAddConfirmBtn').html("Save");
			if(response.status==200){
				if (response.data == 1) {
					$('#ReviewAddNewModal').modal('hide');
					toastr.success('Data Insert Success');
					GetReviewsData();
				}else{
					$('#ReviewAddNewModal').modal('hide');
					toastr.error('Data Insert Faill');
					GetReviewsData();
				}

			}else{
				$('#ReviewAddNewModal').modal('hide');
				toastr.error('Something Wants to Wrong!');
			}

		})
		.catch(function(error){
			$('#ReviewAddNewModal').modal('hide');
			toastr.error('Something Wants to Wrong!');
		})
	}
}


function ReviewDetails(id){
	axios.post('/ReviewDetails', {
		id: id
	})
	.then(function(response){
		
		if(response.status == 200){
		$('#ReviewEditInput').removeClass('d-none');
		$('#ReviewEditLoadingimgIcon').addClass('d-none');
		var jsonData = response.data;
		$('#ReviewUpdateName').val(jsonData[0].name);
		$('#ReviewUpdateDes').val(jsonData[0].des);
		$('#ReviewUpdateImg').val(jsonData[0].img);

		}else{
			$('#ReviewEditLoadingimgIcon').addClass('d-none');
			$('#ReviewUpdateWrongId').removeClass('d-none');
		}

	})
	.catch(function(error){
		$('#ReviewEditLoadingimgIcon').addClass('d-none');
			$('#ReviewUpdateWrongId').removeClass('d-none');
	})
}

//Update data show in form
$('#RevieweditBtn').click(function(){
	var id = $('#ReviewEditId').html();
	var name = $('#ReviewUpdateName').val();
	var des = $('#ReviewUpdateDes').val();
	var img = $('#ReviewUpdateImg').val();
	ReviewUpdate(id,name,des,img);
})
//Update Method
function ReviewUpdate(id,name,des,img){
	if(id.length==0){
		toastr.error('Review ID Not Not Found!')
	}else if(name.length==0){
		toastr.error('Review Name Is Empty!')
	}else if(des.length==0){
		toastr.error('Review Description Is Empty!')
	}else if(img.length==0){
		toastr.error('Review Image Is Empty!')
	}else{
		$('#RevieweditBtn').html("<span class='spinner-border spinner-border-sm' role='status'></span>"); //Animation...
		axios.post('/ReviewUpdate', {
			id: id,
			name: name,
			des: des,
			img: img
		})
		.then(function(response){
			$('#RevieweditBtn').html("Save");
			if(response.status==200){
				if (response.data == 1) {
					$('#ReviewEditModal').modal('hide');
					toastr.success('Data Update Success');
					GetReviewsData();
				}else{
					$('#ReviewEditModal').modal('hide');
					toastr.error('Data Update Faill');
					GetReviewsData();
				}

			}else{
				$('#ReviewEditModal').modal('hide');
				toastr.error('Something Wants to Wrong!');
			}

		})
		.catch(function(error){
			$('#ReviewEditModal').modal('hide');
			toastr.error('Something Wants to Wrong!');
		})
	}
}