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
        
  $conn = OpenCon();
  $sql = "SELECT * FROM SALVAGE_VEHICLE ORDER BY GUID";

echo '<br><center><h1>Salvage Vehicle Directory</h1></center>';
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
      <a class="dropdown-item" href="#">Export</a>
      <a class="dropdown-item" href="#">Other</a>
    </div>
  </div>

      <table class="responstable" data-toggle="table" data-search="true" data-pagination="true" data-search-align="left" data-show-columns="true">
        <thead>
          <tr>
            <th><em class="fa fa-cog"></em></th>
            <th data-sortable="true">VNO</th>
            <th data-sortable="true">Assigned To</th>
            <th data-sortable="true">License</th>
            <th data-sortable="true">Make</th>
            <th data-sortable="true">Model</th>
            <th data-sortable="true">Year</th>
            <th data-sortable="true">Housed</th>
            <th data-sortable="true">VIN</th>
            <th data-sortable="true">Unit</th>
            <th data-sortable="true">Description</th>
            <th data-sortable="true">Bureau</th>
            <th data-sortable="true">Funding Org</th>
          </tr>
        </thead>
      <tbody>';

        if ($result = $conn->query($sql))
        {
          if ($result->rowCount() > 0) // display records if there are records to display
        {
          while ($row = $result->fetch())
        {
          echo'<tr align="center">
          <td>
          <div class="btn-group" role="group">
          <a class="edit-btn">
            <button class="btn btn-primary btn-sm edit" data-id="'.$row["GUID"].'" >
            <em class="fas fa-pencil-alt"></em></button>
          </a>

          <a class="delete-btn">
            <button class="btn btn-danger btn-sm restore" data-id="'.$row["GUID"].'" >
            <em class="fas fa-undo-alt""></em></button>
          </a>
        </div>
          </td>';
                            
          echo        "<td>" . $row['VNO'] . "</td>";
          echo        "<td>" . $row['ASSIGNEDTO'] . "</td>";
          echo        "<td>" . $row['LICENSE'] . "</td>";
          echo        "<td>" . $row['MAKE'] . "</td>";
          echo        "<td>" . $row['MODEL'] . "</td>";
          echo        "<td>" . $row['YEAR'] . "</td>";
          echo        "<td>" . $row['HOUSED'] . "</td>";
          echo        "<td>" . $row['VIN'] . "</td>";
          echo        "<td>" . $row['UNIT'] . "</td>";
          echo        "<td>" . $row['DESCRIPTION'] . "</td>";
          echo        "<td>" . $row['BUREAU'] . "</td>";
          echo        "<td>" . $row['FUNDINGORG'] . "</td>";         
          echo      "</tr>";
          }

        echo   '</tr>';
        echo '</tbody>

        </table>';
        }
        // if there are no records in the database, display an alert message
        else
        {
          //echo " No results to display!";
        }

        } // show an error if there is an issue with the database query
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
  //edit
  $(document).on('click', '.edit', function()
  {
    var id = $(this).data('id');
    getDetails(id);
   // alert("error")
    $('#edit').modal('show');
  });

  $('#editForm').submit(function(e){
    e.preventDefault();
    var editform = $(this).serialize();

    $.ajax(
      {
      method: 'POST',
      url: 'editSalvageVehicle.php',
      data: editform,
      dataType: 'json',
      success: function(response)
      {
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

        $('#edit').modal('hide');
      }
    });
  });

  //restore message (will move to salvage_asset table)
  $(document).on('click', '.restore', function()
  {
    var id = $(this).data('id');
    getDetails(id);
    //alert("hippo");
    $('#restore').modal('show');
  });

  $('#restoreForm').submit(function(e)
  {
    e.preventDefault();
    var restoreform = $(this).serialize();

    $.ajax(
    {
      method: 'POST',
      url: 's_to_v.php',
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

});

  function getDetails(id){
  $.ajax({
    method: 'POST',
    url: 'fetch_row_salvage_vehicles.php',
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
       // alert('error');
       
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

<?php include("modalVehicle.html")?>