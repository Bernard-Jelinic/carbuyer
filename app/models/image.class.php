<?php

namespace app\models;

class Image {

	public function generate_filename($length) {

		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text = "";

		for($x = 0; $x < $length; $x++) {

			$random = rand(0,61);
			$text .= $array[$random];
		}

		return $text;
	}

	//resize the image
	public function resize_image($original_file_name,$resized_file_name,$max_width,$max_height) {

		if(file_exists($original_file_name)) {

			$path_info = pathinfo($original_file_name);

			if ($path_info['extension'] == 'jpeg' || $path_info['extension'] == 'jpg') {

				$original_image = imagecreatefromjpeg($original_file_name);

			} elseif ($path_info['extension'] == 'png') {
				
				$original_image = imagecreatefrompng($original_file_name);

			}

			$original_width = imagesx($original_image);
			$original_height = imagesy($original_image);

			if ($original_height > $original_width) {
				//make width equal to max width;
				$ratio = $max_width / $original_width;

				$new_width = $max_width;
				$new_height = $original_height * $ratio;

			} else {

				//make width equal to max width;
				$ratio = $max_height / $original_height;

				$new_height = $max_height;
				$new_width = $original_width * $ratio;
			}
		}

		//adjust incase max width and height are different
		if ($max_width != $max_height) {

			if ($max_height > $max_width) {

				if ($max_height > $new_height) {

					$adjustment = ($max_height / $new_height);

				} else {

					$adjustment = ($new_height / $max_height);

				}

				$new_width = $new_width * $adjustment;
				$new_height = $new_height * $adjustment;

			} else {

				if ($max_width > $new_width) {

					$adjustment = ($max_width / $new_width);

				} else {

					$adjustment = ($new_width / $max_width);

				}

				$new_width = $new_width * $adjustment;
				$new_height = $new_height * $adjustment;
			}
		}

		$new_image = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

		imagedestroy($original_image);

		imagejpeg($new_image,$resized_file_name,90);
		imagedestroy($new_image);
	}

}