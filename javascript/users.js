searchBar = document.querySelector(".search input"),
searchBtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    // searchBar.value = "";
}

// work on search searchBar
searchBar.onkeyup =()=>{
    let searchTerm = searchBar.value;
    // if(searchTerm != ""){
    //     searchBar.classList.add("active");
    // }else{
    //     searchBar.classList.remove("active");
    // }
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            userList.innerHTML = data;
            // console.log(data);
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
  }
setInterval(()=>{
    let xhr = new XMLHttpRequest(); 
    xhr.open("GET", "php/users.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
                // console.log(data);
                // if(!searchBar.classList.contians("active")){
                // }
            }
        }
    }
    xhr.send();
},500) // this function is use to run frequently  1.54.00