function validimLogin(){


    var regexUsername = /^[A-Za-z]{8,}$/;
    var regexPas = /^[A-Z]{1}[a-z]{5,}\d{2}$/;

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var validimiUsername = regexUsername.test(username)
    var validimiPas = regexPas.test(password)
    

    console.log(validimiUsername)
    console.log(validimiPas)

    if(validimiUsername && validimiPas){
        return;
    }else{
        if(!validimiUsername){
            alert("Username must contain at least 8 characters, and not contain numbers or symbols")
        }

        if(!validimiPas){
            alert("Password must start with a capital letter and end with 2 numbers and have at least 8 characters")
        }
    }
}