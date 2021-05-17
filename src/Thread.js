var id=0;
var groupid=0;
function showCustomer() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var obj=JSON.parse(this.response);
      id=obj.messages[obj.messages.length-1].idmessage;
      postMessage(obj);
      }
    };
    xhttp.open("GET", "php/ChatResponse.php?messageId="+id+"&groupId="+groupid, true);
    xhttp.send();
  }


onmessage = function(event) {
  groupid=event.data;
setInterval(showCustomer,500);

}