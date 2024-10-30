
let menu = document.querySelector('#menu-icon');
let navlist = document.querySelector('.navlist');
let body = document.body; // Get the body element

menu.onclick = () => {
    menu.classList.toggle('bx-x');  // Toggle the menu icon state
    navlist.classList.toggle('open');  // Toggle the menu visibility
    
    // Toggle scrolling behavior based on menu state
    if (navlist.classList.contains('open')) {
        body.style.overflow = 'hidden';  // Disable scrolling when the menu is open
    } else {
        body.style.overflow = 'auto';    // Enable scrolling when the menu is closed
    }
};