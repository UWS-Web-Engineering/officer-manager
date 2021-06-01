var role
var managerids = []
let list = document.querySelector("#listofCompanies")
// var list = document.getElementById('listofCompanies');
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "https://gateway.include.ninja/api/officer-manager/getmanagers");
xmlhttp.onload = function () {
    console.log(xmlhttp.responseText)
    loadAPI(JSON.parse(xmlhttp.responseText));
};

function loadAPI(xml) {
    console.log(xml)
    for (var i = 0; i < xml.length; i++) {
        managerids[i] = xml[i].id
        let option = document.createElement("option");
        option.text = xml[i].companyname;
        option.value = xml[i].companyname;
        console.log(option.text);
        list.appendChild(option);

    }
    // var table = "<select class='input' name='company'>";
    // for (var i = 0; i < xml.length; i++) {
    //     table += "<option value="+xml[i].companyname +">"+xml[i].companyname+"</option>"
    // }
    // table += "</select>";
    // list.insertAdjacentHTML('beforeend', table);
}
xmlhttp.send();
function manager(btn) {
    var x = document.getElementById("company_name_div");
    var y = document.getElementById("manager");
    var z = document.getElementById("operations_officer");
    var z1 = document.getElementById("company");
    var button = document.getElementById('signup');
    y.classList.toggle("button-toggle");
    y.style.backgroundColor = "rgba(255, 255, 255, 0.4)";
    z.style.backgroundColor = "rgba(255, 255, 255, 0.1)";
    if (x.style.display === "none") {
        x.style.display = "block";
        z1.style.display = "none"
    }
    button.style.backgroundColor = "#1161ee";
    button.disabled = false;
    role = "Manager"
}

function operations_officer(btn) {
    var x = document.getElementById("company_name_div");
    var y = document.getElementById("company_name");
    var z = document.getElementById("operations_officer");
    var z1 = document.getElementById("company");
    var y1 = document.getElementById("manager");
    var button = document.getElementById('signup');
    y1.style.backgroundColor = "rgba(255, 255, 255, 0.1)";
    z.style.backgroundColor = "rgba(255, 255, 255, 0.4)";
    z.classList.toggle("button-toggle");

    if (x.style.display === "block") {
        x.style.display = "none";
        z1.style.display = "block"
    }
    button.style.backgroundColor = "#1161ee";
    button.disabled = false;
    role = "Officer"
}

function signup() {
    var route
    if (role == 'Manager') {
        var company_name = document.getElementById("company_name").value;
    }
    else if (role == "Officer") {
        var company_name = document.getElementById('listofCompanies').options[document.getElementById('listofCompanies').selectedIndex].text
    }
    var name = document.getElementById("firstname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("passs").value;
    var cpassword = document.getElementById("cpass").value;
    var raw = {
        username: email,
        userRole: role,
        password: password,
        password_confirmation: cpassword
    }
    var json = JSON.stringify(raw);
    console.log(json);
    $.ajax({

        type: "POST",
        headers: { 'Accept': 'application/json' },
        contentType: "application/json",
        url: "https://gateway.include.ninja/api/usercontroller/signup",
        data: json,
        dataType: "json",
        success: function (response) {
            localStorage.setItem('token', "Bearer " + response.token);
            localStorage.setItem('uc', response.user.id);
            if (role == "Manager") {
                var todb = {
                    companyname: company_name,
                    managername: name,
                    email: email,
                    usercontrollerid: localStorage.getItem('uc')
                }
                route = "/addmanager"
            }
            else if (role == "Officer") {
                var todb = {
                    managerid: managerids[document.getElementById('listofCompanies').selectedIndex],
                    officername: name,
                    email: email,
                    usercontrollerid: localStorage.getItem('uc')
                }
                route = "/addofficer"
            }

            var jsontodb = JSON.stringify(todb);
            console.log(jsontodb)
            $.ajax({

                type: "POST",
                headers: { "Authorization": localStorage.getItem('token') },
                contentType: "application/json",
                url: "/api" + route,
                data: jsontodb,
                dataType: "json",
                success: function (response) {
                    var z = document.getElementById("successmodal")
                    z.className = "";
                    z.className = "modal show-modal";
                    console.log("Entered into DB")

                }
            });
        }
    });
}
function closesuccess() {
    var x = document.getElementById("successmodal");
    x.className = "modal";
    window.location = "/"
}

function login() {
    var username = document.getElementById("user").value;
    var password = document.getElementById("pass").value;
    var raw = {
        username: username,
        password: password
    }
    var json = JSON.stringify(raw);
    console.log(json);

    $.ajax({

        type: "POST",
        headers: { 'Accept': 'application/json' },
        contentType: "application/json",
        url: "https://gateway.include.ninja/api/usercontroller/login",
        data: json,
        dataType: "json",
        success: function (response) {
            localStorage.setItem('uc', response.user.id);
            localStorage.setItem('token', "Bearer " + response.token);
            if (response.user.userRole == "Officer") {
                var xmlhttp1 = new XMLHttpRequest();
                xmlhttp1.open("GET", "/api/getofficerid/" + localStorage.getItem('uc'));
                xmlhttp1.onload = function () {
                    console.log(xmlhttp1.responseText)
                    localStorage.setItem('officerid',JSON.parse(xmlhttp1.responseText)[0].id)
                    localStorage.setItem('officername',JSON.parse(xmlhttp1.responseText)[0].officername)
                    localStorage.setItem('companyname',JSON.parse(xmlhttp1.responseText)[0].companyname)
                    // xmlhttp1.abort();
                };
                // $.ajax({

                //     type: "GET",
                //     headers: { "Authorization": localStorage.getItem('token') },
                //     contentType: "application/json",
                //     url: "/api/getofficerid/" + localStorage.getItem('uc'),
                //     success: function (response) {
                //         console.log(response.re)
                //         console.log(JSON.parse(response.responseText))
                //         var jsonresp = JSON.stringify(response)
                //         localStorage.setItem('officerid', JSON.parse(response.responseText)[0].id);
                //     }
                // });
                xmlhttp1.send();
                window.location = "/home"
            }
            
            else if(response.user.userRole == "Manager")
            {
                var xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.open("GET", "/api/getmanagerid/" + localStorage.getItem('uc'));
                xmlhttp2.onload = function () {
                    console.log(JSON.parse(xmlhttp2.responseText)[0].id)
                    localStorage.setItem('managerid',JSON.parse(xmlhttp2.responseText)[0].id)
                    localStorage.setItem('companyname',JSON.parse(xmlhttp2.responseText)[0].companyname)
                    localStorage.setItem('managername',JSON.parse(xmlhttp2.responseText)[0].managername)
                    // xmlhttp2.abort();
                };
                xmlhttp2.send();
                window.location = "/dashboard"
            }
            
            
            // 
        }
    });
}