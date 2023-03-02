

let mainimage = document.getElementById('mainimage');
let text = document.getElementById('text');
let btn = document.getElementById('btn');
let header = document.querySelector('header');

window.addEventListener('scroll',function(){
    let value = window.scrollY;
    text.style.marginTop = value * 1.5 + 'px';
    btn.style.marginTop = value * 1.5 + 'px';
    header.style.top = value*0.5+'px';

});

var btn1 = document.getElementsByClassName("btn1");
var slide = document.getElementById("slide");

btn1[0].onclick = function(){
  slide.style.transform = "translateX(0px)";
  for(i=0;i<4;i++){
    btn1[i].classList.remove("active");
  }
  this.classList.add("active");
}
btn1[1].onclick = function(){
  slide.style.transform = "translateX(-800px)";
  for(i=0;i<4;i++){
    btn1[i].classList.remove("active");
  }
  this.classList.add("active");
}

btn1[2].onclick = function(){
  slide.style.transform = "translateX(-1600px)";
  for(i=0;i<4;i++){
    btn1[i].classList.remove("active");
  }
  this.classList.add("active");

}
btn1[3].onclick = function(){
  slide.style.transform = "translateX(-2400px)";
  for(i=0;i<4;i++){
    btn1[i].classList.remove("active");
  }
  this.classList.add("active");
}



var typed = new Typed(".auto-type",{
  strings: ["Understand My illness","Learn Coping Strategies","Adopt a Treatment Plan"],
  typeSpeed: 100,
  backSpeed: 100,
  loop: true
})




var questions = document.querySelectorAll('.faq-question');

questions.forEach(function(question) {
  question.addEventListener('click', function() {
    var answer = this.querySelector('.faq-answer');
    var icon = this.querySelector('i');

    if (answer.style.display === 'block') {
      answer.style.display = 'none';
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-right');
    } else {
      answer.style.display = 'block';
      icon.classList.remove('fa-chevron-right');
      icon.classList.add('fa-chevron-down');
    }
  });
});

