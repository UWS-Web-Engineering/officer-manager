var companyname = document.getElementById("companyname");
var lscompanyname = document.createTextNode(localStorage.getItem('companyname'));
companyname.appendChild(lscompanyname);
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
let ids = []
var xmlhttp = new XMLHttpRequest();

xmlhttp.open("GET", "https://gateway.include.ninja/api/officer-manager/farmerslist");
xmlhttp.setRequestHeader('Authorization', localStorage.getItem('token'));
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    $(document).ready(function ($) {
        $("#myTable").find("tr").click(function () {
            let pos = $(this).index() - 1;
            document.location.href = "/farmerdetails/" + ids[pos]
        });

    });
    xmlhttp.abort();
};

function loadAPI(xml) {
    var j = 0;
    console.log(xml)
    var table = "<table><tr><th>Farmer Name</th><th>Last Name</th><th>Email</th><th>Contact Number</th><th>Farm Size</th><th>Date of Birth</th><th>Number of Crops</th><th>Address</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        ids.push(xml[i].id)
        table += "<tr><td>" +
            xml[i].farmername +
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
    loadTable.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();

function logout()
{
    $.ajax({

        type: "POST",
        headers: {"Authorization": localStorage.getItem('token')},
        contentType: "application/json",
        url: "https://gateway.include.ninja/api/usercontroller/logout",
        dataType: "json",
        success: function (response) {
            localStorage.clear();
            window.location="/"
        }
    });
}