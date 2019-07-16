<?php
	$connection = OpenCon();
	$roles = "select role from roles";
?>
<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
  
            <div class="modal-header text-center">

              <h4 class="modal-title w-100 font-weight-bold">Add New User Role</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
		  </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="addForm">
				<input type="hidden" class="id" name="id">

					 <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Employee ID:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="uid">
					</div>
				
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">ROLE:</label>
					</div>
					<div class="col-sm-10">						
						<select name="role" class="form-control role">
							<!-- add roles if necessary -->
							<!-- <option>USER</option>
							<option>MANAGER</option>
							<option>ADMIN</option>
							<option>EPUser</option>							
							<option>PEPQUser</option>
							<option>WHPMUser</option>
							<option>WMUser</option>
							<option>BFUser</option> -->
							<?php
								$result = $connection->query($roles);
								while ($row = $result->fetch()) {
							?>
								<option><?php echo $row['role'] ?></option>
							<?php } ?>
						</select>
					</div>

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">

              <h4 class="modal-title w-100 font-weight-bold">Edit User Role</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
		  </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form id="editForm">
				<input type="hidden" id="roleUID" name="roleUID" value="">
				<input type="hidden" id="roleROLE" name="roleROLE" value="">

	            <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Employee ID:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" id="editUID" class="form-control uid" name="uid" readonly>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Role:</label>
					</div>
					<div class="col-sm-10">
						<!--<input type="text" class="form-control role" name="role">-->
						<select name="role" class="form-control role" id="editRole">
							<!-- add roles if necessary -->
							<!-- <option>USER</option>
							<option>MANAGER</option>
							<option>ADMIN</option>
							<option>EPUser</option>							
							<option>PEPQUser</option>
							<option>WHPMUser</option>
							<option>WMUser</option>
							<option>BFUser</option> -->
							<?php
								$result = $connection->query($roles);
								while ($row = $result->fetch()) {
							?>
								<option><?php echo $row['role'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                <button type="submit" class="btn btn-success">Update </button>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete User Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
				<form id="deleteForm">
						<input type="hidden" id="roleUID_delete" name="roleUID_delete" value="">
						<input type="hidden" id="roleROLE_delete" name="roleROLE_delete" value="">
            	<p class="text-center">Are you sure you want to remove this entry?</p>
				<!-- <h2 class="text-center fullname"></h2> -->
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
				<button type="submit" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Yes</button>
				</form>
            </div>

        </div>
    </div>
</div>