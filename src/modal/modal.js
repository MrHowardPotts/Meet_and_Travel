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
function saveGroup(){
  json_obj=collectData();
  json_obj.imageWish='php/images/default.png';
  json_obj.imageGroup='php/images/default.png';
  let groupName=document.getElementById('groupName').value;
  json_obj.groupName=groupName;

  let xhr= new XMLHttpRequest();
  xhr.open("POST","php/saveMyGroup.php",true);
  xhr.setRequestHeader("Content-Type","application/json");
  json_obj=JSON.stringify(json_obj);
  xhr.send(json_obj);

}

//Arrangement 

function onLoadArrangement(){
  $('#ArrangementID').modal();
}

function collectDataArr(){
  let where=document.getElementById('arrDestination').value;
  let date=document.getElementById('arrDate').value;
  let price=document.getElementById('arrPrice').value;
  
  date=parseDatee(date);
  json_obj={
  
    'class':'arr',
    'where':where,
    'from':date['from'],
    'to':date['to'],
    'price':price
  }
  
  return json_obj;
  }

  function saveArr(){
    json_obj=collectDataArr();
    json_obj.image='php/images/default.png';
  
    let xhr= new XMLHttpRequest();
    xhr.open("POST","php/saveMyArrangement.php",true);
    xhr.setRequestHeader("Content-Type","application/json");
    json_obj=JSON.stringify(json_obj);
    xhr.send(json_obj);
  }