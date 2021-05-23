var xmlhttp = new XMLHttpRequest();
var t = "/api" + document.location.pathname.toString();
console.log(t)
xmlhttp.open("GET", t);
var offerid;
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    xmlhttp.abort();
}
function loadAPI(xml) {
    for (var i = 0; i < xml.length; i++) {
        offerid = xml[i].id
        document.getElementById('farmername').prepend(document.createTextNode(xml[i].farmername.toString()));
        document.getElementById('product_name').innerHTML = xml[i].prodname;
        // document.getElementById('farmer_name').innerHTML=xml[i].farmername;
        document.getElementById('product_price').innerHTML = xml[i].prodprice;
        document.getElementById('product_qauntity').innerHTML = xml[i].prodqty;
        document.getElementById('fulfill').innerHTML = xml[i].fulfill;
        document.getElementById('product_counter_name').innerHTML = xml[i].prodname;
    }
}
xmlhttp.send();
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function chat() {
    document.location.href = "chat.html";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
function closesuccess() {
    document.location.href = "/farmerslist";
}