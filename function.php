<?php 
function upload_image()
{
	
	$filename = $_FILES['file']['name'];
		// // Location
		$locationFile = 'employeeImages/'.$filename;

		// file extension
		$file_extension = pathinfo($locationFile, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg");

		$response = 0;
		if(in_array($file_extension, $image_ext)){
			// Upload file
			if(move_uploaded_file($_FILES['file']['tmp_name'],$locationFile)){
				$response = $locationFile;
				return $response; 
				
			}
		}
	
}

function upload2_image()
{
	
	$filename2 = $_FILES['file2']['name'];
		// // Location
		$locationFile2 = 'assetImages/'.$filename2;

		// file extension
		$file_extension2 = pathinfo($locationFile2, PATHINFO_EXTENSION);
		$file_extension2 = strtolower($file_extension2);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg");

		$response2 = 0;
		if(in_array($file_extension2, $image_ext)){
			// Upload file
			if(move_uploaded_file($_FILES['file2']['tmp_name'],$locationFile2)){
				$response2 = $locationFile2;
				return $response2; 
				
			}
		}
	
}

function upload3_image()
{
	
	$filename3 = $_FILES['file3']['name'];
		// // Location
		$locationFile3 = 'locationImages/'.$filename3;

		// file extension
		$file_extension3 = pathinfo($locationFile3, PATHINFO_EXTENSION);
		$file_extension3 = strtolower($file_extension3);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg");

		$response3 = 0;
		if(in_array($file_extension3, $image_ext)){
			// Upload file
			if(move_uploaded_file($_FILES['file3']['tmp_name'],$locationFile3)){
				$response3 = $locationFile3;
				return $response3; 
				
			}
		}
	
}


?> 