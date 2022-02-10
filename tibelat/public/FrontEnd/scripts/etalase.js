
const sr = ScrollReveal({
    distance: '60px',
    duration: 3000,
    // reset: true
});

sr.reveal('.head__title', {
    origin: 'left',
    delay: 100
})

sr.reveal('.head__subtitle', {
    origin: 'right',
    delay: 500
})

sr.reveal('.sort', {
    origin: 'top',
    interval: 100
})

sr.reveal('.etalase', {
    origin: 'bottom',
    delay: 400
})

sr.reveal('.item__cart', {
    origin: 'left',
    delay: 200
})

sr.reveal('.cart__detail', {
    origin: 'right',
    delay: 400
})

