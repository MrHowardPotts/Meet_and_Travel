const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .users-list");
//na klik dugmeta za pretragu text box se javlja ili sakriva
searchBtn.onclick = ()=>{
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
}
//dok kucamo da saljemo povremeno da se proveri da li se neko nalazi kome ime lici na to
searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){// if there is no active class run setInterval
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest(); //XML Object
  xhr.open("POST","php/search.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        userList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);

}
//funkcija za refresh
setInterval(()=>{
  let xhr = new XMLHttpRequest(); //XML Object
  xhr.open("GET","php/chat.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(!searchBar.classList.contains("active")){// if active active not contains in search bar then add this data
          userList.innerHTML = data;
        }
      }
    }
  }
  xhr.send();
}, 500); // this func will run frequently after 500ms;
