var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("content");
  if (n > x.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  x[slideIndex-1].style.display = "block"; 
}
console.log(document.getElementsByClassName("content"))
document.querySelectorAll('.btn-next').forEach(e=>{
    e.addEventListener('click',function(){
        plusDivs(+1)
    })
})
console.log(document.getElementsByClassName('content'))



//input otp
