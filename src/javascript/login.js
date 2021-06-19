const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button a.submit"),
errorText = form.querySelector(".errorMsg");
//ne saljemo ako je prazno
form.onsubmit = (e)=>{
  e.preventDefault(); // preventing form submitting
}
//na klik dugmeta saljemo podatke 
continueBtn.onclick =()=>{
  let xhr = new XMLHttpRequest(); //XML Object
  xhr.open("POST","php/login.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
          if(data == 'success'){
            location.href = "indexMain.php";
          }else{
            errorText.textContent = data;
            errorText.style.display = "block";
          }
      }
    }
  }
  let formData = new FormData(form); //formData Object
  xhr.send(formData); // sending formData to php
}
