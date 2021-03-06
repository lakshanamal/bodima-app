<?php 
require_once ('../config/database.php');
require_once ('../controller/profile_controlN.php');
if(isset($_SESSION['email'])){


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <title>profile</title>
	 <link rel="stylesheet" href="../resource/css/new_home.css">
	 <link rel="stylesheet" href="../resource/css/all.css">
	 <link rel="stylesheet" href="../resource/css/sidebar2.css">
	 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../resource/css/profile1.css">
    <link rel="stylesheet" href="../resource/css/extra.css">
</head>

 <body>

 <?php 
  $level=$_SESSION['level'];
  $first_name=$_SESSION['first_name'];
  $last_name=$_SESSION['last_name'];
  $email=$_SESSION['email'];
  $address=$_SESSION['address'];
?>

<?php  if($_SESSION['level']=="food_supplier"){
                          $level_name = 'Food supplier';}

                elseif($_SESSION['level']=="boarder"){
                          $level_name = 'Boarder';}

                elseif($_SESSION['level']=="boardings_owner"){
                          $level_name = 'Boardings Owner';}

                elseif($_SESSION['level']=="administrator"){
                          $level_name = 'Administrator';}
                          else{
                          $level_name = 'User';}
  ?>

 <?php require "header1.php"?>
	 <div class="container1">
     	
     <div class="container2">
        <div class="sidebar_b">
        <?php require "sidebar1.php"?>	
        </div>
        <div class="middle_b">
          <h1>Profile<a href="../controller/editprofile_control.php?editprofile=1"><button class="p_edit" name="p_edit" value="Edit"><i class="far fa-edit"></i>Edit</button></a></h1>
            <div class="mid_A">
                <h3>account Information</h3>
                <hr/>
                <div class="detail_table">

                <div class="list">
                  <p><div class="pr_th"><span>First Name</span></div><div class="pr_td" style="text-transform:capitalize;"> : <?php echo $first_name ?></div> </p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>Last Name</span></div><div class="pr_td" style="text-transform:capitalize;">: <?php echo $last_name ?></div></p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>Address</span></div><div class="pr_td">: <?php if(strlen(trim($_SESSION['email']))<=0){echo "None";} else {echo $_SESSION['address'];}?></div></p>
                </div>

                <?php if($_SESSION['level']=='boarder') {
                    //$Userdata=unserialize($_GET['user']);
                    $tele=unserialize($_GET['tele']);
                  
                  echo '
                <div class="list">
                  <p><div class="pr_th"><span>Contact </span></div><div class="pr_td">:'.$tele.'</div></p>
                </div>';} else{ echo '';} ?>

              
                <div class="list">
                  <p><div class="pr_th"><span>Email </span></div><div class="pr_td">: <?php echo $email?></div></p>
                </div>
                <div class="list">
                  <p><div class="pr_th"><span>User Type </span></div><div class="pr_td">: <?php echo $level_name ?></div></p>
                </div>
                </div>
            </div>
              <div class="mid_B">
                <div class="profile_photo">
                <?php $profileimage=unserialize($_GET['profileimage']);?>
                  <img src="<?php echo $profileimage ?>" class="profile_img" alt="">
                  
                </div>
                <div class="prof_info">
                  <h2 style="text-transform:capitalize;"><?php echo $first_name .' '.$last_name?></h2>
                  <p style="text-transform:uppercase;"> <?php echo $level_name?></p>
                </div>


<!-- ******************summary dash board of the profile********************* -->

                <?php if($_SESSION['level']=='student'){

                  echo '<div class="stat_bar1">
                  <div class="stat_item1" style="border-left: 1px solid #d4af37;">
                    <li style="padding-left:25px;">Requests</li><span> 2</span>
                  </div>
                  <div class="stat_item1">
                    <li>Accepted</li><span> 0</span>
                  </div>
                  <div class="stat_item1">
                    <li>Notifications</li><span> 4</span>
                  </div>';

                }else if($_SESSION['level']=='boarder'){
                  
                    echo '<div class="stat_bar1">
                    <div class="stat_item1" style="border-left: 1px solid #d4af37;">
                    <li style="padding-left:25px;">Requests</li><span> 2</span>
                  </div>
                    <div class="stat_item1">
                      <li>Due Payments</li><span> 0</span>
                    </div>
                    <div class="stat_item1">
                      <li>Notifications</li><span> 4</span>
                    </div>';

                }else if($_SESSION['level']=='boardings_owner'){

                  echo '<div class="stat_bar1">
                    <div class="stat_item1" style="border-left: 1px solid #d4af37;">
                    <li style="padding-left:25px;">New Requests</li><span> 2</span>
                  </div>
                    <div class="stat_item1">
                      <li>Boarders</li><span> 0</span>
                    </div>
                    <div class="stat_item1">
                      <li>Notifications</li><span> 4</span>
                    </div>';

                }else if($_SESSION['level']=='food_supplier'){

                  echo '<div class="stat_bar1">
                  <div class="stat_item1" style="border-left: 1px solid #d4af37;">
                  <li style="padding-left:25px;">New Requests</li><span> 2</span>
                </div>
                  <div class="stat_item1">
                    <li>Accepted</li><span> 0</span>
                  </div>
                  <div class="stat_item1">
                    <li>Posts</li><span> 4</span>
                  </div>';

                }else{
                  echo '';
                } 
                
                ?>
                
<?php } else {header('Location:../index.php');}?>

</br></br></br></br>
                </div>
              </div>
        </div>
        
    </div>

	 </div>	
	 
	 <script>
    // $('.btn').click(function(){
    //   $(this).toggleClass("click");
      $('.sidebar').toggleClass("show");
    // });
      $('.profile-btn').click(function(){
        $('nav ul .profile-show').toggleClass("show");
        $('nav ul .first').toggleClass("rotate");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-show').toggleClass("show1");
        $('nav ul .second').toggleClass("rotate");
      });

      $('nav ul .open-show').toggleClass("show1");

      $('nav ul li').click(function(){
        $(this).addClass("active").siblings().removeClass("active");
      });
    </script>
</body>
</html>

    