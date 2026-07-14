console.log("Script is running");
const limit=3;
let count=0;
function collect_data(){
    let name=document.getElementById("username").value;
    if(name!="AIUB"){
        document.getElementById("usernameError").innerHTML="Username is invalid";
        return false;
    }
    console.log("Username is valid " + name);
    let password=document.getElementById("password").value;
    if(password!="$_student"){
        document.getElementById("passwordError").innerHTML="Password is invalid";
        return false;
    }
    console.log("Password is valid " + password);
    if(name=="AIUB" && password=="$_student"){
        document.getElementById("loginError").innerHTML="Login successful";
    }
    return false;
}