<?php
    include_once('db_connection.php');

    $sql = "select date_updated, updated_by, action_performed from history where parent_table = '" . $_POST['theCurrentTable'] . "' and asset_id = " . $_POST['id'] . " order by date_updated desc";

    $output = array('error' => false);

    $connection = OpenCon();
	try
	{
        $output['tableData'] = "";

        $result = $connection->query($sql);

        while ($row = $result->fetch()) {
            $output['tableData'] .= "<tr>
                                        <td>".$row['updated_by']."</td>
                                        <td>".$row['date_updated']."</td>
                                        <td>".$row['action_performed']."</td>
                                    </tr>";
        }
    }
    catch(PDOException $e)
    {
		$output['error'] = true;
 		$output['errorMessage'] = $e->getMessage();
    }
    
    $connection = CloseConn();

    echo json_encode($output);
?>