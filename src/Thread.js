var id=0;
function showCustomer() {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var obj=JSON.parse(this.response);
      id=obj[obj.length-1].idmessage;
      postMessage(obj);
      }
    };
    xhttp.open("GET", "ChatResponse.php?messageId="+id, true);
    xhttp.send();
  }


onmessage = function(event) {
setInterval(showCustomer,500);

}