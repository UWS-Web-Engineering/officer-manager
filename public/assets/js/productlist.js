
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function openad() {
    var x = document.getElementById("modal")
    x.className = "";
    x.className = "modal show-modal";
}

function closemodal() {
    var x = document.getElementById("modal");
    x.className = "modal";
}

function opensuccess() 
{
    months=['January','February','March','April','April','June','July','August','September','October','November','December'];
    var today = new Date(document.getElementById('prodfulfill').value);
    var dd = today.getDate();
        var mm = today.getMonth();
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
            mm = months[mm];
        var today = dd + ' ' + mm + ' ' + yyyy;
    let product = {
        prodname: document.getElementById('prodname').options[document.getElementById('prodname').selectedIndex].text,
        prodimg:document.getElementById('prodname').value,
        prodprice: document.getElementById('prodprice').value,
        prodqty: document.getElementById('prodqty').value,
        prodfulfill:today
    }
    console.log(product);
    let json = JSON.stringify(product);

    const xhr = new XMLHttpRequest(); 
    xhr.open("POST", "api/product");
    xhr.setRequestHeader("Content-Type", "application/json");// add token in header
    xhr.send(json);
    var z = document.getElementById("successmodal")
         z.className = "";
         z.className = "modal show-modal";        
}

function closesuccess()
{
    var x = document.getElementById("successmodal");
    x.className = "modal";
    var x1 = document.getElementById("modal");
    x1.className = "modal";
    document.location.href = "/product";
}

var loadTable = document.getElementById('myTable');
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "/api/products");
xmlhttp.onload = function() {
    loadAPI(JSON.parse(xmlhttp.responseText));
};

function loadAPI(xml) {
    var table = "<table><tr><th>Crop</th><th>Crop Price</th><th>Crop Quantity</th><th>Expected Date</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        table += "<tr><td>" +
            xml[i].cropname +
            "</td><td>" +
            xml[i].cropprice +
            "</td><td>" +
            xml[i].cropqty +
            "</td><td>" +
            xml[i].expecteddate +
            "</td></tr>";
    }
    table += "</table>";
    loadTable.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();

