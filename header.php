
<div class="allHeaderKing" style="direction: ltr">
    <!-------------------icons ------------------------>
    <div class="alliconHeader" >
        <div class="parntTellMe">
            <span class="IRANSans text-left" style="margin-right: 10px">061-32239644</span>
        </div>
        <?php include "admin/class/dataBase.php";
            $db = new dataBase();
            if (isset($_SESSION['userId']) && $_SESSION['userId'] != '') {
                $shbUserId = $_SESSION['userId'];
                $SELECT = $db::Query("SELECT * FROM productshb,shoppingbasket,product where SHBid = PSHBSHBId and product.active = true AND productId=productshb.PSHBPrId AND shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')",$db::$NUM_ROW);
            } else if (isset($_SESSION['GustId']) && $_SESSION['GustId'] != '') {
                $shbUserId = $_SESSION['GustId'];
                $SELECT = $db::Query("SELECT * FROM productshb,shoppingbasket,product where SHBid = PSHBSHBId and product.active = true AND productId=productshb.PSHBPrId AND shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')",$db::$NUM_ROW);
            } else {
                $shbUserId = "";
                $SELECT="0";
            }
            if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
                $username = $_SESSION['userId'];
                $select = $db::Query("SELECT * FROM user WHERE userId='$username'");
                $row = mysqli_fetch_assoc($select);
                echo
                    '<div class="welcomeUser"><p style="position: relative;direction: rtl; top: 8px;"><a href="Profile.php"> خوش آمدید ' .$row['userName'].' '.$row['userFamily'].'</a>/
                        <a href="logout.php" style="color: red">خروج</a> </p>
                    </div>
                    <div class="parnttedadekharid">
    <div class="tedadekharid061 IRANSans"><p style="" id="numberCount">'.$SELECT.'</p></div>
    <a href="sabad-kharid.php">
    <svg width="30px" height="30px" viewBox="0 0 16 20" version="1.1"  id="myBtnLog" style=";cursor: pointer;">
    <title>tedade kharid</title>
    <desc>Created with MMdKhosraviy</desc>
    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="shopping-bag-/-has-products" transform="translate(-12.000000, -10.000000)" fill="#2D3E50" fill-rule="nonzero">
            <g id="shopping-bag-has-products">
                <g id="bag" transform="translate(12.000000, 10.000000)">
                    <path d="M15.9731405,17.3016529 L14.8243802,4.3553719 C14.803719,4.09917355 14.588843,3.90495868 14.3285124,3.90495868 L11.9070248,3.90495868 C11.9028926,1.75206612 10.1508264,-2.66453526e-14 7.99793388,-2.66453526e-14 C5.84504132,-2.66453526e-14 4.09297521,1.75206612 4.08884298,3.90495868 L1.66735537,3.90495868 C1.41115702,3.90495868 1.19628099,4.09917355 1.1714876,4.3553719 L0.0227272727,17.3016529 L0.0227272727,17.3471074 C0.0227272727,18.7892562 1.34917355,19.9628099 2.97727273,19.9628099 L13.018595,19.9628099 C14.6466942,19.9628099 15.9731405,18.7892562 15.9731405,17.3471074 L15.9731405,17.3016529 Z M7.99793388,0.991735537 C9.6053719,0.991735537 10.911157,2.29752066 10.9152893,3.90495868 L5.08057851,3.90495868 C5.08471074,2.29752066 6.39049587,0.991735537 7.99793388,0.991735537 Z M13.018595,18.9669421 L2.97727273,18.9669421 C1.90289256,18.9669421 1.0268595,18.2520661 1.01446281,17.3636364 L2.12190083,4.89669421 L4.08884298,4.89669421 L4.08884298,6.63636364 C4.08884298,6.90909091 4.31198347,7.1322314 4.58471074,7.1322314 C4.85743802,7.1322314 5.08057851,6.90909091 5.08057851,6.63636364 L5.08057851,4.89669421 L10.9152893,4.89669421 L10.9152893,6.63636364 C10.9152893,6.90909091 11.1384298,7.1322314 11.411157,7.1322314 C11.6838843,7.1322314 11.9070248,6.90909091 11.9070248,6.63636364 L11.9070248,4.89669421 L13.8739669,4.89669421 L14.981405,17.3677686 C14.9690083,18.2520661 14.0929752,18.9669421 13.018595,18.9669421 Z" id="Shape"></path>
                </g>
            </g>
        </g>
    </g>
</svg></a>
</div>'; ?>
    <?php }else{
        echo '<div class="parntlogin">
    <a href="login.php"><img src="IMG/user@2x.png" id="myBtnLog"  style="margin-right:0%;cursor: pointer;width:48%"></a>
</div>
<div class="parnttedadekharid">
    <div class="tedadekharid061 IRANSans"><p style="margin: 0;" id="numberCount">'.$SELECT.'</p></div>
    <a href="sabad-kharid.php">
    <svg width="30px" height="30px" viewBox="0 0 16 20" version="1.1"  id="myBtnLog" style=";cursor: pointer;">
    <title>tedade kharid</title>
    <desc>Created with MMdKhosraviy</desc>
    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="shopping-bag-/-has-products" transform="translate(-12.000000, -10.000000)" fill="#2D3E50" fill-rule="nonzero">
            <g id="shopping-bag-has-products">
                <g id="bag" transform="translate(12.000000, 10.000000)">
                    <path d="M15.9731405,17.3016529 L14.8243802,4.3553719 C14.803719,4.09917355 14.588843,3.90495868 14.3285124,3.90495868 L11.9070248,3.90495868 C11.9028926,1.75206612 10.1508264,-2.66453526e-14 7.99793388,-2.66453526e-14 C5.84504132,-2.66453526e-14 4.09297521,1.75206612 4.08884298,3.90495868 L1.66735537,3.90495868 C1.41115702,3.90495868 1.19628099,4.09917355 1.1714876,4.3553719 L0.0227272727,17.3016529 L0.0227272727,17.3471074 C0.0227272727,18.7892562 1.34917355,19.9628099 2.97727273,19.9628099 L13.018595,19.9628099 C14.6466942,19.9628099 15.9731405,18.7892562 15.9731405,17.3471074 L15.9731405,17.3016529 Z M7.99793388,0.991735537 C9.6053719,0.991735537 10.911157,2.29752066 10.9152893,3.90495868 L5.08057851,3.90495868 C5.08471074,2.29752066 6.39049587,0.991735537 7.99793388,0.991735537 Z M13.018595,18.9669421 L2.97727273,18.9669421 C1.90289256,18.9669421 1.0268595,18.2520661 1.01446281,17.3636364 L2.12190083,4.89669421 L4.08884298,4.89669421 L4.08884298,6.63636364 C4.08884298,6.90909091 4.31198347,7.1322314 4.58471074,7.1322314 C4.85743802,7.1322314 5.08057851,6.90909091 5.08057851,6.63636364 L5.08057851,4.89669421 L10.9152893,4.89669421 L10.9152893,6.63636364 C10.9152893,6.90909091 11.1384298,7.1322314 11.411157,7.1322314 C11.6838843,7.1322314 11.9070248,6.90909091 11.9070248,6.63636364 L11.9070248,4.89669421 L13.8739669,4.89669421 L14.981405,17.3677686 C14.9690083,18.2520661 14.0929752,18.9669421 13.018595,18.9669421 Z" id="Shape"></path>
                </g>
            </g>
        </g>
    </g>
</svg></a>
    </a>
</div>
    '; ?>
    <?php } ?>
    </div>
    <div class="divSearchHeader" id="divSearch">
        <div class="input-group mycursor" style="width:100%;">
            <span class="input-group-addon btnsearch jostejoo SansBold" onclick="searcher()">
                جستجو
            </span>
<input type="text" class="form-control navsearch"  placeholder="جستجو کن   "  id="myInput">
            <span id="display" style="
    position: absolute;
    right: 0;
    left: 2%;
    margin-top: 5.4%;
    z-index: 5555;
    border-top-left-radius: 0;
    border-top-right-radius: 0;">
                <div id="display1" style="overflow:unset!important;margin-top: 3%">

                </div>
                <div id="display2" style= "width: 100%;overflow: unset!important;">

                </div>
            </span>
        </div>
    </div>
