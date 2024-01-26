<?php
session_start();
    include("config.php");
    //login
    if(isset($_POST['login'])){
        $uemail=$_POST['uemail'];
        $upwd=$_POST['upwd'];
        $upwd1=md5($upwd);
        $sel=mysqli_query($con,"SELECT * FROM user where email='$uemail'");
        if(mysqli_num_rows($sel)){
            $sel1=mysqli_fetch_array($sel);
                $cpwd=$sel1['pwd'];
                if($cpwd==$upwd1){
                    echo"<script>alert('Welcome to kottan.com!');window.location.href='index.php';</script>";

                }else{
                    echo"<script>alert('Incurrect Password!');window.location.href='index.php';</script>";
                }
        }else{
            echo"<script>alert('Invalied email!');window.location.href='index.php';</script>";
        }

    }//registration
    if(isset($_POST['reg'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $mob=$_POST['mobile'];
        $pwd1=md5($pwd);
        $date=date("d/m/Y");
        $usrid=time().rand(1000,10);
        $chek=mysqli_query($con,"SELECT * FROM user where email='$email'");
        if(mysqli_num_rows($chek)){
            echo"<script>alert('email already exsits!');window.location.href='index.php';</script>";
        }
        else{
            $insert=mysqli_query($con,"INSERT INTO user values(null,'$usrid','$fname','$lname','$email','$pwd1','$mob','$date')");
            if($insert){
                echo"<script>alert('your Registration successfully!');window.location.href='index.php';</script>";
            }else{
                echo"<script>alert('sorry!');window.location.href='index.php';</script>";
            }
        }
    }
    ?>





<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <!-- Registration Model start-->
             <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                        
                                 <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact__form__title">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    <h2>Registration</h2>
                                                </div>
                                            </div>
                                        </div><form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 mb-4">
                                                <input type="text" name="fname" class="form-control" placeholder="Your First name">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="text" name="lname" class="form-control" placeholder="Your Last name">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="email" name="email" class="form-control" placeholder="abc@gamil.com">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="password" name="pwd" class="form-control" placeholder="Enter Password">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="password" name="mobile" class="form-control" placeholder="Mobile number">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4">
                                                <input type="checkbox" name="conform" required class="float-left">
                                                <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi cumque et excepturi consectetur?</sapn>
                                            </div>
                                        </div>
                                    
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <p>Already have an account? <a href="#" class="log_link" data-toggle="modal" data-target="#exampleModalCenter" data-dismiss="modal">Login</a></p>
                                    <button type="submit" name="reg" class="primary-btn">Register</button>
                                 </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!--registration model end-->

                        <!-- Login Model -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact__form__title">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    <h2 lass="modal-title">Login</h2>   
                                                </div>
                                            </div>
                                        </div><form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="text" name="uemail" class="form-control" placeholder="abc@gamil.com">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <input type="password" name="upwd" class="form-control" placeholder="Enter Password">
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-4 ">
                                                <a href="#">Forget Password</a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <p>New to ? <a href="#" class="log_link" data-toggle="modal" data-target="#registrationModal" data-dismiss="modal">Create Account</a></p>
                                    
                                    <button type="submit" name="login" class="btn primary-btn">Login</button>
                                 </div>
                              </div></form>
                           </div>
                           <!--login model end-->
                        </div>
                        
                        <div class="header__top__right__auth">
                           <!-- login model button start -->
                           <button type="button" class="primary-btn" data-toggle="modal" data-target="#exampleModalCenter">
                           <i class="fa fa-user"></i> Login
                           </button>
                           <!--login model button end-->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>