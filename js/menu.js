const header = document.querySelector('.header')

//*Menu
const links = document.querySelector('.menu__links')
const toggle = document.querySelector('.header__mobile__toggle')
const menu = document.querySelector('.menu')


function toggleMenu() {
	menu.classList.toggle('menu--active')
}

function DeleteMenu() {
	menu.classList.remove('menu--active')
}

toggle.addEventListener('click', toggleMenu)
links.addEventListener('click' ,DeleteMenu)