<!DOCTYPE html>
<html>
<head>
    <?php  
        include('redirectToLoginIfNotLoggedIn.php');
        include('redirectHome_AdminOnly.php');
        require('header.php'); 
        require('navbar.php'); 
    ?>
</head>
<body>

    <br><center><h1>Receive Items</h1><center><br>

    <div class="container">
        <form id="receiveForm" style="border: 1px solid #B8B8B8;">
            <div class="form-row">
                <div class="col-md-6">

                    <!-- MISC DATA -->                            
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Make:</label>
                            <input type="text" class="form-control" id="make">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Model:</label>
                            <input type="text" class="form-control" id="model">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Cost:</label>
                            <input type="text" class="form-control" id="cost">
                        </div>
                    </div>

                    <!-- -->
                    <div class="form-row">                
                        <div class="form-group col-md-4">
                            <label>County Number:</label>
                            <input type="text" class="form-control" id="countyNo">
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label>Bureau:</label>
                            <select class="form-control" id="bureau">

                        <?php  
                        include 'db_connection.php';
                        $conn = OpenCon();
                                $sql1 = "SELECT BUREAU FROM `bureaus`";
                                if($result = $conn->query($sql1))
                                {
                                    if ($result->rowCount() > 0)
                                    {  
                                        echo    "<option></option>";
                                        while ($row = $result->fetch())
                                        {
                                            echo    "<option>" . $row["BUREAU"] . "</option>";   
                                        }
                                    }
                                }
                        echo '
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Location:</label>
                                    <select class="form-control" id="location">
                        ';
                                    
                                $sql2 = "SELECT LOCATION FROM `locations`";
                                if($result = $conn->query($sql2))
                                {
                                    if ($result->rowCount() > 0)
                                    {  
                                        echo    "<option></option>";
                                        while ($row = $result->fetch())
                                        {
                                            echo    "<option>" . $row["LOCATION"] . "</option>";   
                                        }
                                    }
                                }
                        echo '
                                    </select>
                                </div>

                                
                                <div class="form-group col-md-4">
                                    <label>Sublocation:</label>
                                    <input type="text" class="form-control" id="sublocation">
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Assignee:</label>
                                    <input type="text" class="form-control" id="assignee">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Status:</label>
                                    <select class="form-control" id="status">
                        ';
                                $sql3 = "SELECT STATUS_ FROM `statuses`";
                                if($result = $conn->query($sql3))
                                {
                                    if ($result->rowCount() > 0)
                                    {  
                                        echo    "<option></option>";
                                        while ($row = $result->fetch())
                                        {
                                            echo    "<option>" . $row["STATUS_"] . "</option>";   
                                        }
                                    }
                                }
                        echo '
                                
                                    </select>
                                </div>
                        
                                <div class="form-group col-md-4">
                                    <label>Category:</label>
                                    <input type="text" class="form-control" id="category">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Binvent Unit Code:</label>
                                    <select class="form-control" id="binvent">
                        ';

                                $sql4 = "SELECT B_INVENT_UNITCODE FROM `b_invent_unitcodes`";
                                if($result = $conn->query($sql4))
                                {
                                    if ($result->rowCount() > 0)
                                    {  
                                        echo    "<option></option>";
                                        while ($row = $result->fetch())
                                        {
                                            echo    "<option>" . $row["B_INVENT_UNITCODE"] . "</option>";   
                                        }
                                    }
                                }
                
                        CloseConn($conn);
                        ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Description:</label>
                            <textarea class="form-control" id="description" rows="1"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Comments:</label>
                            <textarea class="form-control" id="comments" rows="1"></textarea>
                        </div>
                    </div>

                </div> 

                <div class="col-md-6">

                    <!-- SERIAL NUMBERS -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Serial 1:</label>
                            <input type="text" class="form-control" id="s1">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 2:</label>
                            <input type="text" class="form-control" id="s2">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 3:</label>
                            <input type="text" class="form-control" id="s3">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 4:</label>
                            <input type="text" class="form-control" id="s4">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 5:</label>
                            <input type="text" class="form-control" id="s5">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 6:</label>
                            <input type="text" class="form-control" id="s6">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 7:</label>
                            <input type="text" class="form-control" id="s7">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 8:</label>
                            <input type="text" class="form-control" id="s8">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 9:</label>
                            <input type="text" class="form-control" id="s9">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 10:</label>
                            <input type="text" class="form-control" id="s10">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 11:</label>
                            <input type="text" class="form-control" id="s11">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 12:</label>
                            <input type="text" class="form-control" id="s12">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 13:</label>
                            <input type="text" class="form-control" id="s13">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 14:</label>
                            <input type="text" class="form-control" id="s14">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Serial 15:</label>
                            <input type="text" class="form-control" id="s15">
                        </div>
                    </div>
                                
         
                </div>
            </div>
            <button type="submit" class="btn btn-success">Receive</button>
        </form>
    </div>

