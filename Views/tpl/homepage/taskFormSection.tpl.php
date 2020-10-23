<section class="task_form_section">
    <div class="container">
        <div class="task_form_box col-lg-9 offset-lg-2">
            <div class="task_form_discription">
                Appentd task:
            </div>
            <form class="task_form" id="task_form" action="tasks/append" method="POST" enctype="multipart/form-data">
                <div class="input_name_box input_boxs">
                    <input type="text" name="name" value="" class="input_name task_inputs" placeholder="*User name..." required>
                </div>
                <div class="input_email_box input_boxs">
                    <input type="email" name="email" value="" class="input_email task_inputs" placeholder="*User email..." required>
                </div>
                <div class="input_content_box input_boxs">
                    <textarea class= "task_inputs" name="content" rows="8" placeholder="*Task content..." required id="content" maxlength="4000"></textarea>
                </div>
                <div class="button_box">
                    <button type="submit" class="btn btn-primary">
                      Submit
                    </button>
          </div>
            </form>
        </div>
    </div>
</section>
