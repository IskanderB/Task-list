<section class="list_section">
    <div class="container">
        <div class="list_box col-lg-12">
            <ul class="list_ul">
                <?php
                if (!empty($pageData['tasks'])) {

                    for ($i=0; $i < count($pageData['tasks']); $i++) { ?>
                <li class="task_li">
                    <div class="task_box">
                        <div class="header_task">
                            <div class="contacts">
                                <div class="name">
                                    <?php echo $pageData['tasks'][$i]['name']; ?>
                                </div>
                                <div class="email">
                                    <?php echo $pageData['tasks'][$i]['email']; ?>
                                </div>
                            </div>
                            <div class="icons d-flex">
                                <div class="status_icon" style="<?php
                                    if (!$pageData['tasks'][$i]['status']) {
                                        echo "display:none;";
                                    }
                                 ?>">
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                </div>
                                <div class="done_box">
                                    <div class='done done_status' <?php if (!$pageData['tasks'][$i]['done']) {
                                        echo " style='display:none;'";
                                    } ?>>Done</div>
                                    <div class='not_done done_status' <?php if ($pageData['tasks'][$i]['done']) {
                                        echo " style='display:none;'";
                                    } ?>>Done</div>
                                </div>
                                <?php
                                if (isset($_SESSION['user'])) {
                                    ?>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <?php
                                }
                                 ?>
                            </div>
                        </div>
                        <div class="text">
                            <?php echo $pageData['tasks'][$i]['content']; ?>
                        </div>
                    </div>
                    <div class="form_box">
                        <div class="task_form" id="task_form" action="" method="POST" enctype="multipart/form-data">
                            <div class="input_content_box input_boxs">
                                <textarea class= "task_inputs" name="content" rows="8"  placeholder="Task content..." required id="content" maxlength="4000"><?php echo $pageData['tasks'][$i]['content']; ?></textarea>
                            </div>
                            <div class="input_checkbox_box">
                                <label for="checkbox">Checked</label>
                                <input type="checkbox" name="checkbox" value="" class="input_checkbox"
                                <?php
                                if ($pageData['tasks'][$i]['status']) {
                                    echo " checked";
                                }
                                 ?>
                                >
                            </div>
                            <div class="input_checkbox_box">
                                <label for="checkbox">Done</label>
                                <input type="checkbox" name="done" value="" class="input_done"
                                <?php
                                if ($pageData['tasks'][$i]['done']) {
                                    echo " checked";
                                }
                                 ?>
                                >
                            </div>
                            <div class="input_id_box d-none">
                                <input type="text" name="id" value="<?php echo $pageData['tasks'][$i]['id']; ?>
                                " class="input_id" readonly>
                            </div>
                            <div class="button_box d-flex">
                                <button type="submit" class="btn btn-primary edit_btn" id="edit_btn">
                                Submit
                                </button>
                                <div class="btn btn-primary cancel_button">
                                Cancel
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php }
                    } ?>
            </ul>
        </div>
    </div>
</section>
