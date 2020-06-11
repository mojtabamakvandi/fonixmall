<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['value']) && $_POST['value'] != ''
        ) {
            $result = $db::RealString($_POST);
            $catId = $result['value'];
            if($catId=='3') {

                    $getSubCat = $db::Query("SELECT * FROM category");
                    while ($rowCat = mysqli_fetch_assoc($getSubCat)) {
                        $resulter[] = array(
                            'id' => $rowCat['catId'],
                            'name' => $rowCat['catName']
                        );
                    }

                    $call = array("error" => false);
                    $call['subCat'] = $resulter;
                    echo json_encode($call);

            }
            if($catId=='2') {

                    $getSubCat = $db::Query("SELECT * FROM news");
                    while ($rowCat = mysqli_fetch_assoc($getSubCat)) {
                        $resulter[] = array(
                            'id' => $rowCat['newsId'],
                            'name' => $rowCat['newsTitle']
                        );
                    }

                    $call = array("error" => false);
                    $call['subCat'] = $resulter;
                    echo json_encode($call);
                }
            if($catId=='1') {

                    $getSubCat = $db::Query("SELECT * FROM festival");
                    while ($rowCat = mysqli_fetch_assoc($getSubCat)) {
                        $resulter[] = array(
                            'id' => $rowCat['festivalId'],
                            'name' => $rowCat['festivalName']
                        );
                    }

                    $call = array("error" => false);
                    $call['subCat'] = $resulter;
                    echo json_encode($call);
                }
            if($catId=='4') {

                $getSubCat = $db::Query("SELECT * FROM subcategory");
                while ($rowCat = mysqli_fetch_assoc($getSubCat)) {
                    $resulter[] = array(
                        'id' => $rowCat['subId'],
                        'name' => $rowCat['subName']
                    );
                }

                $call = array("error" => false);
                $call['subCat'] = $resulter;
                echo json_encode($call);
            }
            if($catId=='5') {

                $getSubCat = $db::Query("SELECT * FROM categorynews");
                while ($rowCat = mysqli_fetch_assoc($getSubCat)) {
                    $resulter[] = array(
                        'id' => $rowCat['catNewsId'],
                        'name' => $rowCat['catNewsName']
                    );
                }

                $call = array("error" => false);
                $call['subCat'] = $resulter;
                echo json_encode($call);
            }
        }
    }
}