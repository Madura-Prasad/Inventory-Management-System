<?php 	



require_once 'core.php';

$sql = "SELECT * FROM request";

$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$userid = $row[0];
 	// active 
 	$username = $row[1];
	 $email = $row[2];
	 $mobile = $row[3];
	 $pname = $row[4];
	 $qtn = $row[5];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeUser('.$userid.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	

 	$output['data'][] = array( 		
 		$username,
		$email,
		$mobile,
 		$pname,
		$qtn,
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);