<?php
header('Access-Control-Allow-Origin: *');
session_start();
if($_SESSION["id"] == "")
{
    ?>
    <script>window.location.href="index.php"</script>
    <?php
}
$userid = $_SESSION["id"];
include'conn.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NICHE</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
	    <div class="main-nav" style="position:fixed;">
    		<div class="container-fluid">
    			<div class="top-head">
    				<p class="title">DISCOVER YOUR NICHE</p>
    				<div class="user"><?php echo $_SESSION["username"]; ?><span><a href="logout.php" style="color:#fff;">| Logout</a></span></div>
                    
    			</div>
    		</div>
    		
    		 <div class="count" style="width:100%; background:#ddd; color:#000;text-align:center;">
                <p style="padding:1.5%;margin:0;"><span id="countabc">3</span>/3 questions remaining</p>
        </div>
    	</div>
       
	</div>
 
	<div class="main-section" style="padding-top:30%">

		<div class="container-fluid demo">

	
	<div class="panel-group" id="accordion">
            
            <?php
             
                                        $maintopic = "SELECT * FROM main"; 
                                        $resultmaintopic = mysqli_query($conn,$maintopic);
                                       
                                     while ($row1 = mysqli_fetch_assoc($resultmaintopic)) 
                                    { 
                                        $mainid = $row1['id'];
                                        
                                ?>
    
            <div class="panel panel-default abcd">
                <div class="panel-heading xyz colorclass<?php echo $mainid; ?>" data-toggle="collapse" style="background-color: <?php echo $row1['color']; ?>;cursor: pointer;" data-parent="#accordion" href="#collapseThree<?php echo $mainid; ?>">
                    <h4 class="panel-title">
                        <a style="color: white"><?php echo $row1['title'] ?></a>
                    </h4>
                </div>
                <div id="collapseThree<?php echo $mainid; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <h5 class="question">Which area in <span id="subtitlea"><?php echo $row1['title'] ?></span> would you like to focus on? Select one</h5>
                        <div class="panel-group" id="accordion<?php echo $mainid; ?>">
                            <?php
                            $query = "SELECT * FROM subtopic WHERE mid = '$mainid' "; 
                                        $result = mysqli_query($conn,$query);
                                     while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                                $subid = $row['id'];
                                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: <?php echo $row1['subcolor']; ?>;cursor: pointer;">
                                    
                                    <h4 data-toggle="collapse" data-parent="#accordion<?php echo $mainid; ?>" href="#collapseThreeOne<?php echo $subid; ?>" class="panel-title">
                                        <a class="sub-top" style="text-transform: capitalize;"><?php $newvar = $row['title']; echo strtolower($newvar); ?>
                                        </a>
                                    </h4>

                                </div>

                                <div id="collapseThreeOne<?php echo $subid; ?>" class="panel-collapse collapse">
                                  <h5 class="question panel-body">Which area in <span id="subtitlea" style="text-transform: capitalize;"><?php $newvar = $row['title']; echo strtolower($newvar); ?></span> would you like to focus on? Select one</h5>
                                    <?php

                                            $subidquery = "SELECT * FROM subsubtopic WHERE mid = '$mainid' AND sid = '$subid'"; 
                                        $subidresult = mysqli_query($conn,$subidquery);
                                        
                                             while ($row2 = mysqli_fetch_assoc($subidresult)) 
                                                { 
                                                   // $userinfo = "SELECT * FROM userdata_subsubtopic WHERE uid = '$userid'"; 
                                                   // $useralldata = mysqli_query($conn,$userinfo);
                                                    
                                                  //  while ($row4 = mysqli_fetch_assoc($useralldata)) 
                                                   //      {
                                                    //        if($row4['title'] == $row2['mid'] && $row4['subtitle'] == $row2['sid'] && $row4['subsubtitle'] == $row2['id']){
                                                    //           
                                                   //         }else{
                                                   //             ?>
                                                               <div class="panel-body modalopen ab" style="border-bottom: 1px solid #ddd;cursor: pointer;" id="<?php echo $row2['mid']; ?>-<?php echo $row2['sid']; ?>-<?php echo $row2['id']; ?>" ><?php echo $row2['title']; ?></div>
                                                                <?php
                                                   //         }
                                                   //      }
                                                    ?>

                                    
                                    
                                    
                                     <?php } ?>
                                </div>
                               
                            </div>
                            <?php }?>
                        </div>
                         
                    </div>
                </div>
            </div>

            
            
       
	<?php

        }
            ?>
	 </div>
