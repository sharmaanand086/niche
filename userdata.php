<?php
session_start();
$conn = mysqli_connect('localhost', 'username', 'pass', 'worldsuc_stftitle');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NICHE</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    	<div class="main-sec">
          
                	<div class="header">
				<div class="container">
					<div class="header-heading">
						<p class="title">DISCOVER YOUR NICHE</p>
						<div class="dropdown">
                            <div class="username"><?php echo $_SESSION['name'] ?> 
                              <i class="fa fa-caret-down droparow"></i>
                            </div>
                            <div class="dropdown-content">
                              <a href="logout.php">Logout</a>
                            </div>
                         </div> 
						<!--<p class="username"><?php echo $_SESSION['name'] ?>-->
						    <!--<a href="#">Link 1</a>-->
						</p>
					</div>
				</div>
			</div>
           
        <div class="steps12">
		    <div class="container">
                <div class="step-title">Step two</div>
                <div class="desc">Now that you’ve selected your main topic, select a sub - category in that topic. Let’s narrow it down even further.</div>
            </div>
		</div>
		</div>
		
		<div class="mob-subcat">
                <div class="mob-title">
                    <div class="">
                        <div>
                              <?php
                                $query = "SELECT * FROM main"; 
                                $result = mysqli_query($conn,$query);
            		         while ($row = mysqli_fetch_assoc($result)) 
                            { $id_main = $row['id'];
                            ?>  
                             <p class="mob-head maintitle" id="<?php echo $row['id'] ?>" style="display:block;color: red !important;"><?php echo $row['title'] ?> </p>
                                <div class="right_header" style="display: none;">
                                    <h4>Which area in <span id="subtitlea"></span> would you like to focus on? Select one</h4>
                                </div>
                                
                                <?php
                    $subid;
                    $subtopic = "SELECT * FROM subtopic WHERE mid='$id_main'"; 
                    $subresult = mysqli_query($conn,$subtopic);
		         while ($row2 = mysqli_fetch_assoc($subresult)) 
                {  
                   $subid= $row2['id'];
                ?>
                                 <div class="container newsubtitile subtitle<?php echo $row2['mid'] ?>" id="<?php echo $row['id']; ?>-<?php echo $row2['id']; ?>" style="display: none;">
                                         
                                            <div class="right_list">
                                                <ul class="niche_steps">
                                                	<i class="fa fa-arrow-left newsubabc" id="mainidsub" style="font-size:17px;padding-top: 4px; padding-right: 10px; float:left;"></i>
                                                    <div class="subtop<?php echo  $row2['mid']; ?> subtopichide" id="<?php echo $subid; ?>">
                                                        <span class="tick_mark" id="tick_mark<?php echo  $row2['mid'] ?>" style="display:none;">✔</span>
                                                        <p style="color: green !important;">
                                                          <?php echo $row2['title'] ?> </p>
                                                    </div>
                                                </ul>
                                            </div>
                                        
                                    </div>
                                    
                                    
                                 <div class="right_header2" style="display: none;">
                                        <h4>Which area in <span id="newsubsubtopic"></span> would you like to focus on? Select one</h4>
                                    </div>
                                    <?php
                                $subsubtopic = "SELECT * FROM subsubtopic WHERE mid='$id_main' AND sid ='$subid'"; 
                                $subsubresult = mysqli_query($conn,$subsubtopic);
            		           while ($row3 = mysqli_fetch_assoc($subsubresult)) 
                            {  
                               $subsubid= $row3['id'];
                            ?>
                                     <div class="mob-subcategories subhideclass subsubtitle<?php echo $row3['mid']; ?>-<?php echo $row3['sid']; ?>" id="subsubnew" style="display: none;">
                                                
                                                        <ul class="niche_steps">
                                                            <li class="subsubhide" id="<?php echo $row['id'] ?>">
                                                                <span class="tick_mark_sub" id="tick_mark_sub<?php echo $row['id'] ?>" style="display:none;">✔</span>
                                                                <h4> <?php echo $row3['title'] ?></h4>

                                                            </li>

                                                        </ul>
                                                   
                                            
                                        </div>
                        </div>
                         <?php 
                       }
                     
                    }
                 }
                  
                ?>
                    </div>
                </div>
            </div>
    </body>
<script>
   var maintitle;
    $('.maintitle').click(function(){
       maintitle = $(this).attr('id');
     // alert(maintitle);
      $('.container').hide();
      $('.subhideclass').hide();
	  $('.subtitle'+maintitle).show();
    });
    
   $('.newsubtitile').click(function(){
				var subtitle = $(this).attr('id');
				alert(subtitle);
				$('.subhideclass').hide();
				$('.subsubtitle'+subtitle).show();

		});
		
		$('.subsubhide').click(function(){

				var id = $(this).attr('id');
			$.ajax({
         		
		           "url": "http://139.59.80.160/niche/apiniche/getmodaldata.php",
		           "type": "POST",
		           data: {id:id},
		           dataType: "text",  
		            cache:false,
		         complete: function (response) {
		           // $('#output').html(response.responseText);
		           // alert('this is complete111 !!');
		        },
		        success :  function (result) {
		           // $('#output').html('Bummer: there was an error!');
		               //$('#chat_process'+id1).html(result);
		           console.log(result);
		           $('#myModal').modal('show');	
		        },

		        error: function () {
		           // $('#output').html('Bummer: there was an error!');
		          // alert('errore1111 !!');
		        },
		    });
		    return false;

		});

</script>

</html>