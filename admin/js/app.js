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