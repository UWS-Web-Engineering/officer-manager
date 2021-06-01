var companyname = document.getElementById("companyname");
var lscompanyname = document.createTextNode(localStorage.getItem('companyname'));
companyname.appendChild(lscompanyname);
var companyname = document.getElementById("name");
var lscompanyname = document.createTextNode(" "+localStorage.getItem('officername'));
companyname.appendChild(lscompanyname);
// document.getElementById('companyname').createTextNode(localStorage.getItem('companyname'))
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