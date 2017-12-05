/**
 * Created by alexa on 03/12/2017.
 */

'use strict';
let select = document.getElementById("selector");
let button = document.querySelector('input[type=button]');

var ListItems = document.getElementById('list names').getElementsByTagName('li');

for (var i = 0; i < ListItems.length; i++){
    let text = ListItems[i].innerHTML;
    let option = document.createElement("option");
    option.value = text;
    option.innerHTML = text;
    select.appendChild(option);
}

let form = document.getElementById('Delete List');
form.addEventListener('click', function() {
    let element = document.getElementById("selector");
    let selection = element.options[element.selectedIndex].text;
    let selectionid = element.options[element.selectedIndex].value;
    if(selectionid != 0) {
        if (confirm('Are you sure you want to delete the list?')) {
            window.location.href = ("DelList.php?list_name=" + selection);
        }
        else {

        }
    }
});

let form2 = document.getElementById('Open List');
form2.addEventListener('click', function() {
    let element = document.getElementById("selector");
    let selection = element.options[element.selectedIndex].text;
    let selectionid = element.options[element.selectedIndex].value;
    if(selectionid != 0) {
        if (confirm('Are you sure you want to Open the list?')) {
            window.location.href = ("OpenList.php?list_name=" + selection);
        }
        else {

        }
    }
});

