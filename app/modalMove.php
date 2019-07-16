<?php    

	$connection = OpenCon();
	
    $locationsQuery = "SELECT location from locations";
	$theResult = $connection->query($locationsQuery);

	$assetLocationsQuery = "SELECT location from locations";
	$theAssetResult = $connection->query($assetLocationsQuery);

	$computerLocationsQuery = "select location from locations";
	$theComputerResult = $connection->query($computerLocationsQuery);

?>
<div class="modal fade" id="move" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Move to...</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">				
				<form id="moveForm">
					<input type="hidden" id="vnos" name="vnos" value=""/>
					<input type="hidden" id="locationField" name="locationField" value="" />
					<input type="hidden" name="currentTable" value="<?php echo $table ?>" />
					Location: <select name="moveTo">
					<option value="">--- SELECT ONE ---</option>
					<?php
						while ($row = $theResult->fetch()) {
							echo "<option value='". $row['location'] ."'>". $row['location'] ."</option>";
						}
					?>
					</select>
			</div>
			<div class="modal-footer">					
					<input type="submit" class="btn btn-success" value="Move"/>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="moveAsset" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Move to...</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">				
				<form id="moveAssetForm">
					<input type="hidden" id="guids" name="guids" value=""/>
					<input type="hidden" id="assetLocationField" name="assetLocationField" value="" />
					<input type="hidden" name="currentTable" value="<?php echo $table ?>" />
					Location: <select id="assetMoveTo" name="assetMoveTo">
					<option value="">--- SELECT ONE ---</option>
					<?php
						while ($row = $theAssetResult->fetch()) {
							echo "<option value='". $row['location'] ."'>". $row['location'] ."</option>";
						}
					?>
					</select><br>
					<span id="sublocation">
					</span>
			</div>
			<div class="modal-footer">					
					<input type="submit" class="btn btn-success" value="Move Asset"/>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="moveComputer" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Move to...</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">				
				<form id="moveComputerForm">
					<input type="hidden" id="computerGuids" name="computerGuids" value=""/>
					<input type="hidden" id="computerMapLocation" name="computerMapLocation" value="" />
					<input type="hidden" name="currentTable" value="<?php echo $table ?>" />
					Location: <select id="computerMoveTo" name="computerMoveTo">
					<option value="">--- SELECT ONE ---</option>
					<?php
						while ($row = $theComputerResult->fetch()) {
							echo "<option value='". $row['location'] ."'>". $row['location'] ."</option>";
						}
					?>
					</select>
			</div>
			<div class="modal-footer">					
					<input type="submit" class="btn btn-success" value="Move Computer"/>
				</form>
			</div>
		</div>
	</div>
</div>