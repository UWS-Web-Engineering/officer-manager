function openad() {
    var x = document.getElementById("modal")
    x.className = "";
    x.className = "modal show-modal";
}

function closemodal() {
    var x = document.getElementById("modal");
    x.className = "modal";
}

function opensuccess() {
    var z = document.getElementById("successmodal")
    z.className = "";
    z.className = "modal show-modal";
}
var loadTable = document.getElementById('myTable');

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "https://hub.dummyapis.com/employee?noofRecords=10&idStarts=1001");
xmlhttp.onload = function() {
    console.log(xmlhttp.responseText);
    loadAPI(JSON.parse(xmlhttp.responseText));
};

function loadAPI(xml) {
    var table = "<table><tr><th>Product</th><th>Farmer</th><th>Price</th><th>Quantity / KG</th><th>Farm Size</th><th>Start Date</th><th>End Date</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        table += "<tr><td>" +
            xml[i].firstName +
            "</td><td>" +
            xml[i].lastName +
            "</td><td>" +
            xml[i].contactNumber +
            "</td><td>" +
            xml[i].age +
            "</td><td>" +
            xml[i].dob +
            "</td><td>" +
            xml[i].salary +
            "</td><td>" +
            xml[i].address +
            "</td></tr>";
    }
    table += "</table>";
    console.log(table);
    loadTable.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();