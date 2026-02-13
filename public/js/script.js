function showToast(message, type) {
    Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 3000
    });
}

document.querySelectorAll('.movie-card').forEach(card => {
card.addEventListener('mousemove', e => {
let x = (window.innerWidth/2 - e.pageX)/30;
let y = (window.innerHeight/2 - e.pageY)/30;

card.style.transform = `rotateY(${x}deg) rotateX(${y}deg) scale(1.05)`;

});

card.addEventListener('mouseleave',()=>{
card.style.transform='rotateY(0) rotateX(0)';
});

});

