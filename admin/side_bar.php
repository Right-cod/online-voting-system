<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; background-color:green;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="" style = "color:white;"><i class = "fa fa-home fa-large" > </i> DEDAN KIMATHI UNIVERSITY OF TECHNOLOGY</a>
				
            </div>
      

            <ul class="nav navbar-top-links navbar-right">
            
               <?php require 'dbcon.php';
				$query = $conn->query("SELECT * from user where user_id ='$session_id'")or die (mysql_error ());
				
				while ($row = $query->fetch_array()){
				
				
			 ?>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style = "color: white">
                    </a>
                   
                
                </li>
           
            </ul>
			<?php }?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="candidate.php"><i class="fa fa-menu fa-fw"></i>Menu </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Candidate List<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="candidate.php"><i class = "fa fa-user fa-fw"></i> View Candidates</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-users"></i> Voters List<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="voters.php"><i class = "fa fa-user fa-fw"></i> View Voters</a>
                                </li>
                                <li>
                                    <a href="../register/index.php"><i class = "fa fa-user fa-fw"></i> Add Voters</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Generate winners<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="generate.php"><i class = "fa fa-user fa-fw"></i> Delegate winners</a>
                                </li>
                                <li>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       

                        <li>
                            <a href="canvassing.php"><i class="fa fa-download fa-fw"></i> Election Report</a>
                        </li>
                       
                       
                       
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="user.php"> <i class = "fa fa-users" ></i> View User</a>
                                </li>
                                <li>
                                    <a href="logout.php"> <i class = "fa fa-sign-out" ></i>Logout</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>