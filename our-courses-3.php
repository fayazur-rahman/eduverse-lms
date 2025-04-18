<?php 
include 'components/connect.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>EduVerse</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.webp" type="image/webp">
    
        
    <!-- CSS
    ============================================ -->

    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/plugins/default.css">


    <!--===== Plugins CSS (All Plugins Files) =====-->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!--====== Main Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    
</head>

<body>
    
    <!--====== Header Start ======-->

    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                    <div class="header-top-left mt-10">
                        <ul class="header-meta">
                            <li><a href="mailto://eduverse@gmail.com">eduverse@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="header-top-right mt-10">
                        <div class="header-link">
                            <a class="notice" href="notice.html">Notice</a>
                            <a class="login" href="login.html">Login</a>
                            <a class="register" href="register.html">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="navigation" class="navigation navigation-landscape">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="header-logo">
                            <a href="index.html"><img src="assets/images/logo.png" width="135" height="88" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 position-static">
                        <div class="nav-toggle"></div>
                        <nav class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                <ul class="nav-menu">
                                    <li>
                                        <a href="index.html">Home</a>
                                        
                                    </li>
                                    <li>
                                        <a class="active" href="our-courses-3.html">Courses</a>
                                        
                                    </li>
                                    <li>
                                        <a href="event.html">Events</a>                                   
                                    </li>
                                    <li>
                                        <a href="teachers.html">Teachers</a>
                                    </li>
                                    
                                    <li>
                                        <a href="blog.html">Blog</a>
                                    </li>
                                    <li>
                                        <a href="about-us.html">About</a>
                                     </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    
                                </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 position-static">
                        <div class="header-search">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--====== Header Ends ======-->
    
    <!--====== Page Banner Start ======-->

    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Our Courses</h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner Ends ======-->

    <!--====== Top Course Start ======-->
    
        <!-- <h1 class="title" style="color: black; margin: bottom 0px; text-align:center; font: size 80px;">Our Courses</h1> -->
    
    <section class="top-courses-area">
        <div class="container">
            <div class="courses-bar">
                <div class="row">
                    <div class="col-lg-6">
                        
                    </div>
                    
                </div>            
            </div>    
            <div class="tab-content" >
                <div class="tab-pane fade show active" id="grid">
                    <div class="courses-wrapper wrapper-2">
                        <div class="row">
                            
                            <?php
                                $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC");
                                $select_courses->execute(['active']);
                                if($select_courses->rowCount() > 0){
                                    while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
                                    $course_id = $fetch_course['id'];

                                    $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
                                    $select_tutor->execute([$fetch_course['tutor_id']]);
                                    $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                    
                                        <a href="playlist.php?get_id=<?= $course_id; ?>"><img src="uploaded_files/<?= $fetch_course['thumb']; ?>"  alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
                                        <p class="category"><?= $fetch_tutor['name']; ?></p>
                                        <h4 class="courses-title"><a href="playlist.php?get_id=<?= $course_id; ?>"><?= $fetch_course['title']; ?></a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Created on: <span> <?= $fetch_course['date']; ?></span></p>
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="playlist.php?get_id=<?= $course_id; ?>">Apply</a>
                                            <a class="more" href="playlist.php?get_id=<?= $course_id; ?>"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                }else{
                                    echo '<p class="empty">No course added yet!</p>';
                                }
                            ?>


                            <!-- <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-6.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Technology</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of Business Administration</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"> <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-7.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Science</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Social & Digital Marketing</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-8.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Technology</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of Applied Mathematics</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"> <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-9.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Literature</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of English Literature</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"> <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-10.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Business</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of Advance Psychology</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                               
                                            </div>
                                           
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-11.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Marketing</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of Film and Theater</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 courses-col">
                                <div class="single-courses-2 mt-30">
                                    <div class="courses-image">
                                        <a href="#"><img src="assets/images/courses/courses-12.webp" width="270" height="170" alt="courses"></a>
                                    </div>
                                    <div class="courses-content">
                                        <a href="#" class="category">#Science</a>
                                        <h4 class="courses-title"><a href="courses-details.html">Bachelor of Law and Creminalism</a></h4>
                                        <div class="duration-rating">
                                            <div class="duration-fee">
                                                <p class="duration">Duration: <span> 4 year</span></p>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="courses-link">
                                            <a class="apply" href="#">Apply</a>
                                            <a class="more" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                           
        </div>
    </section>
<br><br>
    <!--====== Top Course Ends ======-->
    
    
    <!--====== Footer Start ======-->

    <section class="footer-area footer-02 bg_cover" style="background-image: url(assets/images/counter-bg.webp);">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Our Campus</h4>
                            <ul class="link-list">
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="https://maps.app.goo.gl/Aq5h6UspnKCm755ZA">Campus map</a></li>
                                
                                <li><a href="notice.html">Notice board</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-link mt-45">
                                <h4 class="footer-title">Information</h4>
                                <ul class="link-list">
                                    <li><a href="#">Admission</a></li>
                                    <li><a href="#">Tuition fee</a></li>
                                    <li><a href="#">Scholorship</a></li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Useful Link</h4>
                            <ul class="link-list">
                                <li><a href="our-courses-3.html">All Courses</a></li>
                                <li><a href="teachers.html">Our Teachers</a></li>
                                <li><a href="event.html">Our Events</a></li>
                                <li><a href="blog.html">Blog post</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Contact Info</h4>
                            <ul class="link-list">
                                <li>
                                    <p>Kaliakair, Gazipur-1750, Bangladesh.</p>
                                </li>
                                <li>
                                    <p><a href="tel:+01254659874">09666775534</a></p>
                                    
                                </li>
                                <li>
                                    <p><a href="mailto://eduverse@gmail.com.com">eduverse@gmail.com</a></p>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-widget-wrapper">
                    <div class="footer-social">
                        <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="copyright text-center">
                    <p>&copy; 2023 <span> EduVerse </span> Made by Fayazur, Tahmid & Kafi</p>
                </div>
            </div>
        </div>
    </section>

    <!--====== Footer Ends ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->
    
    <!--====== Start ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== Ends ======-->




    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== All Plugins js ======-->
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script>
    

    <!--====== Main Activation  js ======-->
    <script src="assets/js/main.js"></script>
    
    
</body>

</html>
