const toggle = document.getElementById('toggleDark')
const body = document.querySelector('body')
const home = document.getElementById('home')

toggle.addEventListener('click', function(){
    if(this.classList.toggle('fa-sun')){
        
        this.classList.toggle('fa-moon');

        home.style.background.src = 'img/home2.avif';
        body.style.color = 'white';
        body.style.transition = '2s';
        
    }else{

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