const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button a.submit"),
errorText = form.querySelector(".errorMsg");

const firstName = document.getElementById('fname');
const lastName = document.getElementById('lname');
const username = document.getElementById('username');
const password1 = document.getElementById('password1');
const password2 = document.getElementById('password2');
const email = document.getElementById('email');
const errorElement = document.getElementById('error');


// ne saljemo prazno
form.onsubmit = (e)=>{
  e.preventDefault(); // preventing form submitting
}

continueBtn.onclick = () =>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () =>{
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
  let formData = new FormData(form);
  xhr.send(formData);
}


//na klik dugmeta saljemo podatke
// continueBtn.onclick =()=>{
//   let xhr = new XMLHttpRequest(); //XML Object
//   xhr.open("POST","php/signup.php",true);
//   xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//       if(xhr.status === 200){
//         let data = xhr.response;
//         if(data == 'success'){
//           location.href = "chat.php";
//           //add new user to database
//         }else{
//           let messages = []
//           if (firstName.value === '' || firstName.value == null) messages.push("First name is required")
//           if (lastName.value === '' || lastName.value == null) messages.push("Last name is required")
//           if (username.value === '' || username.value == null) messages.push("Username is required")
//           if (password1.value === '' || password1.value == null) messages.push("Password is required")
//           if (email.value === '' || email.value == null) messages.push("Email is required")
          
//           //ovo onda ne radi sa razmacima proveriti da li nam to treba
//           if (!/^[a-zA-Z]*$/.test(firstName.value)) messages.push('First name must contain only letters')
//           if (!/^[a-zA-Z]*$/.test(lastName.value)) messages.push('Last name must contain only letters')
          
//           if(password1.value.length <= 6 ) messages.push('Password must be longer than 6 characters')
          
//           if(password1.value.length >= 25) messages.push('Password musst be less than 25 characters')
          
//           if(!hasNumber(password1.value)) messages.push('Password must contain at least one number')
          
//           // if(!hasSpecial(password1.value)) messages.push('Password must contain at least one special character')

//           if(password1.value !== password2.value) messages.push('Your confirmation password is not same as original')

//           if(!ValidateEmail(email.value)) messages.push('Please enter a valid email')

//           errorText.textContent = messages.join(', ');
//           // errorText.textContent = data;
          
//           errorText.style.display = "block";
//         }
//       }
//     }
//   }
//   let formData = new FormData(form); //formData Object
  
//   xhr.send(formData); // sending formData to php
// }


function hasNumber(myString) {
  return /\d/.test(myString);
}

//ne radi nesto
function hasSpecial(pass){
  var format = /^[a-zA-Z!@#$%^&*()_+\-={};':"|,.<>?]*$/;
  if(pass.match(format))return true;
  else return false;
}

function ValidateEmail(mail) {
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(mail.match(mailformat)) return true;
  else return false;
    
}
