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

save.onclick = async function(){
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

  blob = document.getElementById("file").files[0];
  image = await getImage(blob);

  json_obj = {
    'firstname' : document.getElementById('fname').value,
    'lastname' : document.getElementById('lname').value,
    'username' : document.getElementById('user').value,
    'bio' : document.getElementById('bio').value,
    'mail' : document.getElementById('mail').value,
    'image' : image
    // 'image':$('#profile_img').attr('src')
  }

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/profile.php", true);
  xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(data == 'success'){
          
        }else{
          
        }
      }
    }
  }        

  json_obj=JSON.stringify(json_obj);
  xhr.send(json_obj);

}

function readURL(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#profile_img')
            .attr('src', e.target.result)
    };

    reader.readAsDataURL(input.files[0]);
}
}