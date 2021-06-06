// $(document).ready(function(){
//   function  editclick(){

//     $("input").attr('readonly',false);
//     $("#file").attr('disabled',false);
//     $("textarea").attr('readonly',false);
//     $("#editbut").remove();
//     var button=$('<input type="submit" value="save"/>').attr("id","savebut").attr("class","edit");
//   $(".dugme").append(button);
//   button.click(saveclick);
// }
// function saveclick(){
//     $("input").attr('readonly',true);
//     $("textarea").attr('readonly',true);
//     $("#file").attr('disabled',true);
//     $("#savebut").remove();
//     var button1=$("<button>Edit</button>").attr("id","editbut").attr("class","edit");
//   $(".dugme").append(button1);
//   button1.click(editclick);
// }
// $("#editbut").click(editclick);

// const form = document.querySelector("form");
// const dugme = document.getElementById('editbut');
// errorText = form.querySelector(".errorMsg");

// errorText.textContent = "error msg here";
// errorText.style.display = "block";  


// // dugme.onclick = () =>{
// //   errorText.textContent = errorText.textContent + "OMG";
// // } 

// });
var wtf = 1;



function editSave() {
    if(wtf % 2 == 0){ //start editing
      $("input").attr('readonly', );
      $("#file").attr('disabled',false);
      $("textarea").attr('readonly',false);
      wtf++;
    }else{ //save editing
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/profile.php", true);
      xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            if(data == 'success'){
              location.href = "profil.php";
            }else{
              errorText.textContent = data;
              errorText.style.display = "block";
            }
          }
        }
      }                       
      xhr.setRequestHeader("Content-Type","application/json");
      json_obj = {
        'firstname' : document.getElementById('first_name').value,
        'lastname' : document.getElementById('last_name').value,
        'username' : document.getElementById('username').value,
        'bio' : document.getElementById('biography').value,
        // 'image':document.getElementById('profile_img').value
        'image':$('#profile_img').attr('src')
      }
  
      xhr.send(json_obj);


      $("input").attr('readonly',false);
      $("#file").attr('disabled',false);
      $("textarea").attr('readonly',false);
      wtf++;
    }

    


    var txt = $('#editbut').text();
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
// $(document).ready(function(){
//   function  editclick(){
//     $("#username").val("Usao u if");
//     $("input").attr('readonly',false);
//     $("#file").attr('disabled',false);
//     $("textarea").attr('readonly',false);
//     $("#editbut").remove();
//     var button=$('<input type="submit" value="Save"/>').attr("id","savebut").attr("class","edit");
//   $(".dugme").append(button);
//   button.click(saveclick);
// }
// function saveclick(){
//     $("#username").val("Usao u else");
//     $("input").attr('readonly',true);
//     $("textarea").attr('readonly',true);
//     $("#file").attr('disabled',true);
//     $("#savebut").remove();
//     var button1=$("<button>Edit</button>").attr("id","editbut").attr("class","edit");
//   $(".dugme").append(button1);
//   button1.click(editclick);
// }
// $("#editbut").click(editclick);



// });
// function readURL(input){
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//         $('#profile_img')
//             .attr('src', e.target.result)
//     };

//     reader.readAsDataURL(input.files[0]);
// }
// }