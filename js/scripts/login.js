
// Correcting width inputs for different screens

let screenWidth = window.innerWidth;

if (screenWidth < 380) {
    let inputs = document.getElementsByTagName('input');

    for (var i = 0; i < inputs.length; i++) {

        inputs[i].style.width = screenWidth - 190 + 'px';
    }
}
