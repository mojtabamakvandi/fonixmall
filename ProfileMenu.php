<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <img class="img-circle img-bordered image-centered" src="<?php echo 'crm/img/avatars/'.$row['avatar'] ?>"/>
            <br/>
            <br/>
            <h3><?php echo $row['userName'].' '.$row['userFamily'] ?></h3>
            <p><?php echo $row['userPhonenumber'] ?></p>
        </div>
        <div class="panel-footer text-center">
            <span><a href="http://fonixmall.com/logout.php" class="btn btn-danger"> خروج  <i class="fa fa-lock"></i> </a></span>&nbsp;

            <span><a class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm">  تغییر رمز  <i class="fa fa-user-secret"></i> </a></span>
        </div>
    </div>
    <ul class="nav nav-pills nav-stacked text-right">
        <li role="presentation" id="btnProfile" class="active"><a href="#">پروفایل مشتری</a></li>
        <li role="presentation" id="btnFav"><a href="#">علاقه مندی ها</a></li>
        <li role="presentation" id="btnTransaction"><a href="#">تراکنش ها</a></li>
        <li role="presentation" id="btnShopping"><a href="#">تاریخچه خرید</a></li>
        <li role="presentation" id="btnComments"><a href="#">نظرات شما</a></li>
        <li role="presentation" id="btnAddress"><a href="#">آدرس ها</a></li>
    </ul>
    <br/>
    <br/>
    <br/>
    <br/>
</div>
