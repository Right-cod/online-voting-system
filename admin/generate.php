<?php include ('session.php');?>
<?php include ('head.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">

                </div>
                <button style="margin-top:30px;" class="btn btn-success generate mt-5" >Generate winners</button>

                <!-- /.col-lg-12 -->
				
				
				<hr/>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading">
														Delegate winners list
													</div>    
												</div>
											</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="allme"><h2>Click generte winners button to get winners.</h2></div>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
              
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->
    <script>
        $('.generate').on('click',function(){
            var cool="cool";
            $.ajax({
			url : "get.php",
			method : "POST",
			data : {cool:cool},
			success : function(data){
             $('.allme').html(data);
			}
		})
        });
    </script>
    <?php include ('script.php');?>

</body>

</html>

