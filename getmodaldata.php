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
   // echo $subsubtopic;

	$usercount = "SELECT * FROM 2_user WHERE `id` = '$userid'"; 
    $getcunt = mysqli_query($conn,$usercount);
    while ($row4 = mysqli_fetch_assoc($getcunt)) 
    {
    	$count = $row4['count'];
    	
    }
    	$usercount = "SELECT * FROM 2_user WHERE `id` = '$userid'"; 
    $getcunt = mysqli_query($conn,$usercount);
    while ($row4 = mysqli_fetch_assoc($getcunt)) 
    {
      $total = $row4['count'];
    }
    
      $sql = "SELECT * FROM userdata_subsubtopic WHERE `uid` = '$userid'"; 
     $result1=mysqli_query($conn,$sql);
     $rowcount=mysqli_num_rows($result1);
    // echo $rowcount;
     $balance;
     if($rowcount <= $total ){
            $sql3 = "SELECT * FROM userdata_subsubtopic WHERE `uid` = '$userid' AND  `title` = '$mid' AND `subtitle` = '$sid' AND  `subsubtitle` = '$ssid'"; 
            $result13 =mysqli_query($conn,$sql3);
             if(mysqli_num_rows($result13)==0)
             {
                 //Insert in to table
                $insertfinal = "INSERT INTO `userdata_subsubtopic`(`uid`, `title`, `subtitle`, `subsubtitle`, `desc`, `status`) VALUES ('$userid','$mid','$sid','$ssid','$ssid','0')";
                $result12=mysqli_query($conn,$insertfinal);
               // echo $total;
                  $balance =  $total - $rowcount; 
            }else{
                 $balance =  $total - $rowcount;
            }
     }else{
        //echo  $balance;
        $balance = 0;
     }

     $mianarray = array('title' => $maintitle,'subtitle'=>$subtitle,'subsubtitle' =>$subsubtitle,'subsubdecs'=>$subsubdecs,'count'=>$balance);
    echo json_encode($mianarray);

?>