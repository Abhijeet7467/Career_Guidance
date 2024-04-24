<?php
session_start();
include('connect.php');

if(empty($_SESSION['uid']))
{
	header('location:index');
}

error_reporting(0);
$id = $_GET['id'];

if(isset($_POST['send_msg']))
{
  $mdate = date('Y-m-d');
  $uid = $_SESSION['uid'];
  $mid = mysqli_real_escape_string($con,$_POST['mid']);
  $message = mysqli_real_escape_string($con,$_POST['message']);

  mysqli_query($con,"INSERT INTO `tbl_message`(`mdate`,`uid`,`mid`,`message`)VALUES('".$mdate."','".$uid."','".$mid."','".$message."')");
  echo "<script>
        alert('Successfully send your message to Mentor.');
        window.location.href='message?id=$id';
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
			<b>MENTOR MESSAGE PAGE</b>
		</div>
		

		<!-- -------------------- Content page start ----------------------------- -->

             
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
                            <a style="background-color:#010E28;color:white;" href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                   <span class="glyphicon glyphicon-send"></span>
                                   SEND MESSAGE
                            </a>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send New Message to Mentor..</h4>
      </div>
      <div class="modal-body">
        <form method="post">

          <label>Receiver Id</label>
          <input type="number" name="mid" class="form-control" value="<?php echo $id ?>" required="">
          <br>

           <label>Sender Id</label>
          <input type="number" name="uid" class="form-control" value="<?php echo $_SESSION['uid'] ?>" required="">
          <br>

          <label>Query Message</label>
          <textarea type="text" name="message" class="form-control" placeholder="Enter Query message.." rows="4"></textarea>
          <br>

          <button type="submit" class="btn btn-default btn-block" name="send_msg">SEND MESSAGE</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                     </div>
                     
              </div>


              <!-- -------------- user list table start ---------- -->
             <br>
               <div class="table-responsive">

                     <table class="table table-hover table-striped table-bordered">

                            <thead>
                                   <tr>
                                          <th>Sr No</th>
                                          <th>Message Id</th>
                                          <th>Message Date</th>
                                          <th>User Id</th>
                                          <th>Receiver Id</th>
                                          <th>Message</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>

                            <tbody id="myTable">
                                   <?php
                                   $ulist = mysqli_query($con,"SELECT * FROM `tbl_message` WHERE `uid` = '".$_SESSION['uid']."' AND `mid` = '".$id."' ");
                                   $counter = 1;
                                   while($ulist_data = mysqli_fetch_assoc($ulist)){
                                   ?>
                                   <tr>
                                          <td><?php echo $counter; ?></td>
                                          <td><?php echo $ulist_data['msg_id'] ?></td>
                                          <td><?php echo $ulist_data['mdate'] ?></td>
                                          <td><?php echo $ulist_data['uid'] ?></td>
                                          <td><?php echo $ulist_data['mid'] ?></td>
                                          <td><?php echo $ulist_data['message'] ?></td>
                                          <td>
                                              <a onclick="return confirm('Are you sure?')" href="inbox?id=<?php echo $ulist_data['msg_id'] ?>">
                                              <span class="glyphicon glyphicon-trash"></span>
                                              Delete
                                              </a>   
                                          </td>
                                   </tr>
                            <?php $counter++;} ?>
                            </tbody>
                            
                     </table>
                      
               </div>

              <!-- -------------- user list table send ---------- -->


    <!-- -------------------- Content page end ----------------------------- -->

              <!-- -------------- mentor list table send ---------- -->


		<!-- -------------------- Content page end ----------------------------- -->
		
	</div>

</body>
</html>