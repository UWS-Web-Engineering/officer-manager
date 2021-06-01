var companyname = document.getElementById("companyname");
var lscompanyname = document.createTextNode(localStorage.getItem('companyname'));
companyname.appendChild(lscompanyname);
var xmlhttp = new XMLHttpRequest();
var t = "/api" + document.location.pathname.toString();
console.log(t)
xmlhttp.setRequestHeader('Authorization', localStorage.getItem('token'));
xmlhttp.open("GET", t);
var offerid;
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    xmlhttp.abort();
}
function loadAPI(xml) {
    for (var i = 0; i < xml.length; i++) {
        console.log(xml)
        offerid = xml[i].id
        document.getElementById('farmername').prepend(document.createTextNode(xml[i].farmername.toString()));
        document.getElementById('product_name').innerHTML = xml[i].cropname;
        // document.getElementById('farmer_name').innerHTML=xml[i].farmername;
        document.getElementById('product_price').innerHTML = xml[i].cropprice;
        document.getElementById('product_qauntity').innerHTML = xml[i].cropqty;
        document.getElementById('fulfill').innerHTML = xml[i].expecteddate;
        document.getElementById('product_counter_name').innerHTML = xml[i].cropname;
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