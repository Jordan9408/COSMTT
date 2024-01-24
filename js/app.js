const loader = document.querySelector('.loader');
window.addEventListener('load', () => {
    loader.classList.add('fondu-out');
})

// menu toggle
let toggle = document.querySelector(".toggle");
let menu = document.querySelector("#menu");

toggle.addEventListener("click", function () {
    menu.classList.toggle("open");
});


// Afficher et Masquer Password
let input = document.querySelector('.mdp input');
let showBtn = document.querySelector('.mdp i');
showBtn.onclick = function () {
    if (input.type === "password") {
        input.type = "text";
        showBtn.classList.add('active');
    } else {
        input.type = "password";
        showBtn.classList.remove('active');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var showPopupLink = document.getElementById('showPopup');
    var teamPopup = document.getElementById('teamPopup');
    var closePopupButton = document.getElementById('closePopup');

    showPopupLink.addEventListener('click', function() {
        teamPopup.style.display = 'block';
    });

    closePopupButton.addEventListener('click', function() {
        teamPopup.style.display = 'none';
    });
});

