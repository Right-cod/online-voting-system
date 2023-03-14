<?php include ('head.php');?>
<?php include("sess.php")?>
<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>
    </div>
	<form method = "POST" action = "vote_result.php">
	<div class="col-lg-6">
	
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center>
                           VOTE</center>
                        </div>
                        <div class="panel-body" >
						<?php
							$query = $conn->query("SELECT * FROM candidate where position='$dpt'") or die(mysqli_errno());
							while($fetch = $query->fetch_array())
						{
						?>
                           <div id = "position">
							<img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:50px;" height = "150px" width = "150px" class = "img">
							
							<center><button type="button" class="btn btn-success btn-s" style = "border-radius:50px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button></center>
							<center><button type="button" class="btn btn-success btn-s" style = "border-radius:50px;margin-top:4px;"><?php echo $fetch['position']?></button></center>
							<center><input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "pres_id" class = "president"></center>
							</div>
	
						<?php
							}
						?>

						</div>
                       
                    </div>
     </div>
				
				
		
		<center><button class = "btn btn-success ballot" type = "submit" name = "submit">Submit Ballot</button></center>
		</form>
</body>
<?php include ('script.php')?>
  
  <script type = "text/javascript">
		$(document).ready(function(){
			$(".president").on("change", function(){
				if($(".president:checked").length == 1)
					{
						$(".president").attr("disabled", "disabled");
						$(".president:checked").removeAttr("disabled");
					}
				else
					{
						$(".president").removeAttr("disabled");
					}
			});
			
			
		});	
	</script>
</html>

