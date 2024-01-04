const burger = document.querySelector('#burger-menu')

if(burger) {
    burger.addEventListener('click', () => {
        const header = document.querySelector('#menuMain');
        header.classList.toggle('active');
    })
}

function toggleMenu() {
    const $headerMenu = document.querySelector("#nav-menu");

    $headerMenu.classList.toggle('active');
}