</div><!-- container -->
	</div>
<!-- Modal1 alert-->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm" style="padding-top: 42%;">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" style="padding:1% 3%">&times;</button>     
        <div class="modal-body">
          <p  style="text-align: center;">u have selected ......... option</p>
          <div class="confirm" style="display:flex;width:100%;justify-content: space-around;">
            <button class="confirm-btn" id="yes-btn">YES</button>
            <button class="confirm-btn" id="no-btn"style="background: #fb1c1c;">NO</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal2 alert-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm" style="padding-top: 42%;">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" style="padding:1% 3%">&times;</button>     
        <div class="modal-body">
          <p style="text-align: center;"> 2/3 options remaining</p>
          <div class="confirm" style="display:flex;width:100%;justify-content: center">
            <button class="confirm-btn" id="confirm-btn">OK</button>
            <!-- <button class="confirm-btn" id="no-btn"style="background: #fb1c1c;">NO</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- modal -->
        <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="height: 100vh;overflow-y: scroll;">
        
        <div class="modal-body" id="model-pdf">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="modal-row"><strong> Arfeen Khan </strong>| Discover your niche report</div>
                                <div class="modal-row"><p class="modal-user"> Bhavesh Gurav </p></div>
                                <div class="holder"> 
                                    <div class="modal-grp">
                                       <p>Area of transformation</p>
                                       <h3 class="abcedf"><strong id="mainid"></strong></h3>
                                    </div>
                                    <div class="modal-grp">
                                            <p>Niche</p>
                                            <h3 class="abcedf"><strong id="subid"></strong></h3>
                                    </div>
                                    <div class="modal-grp">
                                            <p>Your program</p>
                                            <h3 class="abcedf"><strong id="subsubid"></strong></h3>
                                    </div>
                                  
                                </div>
                                    <div class="bottom_modal ">
                                        <h4>Course Description</h4>
                                        <p id="subdesc" style="    overflow-y: scroll;"></p>
                                        <input type="hidden" id="textdesc" />
                                    </div>
                                
                            </div>
                             <button class="text-center">Download Report</button>
        
      </div>
      
    </div>
  </div>

</body>
<script>
  var abcdf=1;
$('.modalopen').click(function(){

                var id = $(this).attr('id');
                var userid = <?php echo $_SESSION["id"]; ?>;
                console.log(id);
                if(userid == "")
                {
                    alert("Sorry! Time Out Login Again");
                    window.location.href = "index.php";
                }else{
                            $.ajax({
                               "url": "getmodaldata.php",
                               "type": "POST",
                               data: {id:id,userid:userid},
                               dataType: "text",  
                                cache:false,
                             complete: function (response) {
                            },
                            success :  function (result) {
                               console.log(result);
                               var obj = JSON.parse(result);
                               
                               if(obj.count == 0)
                                   {
                                        alert(obj.count); 
                                       window.location.href="result.php";
                                   }
                                   else
                                   {
                                     
                                    $('#mainid').html(obj.title);
                                   $('#subid').html(obj.subtitle);
                                   $('#subsubid').html(obj.subsubtitle);
                                   $('#subdesc').html(obj.subsubdecs);
                                   $('#countabc').html(obj.count);
                                   $('#myModal3').modal('show');
                               }
                             /// console.log(obj.subsubdecs);
                                
            
                            },
            
                            error: function () {
                               
                            },
                    });
                    return false;
                }
        });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


<script type="text/javascript">

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('.text-center').click(function(){
    
    doc.fromHTML($('#model-pdf').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample.pdf');
});
    
</script>
</html>