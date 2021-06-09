const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
var worker=null;
var cik_cak=0;


//ako nista nije upisano ne salje se poruka
form.onsubmit = (e)=>{
  e.preventDefault(); // preventing form submitting
}
//slanje poruke na klik dugmeta
function send(){
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

//testing; //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//createListener(1);

function createListener(groupid){
  terminateListener();
  startListener(groupid);
}

function startListener(groupid){
            worker=new Worker('./Thread.js');
            worker.onmessage=function(e){
                var obj=e.data;
                for(i=0;i<obj.messages.length;i++){
                    //console.log(messages[i].message);
                    let message=obj.messages[i];
                    appendMessage(document.querySelector(".chat-box"),obj['user_id'],message.idsender,message.message,message.image)
                }
            }
            worker.postMessage(groupid);
          }
function terminateListener(){
  if(worker!=null)worker.terminate();
}



function appendMessage(element,iduser,idsender,message,imagepath){  
  let div=document.createElement("div");
  div.classList.add("chat");

  if(iduser==idsender){
    div.classList.add("outcoming");
  }
  else{
    div.classList.add("incoming");
    let img=document.createElement("img");
    img.src=imagepath;
    div.appendChild(img);
  }

  let div2=document.createElement("div");
  div2.classList.add("details");
  let p=document.createElement("p");
  p.innerHTML=message;
  div.appendChild(div2);
  div2.appendChild(p);
  element.appendChild(div);
}


function periodicScroll(){
  if(!chatBox.classList.contains("active")){ // if active class doesnt contain active
              scrollToBottom();
            }
}

setInterval(periodicScroll,500);






function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}