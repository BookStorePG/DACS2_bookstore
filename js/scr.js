// slide cua phan reviews

  var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 10,
    grapCursor: true,
    loop: true,
    autoplay: {
        delay: 3000,
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
 // slide cua phan book o dau trang home

 var Swiper = new Swiper(".books-slider", {
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 3000,
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




 