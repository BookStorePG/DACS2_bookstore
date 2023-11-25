const showMenu = (toggleId,navbarId,bodyId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId)
    bodypadding = document.getElementById(bodyId)
    if(toggle && navbar){
        toggle.addEventListener('click',()=>{
            navbar.classList.toggle('show')
            toggle.classList.toggle('rorate')
            bodypadding.classList.toggle('expander')
        })
    }
}
showMenu('nav-toggle','navbar','body')
CKEDITOR.replace('introduction');
CKEDITOR.replace('information');