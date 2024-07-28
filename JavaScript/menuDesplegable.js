
const profileButton = document.querySelector('.header__nav__profile');
const menu = document.getElementById('menu');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('close-btn');

profileButton.addEventListener('click', function () {
    menu.classList.toggle('active');
    overlay.classList.toggle('active');
});

closeBtn.addEventListener('click', function () {
    menu.classList.remove('active');
    overlay.classList.remove('active');
});

overlay.addEventListener('click', function () {
    menu.classList.remove('active');
    overlay.classList.remove('active');
});
