<?php
include"inc/header.php";
?>
  <?php

  include "class/dataBase.php";
  $db=new dataBase();
  ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <?php $query1 = $db::Query("select * FROM user",$db::$NUM_ROW); ?>
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <a href="user_list.php">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">

                              <h1><?php echo "".$query1?></h1>
                              <p>تعداد کاربران</p>
                          </div>
                      </section>
                      </a>
                  </div>
                  <?php $query2 = $db::Query("select * From shoppingbasket WHERE SHBPay=1",$db::$NUM_ROW); ?>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo "".$query2?></h1>
                              <p>فروش</p>
                          </div>
                      </section>
                  </div>
                  <?php $query3 = $db::Query("select * From shoppingbasket WHERE SHBPay=1",$db::$NUM_ROW); ?>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo "" .$query3?></h1>
                              <p>تحویل نشده</p>
                          </div>
                      </section>
                  </div>
                  <?php
                  $query4 = $db::Query("select * from product",$db::$NUM_ROW);
                  ?>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-bar-chart"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo "" .$query4?></h1>
                              <p>مجموع محصولات</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->



          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
