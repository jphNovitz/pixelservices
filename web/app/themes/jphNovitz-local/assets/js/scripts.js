const menuHamburgers = document.getElementsByClassName('menu-hamburger')
const menu = document.getElementsByTagName('nav')[0]
console.log(menuHamburgers)
if (menuHamburgers) {
    Array.from(menuHamburgers).forEach(menuBtn => {
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('-ml-96')
        })
    })
}

/* */
function hideLabel(input){
    if (input.value.length  > 0 ){
        if (!input.parentNode.getElementsByTagName('span')[0].classList.contains('hidden'))
            input.parentNode.getElementsByTagName('span')[0].classList.add('hidden')
    } else {
        console.log(input.value.length)
        if (input.parentNode.getElementsByTagName('span')[0].classList.contains('hidden'))
            input.parentNode.getElementsByTagName('span')[0].classList.remove('hidden')
    }
}
const customInput = document.getElementsByClassName('custom-input')
if (customInput){
    Array.from(customInput).forEach(input => {
        console.log(input.value.length)
        if (input.value.length  >0 ){
            input.parentNode.getElementsByTagName('span')[0].textContent = ''
        }

        input.addEventListener('keyup', ()=>{
            hideLabel(input)
            // if (input.value.length  > 0 ){
            //    if (!input.parentNode.getElementsByTagName('span')[0].classList.contains('hidden'))
            //        input.parentNode.getElementsByTagName('span')[0].classList.add('hidden')
            // } else {
            //     if (input.parentNode.getElementsByTagName('span')[0].classList.contains('hidden'))
            //         input.parentNode.getElementsByTagName('span')[0].classList.remove('hidden')
            // }
        })
        input.addEventListener('focus', ()=>{
            if (!input.parentNode.getElementsByTagName('span')[0].classList.contains('hidden'))
                input.parentNode.getElementsByTagName('span')[0].classList.add('hidden')
            input.parentNode.classList.toggle('active')
        })
        input.addEventListener('focusout', ()=>{
            input.parentNode.classList.toggle('active')
            hideLabel(input)
        })
    })
}