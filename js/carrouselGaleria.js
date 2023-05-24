//*carouselGeneral
const carousel = document.querySelectorAll('.carousel')

//*Fotovoltaico
const buttonFoto = document.querySelector('.catalog__buttons__fotovoltaico')
const carouselFotovoltaico = document.querySelector('.catalog__carousel_fotovoltaico')

//*termico
const buttonTermico = document.querySelector('.catalog__buttons__termico')
const carouselTermico = document.querySelector('.catalog__carousel_termico')

//*ilumination
const buttonIlumination = document.querySelector('.catalog__buttons__ilumination')
const carouselIlumination = document.querySelector('.catalog__carousel_ilumination')

M.Carousel.init(carousel,{
    duration:150
})

function initialCarrouselFoto(){
    carouselFotovoltaico.classList.remove('catalog__carousel_fotovoltaico--active')
    carouselTermico.classList.remove('catalog__carousel_termico--active')
    carouselIlumination.classList.remove('catalog__carousel_ilumination--active')

    //*buttons
    buttonIlumination. classList. remove('catalog__buttons__ilumination--active')
    buttonTermico.classList.remove('catalog__buttons__termico--active')
    buttonFoto.classList.add('catalog__buttons__fotovoltaico--active')

    //*Carousel
    M.Carousel.init(carousel,{
        duration:150,
    })
    
}

function initialCarrouselTermico(){
    carouselFotovoltaico.classList.add('catalog__carousel_fotovoltaico--active')//*elimina
    carouselTermico.classList.add('catalog__carousel_termico--active')//*elimina
    carouselIlumination.classList.remove('catalog__carousel_ilumination--active')

    //*Buttons
    buttonIlumination. classList. remove('catalog__buttons__ilumination--active')
    buttonTermico.classList.add('catalog__buttons__termico--active')
    buttonFoto.classList.remove('catalog__buttons__fotovoltaico--active')

    //*Carousel
    M.Carousel.init(carousel,{
        duration:150,       
    })
}

function initialCarrouselIlumniation(){
    carouselFotovoltaico.classList.add('catalog__carousel_fotovoltaico--active')
    carouselTermico.classList.remove('catalog__carousel_termico--active')
    carouselIlumination.classList.add('catalog__carousel_ilumination--active')
    
    //*buttons
    buttonIlumination. classList. add('catalog__buttons__ilumination--active')
    buttonTermico.classList.remove('catalog__buttons__termico--active')
    buttonFoto.classList.remove('catalog__buttons__fotovoltaico--active')

    //*carousel
    M.Carousel.init(carousel,{
        duration:150,       
    })
}

buttonFoto.addEventListener('click',initialCarrouselFoto )
buttonTermico.addEventListener('click',initialCarrouselTermico )
buttonIlumination.addEventListener('click',initialCarrouselIlumniation )