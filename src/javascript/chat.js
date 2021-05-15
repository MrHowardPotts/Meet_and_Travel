const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
//ako nista nije upisano ne salje se poruka
form.onsubmit = (e)=>{
  e.preventDefault(); // preventing form submitting
}
//slanje poruke na klik dugmeta
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); //XML Object
  xhr.open("POST","php/insert-chat.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        inputField.value = ""; //once msg inserted in db leave field blank
        scrollToBottom();
      }
    }
  }
  let formData = new FormData(form); //formData Object
  xhr.send(formData); // sending formData to php
}
//kada je mis na shat-u nemamo automatic scroll bottom
chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}
//kontra funkcija funkcije iznad
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
}
//dohvata podatke i refresh radi(na svakih 500ms se poziva ponovo)
setInterval(()=>{
  let xhr = new XMLHttpRequest(); //XML Object
  xhr.open("POST","php/get-chat.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        chatBox.innerHTML = data;
        if(!chatBox.classList.contains("active")){ // if active class doesnt contain active
          scrollToBottom();
        }
      }
    }
  }
  let formData = new FormData(form); //formData Object
  xhr.send(formData); // sending formData to php
}, 500); // this func will run frequently after 500ms;

function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}