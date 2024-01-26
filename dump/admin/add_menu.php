<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");

session_start();



echo "PHP script reached.";
if (isset($_POST['submit'])){

    echo "PHP script reached.";

 
        $additionalQuantity = isset($_POST['additional_input']) ? implode(',', $_POST['additional_input']) : '';
    echo $additionalQuantity;


       $imagePaths = [];

        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            $fname = $_FILES['images']['name'][$i];
            $temp = $_FILES['images']['tmp_name'][$i];
            $fsize = $_FILES['images']['size'][$i];
            $extension = explode('.', $fname);
            $extension = strtolower(end($extension));
            $fnew = uniqid() . '.' . $extension;
        
            $store = "Res_img/dishes/" . basename($fnew);
        
            if (move_uploaded_file($temp, $store)) {
                array_push($imagePaths, $store);
            } else {
                echo $error='<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Congrass!</strong> New Dish Added Successfully.
            </div>';
            }
        }                  





                
     
        $sql = "INSERT INTO dishes(
            dish_name,
        category,
        description,
        price,
        discount,

        Total_Quantity,
        Additional_quantity,
        stock,
        best_before,
        food_type,
        keywords,
        img,
        img2,
        img3,
        img4,
        img5) VALUE('" . $_POST['d_name'] . "',
        '" . $_POST['category'] . "',
        '" . $_POST['price'] . "',
        '" . $_POST['discount'] . "',
       
          '" . $_POST['about'] . "', 
            '" . $_POST['total_quantity'] . "', 
              '" . $additionalQuantity . "' , 
                '" . $_POST['stock'] . "'       , 
                  '" . $_POST['exp_date'] . "'        , 
                    '" . $_POST['food_type'] . "'        , 
                      '" . $_POST['keywords'] . "',
                      '" . $imagePaths[0] . "', 
                      '" . $imagePaths[1] . "',
                       '" . $imagePaths[2] . "',
                        '" . $imagePaths[3] . "', 
                        '" . $imagePaths[4] . "')"; 
               if( mysqli_query($db, $sql)){
                
                   $success =     '<div class="alert alert-success alert-dismissible fade show">
                                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                   <strong>Congrass!</strong> New Dish Added Successfully.
                                                               </div>';
               }else{
                echo "error";
               }
               

            }
        

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>


                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <!-- <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form> -->
                        </li>
                        <!-- Comment -->
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>

                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"> <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
                                <li><a href="add_users.php">Add Users</a></li>


                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Store</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allrestraunt.php">All Stores</a></li>
                                <li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restraunt.php">Add Restaurant</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Menues</a></li>
                                <li><a href="add_menu.php">Add Menu</a></li>


                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_orders.php">All Orders</a></li>

                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="height:1200px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->


                <?php
                //  echo $error;
                // echo $success;
                 ?>




                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Add Menu to Restaurant</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Snack Name</label>
                                                <input type="text" name="d_name" class="form-control" placeholder="Enter snackname">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Select Category</label>
                                                <select name="category" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                    <option>--Select category--</option>
                                                    <?php $ssql = "select * from res_category";
                                                    $res = mysqli_query($db, $ssql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo ' <option value="' . $row['c_name'] . '">' . $row['c_name'] . '</option>';;
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">price </label>
                                            <input type="text" name="price" class="form-control" placeholder="inr">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Discount</label>
                                            <input type="text" name="discount" id="discount" class="form-control form-control-danger" placeholder="Enter Discount price
                                                     ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">

                                    <div class="col-md-6">

                                        <div class="form-group has-danger">
                                            <label class="control-label">Enter description</label>
                                            <textarea name="about" class="form-control form-control-danger" rows="8" placeholder="Enter product Description">Enter </textarea>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Total Quantity</label>
                                            <input type="text" name="total_quantity" class="form-control" placeholder="Enter Total Quantity">
                                        </div>
                                    </div>
                                                    <div class="col">
                                                        <label for="additional Options">Additional Options</label><br>
                                                    <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="kg" name="additional_input[]">
  <label class="form-check-label" for="inlineCheckbox1">Kg</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="gm"  name="additional_input[]">
  <label class="form-check-label" for="inlineCheckbox2">Gm</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="pieces"  name="additional_input[]">
  <label class="form-check-label" for="inlineCheckbox3">Pieces</label>
</div>
                                                    </div>



                                </div>
                                    <!--/span-->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">stock</label>
                                                <input type="stock" name="stock" class="form-control form-control-danger" placeholder="Enter info about stock">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Expiry date</label>
                                                <input type="date" name="exp_date" class="form-control form-control-danger" placeholder="Best Before">
                                            </div>
                                        </div>
                                    </div>
                                                    <div class="row">

                                                        <div class="col">
                                                            <label for="food_type">Food Type</label>
                                                            <div class="form-group has-danger">
                                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="food_type" id="inlineRadio1" value="veg">
                                                <label class="form-check-label" for="inlineRadio1" style="color: green;">Veg</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="food_type" id="inlineRadio2" value="NON-Veg">
                                                <label class="form-check-label" for="inlineRadio2" style="color: red;">NON-Veg</label>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col">
                                        <label for="keywordInput">Keywords:</label>
                                        <input type="text" class="form-control" id="keywordInput" name="keywords" placeholder="Enter keywords separated by commas">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="col">
                                <label for="imageUpload">Select images:</label>
                                <div class="form-group has-danger">
                                    <input class='m-2' type="file" class="form-control-file" id="imageUpload" name="images[]" >
                                    <input class='m-2' type="file" class="form-control-file" id="imageUpload" name="images[]" >
                                    <input class='m-2' type="file" class="form-control-file" id="imageUpload" name="images[]" >
                                    <input class='m-2' type="file" class="form-control-file" id="imageUpload" name="images[]" >

                                    <input class='m-2' type="file" class="form-control-file" id="imageUpload" name="images[]" >
                                </div>
                            </div>
                        </div>

                        </div>
                        <!--/span-->
                       

                        <div class="row">

                        </div>
                        <!--/row-->

                    </div>
            







                    <div class="form-actions ml-3">
                        <input type="submit" name="submit" class="btn btn-success" value="save">
                        <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                    </div>
                 

                    <div class="col">


                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
    </div>













    </div>
    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->

    <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>