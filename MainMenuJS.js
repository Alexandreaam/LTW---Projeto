/**
 * Created by alexa on 03/12/2017.
 */

'use strict';
let select = document.getElementById("del");
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
    let element = document.getElementById("del");
    let selection = element.options[element.selectedIndex].text;
    let selectionid = element.options[element.selectedIndex].value;
    if(selectionid != 0) {
        if (confirm('Are you sure you want to delete the list?')) {
            alert('Apagada!');
            window.location.href = ("DelList.php?list_name=" + selection);
        }
        else {

        }
    }
});

