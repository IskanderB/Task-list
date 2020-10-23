<section class="message_section">
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['message'])) {
                // code...
             ?>
            <div class="col-lg-12 message_box"
                <?php

                    if ($_SESSION['error']) {
                        echo "style='background-color:#FF3333'";
                    }
                    else {
                        echo "style='background-color:#99FF99'";
                    }

                 ?>
            >
            <div class="message">
                <?php

                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['error']);

                 ?>
            </div>
            </div>
        <?php } ?>
        <div class="col-lg-12 message_box" style="display:none;" id="message_box">
            <div class="message" id="message">

            </div>
        </div>
        </div>
    </div>
</section>
