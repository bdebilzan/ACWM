

 <?php  
 
 include('redirectToLoginIfNotLoggedIn.php');
 include('redirectHome_AdminOnly.php');
 include('header.php');
 include('navbar.php'); 
  include 'db_connection.php';
  $table = "computer";      
  $conn = OpenCon();
  $sql = "SELECT * FROM COMPUTER ORDER BY GUID";

echo '<br><center><h1>Computer Inventory</h1></center>';
echo '
<div class="col-md-12">
  <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
    <button class="close"><span aria-hidden="true">&times;</span></button>
    <span id="alert_message"></span>
  </div> ';
  if((in_array("USER", $_SESSION["userRoles"]) || in_array("MANAGER", $_SESSION["userRoles"]))) { //changed
  echo '<div class="columns columns-right btn-group float-left">';
        
      if (in_array("USER", $_SESSION['userRoles'])) //changed
      echo '
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
                    </div>';
    echo '
    </div>
    </div>';
  }
  echo '
  <table id="myComputerAssets" class="responstable" data-toggle="table" data-search="true" data-pagination="true" data-search-align="left" data-show-columns="true" data-click-to-select="true" data-trim-on-search="false" data-multiple-search="true" data-show-export="true" data-toolbar="#toolbar2">
  <thead>
    <tr>
      <th><em class="fa fa-cog"></em></th>
      <th data-checkbox="true"></th>
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
            <div class="btn-group" role="group">';
            

            if (in_array("USER", $_SESSION['userRoles'])) { //changed
            
                echo '
              <a class="edit-btn">
                <button class="btn btn-primary btn-sm edit" data-id="'.$row["GUID"].'">
                <em class="fas fa-pencil-alt"></em></button>
              </a>

              <a class="delete-btn">
                <button class="btn btn-danger btn-sm delete" data-id="'.$row["GUID"].'">
                <em class="fas fa-trash-alt""></em></button>
              </a>';
            }

            echo '
               <a class="info-btn">
                  <button class="btn btn-success btn-sm info" data-id="'.$row["GUID"].'">
                  <i class="fas fa-image"></i></button>
                </a>
                

                <input type="hidden" class="theCurrentTable" name="theCurrentTable" value="'.$table.'" />

                <a class="history-btn">
                  <button class="btn btn-secondary btn-sm history" data-id="'.$row["GUID"].'">
                  <i class="fas fa-history"></i></button>
                </a>
            </div>
          </td>';
          echo        "<td></td>";   
          echo  "<td>" . $row['GUID'] . "</td>";
          // echo '<td><img src="'.$row['ASSIGNEE_IMAGE'].'" width="110" height="75"></td>';  
          echo        "<td>" . $row['ASSIGNEE'] . "</td>"; 
          // echo '<td><img src="'.$row['ITEM_IMAGE'].'" width="110" height="75"></td>'; 
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
          // echo '<td><img src="'.$row['LOCATION_IMAGE'].'" width="110" height="75"></td>'; 
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


<?php include("modalComputer.php")?> 
<script src="appComputer.js"></script>

<!-- Advanced Search + Move -->

<?php include("modalMove.php")?>
<script src="move.js"></script>

<!-- BootStrap Advance Search -->
<!-- <script type="text/javascript">
        $(document).ready(function () {
          $('#myComputerAssets').bootstrapTable()
        });
</script> -->

<!-- History -->
<?php include("modalHistory.html")?>



<!-- New Export Function much more cleaner-->
<script>
  var $table = $('#myComputerAssets')
  $(document).ready(function () {
  $(function() {
    $('#toolbar2').find('select').change(function () {
      $table.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['csv', 'excel', 'pdf']
      })
    }).trigger('change')
  })
});
</script>

</body>
</html>

