var slideIndex = 1;
// showDivs(slideIndex);

function showDivs(n) {
 var x = document.getElementsByClassName("content"); 

 if (n > x.length) {slideIndex = 1}  
 
 console.log(n); 
 
 if (n < 1) {slideIndex = x.length}; 
 
 for (i = 0; i < x.length; i++) {
   x[i].style.display = "none"; 
 }
 
 x[slideIndex-1].style.display = "block"; 
}

// function plusDivs(n) {
//   console.log(n);
//   showDivs(slideIndex += n);
// }


document.querySelectorAll('.btn-next').forEach( e => {
    e.addEventListener('click',function(){
      showDivs(+1)
    })
})




//input otp
