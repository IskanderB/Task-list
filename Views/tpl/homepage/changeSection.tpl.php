<section class="change_box_section">
    <div class="col-lg-12 change_box_wrap">
        <div class="change_box d-flex">
            <span class="left_change">
                <a href="
                <?php
                   if ($_GET['page'] > 1) {
                       echo "?sort=" . $_GET['sort'] . "&way=" . $_GET['way'] . "&page=" . ($_GET['page'] - 1);
                   }
                 ?>
                "
                <?php
                    if ($_GET['page'] == 1) {
                        echo " style='color:black;cursor:auto;'";
                    }
                 ?>
                ><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </span>
            <span class="pages_numbers_box bits">
                <ul class="pages_numbers_list d-flex">
                    <?php
                        for ($i=$_GET['page']; $i <= $pageData['countPages']; $i++) {
                            if ($i > $_GET['page'] + 9) {
                                echo "<li class='points'>...</li>";
                                echo "<li class='last_point'><a ";
                                if ($_GET['page'] == $pageData['countPages']) {
                                    echo "style='color:black;cursor:auto'";
                                }
                                echo " href='?sort=" . $_GET['sort'] . "&way=" . $_GET['way'] . "&page=" . $pageData['countPages'] . "'>" .  $pageData['countPages'] . "</a></li>";
                                break;
                            }
                            echo "<li><a ";
                            if ($_GET['page'] == $i) {
                                echo "style='color:black;cursor:auto'";
                            }
                            echo "href='?sort=" . $_GET['sort'] . "&way=" . $_GET['way'] . "&page=" . $i . "'>" . $i . "</a></li>";
                        }
                     ?>
                </ul>
            </span>
            <span class="right_change"><a href="
            <?php
               if ($_GET['page'] < $pageData['countPages']) {
                   echo "?sort=" . $_GET['sort'] . "&page=" . ($_GET['page'] + 1);
               }
             ?>
            "
            <?php
                if ($_GET['page'] == $pageData['countPages']) {
                    echo " style='color:black;cursor:auto;'";
                }
             ?>
            ><i class="fa fa-chevron-right" aria-hidden="true"></i></a> </span>
        </div>
    </div>
</section>
