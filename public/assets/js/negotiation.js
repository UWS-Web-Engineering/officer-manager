var loadTable = document.getElementById('myTable');
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "/api/negotiations");
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    $(document).ready(function ($) {
        $("#myTable").find("tr").click(function () {
            let pos = $(this).index() - 1;
            document.location.href = "/farmer_response/" + ids[pos]
        });
    });
};
let ids = []
function loadAPI(xml) {
    var table = "<table><tr><th>Product</th><th>Farmer</th><th>Fulfill By</th><th>Status</th></tr>";
    for (var i = 0; i < xml.length; i++) {
        let status;
        ids.push(xml[i].id)
        if (xml[i].prodstatus == null && xml[i].rejected==0) {
            status = "In Progress"
            table += "<tr><td>" +
                xml[i].prodname +
                "</td><td>" +
                xml[i].farmername +
                "</td><td>" +
                xml[i].fulfill +
                "</td><td>" +
                status +
                "</td></tr>";
        }
    }
    table += "</table>";
    loadTable.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();