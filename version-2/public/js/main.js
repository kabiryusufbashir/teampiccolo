let menu = document.querySelector('#menu');
let nav = document.querySelector('#nav');
let close = document.querySelector('#close');

menu.addEventListener('click', ()=>{
    if(nav.classList.contains('hidden')){
        nav.classList.remove('hidden');
    }else{
        nav.classList.add('hidden');
    }
});

close.addEventListener('click', ()=>{
    nav.classList.add('hidden');
});