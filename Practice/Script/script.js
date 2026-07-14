console.log("Script is running");
const limit=5;
let count=0;
function collect_data(){
    if(count>=limit){
        alert("You have reached the limit of " + limit + " submissions");
        return false;
    }
    let isValidName=collect_name();
    let isValidAge=collect_age();
        count++;
    return false;
}
function collect_name(){
    let name=document.getElementById("name").value;
    if(name==""){
        document.getElementById("nameError").innerHTML="Name is required";
        return false;
    }
    if(name.length<3){
        document.getElementById("nameError").innerHTML="Name should be at least 3 characters long";
        return false;
    }
    console.log("Name is valid " + name);
    return false;
}
function collect_age(){
    let age=document.getElementById("age").value;
    if(age==""){
        document.getElementById("ageError").innerHTML="Age is required";
        return false;
    }
    if(age<0){
        document.getElementById("ageError").innerHTML="Age cannot be negative";
        return false;
    }
    if(age>120){
        document.getElementById("ageError").innerHTML="Age cannot be greater than 120";
        return false;
    }
    if(age<18){
        document.getElementById("ageError").innerHTML="You are a minor";
        return false;
    }
    console.log("Age is valid " + age);
    return false;
}