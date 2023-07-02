const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) =>{
    e.preventDefault();
}
inputField.focus();

sendBtn.onclick=()=>{
    let xhr = new XMLHttpRequest(); 
    xhr.open("POST", "php/insert-chat.php",true);
    xhr.onload= ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
            }
        }
    }
    // we have send all the data form ajax to php
    let formData  = new FormData(form); // creting formData object
    xhr.send(formData);  // sending data
}

chatBox.onmouseenter = () =>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () =>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest(); 
    xhr.open("POST", "php/get-chat.php",true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData  = new FormData(form); // creting formData object
    xhr.send(formData);  // sending data
    
},500) // this function is use to run frequently  2.21.00

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }