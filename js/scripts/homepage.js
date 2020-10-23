
// Changeover to edit task form
let edit = document.getElementsByClassName("fa-pencil-square-o");
for (let i = 0; i < edit.length; i++) {
  edit[i].addEventListener("click", function() {
    let panel = this.parentNode.parentNode.parentNode.parentNode;
    panel.childNodes[1].style.display = 'none';
    panel.childNodes[3].style.display = 'block';
  });
}

// Changeover back to task block
let cancel = document.getElementsByClassName("cancel_button");
for (let i = 0; i < cancel.length; i++) {
  cancel[i].addEventListener("click", function() {
    let panel = this.parentNode.parentNode.parentNode.parentNode;
    panel.childNodes[3].style.display = 'none';
    panel.childNodes[1].style.display = 'block';
  });
}


// Ajax request to edit task
$('.edit_btn').click(function(){
    // Get value from form
    let parent = this.parentNode.parentNode.childNodes;
    let content = parent[1].childNodes[1].value;
    let checkbox = parent[3].childNodes[3].checked;
    let done = parent[5].childNodes[3].checked;
    let id = parent[7].childNodes[1].value;

    // Ajax request
    $.post(
      'tasks/update',
      {content:content, checkbox:checkbox, id:id, ajax:true, done:done},
      onSuccess
    );

    // Changeover from form to task box
    if (content.trim().length > 0 && content.length < 20000) {
        cancel = this.parentNode.childNodes[3].click();

        new_content = this.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[3];
        new_content.textContent = content;

        new_status = this.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].childNodes[1];
        if (checkbox) {
            new_status.style.display = 'block';
        }
        else {
            new_status.style.display = 'none';
        }

        new_done = this.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].childNodes[3].childNodes;
        if (done) {
            new_done[1].style.display = 'block';
            new_done[3].style.display = 'none';
        }
        else {
            new_done[1].style.display = 'none';
            new_done[3].style.display = 'block';
        }
    }

    function onSuccess(data) {
        let arr = JSON.parse(data);

        // Active message error box
        let message_box = document.getElementById('message_box');
        message_box.style.display = 'block';
        let color;
        if (arr['error']) {
            color = '#FF3333';
        }
        else {
            color = '#99FF99';
        }
        message_box.style.backgroundColor = color;

        let message = document.getElementById('message');
        message.textContent = arr['message'];
    }
});

// Update page with sorting data
function sortRequest(way) {
    var select = document.getElementById("sorting_selector");
    var value = select.value;
    let currentPage = document.getElementById("currentPage").textContent;
    currentPage = currentPage.trim();
    document.location.href = "?page="+ currentPage +"&sort=" + value + "&way=" + way;
}
$('#asc').click(function(){
    sortRequest(this.id);
});
$('#desc').click(function(){
    sortRequest(this.id);
});
