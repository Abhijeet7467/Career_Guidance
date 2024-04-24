<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Mentor List Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		.well-sm, .well {box-shadow:0 0 2px #010E28;}

		.col-sm-3 .well h3 {color:#010E28;}
		.col-sm-3 .well:hover {border:1px solid #010E28;}

              .table thead tr th {background-color:#010E28;
                                  color:white;}
                .table thead tr {border-left:2px solid #010E28;border-right:2px solid #010E28;}                  
               .table thead tr th {border:1px solid white;}
              .table tbody tr td {border:1px solid #010E28;}
	</style>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-th-list"></span>
			<b>MENTOR LIST PAGE</b>
		</div>
		

		<!-- -------------------- Content page start ----------------------------- -->

              <div class="row">

                     <div class="col-sm-3">

                      <input style="border:1px solid #010E28;" class="form-control" id="myInput" type="text" placeholder="Filter Here..">

                     <script>
                     $(document).ready(function(){
                       $("#myInput").on("keyup", function() {
                         var value = $(this).val().toLowerCase();
                         $("#myTable tr").filter(function() {
                           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                         });
                       });
                     });
                     </script>
                            
                     </div>

                     <div class="col-sm-7">
                            
                     </div>

                     <div class="col-sm-2">
                            <a style="background-color:#010E28;color:white;" href="#" class="btn btn-default" onclick="print()">
                                   <span class="glyphicon glyphicon-print"></span>
                                   PRINT
                            </a>
                     </div>
                     
              </div>


              <!-- -------------- mentor list table start ---------- -->
             <br>
               <div class="table-responsive">

                     <table class="table table-hover table-striped table-bordered">

                            <thead>
                                   <tr>
                                          <th>Sr No</th>
                                          <th>Student Id</th>
                                          <th>Mentor Id</th>
                                          <th>Mentor Name</th>
                                          <th>Mentor Photo</th>
                                          <th>For Class</th>
                                          <th>Mentor Information</th>
                                          <th>Email</th>
                                          <th>Gender</th>
                                          <th>Contact</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>

                            <tbody id="myTable">
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_connect_mentor` WHERE `uid`= '".$_SESSION['uid']."' ");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>
                                   <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><?php echo $ulist_data['uid'] ?></td>
                                          <td><?php echo $ulist_data['mid'] ?></td>
                                          <?php
                                          $mdata = mysqli_query($con,"SELECT * FROM `tbl_mentor` WHERE `mid` = '".$ulist_data['mid']."' ");
                                          $mdata1 = mysqli_fetch_array($mdata); 
                                          ?>
                                          <td><?php echo $mdata1['mname'] ?></td>
                                          <td>
                                            <img src="<?php echo 'mentor/mphotos/'.$mdata1['photo'] ?>" width="70px">
                                          </td>
                                          <td><?php echo $mdata1['mclass'] ?></td>
                                          <td><?php echo $mdata1['minfo'] ?></td>
                                          <td><?php echo $mdata1['email'] ?></td>
                                          <td><?php echo $mdata1['gender'] ?></td>
                                          <td><?php echo $mdata1['contact'] ?></td>
                                          <td>
                                                <a title="Want to chat with this mentor.." href="message?id=<?php echo $ulist_data['mid'] ?>" class="btn btn-default">Message</a>
                                          </td>
                                   </tr>
                            <?php $counter++;} ?>
                            </tbody>
                            
                     </table>
                      
               </div>

              <!-- -------------- mentor list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>