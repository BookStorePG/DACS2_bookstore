
let accountBox = document.querySelector('.header .header-1 .account-box');

document.querySelector('#user-btn').onclick = () =>{
    accountBox.classList.toggle('active');
}

window.onscroll = () =>{

    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');
    }

}

window.onload = () =>{
    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');
    }

    fadeOut();

}

function switchForm(className, e) {
	e.preventDefault();
	const allForm = document.querySelectorAll('form');
	const form = document.querySelector(`form.${className}`);

	allForm.forEach(item=> {
		item.classList.remove('active');
	})
	form.classList.add('active');
}


const registerPassword = document.querySelector('form.register #password');
const registerConfirmPassword = document.querySelector('form.register #confirm-pass');

registerPassword.addEventListener('input', function () {
	registerConfirmPassword.pattern = `${this.value}`;
})


// -----------------loader------------

function loader(){
  document.querySelector('.loader-container').classList.add('active');
}

function fadeOut(){
  setTimeout(loader, 400);
  
}
// -----------------loader------------



