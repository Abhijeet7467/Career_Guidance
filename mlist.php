<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}
//error_reporting(0);
$id = $_GET['id'];
//$sql = mysqli_query($con,"SELECT * FROM `tbl_mentor` WHERE `mclass` = '".$id."' ");

if(isset($_POST['hidm_btn']))
{
  $uid = $_SESSION['uid'];
  $mid = $_POST['hidm'];
  mysqli_query($con,"INSERT INTO `tbl_connect_mentor`(`uid`,`mid`)VALUES('".$uid."','".$mid."')");
  echo "<script>
  alert('Successfully register for the new mentor..');
  window.location.href='mentor_list';
  </script>";
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


              <!-- -------------- user list table start ---------- -->
             <br>
               <div class="table-responsive">

                     <table class="table table-hover table-striped table-bordered">

                            <thead>
                                   <tr>
                                          <th>Sr No</th>
                                          <th>Mentor Name</th>
                                          <th>Mentor Photo</th>
                                          <th>For Class</th>
                                          <th>Mentor Info</th>
                                          <th>Email Id</th>
                                          <th>Gender</th>
                                          <th>Contact Number</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>

                            <tbody id="myTable">
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_mentor` WHERE `mclass`= '".$id."' ");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>
                                   <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><?php echo $ulist_data['mname'] ?></td>
                                          <td>
                                            <img src="<?php echo 'mentor/mphotos/'.$ulist_data['photo'] ?>" width="70px">
                                          </td>
                                          <td><?php echo $ulist_data['mclass'] ?></td>
                                          <td><?php echo $ulist_data['minfo'] ?></td>
                                          <td><?php echo $ulist_data['email'] ?></td>
                                          <td><?php echo $ulist_data['gender'] ?></td>
                                          <td><?php echo $ulist_data['contact'] ?></td>
                                          <td>
                                              <form method="post">
                                                <input type="hidden" name="hidm" value="<?php echo $ulist_data['mid'] ?>">
                                                <button title="Want to connect with this mentor.." type="submit" name="hidm_btn">Connect</button>
                                              </form>
                                          </td>
                                   </tr>
                            <?php $counter++;} ?>
                            </tbody>
                            
                     </table>
                      
               </div>

              <!-- -------------- user list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>