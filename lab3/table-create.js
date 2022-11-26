let rows = 0;
const tbl = document.createElement('table');

function toallow(){
    var addbutton = document.getElementById('add');
    var delbutton = document.getElementById('delete');
    var inputfield = document.getElementById('number');
    addbutton.disabled = !addbutton.disabled;
    delbutton.disabled = !delbutton.disabled;
    inputfield.disabled = !inputfield.disabled;
}

function addrow(){
    let row = tbl.insertRow();
    row.insertCell().append(rows);
    row.insertCell().append("lorem");
    row.insertCell().append("lorem lorem");
    rows += 1;
}

function make(){
    if (document.getElementById('table')){
        alert("Таблица уже создана!");
    }
    else{
        tbl.innerHTML = "<table>";
        tbl.setAttribute('id', 'table');
        document.body.append(tbl);
        rows += 1;
        addrow();
    }
}

function deleterow(){
    if (document.getElementById('number').value === "") {
        alert("Номер строки для удаления")
    }
    row_number = document.getElementById('number').value;
    try {
        tbl.deleteRow(row_number - 1);
    }
    catch (e) {
        alert("Номер строки введен неверно");
    }
}