<script>

$(document).ready(function()
{
    $('#receiveForm').submit(function(e)
    {
        e.preventDefault();
        //alert();
        // var fd = $(this).serialize();
        var fd = new FormData();
        //alert(fd);
                
        // var files = $('#file')[0].files[0];
        var location = $('#location').val();
        var assignee = $('#assignee').val();
        var description = $('#description').val();
        var make = $('#make').val();
        var model = $('#model').val();

        var s1 = $('#s1').val();
        var s2 = $('#s2').val();
        var s3 = $('#s3').val();
        var s4 = $('#s4').val();
        var s5 = $('#s5').val();
        var s6 = $('#s6').val();
        var s7 = $('#s7').val();
        var s8 = $('#s8').val();
        var s9 = $('#s9').val();
        var s10 = $('#s10').val();
        var s11 = $('#s11').val();
        var s12 = $('#s12').val();
        var s13 = $('#s13').val();
        var s14 = $('#s14').val();
        var s15 = $('#s15').val();

        var countyNo = $('#countyNo').val();
        var cost = $('#cost').val();
        var comments = $('#comments').val();
        var status = $('#status').val();
        var category = $('#category').val();
        var binvent = $('#binvent').val();
        var sublocation = $('#sublocation').val();
        var bureau = $('#bureau').val();

        // fd.append('file',files);
        fd.append('location', location);
        fd.append('assignee',assignee);
        fd.append('description', description);
        fd.append('make', make);
        fd.append('model', model);

        fd.append('s1', s1);
        fd.append('s2', s2);
        fd.append('s3', s3);
        fd.append('s4', s4);
        fd.append('s5', s5);
        fd.append('s6', s6);
        fd.append('s7', s7);
        fd.append('s8', s8);
        fd.append('s9', s9);
        fd.append('s10', s10);
        fd.append('s11', s11);
        fd.append('s12', s12);
        fd.append('s13', s13);
        fd.append('s14', s14);
        fd.append('s15', s15);

        fd.append('countyNo', countyNo);
        fd.append('cost', cost);
        fd.append('comments', comments);
        fd.append('status', status);
        fd.append('category', category);
        fd.append('binvent', binvent);
        fd.append('sublocation', sublocation);
        fd.append('bureau', bureau);

        fd.append('request',1);

        //alert(fd.get('location'));
        // AJAX request

        $.ajax(
        {        
            type: 'post',
            url: 'receiveAsset.php',
            data: fd,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response)
            {
                if(response != 0)
                {
                    //alert('Assets Received');
                }else
                {
                    alert('Assets Not Received');
                }

                var answer = confirm('Do you want to receive similar items?');

                if (answer)
                {
                    //myFunction();
                }
                else
                {
                    myFunction();
                    $('#receiveForm').trigger("reset");
                }

            }
        });

        
    });
}); // end function

function myFunction() 
{
    location.reload();
}

</script>

</body>
</html>