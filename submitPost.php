<?php

// Functions to determine GPS Coords
function getGps($exifCoord, $hemi) {

    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

    return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

}

function gps2Num($coordPart) {

    $parts = explode('/', $coordPart);

    if (count($parts) <= 0)
        return 0;

    if (count($parts) == 1)
        return $parts[0];

    return floatval($parts[0]) / floatval($parts[1]);
}

	

		
		//If image uploaded OK, continue process
	if ($_FILES["Image"]["error"] == UPLOAD_ERR_OK) {
		//Connect to DB
		$m = new MongoClient();
  		$db = $m->graffiti;
 		$collection = $db->posts;

 		// Image key
 		$imageKey = rand(0,10000);
 		$imageKeyStr = "$imageKey";

 		//Get POSTs
 		if(isset($_POST['Name'])) {
   			$name = strip_tags( trim( $_POST[ 'Name' ] ) );
   		} else{
   			$name = 'Unknown';
   		}
   		if(isset($_POST['Artist'])) {
   			$artist = strip_tags( trim( $_POST[ 'Artist' ] ) );
   		} else{
   			$artist = 'Unknown';
   		}
   		if(isset($_POST['Description'])) {
   			$description = strip_tags( trim( $_POST[ 'Description' ] ) );
   		} else{
   			$description = 'No description.';
   		}
   		if(isset($_POST['Email'])) {
   			$email = strip_tags( trim( $_POST[ 'Email' ] ) );
   		} else{
   			$email = 'none';
   		}
   		if(isset($_POST['Exists'])) {
   			$exists = true;
   		} else{
   			$exists = false;
   		}
   		$image = $_FILES["Image"];

   		// Get Lat/Lng from Image's EXIF Data
   		$exif = exif_read_data($image["tmp_name"]);
		$lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
		$lonStr = "$lon";
		$lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
		$latStr = "$lat";

		//Create Thumbnail image and scale image
		$tmp_name = $_FILES["Image"]["tmp_name"];
		$fname = $_FILES["Image"]["name"];
		$tagsDir = '/Users/patrick.williams/Documents/projects/austin-graffiti/tags/';
		$newFName = $imageKeyStr . $fname;
			//Run ImageMagick to create thumbnail
		exec('convert ' . $tmp_name . ' -resize 200X108^ -gravity center -extent 200X108 ' . $tagsDir . 'thumb_' . $newFName);
			//Run ImageMagick to scale large images > 1024 X 768 in total pixels
		exec('convert ' .$tmp_name . ' -resize 786432@\> ' . $tagsDir . $newFName);
	
		//Write post to DB
		$fullThumbPath = 'tags/thumb_' . $newFName;
		$fullImagePath = 'tags/' . $newFName;
		$a = array('timestamp' => time(),'name' => $name,'artist' => $artist, 'description' => $description, 'email' => $email, 'current' => $exists, 'imageUrl' => $fullImagePath, 'thumbUrl' => $fullThumbPath, 'Coord' => $latStr . ',' . $lonStr, 'numPVotes' => 1, 'numNVotes' => 0, 'inappVotes' => 0, 'notCurrentCount' => 0);
		$collection->insert($a);
        
        
        
       

    }


  // if(isset($_POST['Exists']))



  //get all posts -- done

  //get exists post + check -- done
  //get geo data from exif -- done

  

  //run imagemagik on image -- done
  	//save cropped photo -- done
  	//new variables for img path


  //write post data to DB

  //echo sucess --



	// print_r($_FILES["Image"]["name"]);
  // print_r ($_POST);
    // print_r($_FILES);
// }
?>