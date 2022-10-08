<?php
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

function Upload($fupload_name){
  $vdir_upload = "../img/upload/";
  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
?>
