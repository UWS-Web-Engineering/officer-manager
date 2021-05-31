function manager(btn) {
    var x = document.getElementById("company_name_div");
    var y = document.getElementById("manager");

    // btn.style.fontWeight =  '700';
    // btn.style.backgroundColor = "rgba(255, 255, 255, 0.4)";
    y.classList.toggle("button-toggle");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    localStorage.setItem("userRole", y.value);
}

function operations_officer(btn) {
    var x = document.getElementById("company_name_div");
    var y = document.getElementById("company_name");
    var z = document.getElementById("operations_officer");
    z.classList.toggle("button-toggle");
    // btn.style.fontWeight =  '700';
    // btn.style.backgroundColor = "rgba(255, 255, 255, 0.4)";

    if (x.style.display === "block") {
        x.style.display = "none";
    }
    localStorage.setItem("userRole", z.value);
    y.value = "";
}

function signup() {
    var username = document.getElementById("email").value;
    var password = document.getElementById("passs").value;
    var cpassword = document.getElementById("cpass").value;
    var raw = {
        username: username,
        userRole: localStorage.getItem("userRole"),
        password: password,
        password_confirmation: cpassword
    }
    var json = JSON.stringify(raw);
    console.log(json);
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhr.open("POST", "https://usercontroller.include.ninja/api/signup");
    // request.setRequestHeader('api-key', 'your-api-key');
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(json);
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
        url: "https://usercontroller.include.ninja/api/login",
        data: json,
        dataType: "json",
        success: function (response) {
            localStorage.setItem('token', "Bearer "+response.token);
            window.location="/home"
        }
    });
}