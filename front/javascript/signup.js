const form = document.querySelector(".signup form");
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>{
  e.preventDefault(); // preventing form submitting
}

continueBtn.onclick = ()=>{
  /*Ajax*/
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = ()=>{

  }
  xhr.send();
}
