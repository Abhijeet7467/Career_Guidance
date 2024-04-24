<?php
session_start();
include('connect.php');
error_reporting(0);
if(empty($_SESSION['uid']))
{
	header('location:index');
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
 /* body {background-image:url('images/back.jpg');
          background-attachment:fixed;
          background-size:cover;}*/
		.well-sm {box-shadow:0 0 2px #010E28;}
		.panel-header {background-color:#010E28;
		               color:white;
		               text-align:center;}
	</style>
	<script type = "text/javascript" >
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>
</head>
<body>

	<?php include('header.php'); ?>

	<div class="container">

		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"></span>
			<b>HOME PAGE</b>
		</div>

		<marquee onmouseover="this.stop()" onmouseout="this.start()">
			<p>
				<img src="images/new.gif">
				Latest news or information provided by admin or Mentor.
        <img src="images/new.gif">
        Latest news or information provided by admin or Mentor.
			</p>
		</marquee>

		<!--  information section start  -->
	

   <!-- notification start -->
   <div class="row">
         <div class="col-sm-6">
                        <?php
                        $mdata = mysqli_query($con,"SELECT * FROM `tbl_message` WHERE `uid` = '".$_SESSION['uid']."'  ORDER BY msg_id desc ");
                        $mdata1 = mysqli_fetch_array($mdata);

                        $sdata = mysqli_query($con,"SELECT * FROM `tbl_mentor` WHERE `mid` = '".$mdata1['mid']."' ");
                        $sdata1 = mysqli_fetch_array($sdata);
                        ?>
                        <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>New Message!</strong><br> 
  <?php echo "Date: ".$mdata1['mdate'] ?><br>
  <?php echo "Mentor Id: ".$mdata1['mid'] ?><br>
  <?php echo "Mentor Name: ".$sdata1['mname'] ?><br>
  <?php echo "User Id: ".$mdata1['uid'] ?><br>
  <?php echo "Message: ".$mdata1['message'] ?><br><br>
  <a class="btn btn-default" href="message?id=<?php echo $mdata1['mid'] ?>">Go to Message List</a>
</div>
   </div>

   <div class="col-sm-3">
     <iframe width="100%" height="200" src="https://www.youtube.com/embed/laM9Jxmzs9E" title="Career Guidance #right career animated explainer video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
   </div>
   <div class="col-sm-3">
     <iframe width="100%" height="200" src="https://www.youtube.com/embed/zhpcgpqWc1Q" title="How to Choose the Right Career Path in 7 Simple Steps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
   </div>
</div>      
   <!-- notification end -->


  <h2>Career choice</h2>
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">After 10th</a></li>
    <li><a data-toggle="tab" href="#menu2">After 12th</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>Science</h4>
      	</div>
      	<div class="panel-body">
      		<p>
			  Science (both medical or non-medical stream) is a popular choice of subject among students especially 
           those who wish to be a doctor or an engineer. Science is a multi-disciplined field with new 
           disciplines and branches being added with the advancement of science and technology.
		   <br><h4>PCM (Physics, Chemistry, Mathematics):</h4> 
		   <p>This stream is suitable for students interested in careers in engineering, architecture, computer science, mathematics, physics, chemistry, and related fields.
			 Provides a strong foundation in math and science courses, emphasizing problem-solving skills and analytical thinking.</p>
			 <br><h4>PCB (Physics, Chemistry, Biology):</h4> 
		   <p>This stream is ideal for students interested in pursuing careers in chemistry, dentistry, pharmacy, animal science, biotechnology, biology, and other social sciences.
			 It focuses on biology, chemistry, and physics, providing students with a deeper understanding of organisms, their functions, and interactions.</p>
			 <br><h4>PCMB (Physics, Chemistry, Mathematics, Biology):</h4> 
		   <p>This stream offers a combination of courses from both the PCM and PCB streams, enabling students to keep their options open and explore a wide range of career opportunities.
			Suitable for students interested in mathematics and biology or undecided about their future career.</p>
      		</p>
      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=10">Connect with Mentor</a>
      	</div>
      </div>

      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>Commerce</h4>
      	</div>
      	<div class="panel-body">
		  <p>
			  Commerce as a stream of education can be defined as a study of trade and business activities such as 
         the exchange of goods and services from producer to final consumer. The main subjects that are taught 
         in the Commerce stream include Economics, Accountancy and Business Studies. Choose this field if you 
         have a genuine interest in these subjects and have an affinity for numbers, the economy and business.
		   <br><h4>Commerce (including Mathematics):</h4> 
		   <p>This stream is suitable for students interested in pursuing careers in areas such as accounting, finance, business administration, finance, and business-related courses.This includes courses such as accounting, business administration, finance, statistics, and sometimes business or computer science.</p>
			 <br><h4>Commerce (including finance):</h4> 
		   <p>This stream focuses on subjects such as accounting, business studies, finance, and sometimes statistics or statistics. Suitable for students interested in economics, finance, business and related fields.</p>
			 <br><h4>Commerce (including Physical Education):</h4> 
		   <p>Some schools offer commercial courses that include physical education. This stream is suitable for students interested in sports management, physical education and related fields.
</p>
      		</p>

      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=10">Connect with Mentor</a>
      	</div>
      </div>

      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>Arts</h4>
      	</div>
      	<div class="panel-body">
		  <p>
			 Arts stream is very diverse. This fact is evident from the studies involved in this stream. It covers 
          wide variety of studies such as- visual arts (painting, sculpting, drawing etc), performing arts 
          (music, dance, drama etc), literary arts (languages, literature, philosophy etc), history, law, 
          humanities subjects, geography, political science etc.
		   <br><h4>Political Science:</h4> 
		   <p>Political science examines political systems, theories, and institutions. It covers topics such as governance, international relations, and public policy. Career options include political analyst, policy researcher, government official, diplomat, and political consultant.
</p>
			 <br><h4>Economics:</h4> 
		   <p> Economics studies the production, distribution, and consumption of goods and services. It explores topics such as microeconomics, macroeconomics, and economic policies. Career options include economist, financial analyst, market researcher, banker, and policy advisor.
</p>
			 <br><h4>Sociology:</h4> 
		   <p>Sociology explores the structure, dynamics, and behavior of human societies. It examines social institutions, inequalities, and cultural patterns. Career options include sociologist, social worker, counselor, community organizer, and researcher.
</p>
      		</p>




      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=10">Connect with Mentor</a>
      	</div>
      </div>
      
    </div>
<!-- menu 1 end -->


    <div id="menu2" class="tab-pane fade">
      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>Bio-Technology</h4>
      	</div>
      	<div class="panel-body">
		  <p>
			 After completing Grade 12, students can pursue a variety of educational pathways and career options in the biotechnology field. Here are some possible career paths and education options.


		   <br><h4>Bachelors in Biotechnology:</h4> 
		   <p>Many universities offer graduate programs in biotechnology, which provide a solid foundation in biology, chemistry, genetics, biotechnology, and bioinformatics Bachelors in biotechnology can lead to leading positions in research institutions, pharmaceutical companies, biotechnology companies, agricultural companies as well as health care organizations.
</p>
			 <br><h4>Masters in Biotechnology:</h4> 
		   <p> Masters in biotechnology can lead to specialization in specific areas such as molecular biology, genetic engineering, bioinformatics, bioprocessing, or biomedical research Masters can lead to advanced research positions, managerial roles, or teaching position in education.

</p>
			 <br><h4>Ph.D. in Biotechnology:</h4> 
		   <p>Ph.D. is open to individuals interested in conducting cutting-edge research and making significant contributions to the field. Electives may be in biotechnology or a related field. He holds a Ph.D. The program generally involves intensive research, thesis writing, and the opportunity to work on a variety of interdisciplinary projects. Ph.D. Graduates may work as researchers, teachers, or scientific leaders in academia, research institutes, government agencies, or biotechnology companies.

</p>
      		</p>
      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=12">Connect with Mentor</a>
      	</div>
      </div>

      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>B.Sc.(Maths)</h4>
      	</div>
      	<div class="panel-body">
		  <p>
			 A BSc Mathematics is a 3-year UG course typically offered by universities and colleges and is designed to provide students with a strong foundation in mathematical theory, techniques, and applications.

		   <br><h4>Actuarial Science: </h4> 
		   <p>Actuaries analyze financial risks using statistical and mathematical techniques. They work with insurance companies, consulting firms, and financial institutions to assess risk, set premiums, and develop investment strategies.
</p>
			 <br><h4>Teaching/Education: </h4> 
		   <p> If you have other qualifications like B.Ed. or teaching certification, graduates may pursue a career teaching mathematics at the junior or senior level. They can also be individual tutors or subject tutors in training institutions.

</p>
			 <br><h4>Business Analysis:</h4> 
		   <p> Business analysts use statistics and qualitative methods to solve complex problems in marketing, logistics, manufacturing, and engineering. They help organizations improve efficiency, reduce costs, and make informed decisions.

</p>
      		</p>
      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=12">Connect with Mentor</a>
      	</div>
      </div>

      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h4>MBA (Administration)</h4>
      	</div>
      	<div class="panel-body">
      		<p>
			  The integrated MBA program following the 12th grade is a unique dual-degree program that combines both undergraduate and postgraduate studies.

This program spans a duration of 5 years, allowing students to delve into the intricacies of business management concepts while also specializing in their chosen field.
For instance, prestigious institutions like IIM offer an Integrated Programme in Management (IPM), which merges BBA and MBA degrees into a comprehensive 5-year integrated MBA program.

<h4>Some noteworthy specializations within integrated MBA courses include:</h4>

<p>MBA in Finance</p>
<p>MBA in HR (Human Resources)</p>
<p>MBA in Sales and Marketing</p>
<p>MBA in Business Analytics1</p>
<p>MBA in Supply Chain Management</p>
      		</p>
      	</div>
      	<div class="panel-footer">
      		<a class="btn btn-primary" href="mlist?id=12">Connect with Mentor</a>
      	</div>
      </div>

  </div>
    <!-- menu 2 end -->


    

		<!--  information section end -->

		
	</div>

</body>
</html>