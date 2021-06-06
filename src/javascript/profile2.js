const form = document.querySelector(".container .row .col-md-8 form"),
edit = form.querySelector("button.edit"),
save = form.querySelector("button.save");

edit.onclick =()=>{
  document.getElementById('password').style.display="block";
  document.getElementById('newPassword').style.display="block";
  document.getElementById('confPassword').style.display="block";
  document.getElementById('save').style.display="block";
  $("#bio").attr('readonly',false);
  $("#fname").attr('readonly',false);
  $("#lname").attr('readonly',false);
  $("#mail").attr('readonly',false);
  $("#user").attr('readonly',false);
  $("#file").attr('disabled',false);
}

save.onclick =()=>{
  document.getElementById('password').style.display="none";
  document.getElementById('newPassword').style.display="none";
  document.getElementById('confPassword').style.display="none";
  document.getElementById('save').style.display="none";
  $("#bio").attr('readonly',true);
  $("#fname").attr('readonly',true);
  $("#lname").attr('readonly',true);
  $("#mail").attr('readonly',true);
  $("#user").attr('readonly',true);
  $("#file").attr('disabled',true);

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/profile.php", true);
  xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(data == 'success'){
          // location.href = "chat.php";
        }else{
          // errorText.textContent = data;
          // errorText.style.display = "block";
        }
      }
    }
  }                       
xhr.send();
  // json_obj = {
  //   'firstname' : document.getElementById('first_name').value,
  //   'lastname' : document.getElementById('last_name').value,
  //   'username' : document.getElementById('username').value,
  //   'bio' : document.getElementById('biography').value,
  //   // 'image':document.getElementById('profile_img').value
  //   'image':$('#profile_img').attr('src')
  // }

  // xhr.send(json_obj);
  // let formData = new FormData(form);
  // xhr.send(formData);
  
}