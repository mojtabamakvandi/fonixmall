<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
    <?php
    $cat = $db::Query("SELECT * FROM category order by statusList");
    while ($fetch1 = mysqli_fetch_assoc($cat)){
        $id =$fetch1['catId'];
        $name = $fetch1['catName'];
        ?>
        <li class="has-children has-RasOl">
            <a id="has-RasOl" style="text-decoration: none" onclick="window.location.href='search.php?catId=<?php echo $fetch1['catId'] ?>'" href="search.php?catId=<?php echo $fetch1['catId'] ?>"><?php echo $fetch1['catName']?></a>
            <ul class="cd-secondary-nav is-hidden " style="    padding: 25px 50px;">
                <li class="has-children" style="margin: 0">
                    <ul class="is-hidden">
                        <?php
                        $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time (subRegTime) LIMIT 10 OFFSET 0");
                        while ($fetchR = mysqli_fetch_assoc($sub)) {
                            ?>
                            <li><a style="    padding: 0;text-align: right" href="search.php?subId=<?php echo $fetchR['subId']?>"><?php echo $fetchR['subName'] ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="has-children" style="margin: 0">
                    <ul class="is-hidden">
                        <?php
                        $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time (subRegTime) LIMIT 10 OFFSET 11");
                        while ($fetchR = mysqli_fetch_assoc($sub)) {
                            ?>
                            <li><a style="    padding: 0;text-align: right" href="search.php?subId=<?php echo $fetchR['subId']?>"><?php echo $fetchR['subName'] ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="has-children" style="border-left: 0;margin: 0">
                    <ul class="is-hidden">
                        <?php
                        $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time (subRegTime) LIMIT 10 OFFSET 21");
                        while ($fetch = mysqli_fetch_assoc($sub)) {
                            ?>
                            <li><a style="    padding: 0;text-align: right" href="search.php?subId=<?php echo $fetchR['subId']?>"><?php echo $fetchR['subName'] ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li style="border-left: 0;">
                    <img src="admin/upload/cat/<?php echo $fetch1['catImg']?>.jpg">
                </li>
            </ul>
        </li>
        <?php
    }
    ?>
</ul> <!-- primary-nav -->
