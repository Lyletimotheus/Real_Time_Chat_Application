const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=> {
    e.preventDefault(); //Preventing form from submitting
}


continueBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){

                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }

    //Sending the form data
    let formData = new FormData(form);
    xhr.send(formData);
}
