<!DOCTYPE html>
<html lang="en">
<?php 
    include("php/conn.php"); 
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Training And Placement Office</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/company.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" id="mainNav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">
            <?php 
                $query = "SELECT company_name from company c where c.company_id = 11260";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    echo $row["company_name"];                
                }
            ?></a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="nav_center_profile">
                        <a class="nav-link" href="#">SETTINGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Tabs -->
    <div id="main_tabs">
        <div class="container">
            <div class="tabs">
                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn btn-xl active tab_buttons" id="profile_button" onclick="#">Profile</button>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-xl tab_buttons" id="companies_button" onclick="#">Companies</button>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-xl tab_buttons" id="applied_button" onclick="#">Applied</button>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-xl tab_buttons" id="offered_button" onclick="#">Offered</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="seperator"></div>

    <div id="profile" class="section-active">
        <div class="main-section">
            <div class="headi">
                Company Details
            </div>
            <?php 
                $query = "SELECT company_id, company_name, email_id, visiting_date, dream_regular from company c where c.company_id = 11260";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    echo "<div class='data-row'>Company Id : ".$row['company_id']."</div>";
                    echo "<div class='seperator'></div>";
                    echo "<div class='data-row'>Company Name : ".$row['company_name']."</div>";
                    echo "<div class='seperator'></div>";
                    echo "<div class='data-row'>Email Id : ".$row['email_id']."</div>";
                    echo "<div class='seperator'></div>";
                    echo "<div class='data-row'>Visiting Date : ".$row['visiting_date']."</div>";
                    echo "<div class='seperator'></div>";
                    if($row['dream_regular'] == "0"){
                        echo "<div class='data-row'>"."Dream/Regular : "."Regular"."</div>";
                    }
                    else{
                        echo "<div class='data-row'>"."Dream/Regular : "."Dream"."</div>";
                    }
                    echo "<div class='seperator'></div>";
                }
                else{
                    echo "No data found";
                }
            ?>
            <div class="container">
                <button style="margin-bottom: 30px;" class="btn btn-md primary" id="edit_button" onclick="#">Edit</button>
            </div>
        </div>
    </div>

    <div id="companies" class="section-inactive">
        <div class="main-section">
            <div class="headi">
                Companies Coming To Campus
            </div>
            <?php 
                $query = "SELECT c.company_id, c.company_name, c.email_id, c.visiting_date, c.dream_regular, j.job_description,j.package_placement from company c, job_desc j where c.company_id = j.company_id";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='company-details'>";
                        echo "<div class='container'>
                                  <div class='row'>
                                      <div class='col-lg-8'>";
                        echo "<div class='company-data-row'>"."Company Name : ".$row['company_name']."</div>";
                        echo "<div class='company-data-row'>"."Email Id : ".$row['email_id']."</div>";
                        echo "<div class='company-data-row'>"."Job Description : ".$row['job_description']."</div>";
                        echo "</div>";
                        echo "<div class='col-lg-4'>";
                        echo "<div class='company-data-row'>"."Package : ".$row['package_placement']." LPA"."</div>";
                        echo "<div class='company-data-row'>"."Visiting Date : ".$row['visiting_date']."</div>";
                        if($row['dream_regular'] == "0"){
                            echo "<div class='company-data-row'>"."Dream/Regular : "."Regular"."</div>";
                        }
                        else{
                            echo "<div class='company-data-row'>"."Dream/Regular : "."Dream"."</div>";
                        }
                        echo "</div></div></div>";
                        echo "</div>";
                        echo "<div class='seperator'></div>";
                    }
                }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <script type="text/javascript">
        var btn1 = document.getElementById("profile_button"),
            btn2 = document.getElementById("companies_button"),
            btn3 = document.getElementById("applied_button");
            btn4 = document.getElementById("offered_button");

        function profile(){
            btn1.classList.add("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
            document.getElementById("profile").classList.add("section-active");
            document.getElementById("profile").classList.remove("section-inactive");
            document.getElementById("companies").classList.remove("section-active");
            document.getElementById("companies").classList.add("section-inactive");
        }

        function companies(){
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
            document.getElementById("profile").classList.add("section-inactive");
            document.getElementById("profile").classList.remove("section-active");
            document.getElementById("companies").classList.remove("section-inactive");
            document.getElementById("companies").classList.add("section-active");
        }

        btn1.onclick = profile;
        btn2.onclick = companies;
    </script>

</body>

</html>
