<!doctype html>
<!--Cameron Biermann-->
<html lang="en">
<head>
<link rel="icon" href="/assets/images/icon.jpeg" type="image/x-icon">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/webfonts/fontawesome.min.css');?>" />


 <!-- JavaScript -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/webfonts/fontawesome.min.js');?>"></script>








 
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->



 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="/home">BesteFrage.net</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php
        foreach($nav_list as $site){
            if($site==$title){
            ?>
            <li class="nav-item active">
            <a class="nav-link" href="/<?php echo $site ?>"><?php echo $site ?><span class="sr-only">(current)</span> </a>
          </li>
          <?php
            } else {?>
                <li class="nav-item">
            <a class="nav-link" href="/<?php echo $site ?>"><?php echo $site ?><span class="sr-only">(current)</span> </a>
          </li>
          <?php
            }
        }
    ?>
      </li>
    </ul>
  </div>
  <?php

  $session = $this->session->userdata('id_user');
  if (empty($session)): ?>
  <div>
  <button type="button" class="btn btn-warning" onclick="location.href = 'Register/view';" >Register</button>
  &nbsp
  </div>
  
  <div>
  <button type="button" class="btn btn-primary" onclick="location.href = 'Login/view';" >Login</button>
  </div>
  
  <?php else : ?>
  <button type="button" class="btn btn-success" onclick="location.href = 'Login/logout';">Logout</button>
  <?php endif; ?>
</nav>
</br>




<title>BesteFrage.net</title>
</head>
<body>

<?php echo $content ?>

</br>
</br>
<em>&copy; 2020</em>
</body>
</html>




 

 
