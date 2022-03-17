const menuHamburgers = document.getElementsByClassName('menu-hamburger')
const menu = document.getElementsByTagName('nav')[0]
console.log(menuHamburgers)
if (menuHamburgers) {
    Array.from(menuHamburgers).forEach(menuBtn => {
        menuBtn.addEventListener('click', () => {
            // menu.classList.toggle('hidden')
            menu.classList.toggle('-ml-96')
            // menu.firstElementChild.classList.toggle('-ml-96')
            // menu.classList.toggle('ml-auto')
        })
    })
}