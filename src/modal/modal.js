$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


function onLoadWish(){
  $('#WishID').modal();
}

function showGroupFileds(){
  document.getElementById('groupPictureDiv').removeAttribute("hidden"); 
  document.getElementById('groupNameDiv').removeAttribute("hidden"); 
  document.getElementById('groupSaveDiv').removeAttribute("hidden"); 
  
}

function parseDatee(date){
  date=date.split(' - ');
  date1=date[0].split('/');
  date2=date[1].split('/');
  return {
    'from':(date1[2]+"-"+date1[0]+"-"+date1[1]),
    'to':(date2[2]+"-"+date2[0]+"-"+date2[1])
  }
}

function searchWish(){
sendResult(collectData());
}

function collectData(){
let where=document.getElementById('destination').value;
let date=document.getElementById('WishDate').value;
let budget=document.getElementById('groupBudget').value;

date=parseDatee(date);
json_obj={

  'class':'group',
  'where':where,
  'from':date['from'],
  'to':date['to'],
  'budget':budget
}

return json_obj;
}

function saveWish(){
  json_obj=collectData();
  json_obj.image='php/images/default.png';

  let xhr= new XMLHttpRequest();
  xhr.open("POST","php/saveMyWish.php",true);
  xhr.setRequestHeader("Content-Type","application/json");
  json_obj=JSON.stringify(json_obj);
  xhr.send(json_obj);
}
