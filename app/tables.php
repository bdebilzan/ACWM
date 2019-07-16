<!DOCTYPE html>
<html>
<head>
    <?php 
      include('redirectToLoginIfNotLoggedIn.php');
    //   include('redirectHome_AdminOnly.php');
      include('header.php');
      include('navbar.php');
        include 'db_connection.php';
        $conn = OpenCon();
        

        if(!in_array("ADMIN", $_SESSION["userRoles"]))
        {
            header("Location: home.php");
            exit();
        }
    ?>
</head>
<body>

    <br><center><h1>Table Management</h1><center><br>

        <div class="form-row" style="justify-content: center;">
            <!-- Bureaus -->
            
                <div class="form-group col-md-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><em class="fas fa-cog"></em></th>
                                <th scope="col">Bureau</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $sql1 = "SELECT BUREAU FROM `bureaus`";
                                if($result = $conn->query($sql1)){
                                    if ($result->rowCount() > 0){  
                                        while ($row = $result->fetch()){
                                            echo   '<tr>
                                                        <td style="width: 20px">
                                                            <div class="btn-group" role="group">
                                                                <a class="delete-btn">
                                                                    <button class="btn btn-danger btn-sm delete-bureau" data-id="'.$row["BUREAU"].'">
                                                                    <em class="fas fa-trash-alt"></em></button>
                                                                </a>
                                                            </div>';
                                            echo       "<td>". $row["BUREAU"] . "</td>
                                                    </tr>"; 
                                }   }   }
                                            echo'   <tr>
                                                        <td>
                                                            <a class="add-btn-bureau">
                                                                <button class="btn btn-success btn-sm add">
                                                                <em class="fas fa-plus"></em></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form style="padding: 0px; width: auto;" id="bure">
                                                                <div class="form-row">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="newBureau">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>';
                            ?>
                        </tbody>
                    </table>
                </div>
            

            <!-- Locations -->
            
                <div class="form-group col-md-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><em class="fas fa-cog "></em></th>
                                <th scope="col">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $sql2 = "SELECT LOCATION FROM `locations`";
                                if($result = $conn->query($sql2)){
                                    if ($result->rowCount() > 0){  
                                        while ($row = $result->fetch()){
                                            echo   '<tr>
                                                        <td style="width: 20px">
                                                            <div class="btn-group" role="group">
                                                                <a class="delete-btn">
                                                                    <button class="btn btn-danger btn-sm delete-location" data-id="'.$row["LOCATION"].'">
                                                                    <em class="fas fa-trash-alt"></em></button>
                                                                </a>
                                                            </div>';
                                            echo        "<td>". $row["LOCATION"] . "</td>
                                                    </tr>"; 
                                }   }   }
                                            echo'   <tr>
                                                        <td>
                                                            <a class="add-btn-location">
                                                                <button class="btn btn-success btn-sm add">
                                                                <em class="fas fa-plus"></em></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form style="padding: 0px; width: auto;" id="loca">
                                                                <div class="form-row">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="newLocation">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>';

                            ?>
                        </tbody>
                    </table>
                </div>
            

            <!-- B INVENT UNITCODE -->
            
                <div class="form-group col-md-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><em class="fas fa-cog "></em></th>
                                <th scope="col">B INVENT UNITCODE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $sql3 = "SELECT B_INVENT_UNITCODE FROM `b_invent_unitcodes`";
                                if($result = $conn->query($sql3)){
                                    if ($result->rowCount() > 0){  
                                        while ($row = $result->fetch()){
                                            echo   '<tr>
                                                        <td style="width: 20px">
                                                            <div class="btn-group" role="group">
                                                                <a class="delete-btn">
                                                                    <button class="btn btn-danger btn-sm delete-binvent" data-id="'.$row["B_INVENT_UNITCODE"].'">
                                                                    <em class="fas fa-trash-alt"></em></button>
                                                                </a>
                                                            </div>';
                                            echo        "<td>". $row["B_INVENT_UNITCODE"] . "</td>
                                                    </tr>"; 
                                }   }   }
                                            echo'   <tr>
                                                        <td>
                                                            <a class="add-btn-binvent">
                                                                <button class="btn btn-success btn-sm add">
                                                                <em class="fas fa-plus"></em></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form style="padding: 0px; width: auto;" id="binv">
                                                                <div class="form-row">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="newBinvent">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>';

                            ?>
                        </tbody>
                    </table>
                </div>
            

            <!-- FUNDING ORG -->
            
                <div class="form-group col-md-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><em class="fas fa-cog "></em></th>
                                <th scope="col">FUNDING ORG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $sql4 = "SELECT FUNDING_ORG_NO FROM `funding_orgs`";
                                if($result = $conn->query($sql4)){
                                    if ($result->rowCount() > 0){  
                                        while ($row = $result->fetch()){
                                            echo   '<tr>
                                                        <td style="width: 20px">
                                                            <div class="btn-group" role="group">
                                                                <a class="delete-btn">
                                                                    <button class="btn btn-danger btn-sm delete-funding" data-id="'.$row["FUNDING_ORG_NO"].'">
                                                                    <em class="fas fa-trash-alt"></em></button>
                                                                </a>
                                                            </div>';
                                            echo        "<td>". $row["FUNDING_ORG_NO"] . "</td>
                                                    </tr>"; 
                                }   }   }

                                            echo'   <tr>
                                                        <td>
                                                            <a class="add-btn-funding">
                                                                <button class="btn btn-success btn-sm add">
                                                                <em class="fas fa-plus"></em></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form style="padding: 0px; width: auto;" id="fund">
                                                                <div class="form-row">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="newFunding">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>';

                            ?>
                        </tbody>
                    </table>
                </div>
                
        </div>

    <!-- -->

    <?php 
        CloseConn($conn);
    ?>

