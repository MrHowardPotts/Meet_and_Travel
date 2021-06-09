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

async function saveWish(){
  json_obj=collectData();
  var blobFile = document.getElementById("groupWishPicture").files[0];
  
  json_obj.image=await getImage(blobFile);

  let xhr= new XMLHttpRequest();
  xhr.open("POST","php/saveMyWish.php",true);
  xhr.setRequestHeader("Content-Type","application/json");
  json_obj=JSON.stringify(json_obj);
  xhr.send(json_obj);
}
async function saveGroup(){
  json_obj=collectData();

  var blobFile = document.getElementById("groupWishPicture").files[0];
  json_obj.imageWish=await getImage(blobFile);

  var blobFile2 = document.getElementById("groupPicture").files[0];
  json_obj.imageGroup=await getImage(blobFile2);

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
  //returns the image blob encoded as a base64 string. 
  async function getImage(blobFile){
    reader=new FileReader();
    return await new Promise((resolve)=>{
      reader.onloadend=()=>{
        resolve(reader.result.split(",")[1]);
        }
      reader.readAsDataURL(blobFile);
    });
  }
  async function saveArr(){
    json_obj=collectDataArr();
    json_obj.image='php/images/default.png';
    
    var blobFile = document.getElementById("arrImage").files[0];
    //reader=new FileReader();
    
    json_obj.image = await getImage(blobFile);

    let xhr= new XMLHttpRequest();
    xhr.open("POST","php/saveMyArrangement.php",true);
    xhr.setRequestHeader("Content-Type","application/json");
    json_obj=JSON.stringify(json_obj);
    xhr.send(json_obj);
    // var formData = new FormData();
    // formData.append("fileToUpload", blobFile);
    // json_obj.image=formData;

    // let xhr= new XMLHttpRequest();
    // xhr.open("POST","php/saveMyArrangement.php",true);
    // xhr.setRequestHeader("Content-Type","application/json");
    // json_obj=JSON.stringify(json_obj);
    // xhr.send(json_obj);
  }