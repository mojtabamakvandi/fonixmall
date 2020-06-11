<?php

include "head.php";
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
    .nav-pills>li.active>a {
        background-color: #ff2b63;
        color: black;
    }
    .nav-pills>li.active>a:hover {
        background-color: rgba(255, 47, 105, 0.58);

    }

    .nav-pills>li>a {
        background-color: #acafb1;
        margin-bottom:10px;
        color: black;
    }
    .nav-pills>li>a:hover {
        background-color: rgba(255, 43, 99, 0.4);
    }
</style>

</head>
<body>
<?php
include "header.php";
if (!isset($_SESSION['userId']) || $_SESSION['userId'] == '') {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}
?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12" style="height: 50px"></div>
        <div class="col-md-12 text-right">
            <div id="Profile" class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">اطلاعات شخصی</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <?php
                                    $group_id = $row['group_id'];
                                    $group_query = $db::Query("SELECT * FROM groups WHERE id='$group_id'");
                                    $group_row = mysqli_fetch_assoc($group_query);
                                    ?>

                                    <?php
                                    if($group_id>1){
                                        ?>
                                        <span><img src="<?php echo '/crm/img/'.$group_row['id'].'.png' ?>" style="width: 100px"/></span>
                                    <?php } else { ?>
                                        <label for="">گروه</label>
                                        <br/>
                                        <span><p class="lead"><?php echo $group_row['name'] ?></p></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="">نام خانوادگی</label>
                                        <br/>
                                        <input type="text" class="form-control text-right" id="userFamily" value="<?php echo $row['userFamily'] ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">نام</label>
                                        <br/>
                                        <input type="text" class="form-control text-right" id="userName" value="<?php echo $row['userName'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">ایمیل</label>
                                        <br/>
                                        <input type="text" class="form-control" id="userEmail" value="<?php echo $row['userEmail'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">شماره موبایل</label>
                                        <br/>
                                        <input type="text" class="form-control text-right" id="userPhonenumber" value="<?php echo $row['userPhonenumber'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">کد ملی</label>
                                        <br/>
                                        <input type="text" class="form-control text-right" id="userNcode" value="<?php echo $row['userNcode'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">تاریخ تولد</label>
                                        <br/>
                                        <input type="text" class="form-control text-right" id="userBday" value="<?php echo $row['userBday'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="">تاریخ ثبت نام</label>
                                        <br/>
                                        <input type="text" disabled="disabled" class="form-control text-right" id="userBday" value="<?php echo @$db::G2J($row['userRegDate']) ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-left">
                    <span><a href="" class="btn btn-danger">بازگشت</a></span>
                    <span onclick="UpdateProfile()" class="btn btn-success">ثبت تغییرات</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function UpdateProfile() {

    var userName = $("#userName").val();
    var userFamily = $("#userFamily").val();
    var userEmail = $("#userEmail").val();
    var userPhonenumber = $("#userPhonenumber").val();
    var userNcode = $("#userNcode").val();
    var userBday = $("#userBday").val();
    var userId = '<?php echo $row['userId'] ?>';

    $.ajax({
        url: 'request/UpdateProfile.php',
        data: {
            userId: userId,
            userName: userName,
            userFamily: userFamily,
            userEmail:userEmail,
            userPhonenumber: userPhonenumber,
            userNcode: userNcode,
            userBday:userBday
        },
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            location.reload();
        }
    })
}
</script>
<?php
include "footer.php"
?>
