<?php 
include_once 'include/config.php';
include("include/header.php");
 if(isset($_POST['ChangePass']))
      {
      $passwordvalue=md5($_POST['cur_pwd']);
      $password=md5($_POST['password']);
      $confirm_pwd=md5($_POST['confirm_pwd']);   
      $select=mysqli_query($con,"select * from user"); 
      $fetch=mysqli_fetch_array($select);
     $data_pwd=$fetch['password'];
     $username=$fetch['username'];

      if($password==$confirm_pwd && $data_pwd==$passwordvalue)
        {
      @$insert=mysqli_query($con,"update  user set password='$confirm_pwd' where username='$username'"); 
	  ?>
      <script>
	  alert("Password Changed Successfully");
	  </script>
        <?php }
      else
        {  ?>
		 <script>
      alert("Password Not Match Plz Try Again");
	   </script>
     <?php    }
      }
?>
<style>
.hh{
  width: 100%;
  height: 23px;
  padding: 0px 0px 0px 40px;
  font-weight:bold;
 }
 .hh:hover{
	 background-color:#41cac0;
 }
</style>
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="dashboard.php" class="logo" >Admin</a>
          <!--logo end-->
         
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          
                          <span class="username">Hi Admin</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a  data-toggle="modal" href="#myModal1"><i class=" icon-suitcase"></i>Change Password</a></li>
                             <li><a href="#"><i class=""></i> </a></li>
                          <!--<li><a href="#"><i class="icon-cog"></i> Change Email</a></li>-->
                          <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
           <div class="top-nav">
              <ul class="nav pull-right top-menu">
                 
                  
                
                  
              </ul>
          </div>
          
           <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                 
                  
              </ul>
          </div>
          
          
          
           <center></center>
      </header>
 


                           
                          <!-- Modal -->
                          <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Change Password</h4>
                                      </div>
                                      <div class="modal-body">
                                     
                                       <form action="" method="post" name="change_pass" onSubmit="return valid()" class="form-horizontal" role="form">
                                         
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Old Password</label>
                                                  <div class="col-lg-10">
                                                      <input type="password" class="form-control" name="cur_pwd" required>
                                                  </div>
                                              </div>
                                             <div class="form-group">
                                                  <label  class="col-lg-2 control-label">New Password</label>
                                                   <div class="col-lg-10">
                                          <input type="password" class="form-control" id="pass1" name="password"  required>
                                           
                                           
                                               </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Confirm Password</label>
                                                   <div class="col-lg-10">
                                          <input type="password" class="form-control" name="confirm_pwd"  required>
                                           
                                           
                                               </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      
                                                      <input type="submit" name="ChangePass" value="Submit" class="btn btn-send">
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                     
                     
                  
                  
                  <!----end popup  ----->
                  