<?php
include ("config.php");
if(!$_SESSION['email'])
{
  header("Location:../Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  <!-- footer style -->
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- footer style -->
  <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!-- contact  -->
    <link rel="stylesheet" href="css/contact.css">
  <!-- icon apikey -->
  <script src="https://kit.fontawesome.com/8af96902eb.js" crossorigin="anonymous"></script>
  <style>
    
      @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather+Sans:wght@400;700&display=swap");
body {
  font-family: 'Lato', sans-serif;
  color: #040000;
}

button>a{
              color: white;
              text-decoration: none;
            }
            button>a:hover{
              color:#455d7a;
              text-decoration: none;
            }
.profile-container {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  height: 100vh;
  margin-top: -70px;
  padding-top: 80px;
}

.user-card {
  background-color: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  width: 80%;
  max-width: 500px;
}

.profile-picture {
  width: 100px;
  height: 100px;
  border-radius: 100%;
  color: #ccc;
  position: relative;
  overflow: hidden;
  margin: auto;
  margin-bottom: 20px;

}
.dp{
  width: 110px;
  height: 110px;
}
.user-info {
  line-height: 1.5;
}

.user-info h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

.value {
  font-weight: bold;
}

/* Media queries for responsiveness */

@media screen and (max-width: 768px) {
  .user-card {
    width: 90%;
  }
  .profile-picture {
    font-size: 40px;
  }
  .user-info h3 {
    font-size: 16px;
  }
}

@media screen and (max-width: 480px) {
  .user-card {
    width: 100%;
  }
  .profile-picture {
    font-size: 30px;
  }
  .user-info h3 {
    font-size: 14px;
  }
}
.edit{

  /* text-transform: uppercase;
  background-color: #455d7a;
  line-height: 30px;
  font-size: 15px;
  border: none;
  cursor: pointer;
  outline: none;
  border-radius: 5px;
  color: #ffffff;
  margin: auto;
  margin-top: 15px;
  margin-bottom: 15px; */

  transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;


  display: inline-block;
  font-family: Open Sans ,sans-serif;
  text-transform: uppercase;
  padding: 10px 22.5px;
  
  
  font-weight: 400;
  letter-spacing: 0.125em;
  text-decoration: none;
  text-transform: uppercase;
  white-space: nowrap;
  font-size: 0.75rem;
  max-width: 20rem;
  height: 3.75em;
  line-height: 1.89em;
  font-size: 0.75rem;
  max-width: 20rem;
  height: 3em;
  line-height: 1em;
  background-color: #455d7a;
  border: 1px solid #455d7a;
  border-radius: 5px;
  color: #ffffff;
  margin-top: 15px;

}
.edit:hover{
  color: #455d7a;
  background-color: transparent;
  border: 1px solid #455d7a;
}
#save{
  display: none;
}
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
              <span>
                Brave Stone
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link home"  href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> Our Story</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="redirectToAbout()" style="cursor: pointer;">Contact Us</a>
                </li>
                <li id="loginBtn" class="nav-item active">
                  <a class="nav-link"  href="account.php">Account</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    </div>
  <div class="profile-container">
    <div class="user-card">
      <div class="profile-picture">
        <img class="dp"  src="images/client-2.jpg" alt="">
      </div>
      <div class="user-info">
        <h3>Name: <span class="value"><?=$_SESSION['username']?></span></h3>
        <p>Email: <span class="value"><?=$_SESSION['email']?></span></p>
      </div>

      <?php
    $cd_qry=$conn->query("select * from register");
    if($cd_qry->rowCount()>0)
    {
      $result=$cd_qry->fetchAll();
      ?>
    <?php
  if($_SESSION['usertype']==0)
  { ?>
        <a href="userinfoedit.php?id=<?=$result['id'];?>" class="edit">Edit Profile</a><br>
  <?php
  }
} ?>

        <a href="logout.php" class="edit">
          Logout
</a>

    </div>
  </div>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <script>
    function redirectToAbout() {
        window.location.href = 'about.php#contactus';
    }
    
</script>
<!-- <script>
  function edit(){
    document.getElementById('edit').style.display='none'
    document.getElementById('save').style.display='block'
  }
  function save(){
    document.getElementById('save').style.display='none'
    document.getElementById('edit').style.display='block'
  }
</script> -->
</body>
</html>
