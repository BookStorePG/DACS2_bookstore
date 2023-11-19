
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




//-----------------product------------------

const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img") 
smallImg.forEach(function(imgItem,X){
  imgItem.addEventListener("click",function(){
    bigImg.src  = imgItem.src

   })
})

const gioithieu = document.querySelector(".gioithieu")
const chitiet = document.querySelector(".chitiet")
const picture = document.querySelector(".pictures")
if (gioithieu){
 gioithieu.addEventListener("click",function(){
   document.querySelector(".product-content-bottom-content-chitiet").style.display="none"
   document.querySelector(".product-content-bottom-content-gioithieu").style.display="block"
   document.querySelector(".product-content-bottom-content-img").style.display="none"

 })
}
if (chitiet){
 chitiet.addEventListener("click",function(){
   document.querySelector(".product-content-bottom-content-chitiet").style.display="block"
   document.querySelector(".product-content-bottom-content-gioithieu").style.display="none"
   document.querySelector(".product-content-bottom-content-img").style.display="none"
 })
}
if (picture){
  picture.addEventListener("click",function(){
    document.querySelector(".product-content-bottom-content-chitiet").style.display="none"
    document.querySelector(".product-content-bottom-content-gioithieu").style.display="none"
    document.querySelector(".product-content-bottom-content-img").style.display="block"
  })
}

const button  =document.querySelector(".product-content-bottom-top")
  if(button){
    button.addEventListener("click",function(){
    document.querySelector(".product-content-bottom-content-big").classList.toggle("activeB")
    })
 }
 
//-----------------product------------------


 // slide cua phan book o dau trang home

var swiper = new Swiper(".books-slider", {
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 6500,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

  // slide cua phan featured 

  var swiper = new Swiper(".featured-slider", {
    spaceBetween: 10,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });

  // slide cua phan arrivals

  var swiper = new Swiper(".arrivals-slider", {
    spaceBetween: 10,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

  // slide cua phan reviews

  var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 10,
    grapCursor: true,
    loop: true,
    autoplay: {
        delay: 6500,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
