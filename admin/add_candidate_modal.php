<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-success">
						<div class="panel-heading">
							<center>Add Candidate</center>
						</div>    
					</div>
				</h4>
			</div>
										
										
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<div class="form-group">
						<label>DEPARTMENT</label>
						<select class = "form-control" name = "position">
								<option>A1</option>
								<option>B1</option>
								<option>C1</option>
								<option>D1</option>
								<option>E1</option>
								<option>F1</option>
								<option>G1</option>
								<option>H1</option>
								<option>I1</option>
								<option>J1</option>
								<option>K1</option>
								<option value="President">President</option>
							</select>
					</div>
					<div class="form-group">
						<label>REG NO</label>
							<input class="form-control"  type = "text" name = "regno" placeholder="Please enter Reg no" required="true">
					</div>
										
					<div class="form-group">
						<label>Firstname</label>
							<input class="form-control" type ="text" name = "firstname" placeholder="Please enter firstname" required="true">
					</div>
					<div class="form-group">
						<label>Lastname</label>
							<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
					</div>
															
					<div class="form-group">
						<label>Gender</label>
							<select class = "form-control" name = "gender">
								<option></option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>
											
											
					<div class="form-group">
                        <label>Image</label>
						<input type="file" name="image"required> 
                    </div>
						<button name = "save" type="submit" class="btn btn-primary">Save Data</button>
				</form>  
			</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
										
										
										
										
			<?php 
				require_once 'dbcon.php';
				
				if (isset ($_POST ['save'])){
					$position=$_POST['position'];
					$firstname=$_POST['firstname'];
					$lastname=$_POST['lastname'];
					$gender=$_POST['gender'];
					$regno=$_POST['regno'];
					//
                    $check=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM voters where id_number='$regno'"));
					if($check>0){
					$dd=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM voters where id_number='$regno'"));
					$vid=$dd['voters_id'];
					$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name= addslashes($_FILES['image']['name']);
					$image_size= getimagesize($_FILES['image']['tmp_name']);
		
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$location="upload/" . $_FILES["image"]["name"];
					
					
					$conn->query("INSERT INTO candidate(position,firstname,lastname,gender,img,voter_id)values('$position','$firstname','$lastname','$gender','$location',$vid)")or die(mysql_error());
					}else{
                      echo "<script> alert ('The candidate is not registered as a voter thus not qualified.');</script>";
					}
					//

				}						
			?>					
        </div>
                                   
<!-- /.modal-content -->
                                
	</div>
                               
<!-- /.modal-dialog -->
								
</div>