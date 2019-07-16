$(document).ready(function()
  {
  //add
  $('#addnew').click(function()
  {
    $('#add').modal('show');
  });

$('#upload').click(function(){

                var fd = new FormData();

                var updateHistory = false;

                var files = $('#file')[0].files[0];
                var files2 = $('#file2')[0].files[0];
                var files3 = $('#file3')[0].files[0];
                var assignee = $('#assignee').val();
                var item_type = $('#item_type').val();
                var serial_no = $('#serial_no').val();
                var model = $('#model').val();
                var make = $('#make').val();
                var cpu_type = $('#cpu_type').val();
                var cpu_speed = $('#cpu_speed').val();
                var ram = $('#ram').val();
                var hard_drive = $('#hard_drive').val();
                var comments = $('#comments').val();
                var status = $('#status').val();
                var county_no = $('#county_no').val();
                var map_location = $('#map_location').val();
                var work_site = $('#work_site').val();
                var bureau = $('#bureau').val();
                var division = $('#division').val();
                var program = $('#program').val();
                var unit_code = $('#unit_code').val();
                
                var tableHistory = $('#tableHistory').val();
                var userWhoUpdated = $('#userWhoUpdated').val();
           
                fd.append('file',files);
                fd.append('file2',files2);          
                fd.append('file3',files3);
                fd.append('assignee', assignee);
                fd.append('item_type',item_type);
                fd.append('serial_no', serial_no);
                fd.append('model', model);
                fd.append('make', make);
                fd.append('cpu_type', cpu_type);
                fd.append('cpu_speed', cpu_speed);
                fd.append('ram', ram);
                fd.append('hard_drive', hard_drive);
                fd.append('comments', comments);
                fd.append('status', status);
                fd.append('county_no', county_no);
                fd.append('map_location', map_location);
                fd.append('work_site', work_site);
                fd.append('bureau', bureau);
                fd.append('division', division);
                fd.append('program', program);
                fd.append('unit_code', unit_code);
                
                fd.append('tableHistory', tableHistory);
                fd.append('userWhoUpdated', userWhoUpdated);
             

                fd.append('request',1);
                if(assignee != '' && item_type != '' && serial_no != '' && model != '' && make != '' && cpu_speed != '' && cpu_type != '' && ram != ''
                      && hard_drive != '' && comments != '' && status != '' &&  county_no != '' && map_location != '' && work_site != '' && bureau != '' 
                      && division != '' && program != '' && unit_code != ''  
                      && file != '' && file2 != '' && file3 != '')
                    {
                // AJAX request
                    $.ajax({
                        url: 'addComputer.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response){
                          // debugger;

                            if(response != 0){
                                // Show image preview
                                //$('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");

                                  // updateHistory = true;
                                  // alert(updateHistory + " test1");
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

                    // alert(updateHistory + " test2");
                    
                    // if (updateHistory)
                    //   $.ajax({
                    //     method: 'POST',
                    //     url: 'addToHistory.php',
                    //     data: fd,
                    //     contentType: false,
                    //     processData: false
                    //   });

                    //   alert(updateHistory + " test");
                } else {
                    alert("All Fields are Required");
                  }
            });
//

 

// //edit
  $(document).on('click', '.edit', function(){
    var id = $(this).data('id');
    getDetails(id);

    //alert(id)
    $('#edit').modal('show');
  });

    $('#editForm').submit(function(e){
    e.preventDefault();
    //var editform = $(this).serialize();
    // var updateHistory = false;

    var fd = new FormData(this);
    
    $.ajax({
      method: 'POST',
      url: 'editComputer.php',
      data: fd,
    contentType:false,
    processData:false,
      success:function(response){
          //alert("hi")
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

    // if (updateHistory) {
    //   alert("test");
    //   $.ajax({
    //     method: 'POST',
    //     url: "addToHistory.php",
    //     data: fd
    //   });
    // }
  
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
      url: 'c_to_s.php',
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
          if(response.tableData !== ''){
            $('#modalHistoryBody').html(response.tableData);
            $('#modalHistory').modal('show');
          }
          else{
            $('#modalHistoryEmpty').modal('show');
          }
        }
      }
    })
  });

 }); // end function

  function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_computer.php',
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
        $('.assignee').val(response.data.ASSIGNEE);
        $('.item_type').val(response.data.ITEM_TYPE);
        $('.serial_no').val(response.data.SERIAL_NO);
        $('.model').val(response.data.MODEL);
        $('.make').val(response.data.MAKE);
        $('.cpu_type').val(response.data.CPU_TYPE);
        $('.cpu_speed').val(response.data.CPU_SPEED);
        $('.ram').val(response.data.RAM);
        $('.hard_drive').val(response.data.HARD_DRIVE);
        $('.comments').val(response.data.COMMENTS);
        $('.status').val(response.data.STATUS);
        $('.county_no').val(response.data.COUNTY_NO);
        $('.map_location').val(response.data.MAP_LOCATION);
        $('.work_site').val(response.data.WORK_SITE);
        $('.bureau').val(response.data.BUREAU);
        $('.division').val(response.data.DIVISION);
        $('.program').val(response.data.PROGRAM);
        $('.unit_code').val(response.data.UNIT_CODE); 
        $('#assignee_image').html('<img src='+response.data.ASSIGNEE_IMAGE+' width="110" height="75">');  
        $('#item_image').html('<img src='+response.data.ITEM_IMAGE+' width="110" height="75">');
        $('#location_image').html('<img src='+response.data.LOCATION_IMAGE+' width="110" height="75">');
       
      }
    }
  });
}


  function getInfo(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_computer.php',
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
        $('#assignee_imageInfo').html('<img src='+response.data.ASSIGNEE_IMAGE+' width="110" height="75">');  
        $('#item_imageInfo').html('<img src='+response.data.ITEM_IMAGE+' width="110" height="75">');
        $('#location_imageInfo').html('<img src='+response.data.LOCATION_IMAGE+' width="110" height="75">');
        
        
      }
    }
  });
}

function myFunction()
{
  location.reload();
}