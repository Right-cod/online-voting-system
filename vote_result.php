<?php include ('head.php');?>
<?php include ('sess.php');?>

<body>

    <div id="row">
        <?php 
			include ('side_bar.php');
			if(ISSET($_POST['submit']))
				{
					if(!ISSET($_POST['pres_id']))
					{
						$_SESSION['pres_id'] = "";
					}
					else
					{
						$_SESSION['pres_id'] = $_POST['pres_id'];
					}
					
				}
		?>
    </div>
			<center>
		  <div class="col-lg-8" style = "margin-left:240px;" >
		  <div class = "alert alert-info">
			<label>Your choice is</label>
			<br />
			<?php
				if(!$_SESSION['pres_id'])
					{
						
					}
				else
					{
						$fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = '$_SESSION[pres_id]'")->fetch_array();
						$pos=$fetch['position'];
						echo $fetch['firstname']." ".$fetch['lastname']." "."<br> <img src = 'admin/".$fetch['img']."' style = 'height:80px; width:80px; border-radius:500px;' />"; 
					}
			?>
			</div>
			</div>
			<br />
			<button type = "submit" data-toggle = "modal" data-target = "#result" class = "btn btn-success" >Submit Final Vote</button>
		</div>
	</center>
	<div class="modal fade" id = "result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">         
												
											</h4>
										</div>
										
										
                                        <div class="modal-body">
										<p class = "alert alert-danger">Are you sure you want to submit your Vote? </p>
                                    </div>
									
									<div class="modal-footer">
								<a href = "submit_vote.php?pos=<?php echo $pos ?>"><button type = "submit" class="btn btn-success"><i class="icon-check"></i>&nbsp;Yes</button></a>
								<a href = "vote.php"><button class="btn btn-danger" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Back</button></a>
									</div>
									</div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
</body>
<?php include ('script.php')?>
</html>

