 <!-- START HEADER PART -->
 <aside class="menu-sidebar d-none d-lg-block">
     <div class="logo">
         <a href="#">
             <img src="images/icon/logo.png" alt="Cool Admin" />
         </a>
     </div>
     <div class="menu-sidebar__content js-scrollbar1">
         <nav class="navbar-sidebar">
             <ul class="list-unstyled navbar__list">

                 <li class="">
                     <a class="js-arrow" href="dashboard.php">
                         <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                 </li>

                 <li class="">
                     <!-- active has-sub -->
                     <a class="js-arrow" href="#">
                         <i class="fas fa-tachometer-alt"></i>Category</a>
                     <ul class="list-unstyled navbar__sub-list js-sub-list">
                         <li>
                             <a href="category.php">Category</a>
                         </li>
                         <li>
                             <a href="subcategory.php">Subcategory</a>
                         </li>
                         <li>
                             <a href="product.php">Product</a>
                         </li>
                     </ul>
                 </li>

                 <li class="">
                     <a class="js-arrow" href="#">
                         <i class="fa fa-globe"></i>Country</a>
                     <ul class="list-unstyled navbar__sub-list js-sub-list">
                         <li>
                             <a href="country.php">Country</a>
                         </li>
                         <li>
                             <a href="state.php">State</a>
                         </li>
                         <li>
                             <a href="city.php">City</a>
                         </li>
                     </ul>
                 </li>

                 <li>
                     <a href="registration.php">
                         <i class="fa fa-users"></i>Registration</a>
                 </li>

                 <li>
                     <a href="aboutus.php">
                         <i class="fa fa-phone"></i>About Us
                     </a>
                 </li>

                 <li>
                     <a href=" staff.php">
                         <i class="fa fa-users"></i>Staff</a>
                 </li>

                 <li>
                     <a href="home_slider.php">
                         <i class="fa fa-picture-o"></i>Home Slider</a>
                 </li>

                 <li>
                     <a href="order_details.php">
                         <i class="far fa-check-square"></i>Order Details</a>
                 </li>

                 <li>
                     <a href="contact_us.php">
                         <i class="fa fa-phone"></i>Contact Us</a>
                 </li>

                 <!-- <li>
                     <a href="feedback.php">
                         <i class="far fa-check-square"></i>Feedback Page</a>
                 </li> -->
             </ul>
         </nav>
     </div>
 </aside>
 <!-- END MENU SIDEBAR-->
 <div class="page-container">
     <!-- HEADER DESKTOP-->
     <header class="header-desktop">
         <div class="section__content section__content--p30">
             <div class="container-fluid">
                 <div class="header-wrap">
                     <form class="form-header" action="" method="POST">
                         <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                         <button class="au-btn--submit" type="submit">
                             <i class="zmdi zmdi-search"></i>
                         </button>
                     </form>
                     <div class="header-button">
                         <div class="account-wrap">
                             <div class="account-item clearfix js-item-menu">
                                 <!-- <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div> -->
                                 <div class="content">
                                     <a class="js-acc-btn" href="#"><i class="fas fa-cog"></i>Setting</a>
                                 </div>
                                 <div class="account-dropdown js-dropdown">
                                     <div class="info clearfix">
                                         <div class="image">
                                             <a href="#">
                                                 <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                             </a>
                                         </div>
                                         <?php
                                            if (isset($_SESSION["name"], $_SESSION["email_id"])) {
                                            ?>

                                             <div class="content">
                                                 <h5 class="name">
                                                     <a href="#"><?php echo $_SESSION["name"] ?></a>
                                                 </h5>
                                                 <span class="email"><?php echo $_SESSION["email_id"] ?></span>
                                             </div>

                                         <?php
                                            }
                                            ?>

                                     </div>
                                     <div class="account-dropdown__body">
                                         <div class="account-dropdown__item">
                                             <a href="account.php">
                                                 <i class="zmdi zmdi-account"></i>Account</a>
                                         </div>
                                         <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                     </div>
                                     <div class="account-dropdown__footer">
                                         <a href="logout.php">
                                             <i class="zmdi zmdi-power"></i>Logout</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </header>
     <!-- HEADER DESKTOP-->
 </div>
 <!-- END HEADER PART -->