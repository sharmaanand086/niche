<?php
include'conn.php';

$abc = $_POST['id'];
$userid = $_POST['userid'];
$mainid = explode("-",$abc);
$mid;$sid;$ssid;
$maintitle;
$subtitle;$subsubtitle;$subsubdecs;

	$mid = $mainid[0];
	$sid = $mainid[1];
	$ssid = $mainid[2];

	$maintopic = "SELECT * FROM main WHERE `id` = '$mid'"; 
    $resultmaintopic = mysqli_query($conn,$maintopic);
    while ($row1 = mysqli_fetch_assoc($resultmaintopic)) 
    {
    	$maintitle = $row1['title'];
    	
    }
    
    $subtopic = "SELECT * FROM subtopic WHERE `id` = '$sid'"; 
    $resultsubtopic = mysqli_query($conn,$subtopic);
    while ($row2 = mysqli_fetch_assoc($resultsubtopic)) 
    {
    	$subtitle = $row2['title'];
    	
    }

    $subsubtopic = "SELECT * FROM subsubtopic WHERE `id` = '$ssid' AND `mid` = '$mid' AND `sid` = '$sid'"; 
    $resultsubsubtopic = mysqli_query($conn,$subsubtopic);
    while ($row3 = mysqli_fetch_assoc($resultsubsubtopic)) 
    {
    	$subsubtitle = $row3['title'];
    	//echo $subsubtitle;
    	$subsubdecs = $row3['desc'];
    //echo $subsubdecs;
        $subsubdecs1 =  htmlspecialchars($subsubdecs);
    	//echo $subsubdecs1;
    }
    //echo $subsubtopic;

     $mianarray = array('title' => $maintitle,'subtitle'=>$subtitle,'subsubtitle' =>$subsubtitle,'subsubdecs'=>$subsubdecs);
    echo json_encode($mianarray);

?>