<script>
    window.addEventListener('click', function(e){
  if (document.getElementById('divSearch').contains(e.target)){
    // Clicked in box
  } else{
    // Clicked outside the box
    $("#display").css('display','none');
  }
});
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
      window.location.href="search.php?name="+input.value;
  }
});
</script>
    <!----------- search navbar ---------------------->
    <!-----------phonix logo ---------------------->
    <a href="index.php" style="    position: relative;
    top: 10px;
    right: 10px;">
        <div class="mylogo" style="text-align: center;">
            <svg width="120px" height="80px" viewBox="0 0 108 59" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Mobile-Copy-11" transform="translate(-106.000000, -16.000000)">
                        <g id="Group-7-Copy" transform="translate(106.000000, 16.000000)">
                            <g id="LogoFarsi" transform="translate(0.534653, 35.400000)" fill="#DC1A52">
                                <path d="M38.291372,23.6 C41.3385201,23.6 43.8555649,21.2267511 44.2467299,18.150653 L44.2998468,18.150653 C47.6182396,18.150653 50.3083451,15.3362093 50.3083451,11.8644113 L50.3083451,7.62119045 L50.3083393,7.62119045 C50.3083393,6.49286912 49.4340654,5.57818182 48.3555964,5.57818182 C47.2771274,5.57818182 46.4028535,6.49286912 46.4028535,7.62119045 L46.4028535,11.8644113 L46.4029179,11.8644113 C46.4029179,13.079585 45.4613426,14.0646847 44.2998586,14.0646847 L44.2998586,7.62121497 C44.2998586,6.49289364 43.4255846,5.57820634 42.3471157,5.57820634 C41.2686467,5.57820634 40.3943728,6.49289364 40.3943728,7.62121497 L40.3943669,7.62121497 L40.3943669,17.3137583 L40.3944313,17.3137583 C40.3944313,18.528932 39.452856,19.5140318 38.291372,19.5140318 C37.129888,19.5140318 36.1883126,18.528932 36.1883126,17.3137583 L36.1883771,17.3137583 L36.1883771,7.62121497 C36.1883771,6.49289364 35.3141032,5.57820634 34.2356342,5.57820634 C33.1571652,5.57820634 32.2828913,6.49289364 32.2828913,7.62121497 L32.2828854,7.62121497 L32.2828854,17.3137583 C32.2828854,20.785544 34.9729793,23.6 38.2913837,23.6 L38.291372,23.6 Z" id="1"></path>
                                <path d="M15.0899398,0 C16.1684074,0 17.0426802,0.914687928 17.0426802,2.04301002 L17.042686,2.04301002 L17.042686,11.7355599 L17.0426216,11.7355599 C17.0426216,12.9507345 17.9841957,13.9358349 19.1456782,13.9358349 L19.1456782,11.7355599 C19.1456782,8.26377184 21.8357685,5.44931397 25.1541687,5.44931397 C28.4725571,5.44931397 31.1626591,8.26375958 31.1626591,11.7355599 C31.1626591,15.2073481 28.4725688,18.0218059 25.1541687,18.0218059 L25.1541687,13.9358472 C26.3156512,13.9358472 27.2572253,12.9507468 27.2572253,11.7355722 C27.2572253,10.5203976 26.3156512,9.53529723 25.1541687,9.53529723 C23.9926861,9.53529723 23.051112,10.5203976 23.051112,11.7355722 L23.0511765,11.7355722 L23.0511765,18.0218182 L19.1456899,18.0218182 C15.8273015,18.0218182 13.1371994,15.2073726 13.1371994,11.7355722 L13.1371994,2.04302228 C13.1371994,0.914700188 14.0114722,1.22595067e-05 15.0899398,1.22595067e-05 L15.0899398,0 Z" id="Path"></path>
                                <path d="M87.7656409,5.57818182 C91.0733509,5.57818182 93.7547964,8.3926236 93.7547964,11.8644192 L93.7547964,14.0646238 L95.3298544,14.0646238 C95.0860144,13.3797903 94.9523822,12.6385264 94.9523822,11.8644192 C94.9523822,8.39263586 97.6338159,5.57818182 100.941538,5.57818182 C104.249248,5.57818182 106.930693,8.3926236 106.930693,11.8644192 C106.930693,15.3362026 104.249259,18.1506567 100.941538,18.1506567 L93.7548197,18.1506567 L93.7548197,21.5569928 C93.7548197,22.6853133 92.8833603,23.6 91.8083632,23.6 C90.7333661,23.6 89.8619066,22.6853133 89.8619066,21.5569928 L89.8619008,21.5569928 L89.8619008,18.1506567 L89.8619008,14.0646361 L89.8619008,11.8644315 L89.861965,11.8644315 C89.861965,10.6492586 88.9234209,9.66415952 87.765676,9.66415952 C86.607931,9.66415952 85.6693869,10.6492586 85.6693869,11.8644315 C85.6693869,13.0796044 86.607931,14.0647035 87.765676,14.0647035 L87.765676,18.1506567 C84.457966,18.1506567 81.7765205,15.3362149 81.7765205,11.8644192 C81.7765205,8.39263586 84.4579543,5.57818182 87.765676,5.57818182 L87.7656409,5.57818182 Z M100.936433,14.0646299 L100.94152,14.0646299 L100.94152,14.0646974 C102.099265,14.0646974 103.037809,13.0795983 103.037809,11.8644254 C103.037809,10.6492525 102.099265,9.66415339 100.94152,9.66415339 C99.7837752,9.66415339 98.845231,10.6492525 98.845231,11.8644254 C98.845231,13.0778145 99.7810303,14.0617428 100.936433,14.0646299 Z" id="Shape"></path>
                                <ellipse id="Oval" transform="translate(100.937917, 2.084125) rotate(90.000000) translate(-100.937917, -2.084125) " cx="100.937917" cy="2.08412514" rx="2.04792648" ry="1.94702733"></ellipse>
                                <path d="M66.4796479,18.1290909 C68.0378803,18.1290909 69.4569813,17.5001007 70.5223992,16.4694858 C71.5878171,17.5001007 73.0069122,18.1290909 74.5651446,18.1290909 C77.8729404,18.1290909 80.5544554,15.295463 80.5544554,11.8 L80.5544554,7.52785592 C80.5544554,6.39184357 79.6829734,5.47092143 78.6079484,5.47092143 C77.5329234,5.47092143 76.6614414,6.39184357 76.6614414,7.52785592 L76.6614355,7.52785592 L76.6614355,11.8 L76.6614998,11.8 C76.6614998,13.0234568 75.7229312,14.0152713 74.5651563,14.0152713 C73.4093144,14.0152713 72.4720074,13.0267524 72.4688829,11.8061036 C72.4688829,11.8040609 72.4689588,11.8020428 72.4689588,11.8 L72.468877,11.8 L72.468877,7.52785592 C72.468877,6.39184357 71.597395,5.47092143 70.52237,5.47092143 C69.447345,5.47092143 68.5758629,6.39184357 68.5758629,7.52785592 L68.5758571,7.52785592 L68.5758571,11.8 C68.5758571,11.8020428 68.575933,11.8040609 68.575933,11.8061036 C68.5728085,13.0267524 67.6355015,14.0152713 66.4796596,14.0152713 C65.3218847,14.0152713 64.3833161,13.0234568 64.3833161,11.8 L64.3832344,11.8 C64.3832344,8.30454936 61.701731,5.47090909 58.3939235,5.47090909 L58.3939235,9.58471635 C59.5516985,9.58471635 60.490267,10.5765309 60.490267,11.7999877 C60.490267,13.0234444 59.5516985,14.015259 58.3939235,14.015259 C57.2369954,14.015259 56.2989875,13.0248948 56.2976093,11.8026723 L56.2976443,11.7999877 L56.2976443,7.52784358 L56.2976385,7.52784358 C56.2976385,6.39183122 55.4261564,5.47090909 54.3511314,5.47090909 C53.2761064,5.47090909 52.4046244,6.39183122 52.4046244,7.52784358 L52.4046244,11.7999877 L52.4046594,11.8026723 C52.4032811,13.0248948 51.4652733,14.015259 50.3083451,14.015259 L50.3083451,18.1290909 C51.8666008,18.1290662 53.2857194,17.5000514 54.3511372,16.4694179 C55.4165551,17.5000514 56.8356678,18.1290662 58.3939235,18.1290662 C59.9522143,18.1290662 61.371362,17.5000267 62.4367857,16.46935 C63.5022095,17.5000267 64.9213572,18.1290662 66.4796479,18.1290662 L66.4796479,18.1290909 Z" id="Path"></path>
                                <ellipse id="Oval" transform="translate(78.622351, 2.084125) rotate(90.000000) translate(-78.622351, -2.084125) " cx="78.6223506" cy="2.08412514" rx="2.04792648" ry="1.94702733"></ellipse>
                                <polygon id="Rectangle" transform="translate(65.442199, 2.084097) rotate(-90.000000) translate(-65.442199, -2.084097) " points="63.3942699 -3.0082279 67.490129 -3.0082279 67.490129 7.17642289 63.3942699 7.17642289"></polygon>
                                <ellipse id="Oval" cx="60.3394625" cy="2.09181818" rx="1.98585573" ry="2.09181818"></ellipse>
                                <ellipse id="Oval" cx="70.523338" cy="2.09181818" rx="1.98585573" ry="2.09181818"></ellipse>
                                <ellipse id="Oval" transform="translate(72.482065, 21.515691) rotate(90.000000) translate(-72.482065, -21.515691) " cx="72.4820647" cy="21.5156905" rx="2.04792648" ry="1.94702733"></ellipse>
                                <ellipse id="Oval" transform="translate(68.587940, 21.515691) rotate(90.000000) translate(-68.587940, -21.515691) " cx="68.58794" cy="21.5156905" rx="2.04792648" ry="1.94702733"></ellipse>
                                <path d="M1.95276839,10.9562624 C3.03123527,10.9562624 3.90550748,11.871791 3.90550748,13.00115 L3.90550748,17.3079768 L3.90544303,17.3079768 C3.90544303,18.5242681 4.84701652,19.5102739 6.00849828,19.5102739 C7.16998004,19.5102739 8.11155353,18.5242681 8.11155353,17.3079768 L8.11148908,17.3079768 L8.11148908,2.15216033 L8.11149494,2.15216033 C8.11149494,1.02280128 8.98576715,0.107272727 10.064234,0.107272727 C11.1427009,0.107272727 12.0169731,1.02280128 12.0169731,2.15216033 L12.0169731,17.3079768 C12.0169731,20.7829556 9.32688452,23.6 6.00848656,23.6 C2.69010032,23.6 0,20.7829678 0,17.3079768 L0,13.00115 L5.85890863e-06,13.00115 C5.85890863e-06,11.871791 0.874278063,10.9562624 1.95274495,10.9562624 L1.95276839,10.9562624 Z" id="Path"></path>
                            </g>
                            <g id="LogoEnglish" transform="translate(0.534653, 0.000000)" fill="#2D3E50">
                                <path d="M16.8107769,9.8523415 C20.5408368,9.8523415 23.5646667,13.1366481 23.5646667,17.1880523 C23.5646667,21.2394422 20.54085,24.5237631 16.8107769,24.5237631 C13.0807169,24.5237631 10.0568871,21.2394565 10.0568871,17.1880523 C10.0568871,13.1366624 13.0807038,9.8523415 16.8107769,9.8523415 Z M16.8107769,14.6204355 C18.1163502,14.6204355 19.1747338,15.7699947 19.1747338,17.188038 C19.1747338,18.6060813 18.1163502,19.7556405 16.8107769,19.7556405 C15.5052035,19.7556405 14.44682,18.6060813 14.44682,17.188038 C14.44682,15.7699947 15.5052035,14.6204355 16.8107769,14.6204355 Z" id="1"></path>
                                <path d="M2.1950193,24.5236774 C3.40727553,24.5236774 4.38999909,23.4585063 4.39000567,22.1445223 L4.39001226,22.1445223 L4.39001226,14.6409474 L7.31713493,14.6409474 L7.31713493,14.6409403 C8.52939115,14.6409403 9.5121213,13.5757549 9.5121213,12.2617852 C9.5121213,10.9478155 8.52939115,9.88263006 7.31713493,9.88263006 L4.39001226,9.88263006 L4.39001226,7.32050584 L4.38993981,7.32050584 C4.38993981,5.90539345 5.44832031,4.7582103 6.75388984,4.7582103 C8.0590247,4.7582103 9.11712201,5.90462965 9.11782668,7.31909246 L9.11780693,7.32050584 C9.11780693,8.63447555 10.1005371,9.69966096 11.3127933,9.69966096 C12.5250495,9.69966096 13.5077797,8.63447555 13.5077797,7.32050584 C13.5077797,7.29951208 13.5075162,7.2785897 13.5070157,7.25773156 C13.4758454,3.24367556 10.4645768,0 6.75387008,0 C3.02382103,0 0,3.27751828 0,7.32054867 L0,14.641026 L0,22.1446008 L0,22.144608 C6.58573623e-06,23.458592 0.982730146,24.5237631 2.19498637,24.5237631 L2.1950193,24.5236774 Z" id="Path"></path>
                                <path d="M24.8464598,22.139678 C24.8464598,23.4563705 25.8291928,24.5237631 27.0414526,24.5237631 C28.2537123,24.5237631 29.2364454,23.4563705 29.2364454,22.139678 L29.2364454,17.1880595 L29.2363729,17.1880595 C29.2363729,15.7700147 30.2947565,14.6204545 31.6003298,14.6204545 C32.9059032,14.6204545 33.9642868,15.7700147 33.9642868,17.1880595 L33.9642143,17.1880595 L33.9642143,22.139678 L33.9642209,22.139678 C33.9642209,23.4563705 34.9469539,24.5237631 36.1592137,24.5237631 C37.3714735,24.5237631 38.3542065,23.4563705 38.3542065,22.139678 L38.3542065,17.1880595 C38.3542065,13.1366656 35.3303898,9.8523415 31.6003167,9.8523415 C27.8702567,9.8523415 24.8464268,13.1366513 24.8464268,17.1880595 L24.8464268,22.139678 L24.8464334,22.139678 L24.8464598,22.139678 Z" id="Path"></path>
                                <path d="M39.7345701,22.139678 C39.7345701,23.4563705 40.7057236,24.5237631 41.9036993,24.5237631 C43.1016751,24.5237631 44.0728286,23.4563705 44.0728286,22.139678 L44.0728286,12.2364266 L44.0728221,12.2364266 C44.0728221,10.9197341 43.1016686,9.8523415 41.9036928,9.8523415 C40.7057171,9.8523415 39.7345636,10.9197341 39.7345636,12.2364266 L39.7345636,22.139678 L39.7345701,22.139678 Z" id="Path"></path>
                                <ellipse id="Oval" transform="translate(41.917314, 5.861358) rotate(90.000000) translate(-41.917314, -5.861358) " cx="41.9173142" cy="5.86135786" rx="2.37951182" ry="2.19212023"></ellipse>
                                <path d="M58.318067,20.4538697 L58.3180736,20.4538626 L55.3112796,17.1880451 L58.318067,13.9222349 C59.1752647,12.991193 59.1752647,11.4816719 58.318067,10.5506229 C57.4608694,9.61958104 56.0710671,9.61958104 55.2138695,10.5506229 L55.2138629,10.5506157 L52.2070754,13.816426 L49.200288,10.5506157 L49.2002749,10.55063 C48.3430772,9.6195882 46.9532815,9.61958104 46.0960838,10.55063 C45.2388862,11.4816719 45.2388862,12.991193 46.0960838,13.9222349 L49.1028713,17.1880451 L46.0960773,20.4538626 L46.0960838,20.4538697 C45.2388862,21.3849116 45.2388862,22.8944399 46.0960838,23.8254817 C46.9532815,24.7565236 48.3430838,24.7565236 49.2002814,23.8254817 L52.2070754,20.5596643 L55.2138695,23.8254817 C56.0710671,24.7565236 57.4608694,24.7565236 58.318067,23.8254817 C59.1752647,22.8944399 59.1752647,21.3849116 58.318067,20.4538697 Z" id="Path"></path>
                                <path d="M62.4377445,24.5237631 C63.6500043,24.5237631 64.6327373,23.4585774 64.6327373,22.1446073 L64.6327439,22.1446073 L64.6327439,7.3205508 L64.6326715,7.3205508 C64.6326715,5.905438 65.6910551,4.75825452 66.9966284,4.75825452 C68.3022017,4.75825452 69.3605853,5.905438 69.3605853,7.3205508 L69.3605129,7.3205508 L69.3605129,22.1446073 C69.3605129,23.4585774 70.3432459,24.5237631 71.5555057,24.5237631 C72.7677655,24.5237631 73.7504985,23.4585774 73.7504985,22.1446073 L73.7505051,22.1446073 L73.7505051,7.3205508 C73.7505051,3.27753351 70.7266884,0 66.9966152,0 C63.2665553,0 60.2427254,3.27751923 60.2427254,7.3205508 L60.2427254,22.1446073 C60.2427254,23.4585774 61.2254584,24.5237631 62.4377182,24.5237631 L62.4377445,24.5237631 Z" id="Path"></path>
                                <path d="M78.3747093,24.5237488 C77.1712982,24.5237488 76.1957384,23.4585631 76.1957384,22.144593 L76.1957319,22.144593 L76.1957319,7.32053652 L76.1958038,7.32053652 C76.1958038,5.90542372 75.1451456,4.75824024 73.849102,4.75824024 L73.849102,0 C77.5519352,0 80.5536934,3.27751923 80.5536934,7.3205508 L80.5536934,22.1446073 C80.5536934,23.4585774 79.5781336,24.5237631 78.3747224,24.5237631 L78.3747093,24.5237488 Z" id="Path"></path>
                                <path d="M90.9532476,22.139666 C90.9532476,23.4563572 91.9359806,24.5237488 93.1482404,24.5237488 C94.3605001,24.5237488 95.3432332,23.4563572 95.3432332,22.139666 L95.3432332,17.1880523 C95.3432332,13.1366624 92.3194164,9.8523415 88.5893433,9.8523415 C84.8592834,9.8523415 81.8354535,13.1366481 81.8354535,17.1880523 C81.8354535,21.2394422 84.8592702,24.5237631 88.5893433,24.5237631 L88.5893433,19.7556691 C87.28377,19.7556691 86.2253864,18.6061099 86.2253864,17.1880666 C86.2253864,15.7700233 87.28377,14.6204641 88.5893433,14.6204641 C89.8949167,14.6204641 90.9533003,15.7700233 90.9533003,17.1880666 L90.9532278,17.1880666 L90.9532278,22.1396803 L90.9532344,22.1396803 L90.9532476,22.139666 Z" id="Path"></path>
                                <path d="M96.7235902,22.1446031 C96.7235902,23.4585755 97.6947437,24.5237631 98.8927194,24.5237631 C100.090695,24.5237631 101.061849,23.4585755 101.061849,22.1446031 L101.061855,22.1446031 L101.061855,2.37915997 L101.061849,2.37915997 C101.061849,1.06518758 100.090695,0 98.8927194,0 C97.6947437,0 96.7235902,1.06518758 96.7235902,2.37915997 L96.7235902,22.1446031 Z" id="Path"></path>
                                <path d="M102.442212,22.1446031 C102.442212,23.4585755 103.413366,24.5237631 104.611341,24.5237631 C105.809317,24.5237631 106.780471,23.4585755 106.780471,22.1446031 L106.780477,22.1446031 L106.780477,2.37915997 L106.780471,2.37915997 C106.780471,1.06518758 105.809317,0 104.611341,0 C103.413366,0 102.442212,1.06518758 102.442212,2.37915997 L102.442212,22.1446031 Z" id="Path"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </a>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("idModal");
    // Get the button that opens the modal
    var btn = document.getElementById("myBtnLog");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeLog")[0];
    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
