var loadTable = document.getElementById('myTable');

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "/api/negotiations/1");
xmlhttp.onload = function() {
    loadAPI(JSON.parse(xmlhttp.responseText));
};

function loadAPI(xml) {
    var table = "<table><tr><th>Product</th><th>Farmer</th><th>Price</th><th>Quantity / KG</th><th>Fulfill By</th><th>Status<th></tr>";
    for (var i = 0; i < xml.length; i++) {
        let status;
        if(xml[i].negotiations==1)
        {
            status="In Progress"
        }
        table += "<tr><td>" +
            xml[i].prodname +
            "</td><td>" +
            xml[i].farmer +
            "</td><td>" +
            xml[i].prodprice +
            "</td><td>" +
            xml[i].prodqty +
            "</td><td>" +
            xml[i].prodfulfill +
            "</td><td>" +
            status +
            "</td></tr>";
    }
    table += "</table>";
    loadTable.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();
// xmlhttp.addEventListener(this,$(document).ready(function($) {
//         $("#myTable").click(function() {
//         txt = $(this).find("tr:eq(1)").find("td:eq(2)")[0]
        
//            console.log(txt.innerHTML);
//            // if (txt == 'In Progress') {
//            //     console.log(txt)
//            //     document.location.href = '/farmer_response';
//            // } else {
//            //     document.location.href = '/status';
//            // }
//        });
//     }));
    $(document).ready(function($) {
        $("#myTable").click(function() {
            txt = $(this).find('tr').find('td:eq(2)')[1];
           console.log(txt.innerHTML);
           // if (txt == 'In Progress') {
           //     console.log(txt)
           //     document.location.href = '/farmer_response';
           // } else {
           //     document.location.href = '/status';
           // }
       });
    });