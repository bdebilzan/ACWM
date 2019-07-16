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
  $sql = "SELECT * FROM SALVAGE_ASSET ORDER BY GUID";

  echo '<br><center><h1>Salvage Asset Directory</h1></center>';
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
          <th><em class="fas fa-cog "></em></th>
          <th data-sortable="true">Location</th>
          <th data-sortable="true">Assignee</th>
          <th data-sortable="true">Description</th>
          <th data-sortable="true">Make</th>
          <th data-sortable="true">Model</th>
          <th data-sortable="true">SerialNo</th>
          <th data-sortable="true">CountyNo</th>
          <th data-sortable="true">Acqdate</th>
          <th data-sortable="true" data-align="right">Cost $</th>
          <th data-sortable="true">Comments</th>
          <th data-sortable="true">Status</th>
          <th data-sortable="true">Category</th>
          <th data-sortable="true">Binvent</th>
          <th data-sortable="true">Sublocation</th>
          <th data-sortable="true">Bureau</th>
        </tr>
      </thead>
    <tbody>';

    if ($result = $conn->query($sql))
    {
      if ($result->rowCount() > 0) // display records if there are records to display
      {
        while ($row = $result->fetch())  // set up a row for each record
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
              </div>
            </td>';
          
            echo  "<td>" . $row['LOCATION'] . "</td>";
            echo  "<td>" . $row['ASSIGNEE'] . "</td>";
            echo  "<td>" . $row['DESCRIPTION'] . "</td>";
            echo  "<td>" . $row['MAKE'] . "</td>";
            echo  "<td>" . $row['MODEL'] . "</td>";
            echo  "<td>" . $row['SERIALNO'] . "</td>";
            echo  "<td>" . $row['COUNTYNO'] . "</td>";
            echo  "<td>" . $row['ACDATE'] . "</td>";
            echo  "<td>" . $row['COST'] . "</td>";
            echo  "<td>" . $row['COMMENTS'] . "</td>";
            echo  "<td>" . $row['STATUS'] . "</td>";
            echo  "<td>" . $row['CATEGORY'] . "</td>";
            echo  "<td>" . $row['BINVENT'] . "</td>";
            echo  "<td>" . $row['SUBLOCATION'] . "</td>";
            echo  "<td>" . $row['BUREAU'] . "</td>";
            echo "</tr>"; 
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
      url: 'editSalvageAsset.php',
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
      url: 's_to_a.php',
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
    url: 'fetch_row_salvage_assets.php',
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
        $('.location').val(response.data.LOCATION);
        $('.assignee').val(response.data.ASSIGNEE);
        $('.description').val(response.data.DESCRIPTION);
        $('.make').val(response.data.MAKE);
        $('.model').val(response.data.MODEL);
        $('.serialNo').val(response.data.SERIALNO);
        $('.countyNo').val(response.data.COUNTYNO);
        $('.cost').val(response.data.COST);
        $('.comments').val(response.data.COMMENTS);
        $('.status').val(response.data.STATUS);
        $('.category').val(response.data.CATEGORY);
        $('.binvent').val(response.data.BINVENT);
        $('.sublocation').val(response.data.SUBLOCATION);
        $('.bureau').val(response.data.BUREAU);
        
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

<?php include("modalAsset.html")?>