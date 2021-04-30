// Menu caret 
const menuCaret = document.querySelector("#menuCaret");
const menu = document.querySelector("#menu");
const statsDiv = document.querySelector("#statsDiv");

menuCaret.addEventListener('click', ()=>{
    if(!menu.classList.contains('hidden')){
        menu.classList.remove('md:block');
        menu.classList.add('hidden');
        menu.classList.remove('col-span-1');
        menu.classList.add('col-span-0');
        statsDiv.classList.add('col-span-5');
    }else{
        menu.classList.remove('hidden');
        menu.classList.remove('col-span-0');
        menu.classList.add('col-span-1');
        statsDiv.classList.remove('col-span-5');
        statsDiv.classList.add('col-span-4');
    }
});

// User caret 
const user_caret = document.querySelector("#user_caret");
const user_caret_menu = document.querySelector("#user_caret_menu");
const caret = document.querySelector("#caret");

user_caret.addEventListener('click', ()=>{
    if(user_caret_menu.classList.contains('hidden')){
        user_caret_menu.classList.remove('hidden');
        caret.classList.add('transform');
        caret.classList.add('rotate-90');
        caret.classList.add('transition');
    }else{
        user_caret_menu.classList.add('hidden');
        caret.classList.remove('transform');
        caret.classList.remove('roate-90');
    }
});

// Course caret 
const courseCaret = document.querySelector("#courseCaret");
const courseMenu = document.querySelector("#courseMenu");
const coursePointer = document.querySelector("#coursePointer");

courseCaret.addEventListener('click', ()=>{
    if(courseMenu.classList.contains('hidden')){
        courseMenu.classList.remove('hidden');
        coursePointer.classList.add('transform');
        coursePointer.classList.add('rotate-90');
        courseCaret.classList.add('transition');
    }else{
        courseMenu.classList.add('hidden');
        coursePointer.classList.remove('transform');
        coursePointer.classList.remove('roate-90');
    }
});

// Blog caret 
const blogCaret = document.querySelector("#blogCaret");
const blogMenu = document.querySelector("#blogMenu");
const blogPointer = document.querySelector("#blogPointer");

blogCaret.addEventListener('click', ()=>{
    if(blogMenu.classList.contains('hidden')){
        blogMenu.classList.remove('hidden');
        blogPointer.classList.add('transform');
        blogPointer.classList.add('rotate-90');
        blogCaret.classList.add('transition');
    }else{
        blogMenu.classList.add('hidden');
        blogPointer.classList.remove('transform');
        blogPointer.classList.remove('roate-90');
    }
});

// Ebook caret 
const ebookCaret = document.querySelector("#ebookCaret");
const ebookMenu = document.querySelector("#ebookMenu");
const ebookPointer = document.querySelector("#ebookPointer");

ebookCaret.addEventListener('click', ()=>{
    if(ebookMenu.classList.contains('hidden')){
        ebookMenu.classList.remove('hidden');
        ebookPointer.classList.add('transform');
        ebookPointer.classList.add('rotate-90');
        ebookCaret.classList.add('transition');
    }else{
        ebookMenu.classList.add('hidden');
        ebookPointer.classList.remove('transform');
        ebookPointer.classList.remove('roate-90');
    }
});

// laboratorist caret 
const laboratoristCaret = document.querySelector("#laboratoristCaret");
const laboratoristMenu = document.querySelector("#laboratoristMenu");

laboratoristCaret.addEventListener('click', ()=>{
    if(laboratoristMenu.classList.contains('hidden')){
        laboratoristMenu.classList.remove('hidden');
        laboratoristCaret.classList.add('transform');
        laboratoristCaret.classList.add('rotate-90');
        laboratoristCaret.classList.add('transition');
    }else{
        laboratoristMenu.classList.add('hidden');
        laboratoristCaret.classList.remove('transform');
        laboratoristCaret.classList.remove('roate-90');
    }
});

// accountant caret 
const accountantCaret = document.querySelector("#accountantCaret");
const accountantMenu = document.querySelector("#accountantMenu");

accountantCaret.addEventListener('click', ()=>{
    if(accountantMenu.classList.contains('hidden')){
        accountantMenu.classList.remove('hidden');
        accountantCaret.classList.add('transform');
        accountantCaret.classList.add('rotate-90');
        accountantCaret.classList.add('transition');
    }else{
        accountantMenu.classList.add('hidden');
        accountantCaret.classList.remove('transform');
        accountantCaret.classList.remove('roate-90');
    }
});

// Patient caret 
const patientCaret = document.querySelector("#patientCaret");
const patientMenu = document.querySelector("#patientMenu");

patientCaret.addEventListener('click', ()=>{
    if(patientMenu.classList.contains('hidden')){
        patientMenu.classList.remove('hidden');
        patientCaret.classList.add('transform');
        patientCaret.classList.add('rotate-90');
        patientCaret.classList.add('transition');
    }else{
        patientMenu.classList.add('hidden');
        patientCaret.classList.remove('transform');
        patientCaret.classList.remove('roate-90');
    }
});