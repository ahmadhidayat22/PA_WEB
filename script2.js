const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');

toggle.addEventListener('click', function(){
    document.body.classList.toggle('lighttheme');
    if(this.classList.toggle('fa-sun')){
        this.classList.toggle('fa-moon');
        body.style.color = 'white';
        body.style.transition = '2s';
        
    }else{
        document.body.classList.toggle('to');
        this.classList.toggle('fa-moon');
        body.style.background = '#ADC4CE';
        body.style.color = 'black';
        body.style.transition = '2s';
    }
})


const nav2 = document.querySelector('.nav-2');
document.querySelector('#hamburger').onclick = () => {
    nav2.classList.toggle('active');
};

const search = document.querySelector('.tabel-content');
// const pesan = document.getElementById('#pesan');
document.querySelector('#pesan').onclick = () => {
    search.style.display = flex;
};
// pesan.addEventListener('click', function(){

//     search.classList.toggle('active');
// })

