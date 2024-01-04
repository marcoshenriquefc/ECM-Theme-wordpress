const burger = document.querySelector('#burger-menu')
burger.addEventListener('click', () => {
    const header = document.querySelector('#menuMain');
    header.classList.toggle('active');
})