function searcher(){
    var name = $('#myInput').val();
        if(name===""){
            $('#display').css('display','none');
            $('#display').css('height','0');
            $("#display1").html("");
            $("#display2").html("");
            return;
        }
        $.ajax({
            url: 'request/search.php',
            data: {
                name:name
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if(data["error"]){
                    $("#display").css('display','none');
                    $("#display1").html("");
                }else{
                    $("#display").css('height','max-content');
                    $("#display").css('display','block');
                    $("#display1").html(data["productName"]);
                    $("#display2").html(data["catName"]);
                }
            }
        });
}
function reloader(){
    $("#display").css('display','none');
    $("#display1").html("");
}
$('#myInput').on("delete copy paste cut keypress keydown keyup",function () {
    var name = $('#myInput').val();
    if(name===""){
        $('#display').css('display','none');
        $('#display').css('height','0');
        $("#display1").html("");
        $("#display2").html("");
            return;
        }
        $.ajax({
            url: 'request/search.php',
            data: {
                name:name
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if(data["error"]){
                    $("#display").css('display','none');
                    $("#display1").html("");
                }else{
                $("#display").css('height','max-content');
                $("#display").css('display','block');
                $("#display1").html(data["productName"]);
                $("#display2").html(data["catName"]);
                }
            }
        });
    });
    function widthAutoSearch() {
        // var navsearch= $('.navsearch').outerWidth();
        // var jostejoo = $('.jostejoo ').outerWidth();
        // $('#display1').css('width',navsearch+jostejoo+'px');
        //
        var navsearch=$('.navsearch').outerWidth();
        var jostejoo=$('.jostejoo ').outerWidth();
        var jostejoo1=$('.jostejoo ').outerHeight();
        $('#display').css('width',navsearch+jostejoo-20+'px');
        $('#display').css('margin-top',jostejoo1+'px');
        console.log(jostejoo+navsearch);
    }
    $(document).ready(function () {
        widthAutoSearch();
    });
    $(window).on('resize',function () {
        widthAutoSearch();
    });
