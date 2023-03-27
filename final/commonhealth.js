var content1 = document.getElementById("content1");
var content2 = document.getElementById("content2");
var content3 = document.getElementById("content3");
var btn333 = document.getElementById("btn333");
var btn444 = document.getElementById("btn444");
var btn555 = document.getElementById("btn555");

function openHTML(){
  content1.style.transform = "translateX(0)";
  content2.style.transform = "translateX(100%)";
  content3.style.transform = "translateX(100%)";
  btn333.style.color = "#ff7846";
  btn444.style.color = "#000";
  btn555.style.color = "#000";
  content1.style.transitionDelay = "0.3s";
  content2.style.transitionDelay = "0s";
  content3.style.transitionDelay = "0s";
}
function openCSS(){
  content1.style.transform = "translateX(100%)";
  content2.style.transform = "translateX(0)";
  content3.style.transform = "translateX(100%)";
  btn444.style.color = "#ff7846";
  btn333.style.color = "#000";
  btn555.style.color = "#000";
  content1.style.transitionDelay = "0s";
  content2.style.transitionDelay = "0.3s";
  content3.style.transitionDelay = "0s";
}
function openJS(){
  content1.style.transform = "translateX(100%)";
  content2.style.transform = "translateX(100%)";
  content3.style.transform = "translateX(0)";
  btn555.style.color = "#ff7846";
  btn444.style.color = "#000";
  btn333.style.color = "#000";
  content1.style.transitionDelay = "0s";
  content2.style.transitionDelay = "0s";
  content3.style.transitionDelay = "0.3s";
}






var last_tab = 1;

function loadTab(tab_number)
{
	if (tab_number === last_tab) return;
	
	document.getElementById("tab" + last_tab).style.display = "none";
	document.getElementById("tab" + tab_number).style.display = "block";
	document.getElementById("tab-button" + last_tab).style.opacity = "0.5";
	document.getElementById("tab-button" + tab_number).style.opacity = "1.0";

	last_tab = tab_number;
}




var typed = new Typed(".auto-type",{
  strings: ["through mindfulness and meditation","for a happier and healthier you","for a positive and empowered mindset","to reduce stress and anxiety"],
  typeSpeed: 100,
  backSpeed: 100,
  loop: true
})





