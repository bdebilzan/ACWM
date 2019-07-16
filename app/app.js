$(document).ready(function(){
	fetch();
	//add
	$('#addnew').click(function(){
		$('#add').modal('show');
	});
	$('#addForm').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		//console.log(addform);
		$.ajax({
			method: 'POST',
			url: 'add.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				$('#add').modal('hide');
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
			}
		});
	});
	//

	//edit
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#edit').modal('show');
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: 'edit.php',
			data: editform,
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}

				$('#edit').modal('hide');
			}
		});
	});
	

	//delete
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#delete').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: 'delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
				
				$('#delete').modal('hide');
			}
		});
	});
	//

	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});

});

function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch.php',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}

function getDetails(id){
	$.ajax({
		method: 'POST',
		url: 'fetch_row.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.id').val(response.data.GUID);
				$('.vno').val(response.data.VNO);
				$('.assigned').val(response.data.ASSIGNEDTO);
				$('.license').val(response.data.LICENSE);
				$('.make').val(response.data.MAKE);
				$('.model').val(response.data.MODEL);
				$('.year').val(response.data.YEAR);
				$('.housed').val(response.data.HOUSED);
				$('.vin').val(response.data.VIN);
				$('.unit').val(response.data.UNIT);
				$('.description').val(response.data.DESCRIPTION);
				$('.bureau').val(response.data.BUREAU);
				$('.funding').val(response.data.FUNDINGORG);
				// $('.make').html(response.data.firstname + ' ' + response.data.lastname);
			}
		}
	});
}