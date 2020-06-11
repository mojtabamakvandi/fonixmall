<?php
include "head.php";
?>
    <style>
        .menu-card{
            padding: 15px;
            margin-top: 30px;
            box-shadow: 5px 5px 15px #737678;
            border-radius: 5px;
            transition: 0.5s;
        }
        .menu-card > h4 {
            color: #333;
        }
        .menu-card:hover{
            box-shadow: 5px 5px 25px #FF3D7A;

        }
        a:hover{
            text-decoration: none;

        }

    </style>
    </head>
    <div>
<?php
include "header.php";
if(isset($_GET['menuId']) && $_GET['menuId']!=''){
    $id = '';
    $_GET = $db::RealString($_GET);
    $id = $_GET['menuId'];
}
?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="direction: rtl;margin: 50px 0" >
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $category_query = $db::Query("SELECT * FROM category where catMenuId = '$id'");
                    while ($category_result = mysqli_fetch_assoc($category_query))
                    {
                    ?>
                    <div class="col-lg-2 col-md-4">
                        <a href="search.php?catId=<?php echo $category_result['catId']?>">
                            <div class="menu-card">
                                <img src="admin/upload/cat/<?php echo $category_result['catImg']?>.jpg" style="width: 100%;height: auto;">
                                <h4 class="IRANSans"><?php echo $category_result['catName']?> <i class="fa fa-arrow-alt-circle-left"></i> </h4>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
include "footer.php";
?>
