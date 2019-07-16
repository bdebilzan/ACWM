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

	$statusQuery = " SELECT STATUS_ FROM `statuses`";
	$statusResult = $connection->query($statusQuery);
	$sResult = $connection->query($statusQuery);

	$imageQuery = " SELECT ASSIGNEE_IMAGE FROM COMPUTER  ";
	$imageResult = $connection->query($imageQuery);

	// $result = $connection->prepare("SELECT ASSIGNEE_IMAGE FROM COMPUTER ORDER BY GUID ASC");
	// $result->execute();
	// for($i=0; $row = $result->fetch(); $i++){
 //    $id=$row['GUID'];

	$makesQuery = "SELECT MAKE from `makes`";	

	$assigneeQuery = "SELECT EMPLOYEE_ID from `user_roles`";
?>



<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add Computer </h4>
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
							<label class="control-label">Assignee:</label>
							<!-- <input type="text" class="form-control" name="assignee" id="assignee" > -->
							<select	class="form-control" name="assignee" id="assignee">
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
							<label class="control-label">Item Type:</label>
							<input type="text" class="form-control" name="item_type" id="item_type">
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Serial Number:</label>
							<input type="text" class="form-control" name="serial_no" id="serial_no">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">Model:</label>
							<input type="text" class="form-control" name="model" id="model">
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
							<label class="control-label"> CPU Type:</label>
							<input type="text" class="form-control" name="cpu_type" id="cpu_type">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">CPU Speed:</label>
							<input type="text" class="form-control" name="cpu_speed" id="cpu_speed">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">Ram:</label>
							<input type="text" class="form-control" name="ram" id="ram">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="control-label">Hard Drive:</label>
							<input type="text" class="form-control" name="hard_drive" id="hard_drive">
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Comments:</label>
							<input type="text" class="form-control" name="comments" id="comments">
						</div>


						 <div class="form-group col-md-6">
                                <label>Status:</label>
                                <select class="form-control" id="status">
	                                <?php  
	                                	while ($row = $statusResult->fetch()) {
										echo "<option value='". $row['STATUS_'] ."'>". $row['STATUS_'] ."</option>";
										}       
	                                ?>
                                </select>
                          </div>
					
					<!-- 	<div class="form-group col-md-6">
							<label class="control-label">Status:</label>
							<input type="text" class="form-control" name="status" id="status">
						</div> -->
					
						<div class="form-group col-md-6">
							<label class="control-label"> CountyNo:</label>
							<input type="text" class="form-control" name="county_no" id="county_no">
						</div>

						<div class="form-group col-md-6">
                                <label>Map Location:</label>
                                 <select   class="form-control" id="map_location">
	                                <?php  
	                                	while ($row = $housedResult->fetch()) {
											echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>
				
						<!-- <div class="form-group col-md-6">
							<label class="control-label">Map Location:</label>
							<input type="text" class="form-control" name="map_location" id="map_location">
						</div>
 -->					
						<div class="form-group col-md-6">
							<label class="control-label">Work Site:</label>
							<input type="text" class="form-control" name="work_site" id="work_site">
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
						<!-- <div class="form-group col-md-6">
							<label class="control-label"> Bureau:</label>
							<input type="text" class="form-control" name="bureau" id="bureau">
                        </div>
 -->                     
                        <div class="form-group col-md-6">
							<label class="control-label"> Division:</label>
							<input type="text" class="form-control" name="division" id="division">
                        </div>
                        
                        <div class="form-group col-md-6">
							<label class="control-label"> Program:</label>
							<input type="text" class="form-control" name="program" id="program">
                        </div>

                        <div class="form-group col-md-6">
                                <label>Unit Code:</label>
                                 <select   class="form-control" id="unit_code">
	                                <?php  
	                                	while ($row = $unitResult->fetch()) {
											echo "<option value='". $row['UNIT_NO'] ."'>". $row['UNIT_NO'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>
                        
                     <!--    <div class="form-group col-md-6">
							<label class="control-label"> Unit Code:</label>
							<input type="text" class="form-control" name="unit_code" id="unit_code">
                        </div> 
                         -->
                      

                        <div class="form-group col-md-6">
							<label class="control-label">Assignee Image:</label>
							<input type='file' name='file' id='file'>
							
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Item Image:</label>
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
                <!-- <button type="submit" class="btn btn-success">Save</button> -->
                <input type='button' class='btn btn-info' value='Save' id='upload'>
			</form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
	            <h4 class="modal-title w-100 font-weight-bold">Edit Asset</h4>
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
                        <label class="control-label">Assignee:</label>
                        <!-- <input type="text" class="form-control assignee" name="assignee" id="assignee"> -->
							<select	class="form-control assignee" name="assignee" id="assignee">
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
                        <label class="control-label">Item Type:</label>
                        <input type="text" class="form-control item_type" name="item_type" id="item_type">
					</div>
					
					<div class="form-group col-md-6">
                        <label class="control-label">Serial Number:</label>
                        <input type="text" class="form-control serial_no" name="serial_no" id="serial_no">
                    </div>
                
                    <div class="form-group col-md-6">
                        <label class="control-label">Model:</label>
                        <input type="text" class="form-control model" name="model" id="model">
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
                        <label class="control-label"> CPU Type:</label>
                        <input type="text" class="form-control cpu_type" name="cpu_type" id="cpu_type">
                    </div>
                
                    <div class="form-group col-md-6">
                        <label class="control-label">CPU Speed:</label>
                        <input type="text" class="form-control cpu_speed" name="cpu_speed" id="cpu_speed">
                    </div>
                
                    <div class="form-group col-md-6">
                        <label class="control-label">Ram:</label>
                        <input type="text" class="form-control ram" name="ram" id="ram">
                    </div>

              
                </div>

                	<div class="form-row">
						<div class="form-group col-md-6">
							<label class="control-label">Hard Drive:</label>
							<input type="text" class="form-control hard_drive" name="hard_drive" id="hard_drive">
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Comments:</label>
							<input type="text" class="form-control comments" name="comments" id="comments">
						</div>


						 <div class="form-group col-md-6">
                                <label>Status:</label>
                                <select class="form-control status" name="status" id="status">
	                                <?php  
	                                	while ($row = $sResult->fetch()) {
										echo "<option value='". $row['STATUS_'] ."'>". $row['STATUS_'] ."</option>";
										}       
	                                ?>
                                </select>
                          </div>
					
					
						<div class="form-group col-md-6">
							<label class="control-label"> CountyNo:</label>
							<input type="text" class="form-control county_no" name="county_no" id="county_no">
						</div>

						<div class="form-group col-md-6">
                                <label>Map Location:</label>
                                 <select class="form-control map_location" name="map_location" id="map_location">
	                                <?php  
	                                	while ($row = $hResult->fetch()) {
											echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>
				
						
						<div class="form-group col-md-6">
							<label class="control-label">Work Site:</label>
							<input type="text" class="form-control work_site" name="work_site" id="work_site">
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
							<label class="control-label"> Division:</label>
							<input type="text" class="form-control division" name="division" id="division">
                        </div>
                        
                        <div class="form-group col-md-6">
							<label class="control-label"> Program:</label>
							<input type="text" class="form-control program" name="program" id="program">
                        </div>

                        <div class="form-group col-md-6">
                                <label>Unit Code:</label>
                                 <select   class="form-control unit_code" name="unit_code" id="unit_code">
	                                <?php  
	                                	while ($row = $uResult->fetch()) {
											echo "<option value='". $row['UNIT_NO'] ."'>". $row['UNIT_NO'] ."</option>";
										}       
	                                ?>
                                 </select>
                         </div>                

           

                         	<div class="form-group col-md-6">
                         		
							<label class="control-label">Assignee Image:</label>
							<input type='file' name='file' id='file'>
								<!--  <span id="assignee_image"></span> 

 -->								<!-- <img src="<span id='assignee_image'></span> "> -->
 								<div id='assignee_image'></div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Item Image:</label>
							<input type='file' name='file2' id='file2'>
								<!-- <span id="item_image"></span> -->
								<div id='item_image'></div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Location Image:</label>
							<input type='file' name='file3' id='file3' >
								<!-- <span id="location_image"></span> -->
								<div id='location_image'></div>
						</div>
			
           	   </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
			</form>
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
				<center><h4 class="modal-title" id="myModalLabel">Salvage Computer</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Do you want to mark asset as salvage?</p>			
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
				<center><h4 class="modal-title" id="myModalLabel">Restore Computer</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Do you want to restore asset?</p>			
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Addition Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
			  </div>
			  
            <div class="modal-body">
				<div class="container-fluid">
				<form method='post' action=''>

					<input type="hidden" class="id" name="id">
					<div class="form-row">

						<div class="form-group col-md-6">
                         		
							<label class="control-label">Assignee Image:</label>
								
 								<div id='assignee_imageInfo'></div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Item Image:</label>
								
								<div id='item_imageInfo'></div>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Location Image:</label>
								
								<div id='location_imageInfo'></div>
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

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  ...
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>
 -->

