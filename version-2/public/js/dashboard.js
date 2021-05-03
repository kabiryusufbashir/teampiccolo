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

// Staff caret 
const staffCaret = document.querySelector("#staffCaret");
const staffMenu = document.querySelector("#staffMenu");
const staffPointer = document.querySelector("#staffPointer");

staffCaret.addEventListener('click', ()=>{
    if(staffMenu.classList.contains('hidden')){
        staffMenu.classList.remove('hidden');
        staffPointer.classList.add('transform');
        staffPointer.classList.add('rotate-90');
        staffCaret.classList.add('transition');
    }else{
        staffMenu.classList.add('hidden');
        staffPointer.classList.remove('transform');
        staffPointer.classList.remove('roate-90');
    }
});

// Student caret 
const studentCaret = document.querySelector("#studentCaret");
const studentMenu = document.querySelector("#studentMenu");
const studentPointer = document.querySelector("#studentPointer");

studentCaret.addEventListener('click', ()=>{
    if(studentMenu.classList.contains('hidden')){
        studentMenu.classList.remove('hidden');
        studentPointer.classList.add('transform');
        studentPointer.classList.add('rotate-90');
        studentCaret.classList.add('transition');
    }else{
        studentMenu.classList.add('hidden');
        studentPointer.classList.remove('transform');
        studentPointer.classList.remove('roate-90');
    }
});

