let menu = document.querySelector('#menu');
let nav = document.querySelector('#nav');
let close = document.querySelector('#close');

menu.addEventListener('click', ()=>{
    nav.classList.remove('hidden');
});

close.addEventListener('click', ()=>{
    nav.classList.add('hidden');
});