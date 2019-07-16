<?php   
	$connection = OpenCon();
	
	$housedQuery = " SELECT LOCATION FROM `locations`";
	$housedResult = $connection->query($housedQuery);
	$hResult = $connection->query($housedQuery);

	$unitQuery = " SELECT UNIT_NO FROM `units`";
	$unitResult = $connection->query($unitQuery);
	$uResult = $connection->query($unitQuery);

    $bureauQuery = " SELECT BUREAU FROM `bureaus`";
	$theResult = $connection->query($bureauQuery);
	$Result = $connection->query($bureauQuery);

	$yearQuery = " SELECT YEAR_NO FROM `years`";
	$yearResult = $connection->query($yearQuery);
	$yResult = $connection->query($yearQuery);

	$fundingQuery = " SELECT FUNDING_ORG_NO FROM `funding_orgs`";
	$fundingResult = $connection->query($fundingQuery);
	$fundResult = $connection->query($fundingQuery);

	$makesQuery = "SELECT MAKE from `makes`";

	$assigneeQuery = "SELECT EMPLOYEE_ID from `user_roles`";
?>



<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Add New Vehicle</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
			  </div>
			  
            <div class="modal-body">
				<div class="container-fluid">
				<form method='post' action='' enctype="multipart/form-data">
					<input type="hidden" class="id" name="id">
					<input type="hidden" name="tableHistory" id="tableHistory" value="<?php echo $table ?>"> <!-- added -->
					<input type="hidden" name="userWhoUpdated" id="userWhoUpdated" value="<?php echo $_SESSION['username'] ?>"> <!-- added -->
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="control-label">VNO:</label>
							<input type="text" class="form-control" name="vno" id="vno">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">Assigned To:</label>
							<!-- <input type="text" class="form-control" name="assigned" id="assigned"> -->
							<select	class="form-control" name="assigned" id="assigned">
								<option value="Unassigned">Unassigned</option>
								<?php
									$assigneeAdd = $connection->query($assigneeQuery);
									while ($row = $assigneeAdd->fetch()){
										echo "<option value='".$row['EMPLOYEE_ID']."'>".$row['EMPLOYEE_ID']."</option>";
									}
								?>
							</select>
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">License:</label>
							<input type="text" class="form-control" name="license" id="license">
						</div>
									
						<div class="form-group col-md-6">
							<label class="control-label">Make:</label>
							<!-- <input type="text" class="form-control" name="make" id="make"> -->
							<select class="form-control" name="make" id="make">
								<?php
									$makesAdd = $connection->query($makesQuery);
									while ($row = $makesAdd->fetch()) {
										echo "<option value='".$row['MAKE']."'>".$row['MAKE']."</option>";
									}
								?>
							</select>
						</div>				
					
						<div class="form-group col-md-6">
							<label class="control-label"> Model:</label>
							<input type="text" class="form-control" name="model" id="model">
						</div>

						 <div class="form-group col-md-6">
                                <label>Year:</label>
                                <select class="form-control" id="year">
	                                <?php  
	                                	while ($row = $yearResult->fetch()) {
										echo "<option value='". $row['YEAR_NO'] ."'>". $row['YEAR_NO'] ."</option>";
										}       
	                                ?>
                                </select>
                          </div>
					

					   <div class="form-group col-md-6">
                                <label>Housed:</label>
                                 <select   class="form-control" id="housed">
	                                <?php  
	                                	while ($row = $housedResult->fetch()) {
											echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>
						
					
						<div class="form-group col-md-6">
							<label class="control-label">VIN:</label>
							<input type="text" class="form-control" name="vin" id="vin">
						</div>



						 <div class="form-group col-md-6">
                                <label>Unit:</label>
                                 <select   class="form-control" id="unit">
	                                <?php  
	                                	while ($row = $unitResult->fetch()) {
											echo "<option value='". $row['UNIT_NO'] ."'>". $row['UNIT_NO'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>


						<div class="form-group col-md-6">
							<label class="control-label">Description:</label>
							<input type="text" class="form-control" name="description" id="description">
						</div>
					
					      <div class="form-group col-md-6">
                                <label>Bureau:</label>
                                <select class="form-control" id="bureau">
	                                <?php  
	                                	while ($row = $theResult->fetch()) {
											echo "<option value='". $row['BUREAU'] ."'>". $row['BUREAU'] ."</option>";
										}                                        
	                                ?>
                                </select>
                          </div>
					

					   <div class="form-group col-md-6">
                                <label>Funding Org:</label>
                                <select   class="form-control" id="funding">

	                                <?php  
	                                	while ($row = $fundingResult->fetch()) {
											echo "<option value='". $row['FUNDING_ORG_NO'] ."'>". $row['FUNDING_ORG_NO'] ."</option>";
										}	                                        
	                                ?>
                                </select>
                          </div>

					
					   <div class="form-group col-md-6">
							<label class="control-label">Employee Image:</label>
							<input type='file' name='file' id='file'>
						</div>


						<div class="form-group col-md-6">
							<label class="control-label">Vehicle Image:</label>
							<input type='file' name='file2' id='file2'>
						</div>

					
						<div class="form-group col-md-6">
							<label class="control-label">Location Image:</label>
							<input type='file' name='file3' id='file3'>
						</div>

						

					</div>
            	</div> 
			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                 <input type='button' class='btn btn-info' value='Upload' id='upload'>
			</form>
			<div id='preview'></div>
			</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
              	<h4 class="modal-title w-100 font-weight-bold">Edit Vehicle</h4>
			  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
		  	</div>
            <div class="modal-body">
				<div class="container-fluid">
				<form method="post" id="editForm" enctype="multipart/form-data">
					<input type="hidden" class="id" name="id">
					<input type="hidden" name="tableHistory" id="tableHistory" value="<?php echo $table ?>"> <!-- added -->
					<input type="hidden" name="userWhoUpdated" id="userWhoUpdated" value="<?php echo $_SESSION['username'] ?>"> <!-- added -->
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="control-label">VNO:</label>
							<input type="text" class="form-control vno" name="vno" id="vno">
						</div>
		
						<div class="form-group col-md-6">
							<label class="control-label">Assigned To:</label>
							<!-- <input type="text" class="form-control assigned" name="assigned" id="assigned"> -->
							<select	class="form-control assigned" name="assigned" id="assigned">
								<option value="Unassigned">Unassigned</option>
								<?php
									$assigneeAdd = $connection->query($assigneeQuery);
									while ($row = $assigneeAdd->fetch()){
										echo "<option value='".$row['EMPLOYEE_ID']."'>".$row['EMPLOYEE_ID']."</option>";
									}
								?>
							</select>
						</div>
		
						<div class="form-group col-md-6">
							<label class="control-label">License:</label>
							<input type="text" class="form-control license" name="license" id="license">
						</div>

		
						<div class="form-group col-md-6">
							<label class="control-label">Make:</label>
							<!-- <input type="text" class="form-control make" name="make" id="make"> -->
							<select class="form-control make" name="make" id="make">
								<?php
									$makesEdit = $connection->query($makesQuery);
									while ($row = $makesEdit->fetch()) {
										echo "<option value='".$row['MAKE']."'>".$row['MAKE']."</option>";
									}
								?>
							</select>
						</div>
		
						<div class="form-group col-md-6">
							<label class="control-label"> Model:</label>
							<input type="text" class="form-control model" name="model" id="model">
						</div>

						<div class="form-group col-md-6">
                                <label>Year:</label>
                                <select class="form-control year" name="year" id="year">
	                                <?php  
	                                	while ($row = $yResult->fetch()) {
										echo "<option value='". $row['YEAR_NO'] ."'>". $row['YEAR_NO'] ."</option>";
										}       
	                                ?>
                                </select>
                          </div>
		

						<div class="form-group col-md-6">
                                <label>Housed:</label>
                                <select class="form-control housed" name="housed" id="housed">
	                                <?php  
	                                	while ($row = $hResult->fetch()) {
										echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
										}       
	                                ?>
                                </select>
                          </div>

		
						<div class="form-group col-md-6">
							<label class="control-label">VIN:</label>
							<input type="text" class="form-control vin" name="vin" id="vin">
						</div>


						 <div class="form-group col-md-6">
                                <label>Unit:</label>
                                 <select   class="form-control unit" name="unit" id="unit">
	                                <?php  
	                                	while ($row = $uResult->fetch()) {
											echo "<option value='". $row['UNIT_NO'] ."'>". $row['UNIT_NO'] ."</option>";
										}       
	                                ?>
                                 </select>
                          </div>
		
		
						<div class="form-group col-md-6">
							<label class="control-label">Description:</label>
							<input type="text" class="form-control description" name="description" id="description">
						</div>

						<div class="form-group col-md-6">
                                <label>Bureau:</label>
                                <select class="form-control bureau" name="bureau" id="bureau">                                  
	                                <?php  
	                                	while ($row = $Result->fetch()) {
											echo "<option value='". $row['BUREAU'] ."'>". $row['BUREAU'] ."</option>";
										}      
	                                ?>
                                </select>
                          </div>
	

						 <div class="form-group col-md-6">
                                    <label>Funding Org:</label>
                                    <select class="form-control funding" name="funding" id="funding">

                                <?php  
                                	while ($row = $fundResult->fetch()) {
							echo "<option value='". $row['FUNDING_ORG_NO'] ."'>". $row['FUNDING_ORG_NO'] ."</option>";
								}
                                        
                                ?>
                                  </select>
                          </div>
					

					   <div class="form-group col-md-6">
							<label class="control-label">Employee Image:</label>
							<input type='file' name='file' id='file' >
							<div id='employee_uploaded_image'></div>
							<!-- <span id="employee_uploaded_image"></span> -->
						</div>
						
						<div class="form-group col-md-6">
							<label class="control-label">Vehicle Image:</label>
							<input type='file' name='file2' id='file2' >
							<!-- <span id="vehicle_uploaded_image"></span> -->
							<div id='vehicle_uploaded_image'></div>
						</div>


						<div class="form-group col-md-6">
							<label class="control-label">Location Image:</label>
							<input type='file' name='file3' id='file3' >
							<div id='location_uploaded_image'></div>
							<!-- <span id="location_uploaded_image"></span> -->
						</div>

						

					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
					<button type="submit" class="btn btn-success">Update </buton>
				</form>
			<!-- <div id='preview'></div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">Salvage Vehicle</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">	
				<p class="text-center">Do you want to mark vehicle as salvage?</p>			
				<form id="salvageForm">
				<input type="hidden" class="id" name="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Yes</button>
			</form>
			</div>
		</div>
	</div>
</div>

<!-- Restore -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">Restore Vehicle</h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">	
				<p class="text-center">Do you want to restore vehicle?</p>			
				<form id="restoreForm">
				<input type="hidden" class="id" name="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Yes</button>
			</form>
			</div>
		</div>
	</div>
</div>


<!-- Info-->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Addition Vehicle Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
			  </div>
			  
            <div class="modal-body">
				<div class="container-fluid">
				<form method='post' action=''>

					<input type="hidden" class="id" name="id">
					<div class="form-row">

					 <div class="form-group col-md-6">
							<label class="control-label">Employee Image:</label>
							
							<div id='employee_image'></div>
							
						</div>
						
						<div class="form-group col-md-6">
							<label class="control-label">Vehicle Image:</label>
							
							<div id='vehicle_image'></div>
						</div>


						<div class="form-group col-md-6">
							<label class="control-label">Location Image:</label>
					
							<div id='location_image'></div>
							
						</div>
					
					</div>
            	</div> 
			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                 
			</form>
		
			</div>
        </div>
    </div>
</div>
