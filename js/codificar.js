function codificarBTOA(){ 
    var correo = document.getElementById("email");
    var pwd = document.getElementById("pwd");

    var correo_hidde = document.getElementById("email_hidde");
    var pwd_hidde = document.getElementById("pwd_hidde");
    
    correo_hidde.value=correo.value;
    pwd_hidde.value = pwd.value;

    correo_hidde.value=btoa(correo_hidde.value);
    pwd_hidde.value=btoa(pwd_hidde.value);

    console.log(correo_hidde.value);
}