<script>

$(document).ready(function()
{
    //add bureau
    $(document).on('click', '.add-btn-bureau', function()
    {
        var fd = new FormData();
        var newBureau = $('#newBureau').val();
        fd.append('newBureau', newBureau);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesProcessBureaus.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                    $('#bure').trigger("reset");
                }
            }
        });
    });

    //add location
    $(document).on('click', '.add-btn-location', function()
    {
        var fd = new FormData();
        var newLocation = $('#newLocation').val();
        fd.append('newLocation', newLocation);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesProcessLocations.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                    $('#loca').trigger("reset");
                }
            }
        });
    });

    //add binvent
    $(document).on('click', '.add-btn-binvent', function()
    {
        var fd = new FormData();
        var newBinvent = $('#newBinvent').val();
        fd.append('newBinvent', newBinvent);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesProcessBinvent.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                    $('#binv').trigger("reset");
                }
            }
        });
    });

    //add fundingorg
    $(document).on('click', '.add-btn-funding', function()
    {
        var fd = new FormData();
        var newFunding = $('#newFunding').val();
        fd.append('newFunding', newFunding);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesProcessFunding.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                    $('#fund').trigger("reset");
                }
            }
        });
    });

    ///////////////////////////////////////////////////////

    //delete bureau
    $(document).on('click', '.delete-bureau', function()
    {
        var fd = new FormData();
        var removeBureau = $(this).data('id');
        fd.append('removeBureau', removeBureau);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesRemoveBureaus.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                }
            }
        });
    });

    //delete location
    $(document).on('click', '.delete-location', function()
    {
        var fd = new FormData();
        var removeLocation = $(this).data('id');
        fd.append('removeLocation', removeLocation);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesRemoveLocations.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                }
            }
        });
    });

    //delete binvent
    $(document).on('click', '.delete-binvent', function()
    {
        var fd = new FormData();
        var removeBinvent = $(this).data('id');
        fd.append('removeBinvent', removeBinvent);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesRemoveBinvents.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                }
            }
        });
    });

    //delete location
    $(document).on('click', '.delete-funding', function()
    {
        var fd = new FormData();
        var removeFunding = $(this).data('id');
        fd.append('removeFunding', removeFunding);
        //alert(fd);

        $.ajax(
        {
            type: 'post',
            url: 'tablesRemoveFundings.php',
            data: fd,
            contentType: false,
            processData: false,
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
                    myFunction();
                }
            }
        });
    });
});

function myFunction() 
{
    location.reload();
}

</script>

</body>
</html>