$(document).ready(function()
  {
  //add
  $('#addnew').click(function()
  {
    $('#add').modal('show');
  });

$('#upload').click(function(){

                var fd = new FormData();

                var files = $('#file')[0].files[0];
                var files2 = $('#file2')[0].files[0];
                var files3 = $('#file3')[0].files[0];
                var vno = $('#vno').val();
                var assigned = $('#assigned').val();
                var license = $('#license').val();
                var make = $('#make').val();
                var model = $('#model').val();
                var year = $('#year').val();
                var housed = $('#housed').val();
                var vin = $('#vin').val();
                var unit = $('#unit').val();
                var description = $('#description').val();
                var bureau = $('#bureau').val();
                var funding = $('#funding').val();
                
                var tableHistory = $('#tableHistory').val();
                var userWhoUpdated = $('#userWhoUpdated').val();
           
                fd.append('file',files);
                fd.append('file2',files2);
                fd.append('file3',files3);
                fd.append('vno', vno);
                fd.append('assigned',assigned);
                fd.append('license', license);
                fd.append('make', make);
                fd.append('model', model);
                fd.append('year', year);
                fd.append('housed', housed);
                fd.append('vin', vin);
                fd.append('unit', unit);
                fd.append('description', description);
                fd.append('bureau', bureau);
                fd.append('funding', funding);
                
                fd.append('tableHistory', tableHistory);
                fd.append('userWhoUpdated', userWhoUpdated);
             

                fd.append('request',1);
                if(vno != '' && assigned != '' && license != '' && make != '' && model != '' && year != '' && housed != '' && vin != ''
                      && unit != '' && description != '' && bureau != '' && funding != '' && files != '' && files2 != '' && files3 != '')
                    {
                // AJAX request
                $.ajax({
                    url: 'addVehicle.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){

                        if(response != 0){
                            // Show image preview
                            //$('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
                            $.ajax({
                              method: 'POST',
                              url: 'addToHistory_Add.php',
                              data: fd,
                              contentType:false,
                              processData: false
                            });

                              myFunction();
                        }else{
                            alert('file not uploaded');
                        }
                      
                    }
                });
              } else {
                alert("All Fields are Required");
              }
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
    var fd = new FormData(this);
   
    $.ajax({
      method: 'POST',
      url: 'editVehicle.php',
      data:fd,
    contentType:false,
    processData:false,
      success:function(response){
         
      if(response != 0){
             
                 alert("error")
               }else{
    
                $.ajax({
                  method: 'POST',
                  url: 'addToHistory.php',
                  data: fd,
                  contentType:false,
                  processData: false
                });
                
                     $('#edit').modal('hide');
                myFunction();
                  
                }
            
     }
  });
  
  });


//info
 $(document).on('click', '.info', function(){
    var id = $(this).data('id');
    getInfo(id);
    $('#info').modal('show');
  });

  //hide-delete message (will move to salvage_asset table)
  $(document).on('click', '.delete', function()
  {
    var id = $(this).data('id');
    getDetails(id);
    //alert(id);
    $('#delete').modal('show');
  });

  $('#salvageForm').submit(function(e)
  {
    e.preventDefault();
    var salvageform = $(this).serialize();

    $.ajax(
    {
      method: 'POST',
      url: 'v_to_s.php',
      data: salvageform,
      dataType: 'json',
      success: function(response)
      {
        $('#delete').modal('hide');
        if(response.error)
        {
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else
        {
          $('#alert').show();
		      $('#alert_message').html(response.message);
		      myFunction();
        }
      }
    });

  });
  
  //history info
  $(document).on('click', '.history', function(){
    var id = $(this).data('id');
    var theCurrentTable = $('.theCurrentTable').val();

    $.ajax({
      method: 'POST',
      url: 'modalHistory.php',
      data: {id: id, theCurrentTable: theCurrentTable},
      dataType: 'json',
      success: function(response){
        if(!response.error){

          $('#modalHistoryBody').html(response.tableData);
          $('#modalHistory').modal('show');
        }
      }
    })
  });

}); // end function

  function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_vehicle.php',
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
        $('#vehicle_uploaded_image').html('<img src='+response.data.VEHICLE_IMAGE+' width="110" height="75">');
        $('#employee_uploaded_image').html('<img src='+response.data.EMPLOYEE_IMAGE+' width="110" height="75">');
        $('#location_uploaded_image').html('<img src='+response.data.LOCATION_IMAGE+' width="110" height="75">');
       
      }
    }
  });
}


  function getInfo(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_vehicle.php',
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
        $('#vehicle_image').html('<img src='+response.data.VEHICLE_IMAGE+' width="110" height="75">');
        $('#employee_image').html('<img src='+response.data.EMPLOYEE_IMAGE+' width="110" height="75">');
        $('#location_image').html('<img src='+response.data.LOCATION_IMAGE+' width="110" height="75">');

      }
    }
  });
}

function myFunction()
{
  location.reload();
}