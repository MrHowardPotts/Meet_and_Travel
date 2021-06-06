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
}