<!DOCTYPE html>
<html>
<head>
    <?php  
    include('redirectToLoginIfNotLoggedIn.php');
    include('redirectHome_AdminOnly.php');
    include('header.php');
    include('navbar.php'); 
    ?>
    <script type="text/javascript" src="export/libs/FileSaver/FileSaver.min.js"></script>
    <script type="text/javascript" src="export/libs/js-xlsx/xlsx.core.min.js"></script>
</head>


<?php
  include 'db_connection.php';
  $table = "computer";      
  $conn = OpenCon();
  $sql = "SELECT * FROM SALVAGE_COMPUTER ORDER BY GUID";

echo '<br><center><h1>Salvage Computer Inventory</h1></center>';
echo '
<div class="col-md-12">
  <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
    <button class="close"><span aria-hidden="true">&times;</span></button>
    <span id="alert_message"></span>
  </div> 
  <div class="columns columns-right btn-group float-left">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a id="addnew" class="dropdown-item btn btn-success">Add Computer</a>
    <div id="toolbar"><a id="theComputerButton" class="dropdown-item btn btn-success">Move Selected Items</a></div>
    <div id="toolbar2">
                  <select class="form-control">
                    <option value="">Export</option>
                    <option value="all">Export All</option>
                    <option value="selected">Export Select</option>
                </select>
                </div>
  </div>
  </div>
  <table id="myComputerAssets" class="responstable" data-toggle="table" data-search="true" data-pagination="true" data-search-align="left" data-show-columns="true" data-click-to-select="true" data-trim-on-search="false" data-multiple-search="true" data-show-export="true" data-toolbar="#toolbar2">
  <thead>
    <tr>
      <th><em class="fa fa-cog"></em></th>
      
      <th class="d-none" data-field="GUID" data-sortable="true">GUID</th>

      <th data-field="ASSIGNEE" data-sortable="true">Assignee</th>

      <th data-field="ITEM_TYPE" data-sortable="true">Item Type</th>
      <th data-field="SERIAL_NO" data-sortable="true">Serial Number</th>
      <th data-field="MODEL" data-sortable="true">Model</th>
      <th data-field="MAKE" data-sortable="true">Make</th>
      <th data-field="CPU_TYPE" data-sortable="true">CPU Type</th>
      <th data-field="CPU_SPEED" data-sortable="true">CPU Speed</th>
      <th data-field="RAM" data-sortable="true">Ram</th>
      <th data-field="HARD_DRIVE" data-sortable="true">Hard Drive</th>
      <th data-field="COMMENTS" data-sortable="true">Comments</th>
      <th data-field="STATUS" data-sortable="true">Status</th>
      <th data-field="COUNTY_NO" data-sortable="true">County Number</th>

      <th data-field="MAP_LOCATION" data-sortable="true">Map Location</th>
      <th data-field="WORK_SITE" data-sortable="true">Work Site</th>
      <th data-field="BUREAU" data-sortable="true">Bureau</th>
      <th data-field="DIVISION" data-sortable="true">Division</th>
      <th data-field="PROGRAM" data-sortable="true">Program</th>
      <th data-field="UNIT_CODE" data-sortable="true">Unit Code</th>
      <th data-field="ACQ_DATE" data-sortable="true">Acquire Date</th>
      <th data-field="LAST_MOVE_DATE" data-sortable="true">Last Move Date</th>
    </tr>
  </thead>
<tbody>';

    if ($result = $conn->query($sql))
    {
      if ($result->rowCount() > 0)
      {    
        while ($row = $result->fetch())
        {
         
          echo'<tr align="center">
          <td>
            <div class="btn-group" role="group">
              <a class="edit-btn">
                <button class="btn btn-primary btn-sm edit" data-id="'.$row["GUID"].'">
                <em class="fas fa-pencil-alt"></em></button>
              </a>

              <a class="restore-btn">
                  <button class="btn btn-danger btn-sm restore" data-id="'.$row["GUID"].'">
                  <em class="fas fa-undo-alt""></em></button>
              </a>

                <input type="hidden" class="theCurrentTable" name="theCurrentTable" value="'.$table.'" />
            </div>
          </td>';
          
          echo  "<td>" . $row['GUID'] . "</td>";
 
          echo        "<td>" . $row['ASSIGNEE'] . "</td>"; 

          echo        "<td>" . $row['ITEM_TYPE'] . "</td>"; 
          echo        "<td>" . $row['SERIAL_NO'] . "</td>";
          echo        "<td>" . $row['MODEL'] . "</td>";             
          echo        "<td>" . $row['MAKE'] . "</td>";
          echo        "<td>" . $row['CPU_TYPE'] . "</td>";
          echo        "<td>" . $row['CPU_SPEED'] . "</td>";
          echo        "<td>" . $row['RAM'] . "</td>";
          echo        "<td>" . $row['HARD_DRIVE'] . "</td>";
          echo        "<td>" . $row['COMMENTS'] . "</td>";
          echo        "<td>" . $row['STATUS'] . "</td>";
          echo        "<td>" . $row['COUNTY_NO'] . "</td>";

          echo        "<td>" . $row['MAP_LOCATION'] . "</td>";
          echo        "<td>" . $row['WORK_SITE'] . "</td>";
          echo        "<td>" . $row['BUREAU'] . "</td>";
          echo        "<td>" . $row['DIVISION'] . "</td>";
          echo        "<td>" . $row['PROGRAM'] . "</td>";
          echo        "<td>" . $row['UNIT_CODE'] . "</td>";
          echo        "<td>" . $row['ACQ_DATE'] . "</td>";
          echo        "<td>" . $row['LAST_MOVE_DATE'] . "</td>";
          echo      "</tr>";


        }

        echo  '   </tr>'; 
        echo ' </tbody>

        </table>';
        }
        // if there are no records in the database, display an alert message
        else
        {
          echo " No results to display!";
        }
        
        }
        else
        {
          echo "Error: " . $conn->error;
        }
       
        echo '</div>';
        echo '</div>';

    CloseConn($conn);
?>

<body>

<script>
 $(document).ready(function()
{
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
  });


  //restore message (will move to salvage_asset table)
  $(document).on('click', '.restore', function()
  {
    var id = $(this).data('id');
    getDetails(id);
    //alert(id);
    $('#restore').modal('show');
  });

  $('#restoreForm').submit(function(e)
  {
    e.preventDefault();
    var restoreform = $(this).serialize();

    $.ajax(
    {
      method: 'POST',
      url: 's_to_c.php',
      data: restoreform,
      dataType: 'json',
      success: function(response)
      {
        $('#restore').modal('hide');
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

}); // end function

function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_salvage_computer.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      if(response.error){
        $('#edit').modal('hide');
        $('#restore').modal('hide');
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
      }
    }
  });
}

</script>

<script>
function myFunction() 
{
  location.reload();
}
</script>

</body>
</html>

<?php include("modalComputer.php")?>