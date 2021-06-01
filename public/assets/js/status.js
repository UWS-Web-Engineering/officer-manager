var companyname = document.getElementById("companyname");
var lscompanyname = document.createTextNode(localStorage.getItem('companyname'));
companyname.appendChild(lscompanyname);
function closepage() {
    document.location.href = "/negotiation"
}