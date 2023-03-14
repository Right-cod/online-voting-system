<?php include ('session.php');?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         
                                            <th>Department</th>
                                            <th>Winner</th>
                                            <th>Image</th>
                                            <th>Votes count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //
                                    $all=mysqli_query($conn,"SELECT * FROM votes group by voters_id order by vote_id asc");
                                    while($den=mysqli_fetch_array($all)){
                                        $dep=$den['voters_id'];
                                        
                                        $bs2=mysqli_fetch_array(mysqli_query($conn,"SELECT candidate_id AS Mode, COUNT(*) AS Count 
                                        FROM votes
                                        where voters_id='$dep'
                                        HAVING COUNT(*) >= ALL (SELECT COUNT(*) FROM votes  where voters_id='$dep');
                                        "));
                                        $md=$bs2['Mode'];
                                        $my=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM candidate where candidate_id=$md"));
                                        $vid=$my['voter_id'];
                                        $count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM votes where candidate_id='$md'"));
                                        mysqli_query($conn,"UPDATE voters SET status='Unvoted',depid='President' where voters_id=$vid");
                                        ?>
                                        <tr>
                                        <td><?php echo $my ['position'];?></td>
                                        <td><?php echo $my ['firstname']." ".$my ['lastname'];?></td>
                                        <td><img src="<?php echo $my['img']; ?>" width="150px" height="150px" alt=""></td>
                                        <td><?php echo $count;?></td>    
                                        </tr>
                                        <?php
                                    }
                                    //
/*

*/
                            ?>

                                    </tbody>
                                </table>