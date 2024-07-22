window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop; // Mengambil posisi offset dari header

    // Menggunakan window.pageYOffset untuk memeriksa jumlah geser vertikal
    if (window.pageYOffset > fixedNav) {
        header.classList.add('navbar-fixed'); // Menambahkan kelas jika melebihi offset
    } else {
        header.classList.remove('navbar-fixed'); // Menghapus kelas jika tidak
    }
};


const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu')

hamburger.addEventListener('click', function(){
    hamburger.classList.toggle('hamburger-active')
    navMenu.classList.toggle('hidden')
})

