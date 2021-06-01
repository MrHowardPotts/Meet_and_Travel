$(document).ready(function(){
  function  editclick(){
    $("#username").val("Usao u if");
    $("input").attr('readonly',false);
    $("#file").attr('disabled',false);
    $("textarea").attr('readonly',false);
    $("#editbut").remove();
    var button=$('<input type="submit" value="Save"/>').attr("id","savebut").attr("class","edit");
  $(".dugme").append(button);
  button.click(saveclick);
}
function saveclick(){
    $("#username").val("Usao u else");
    $("input").attr('readonly',true);
    $("textarea").attr('readonly',true);
    $("#file").attr('disabled',true);
    $("#savebut").remove();
    var button1=$("<button>Edit</button>").attr("id","editbut").attr("class","edit");
  $(".dugme").append(button1);
  button1.click(editclick);
}
$("#editbut").click(editclick);



});
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