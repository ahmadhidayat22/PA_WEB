var toggled = document.getElementById('toggledark');
var body = document.querySelector('body');

toggled.addEventListener('click', function(){
    if(this.classList.toggle('fa-solid fa-sun')){
        
        this.classList.toggle('fa-solid fa-moon');

        body.style.background = 'black';
        body.style.color = 'white';
        body.style.transition = '2s';
        
    }else{

        this.classList.toggle('fa-solid fa-moon');

        body.style.background = 'white';
        body.style.color = 'black';
        body.style.transition = '2s';
    }
});


const nav2 = document.querySelector('.nav-2');
document.querySelector('#hamburger').onclick = () => {
    nav2.classList.toggle('active');
};