function opencounter() {
    var x = document.getElementById("modal")
    x.className = "";
    x.className = "modal show-modal";
    var y = document.getElementById("action")
    y.className = "modal";
}

function closemodal() {
    var x = document.getElementById("modal");
    x.className = "modal";
}

function opensuccess() {
    var x = document.getElementById("successmodal")
    x.className = "";
    x.className = "modal show-modal";
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