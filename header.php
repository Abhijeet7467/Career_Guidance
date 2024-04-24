<style type="text/css">
  .navbar-inverse {background-color:#010E28;
                  border:none;
                  border-radius:0px;}
   #myNavbar ul li a {color:white;}
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color:white;" class="navbar-brand" href="#">
        <span style="background-color:white;color:#010E28;padding-top:1px;padding-bottom:4px;padding-right:2px;padding-left:2px;border-radius:10px;" class="glyphicon glyphicon-user"></span>
        <?php echo $_SESSION['fname'] ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home">
        <span class="glyphicon glyphicon-home"></span>
        Home</a>
       </li>
 
    <li><a href="profile">
        <span class="glyphicon glyphicon-list-alt"></span>
        Profile</a>
        </li>  

         <li><a href="mentor_list">
        <span class="glyphicon glyphicon-list"></span>
        Mentor List</a>
        </li>        

        <li><a href="logout">
        <span class="glyphicon glyphicon-off"></span>
        Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>