</script>
<!--Navbar-->
<div class="col-lg-12 col-md-12" style="border-bottom: 4px solid #2d3e50;">
    <header class="cd-main-header">

        <ul class="cd-header-buttons" style="margin-right: 10px">
            <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
        </ul> <!-- cd-header-buttons -->
    </header>

    <main class="cd-main-content">
        <!-- your content here -->

    </main>
    <nav class="cd-nav hidden-xs hidden-sm" id="onlyXsandMD" >
        <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
            <?php
            $menu = $db::Query("SELECT * FROM menus order by pos");
            while ($fetchMenu = mysqli_fetch_assoc($menu)){
                $menuId =$fetchMenu['menuId'];
                $menuName = $fetchMenu['menuName'];
                ?>
                <li class="has-children has-RasOl">
                    <a id="has-RasOl" style="text-decoration: none" onclick="window.location.href='categories.php?menuId=<?php echo $menuId ?>'" href="categories.php?menuId=<?php echo $fetchMenu['menuId'] ?>"><?php echo $fetchMenu['menuName']?></a>
                    <ul class="cd-secondary-nav is-hidden " style="padding: 25px 50px;">
                        <li class="has-children" style="border-left: 0;margin: 0">
                            <ul class="is-hidden">
                                <?php
                                $categories = $db::Query("SELECT * FROM category WHERE catMenuId='$menuId' ORDER BY statusList LIMIT 10");
                                while ($fetchCategories = mysqli_fetch_assoc($categories)) {
                                    $catId =$fetchCategories['catId'];
                                    $catName = $fetchCategories['catName'];
                                    ?>
                                    <li>
                                        <a style="padding-right: 15px;text-align: right" href="search.php?catId=<?php echo $fetchCategories['catId']?>"><?php echo $fetchCategories['catName'] ?></a>
                                    </li>
                                    <?php } ?>
                            </ul>
                        </li>
                        <li class="has-children" style="border-left: 0;margin: 0">
                            <ul class="is-hidden">
                                <?php
                                $categories = $db::Query("SELECT * FROM category WHERE catMenuId='$menuId' ORDER BY statusList LIMIT 10 OFFSET 11");
                                while ($fetchCategories = mysqli_fetch_assoc($categories)) {
                                    $catId =$fetchCategories['catId'];
                                    $catName = $fetchCategories['catName'];
                                    ?>
                                    <li>
                                        <a style="padding-right: 15px;text-align: right" href="search.php?catId=<?php echo $fetchCategories['catId']?>"><?php echo $fetchCategories['catName'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="has-children" style="border-left: 0;margin: 0">
                            <ul class="is-hidden">
                                <?php
                                $categories = $db::Query("SELECT * FROM category WHERE catMenuId='$menuId' ORDER BY statusList LIMIT 10 OFFSET 21");
                                while ($fetchCategories = mysqli_fetch_assoc($categories)) {
                                    $catId =$fetchCategories['catId'];
                                    $catName = $fetchCategories['catName'];
                                    ?>
                                    <li>
                                        <a style="padding-right: 15px;text-align: right" href="search.php?catId=<?php echo $fetchCategories['catId']?>"><?php echo $fetchCategories['catName'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li style="border-left: 0;">
                            <img src="admin/upload/menus/<?php echo $fetchMenu['menuImgUrl']?>.jpg">
                        </li>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul> <!-- primary-nav -->
    </nav> <!-- cd-nav -->
    <nav class="cd-nav hidden-md hidden-lg" id="onlyLgandMD" style="padding: 0 5px !important;">
        <ul id="cd-primary-nav" class="cd-primary-nav text-right is-fixed">
            <li style="background-color: #dc1a52"><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
            <?php
            $cat = $db::Query("SELECT * FROM category");
            while ($fetch = mysqli_fetch_assoc($cat)){
                $id =$fetch['catId'];
                $name = $fetch['catName'];
                ?>
                <li class="has-children">
                    <a style="text-decoration: none" href="#"><?php echo $fetch['catName']?></a>
                    <ul class="cd-secondary-nav  is-hidden " style="padding: 0 !important;width: 100%">
                        <li style="background-color: #dc1a52"><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
                                <?php
                                $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id'");
                                while ($fetch = mysqli_fetch_assoc($sub)) {
                                    ?>
                                    <a href="search.php?subId=<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></a>
                                    <?php
                                }
                                ?>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul> <!-- primary-nav -->
    </nav> <!-- cd-nav -->
</div>
