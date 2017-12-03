/**
 * Created by alexa on 14/11/2017.
 */
'use strict';
let regi = document.getElementById("registo");
let logi = document.getElementById("login");
regi.style.display = "none";
logi.style.display = "none";

function reg() {
    if (regi.style.display === "none" &&logi.style.display === "none") {
        regi.style.display = "block";
    }
    else if(logi.style.display === "block" && regi.style.display === "none"){
        logi.style.display = "none";
        regi.style.display = "block";
    }
    else if(logi.style.display === "none" && regi.style.display === "block"){
        regi.style.display = "none";
    }
}
function log() {
    if (logi.style.display === "none" && regi.style.display === "none") {
        logi.style.display = "block";
    }
    else if(logi.style.display === "none" && regi.style.display === "block"){
        logi.style.display = "block";
        regi.style.display = "none";
    }
    else if(logi.style.display === "block" && regi.style.display === "none"){
        logi.style.display = "none";
    }
}/*
let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function() {
  alert('Registado!');
});

let form2 = document.getElementsByTagName('form')[1];
form2.addEventListener('submit', function() {
  alert('Login!');
});
*/