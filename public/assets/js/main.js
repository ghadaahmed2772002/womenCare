//toggle authenication menu in side bar 
document.addEventListener('DOMContentLoaded', function() {
    const toglgleAuth = document.querySelector('.auth-toggle');
    const submenuAppear = document.querySelector('.auth-submenu');
    const arrowIcon = document.querySelector('.arrow-icon');


    toglgleAuth .addEventListener('click', function(event) {
         event.preventDefault(); 
        if (submenuAppear.style.display === 'none' || submenuAppear.style.display === '') {
            submenuAppear.style.display = 'block';
            arrowIcon.classList.remove('la-angle-down');
            arrowIcon.classList.add('la-angle-up');
        } else {
            submenuAppear.style.display = 'none';
            arrowIcon.classList.add('la-angle-down');
            arrowIcon.classList.remove('la-angle-up');
        }
    });

});