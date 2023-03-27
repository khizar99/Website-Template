

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


class Chatbox {
  constructor() {
      this.args = {
          openButton: document.querySelector('.chatbox__button'),
          chatBox: document.querySelector('.chatbox__support'),
          sendButton: document.querySelector('.send__button')
      }

      this.state = false;
      this.messages = [];
  }

  display() {
      const {openButton, chatBox, sendButton} = this.args;

      openButton.addEventListener('click', () => this.toggleState(chatBox))

      sendButton.addEventListener('click', () => this.onSendButton(chatBox))

      const node = chatBox.querySelector('input');
      node.addEventListener("keyup", ({key}) => {
          if (key === "Enter") {
              this.onSendButton(chatBox)
          }
      })
  }

  toggleState(chatbox) {
      this.state = !this.state;

      // show or hides the box
      if(this.state) {
          chatbox.classList.add('chatbox--active')
      } else {
          chatbox.classList.remove('chatbox--active')
      }
  }

  onSendButton(chatbox) {
      var textField = chatbox.querySelector('input');
      let text1 = textField.value
      if (text1 === "") {
          return;
      }

      let msg1 = { name: "User", message: text1 }
      this.messages.push(msg1);

      fetch('http://127.0.0.1:5000/predict', {
          method: 'POST',
          body: JSON.stringify({ message: text1 }),
          mode: 'cors',
          headers: {
            'Content-Type': 'application/json'
          },
        })
        .then(r => r.json())
        .then(r => {
          let msg2 = { name: "Sam", message: r.answer };
          this.messages.push(msg2);
          this.updateChatText(chatbox)
          textField.value = ''

      }).catch((error) => {
          console.error('Error:', error);
          this.updateChatText(chatbox)
          textField.value = ''
        });
  }

  updateChatText(chatbox) {
      var html = '';
      this.messages.slice().reverse().forEach(function(item, index) {
          if (item.name === "Sam")
          {
              html += '<div class="messages__item messages__item--visitor">' + item.message + '</div>'
          }
          else
          {
              html += '<div class="messages__item messages__item--operator">' + item.message + '</div>'
          }
        });

      const chatmessage = chatbox.querySelector('.chatbox__messages');
      chatmessage.innerHTML = html;
  }
}


const chatbox = new Chatbox();
chatbox.display();



