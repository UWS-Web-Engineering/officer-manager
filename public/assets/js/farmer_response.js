var xmlhttp = new XMLHttpRequest();
var t = "/api" + document.location.pathname.toString();
xmlhttp.open("GET", t);
var offerid;
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    console.log(JSON.parse(xmlhttp.responseText));
    xmlhttp.abort();
}
function loadAPI(xml) {
    var QnA=['You have already countered this offer. Please wait for farmer to respond. ','Do you accept this offer?']
    for (var i = 0; i < xml.length; i++) {
        offerid = xml[i].id
        document.getElementById('farmername').prepend(document.createTextNode(xml[i].farmername.toString()));
        if(xml[i].negotiation==0)
        {
            document.getElementById('qna').innerHTML = QnA[0];
            document.getElementById('action_button').style.display = "none";
        }
        else{
            document.getElementById('qna').innerHTML = QnA[1];
            document.getElementById('action_button').style.display = "block";
        }
        document.getElementById('product_name').innerHTML = xml[i].cropname;
        // document.getElementById('farmer_name').innerHTML=xml[i].farmername;
        document.getElementById('product_price').innerHTML = xml[i].cropprice;
        document.getElementById('product_qauntity').innerHTML = xml[i].cropqty;
        document.getElementById('fulfill').innerHTML = xml[i].expecteddate;
        document.getElementById('product_counter_name').innerHTML = xml[i].cropname;
    }
}
xmlhttp.send();


function opencounter() {
    var x = document.getElementById("modal")
    x.className = "";
    x.className = "modal show-modal";
    var y = document.getElementById("action")
    y.className = "modal";
}

function closemodal() {
    var x = document.getElementById("modal");
    var y = document.getElementById("action")
    y.className = "modal";
    x.className = "modal";
}

function opensuccess() {
    months = ['January', 'February', 'March', 'April', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var today = new Date(document.getElementById('product_counter_fulfill').value);
    var dd = today.getDate();
    var mm = today.getMonth();
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    mm = months[mm];
    var today = dd + ' ' + mm + ' ' + yyyy;
    let product = {
        id: offerid,
        prodprice: parseInt(document.getElementById('product_counter_price').value),
        prodqty: parseInt(document.getElementById('product_counter_quantity').value),
        prodfulfill: today
    }
    console.log(product);
    let json = JSON.stringify(product);
    // console.log(document.location.pathname = "api/counter")
    $.ajax({
        type: "PUT",   //type is any HTTP method
        contentType: "application/json; charset=utf-8",
        url: "/api/counter",    //Your api url
        data: JSON.stringify(product),   //Data as js object
        dataType: "json",
        success: function () {
            var x = document.getElementById("successmodal")
            x.className = "";
            x.className = "modal show-modal";
        }
    });
    // const xhr = new XMLHttpRequest();
    // xhr.open("POST", document.location.pathname = "api/counter");
    // xhr.setRequestHeader("Content-Type", "application/json");
    // xhr.send(json);

}

function closesuccess() {
    var x = document.getElementById("successmodal");
    x.className = "modal";
    var x1 = document.getElementById("modal");
    x1.className = "modal";
    document.location.href = "/negotiation";
}

function openaction() {
    var x = document.getElementById("action")
    x.className = "";
    x.className = "modal show-modal";
}
function acceptoffer() {
    let product
    xmlhttp.open("GET", t);
    xmlhttp.onload = function () {
        offerdets = JSON.parse(xmlhttp.responseText);
        for (var i = 0; i < offerdets.length; i++) {
            product = {
                id: offerdets[i].cropid,
                prodname: offerdets[i].cropname,
                prodprice: offerdets[i].cropprice,
                prodqty: offerdets[i].cropqty,
                prodfulfill: offerdets[i].expecteddate,
                farmerid: offerdets[i].farmerid
            }
        }
        console.log(product);
        // console.log(document.location.pathname = "api/counter")
        $.ajax({
            type: "PUT",   //type is any HTTP method
            contentType: "application/json; charset=utf-8",
            url: "/api/accept",    //Your api url
            data: JSON.stringify(product),   //Data as js object
            dataType: "json",
            success: function () {
                var y = document.getElementById("acceptsuccess")
                y.className = "modal show-modal";
            }
        });
        xmlhttp.abort();
    }
    xmlhttp.send();
}
function rejectoffer()
{
    let product
    xmlhttp.open("GET", t);
    xmlhttp.onload = function () {
        offerdets = JSON.parse(xmlhttp.responseText);
        for (var i = 0; i < offerdets.length; i++) {
            product = {
                id: offerdets[i].id
            }
        }
        console.log(product);
        // console.log(document.location.pathname = "api/counter")
        $.ajax({
            type: "PUT",   //type is any HTTP method
            contentType: "application/json; charset=utf-8",
            url: "/api/reject",    //Your api url
            data: JSON.stringify(product),   //Data as js object
            dataType: "json",
            success: function () {
                var y = document.getElementById("rejectsuccess")
                y.className = "modal show-modal";
            }
        });
        xmlhttp.abort();
    }
    xmlhttp.send();
}