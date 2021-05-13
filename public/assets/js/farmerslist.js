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


var loadTable = document.getElementById('myTable');

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "https://run.mocky.io/v3/05f981f3-9701-40ef-999e-a540407b1c1e");
xmlhttp.onload = function() {
    console.log(xmlhttp.responseText);
    loadAPI(JSON.parse(xmlhttp.responseText));
};

function loadAPI(xml) {
    var j = 0;
    console.log(xml)
    var table = "<table><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Contact Number</th><th>Farm Size</th><th>Date of Birth</th><th>Number of Crops</th><th>Address</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        table += "<tr><td>" +
            xml[i].firstName +
            "</td><td>" +
            xml[i].lastName +
            "</td><td>" +
            xml[i].email +
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