
const sr = ScrollReveal({
    distance: '60px',
    duration: 3000,
    // reset: true
});

sr.reveal('.head__title', {
    origin: 'left',
    interval: 100
})

sr.reveal('.head__subtitle', {
    origin: 'right',
    interval: 100
})

sr.reveal('.sort', {
    origin: 'top',
    interval: 100
})

sr.reveal('.etalase', {
    origin: 'bottom',
    interval: 100
})

sr.reveal('.item__cart', {
    origin: 'left',
    interval: 100
})

sr.reveal('.cart__detail', {
    origin: 'right',
    interval: 100
})

