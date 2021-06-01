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
    var table = "<table><tr><th>Farmer Name</th><th>Crop Name</th><th>Expected Date</th><th>Farmer Address</th><th>Region Id</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        ids.push(xml[i].id)
        table += "<tr><td>" +
            xml[i].farmername +
            "</td><td>" +
            xml[i].cropname +
            "</td><td>" +
            xml[i].expecteddate +
            "</td><td>" +
            xml[i].farmeraddress +
            "</td><td>" +
            xml[i].regionid +
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