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
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
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
    body {
      margin: 0;
      background-color: #FCF6F5;
    }

    .grid-container {
      display: grid;
      grid-template-rows: auto auto;
      /* Two rows */
      grid-template-columns: 1fr;
      /* Two columns in the first row */
      /* Adjust the gap between grid items */
      padding: 20px;
    }

    .item {
      padding: 20px;
      text-align: center;
    }

    /* For smaller screens, stack the columns */
    @media (max-width: 600px) {
      .grid-container {
        grid-template-columns: 1fr;
        /* One column for small screens */
      }
    }

    .btns {
      transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;


      display: inline-block;
      font-family: Open Sans, sans-serif;
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
      font-size: 0.75rem;
      max-width: 20rem;
      height: 3em;
      line-height: 1.25em;
      background-color: #455d7a;
      border: 1px solid #455d7a;
      border-radius: 5px;
      color: #ffffff;
      margin-top: 15px;
    }

    .btns:hover {
      color: #455d7a;
      background-color: transparent;
      border: 1px solid #455d7a;
    }

    .logout{
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
  line-height: 1.25em;
  font-size: 0.75rem;
  max-width: 20rem;
  height: 3em;
  background-color: #990011;
  border: 1px solid #990011;
  border-radius: 5px;
  color: #ffffff;
  margin-top: 15px;
    }
  .logout:hover{
  color: #990011;
  background-color: transparent;
  border: 1px solid #990011;
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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link home" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                  <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <form method="post">
    <div class="grid-container">
    <div class="item"><span style="font-weight:600; font-size:25px;">CLIENT REQUEST</span></div>

      <div class="item">
        <span>
        <a type="button" href="dashboard.php" class="btns">Client Details</a>&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="" type="button" href="logout.php" class="logout">Logout</a>&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="" type="button" onclick="cd()" name="cd" class="btns">Client Request</a>
        </span>
      </div>
    </form>
      
    </div>

    <table class="table table-bordered table-dark">
  <thead>
    <tr align="center">
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">Send Time</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $cd_qry=$conn->query("select * from contact");
    if($cd_qry->rowCount()>0)
    {
      $result=$cd_qry->fetchAll();
      foreach($result as $cd_qry_arr)
      {
    ?>
    <tr align="center">
      <td><?=$cd_qry_arr['id'];?></td>
      <td><?=$cd_qry_arr['name'];?></td>
      <td><?=$cd_qry_arr['email'];?></td>
      <td><?=$cd_qry_arr['message'];?></td>
      <td><?=$cd_qry_arr['sendtime'];?></td>
    <?php
  if($_SESSION['usertype']==1)
  { ?>
  <td><a class="btn btn-primary" role="button" href="deleted.php?id=<?=$cd_qry_arr['id'];?>">DELETE</a></td>
    <?php
  }
  ?>
  </tr>
  <?php
  }
} ?>
  </tbody>

</table>
<!-- <script>
    function sendEmail() {
        // Replace 'your@email.com' with your actual email address
        var emailAddress = '';

        // Use the mailto URI scheme to open the default email client
        window.location.href = 'mailto:' + emailAddress;
    }
</script> -->
</body>

</html>