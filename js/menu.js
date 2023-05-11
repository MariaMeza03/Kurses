const header = document.querySelector('.header')

//*Menu
const toggle = document.querySelector('.header__mobile__buttons__toggle')
const menu = document.querySelector('.menu')

//*idioms-Responsive
const idiomButton = document.querySelector('.header__mobile__buttons__idiom')
const idiom = document.querySelector('.idiom')

//*idioms-Desktop
const idiomButtonDes = document.querySelector('.header__desktop__right__idiom')
const idiomDes = document.querySelector('.idiom')

function toggleMenu() {
	menu.classList.toggle('menu--active')
	toggle.classList.toggle('header__mobile__buttons__toggle--active')
}

function toggleIdiom() {
	idiom.classList.toggle('idiom--active')
}

function toggleIdiomDes() {
	idiomDes.classList.toggle('idiom--active')
}

toggle.addEventListener('click', toggleMenu)
idiomButton.addEventListener('click', toggleIdiom)
idiomButtonDes.addEventListener('click', toggleIdiomDes)