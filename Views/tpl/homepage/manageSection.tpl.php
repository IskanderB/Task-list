<section class="manage">
    <div class="container">
        <div class="row">
            <div class="manage_box col-lg-12">
                <div class="sorting_box">
                    <div class="sorting_form d-flex">
                        <div class="sorting_discription sorting_bits">
                            Sort by
                        </div>
                        <div class="sorting_selector_box">
                            <select id="sorting_selector" class="sorting_selector sorting_bits" name="sorting_selector">
                                <?php
                                foreach ($pageData['sortOrder'] as $key => $value) {
                                    echo "<option value=". $key ."> " . $value . "</option>";
                                }
                                 ?>
                            </select>
                        </div>
                        <div class="sorting_submit sorting_bits">
                            <button type="submit" class="btn btn-primary" id="asc">
                              <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </button>
                            <button type="submit" class="btn btn-primary" id="desc">
                              <i class="fa fa-chevron-up" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
                    <center>
                    <span class="pages_numbers_box bits">
                        <ul class="pages_numbers_list d-flex">
                            <?php
                                for ($i=$_GET['page']; $i <= $pageData['countPages']; $i++) {
                                    if ($i > $_GET['page'] + 9) {
                                        echo "<li class='points bits'>...</li>";
                                        echo "<li class='last_point bits'><a ";
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
                </center>
                    <span class="right_change"><a href="
                    <?php
                       if ($_GET['page'] < $pageData['countPages']) {
                           echo "?sort=" . $_GET['sort'] . "&way=" . $_GET['way'] . "&page=" . ($_GET['page'] + 1);
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
        </div>
    </div>
</section>

<div id="currentSort" class="d-none">
    <?php
    if (isset($_GET['sort'])) {
        echo $_GET['sort'];
    }
     ?>
</div>
<div id="currentPage" class="d-none">
    <?php
    echo $_GET['page'];
     ?>
</div>
