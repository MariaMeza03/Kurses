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
window.onscroll = function(){
	const scrollY = window.scrollY
	const menuActive = document.querySelector('.menu--active')

	scrollY > 100 && menuActive === null ? header.classList.add('header--hide') : header.classList.remove('header--hide')
	scrollY < 100 && menuActive !== '' ? header.classList.remove('header--show') : false

}

toggle.addEventListener('click', toggleMenu)
links.addEventListener('click' ,DeleteMenu)