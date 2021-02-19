var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("content");
  if (n > x.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  x[slideIndex-1].style.display = "block"; 
}

const btn_next = document.querySelectorAll('.btn-next');
for(let i = 0; i < btn_next.length; i++){
  btn_next[i].addEventListener('click', () => { 
    slideIndex = slideIndex + 1;
    showDivs(slideIndex);
  });
}

