var companyname = document.getElementById("companyname");
var lscompanyname = document.createTextNode(localStorage.getItem('companyname'));
companyname.appendChild(lscompanyname);
var querieid
$(".messages").animate({
    scrollTop: $(document).height()
}, "fast");

$("#profile-img").click(function () {
    $("#status-options").toggleClass("active");
});

$(".expand-button").click(function () {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function () {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");

    if ($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
    } else {
        $("#profile-img").removeClass();
    };

    $("#status-options").removeClass("active");
});

function newMessage() {
    message = $(".message-input input").val();
    if ($.trim(message) == '') {
        return false;
    }
    $('<li class="sent"><img  alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
    $('.message-input input').val(null);
    $('.contact.active .preview').html('<span>You: </span>' + message);
    $(".messages").animate({
        scrollTop: $(document).height()
    }, "fast");
    let messagejson
    messagejson = {
        farmerid: farmerid[pos],
        mymessage: message
    }
    console.log(messagejson)
    $.ajax({
        type: "POST",   //type is any HTTP method
        contentType: "application/json; charset=utf-8",
        url: "/api/startmessage",    //Your api url
        data: JSON.stringify(messagejson),   //Data as js object
        dataType: "json",
        success: function () {
        }
    });
    console.log(querieid)
    console.log(messagejson);
    // console.log(document.location.pathname = "api/counter")

};

$('.submit').click(function () {
    newMessage();
});

$(window).on('keydown', function (e) {
    if (e.which == 13) {
        newMessage();
        return false;
    }
});

var xmlhttp = new XMLHttpRequest();
xmlhttp.setRequestHeader('Authorization', localStorage.getItem('token'));
xmlhttp.open("GET", "/api/chat");
var farmerid = [], pos;
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    $(document).ready(function ($) {
        $(".contact").click(function () {

            pos = $(this).index();

            $("#contacts ul li").removeClass();
            $("#contacts ul li").addClass("contact");
            $('#contacts ul li:eq(' + pos + ')').addClass('contact active');
            $('.messages ul li').remove();

            var xmlhttp1 = new XMLHttpRequest();
            chatpath = "/api/chat/" + farmerid[pos]
            xmlhttp1.open("GET", chatpath);
            xmlhttp1.onload = function () {
                var y = JSON.parse(xmlhttp1.responseText);
                for (var i = 0; i < y.length; i++) {
                    querieid = y[i].id;
                    console.log(y)
                    $('.contact-profile p').remove();
                    $('<p>' + y[i].farmername.toString() + '</p>').appendTo($(".contact-profile"));
                    if (y[i].officermessage != null) {
                        $('<li class="sent"><p>' + y[i].officermessage.toString() + '</p></li>').appendTo($('.messages ul'));
                    }
                    if (y[i].farmermessage != null) {
                        $('<li class="replies"><p>' + y[i].farmermessage.toString() + '</p></li>').appendTo($('.messages ul'));
                    }

                }
            }
            xmlhttp1.send();
        });
    });
    xmlhttp.abort();
}
function loadAPI(xml) {
    for (var i = 0; i < xml.length; i++) {
        farmerid[i] = xml[i].farmerid
        console.log(farmerid)
        $('<li class="contact"><div class="wrap"> <div class="meta"><p class="name">' + xml[i].farmername.toString() + '</p><p class="preview"></p></div></div></li>').appendTo($('#contacts ul'));
        // document.getElementById('farmername').prepend(document.createTextNode(xml[i].farmername.toString()));
    }
}
xmlhttp.send();

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("contacts");
    tr = table.getElementsByTagName("ul");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("li")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function logout()
{
    $.ajax({

        type: "POST",
        headers: {"Authorization": localStorage.getItem('token')},
        contentType: "application/json",
        url: "https://usercontroller.include.ninja/api/logout",
        dataType: "json",
        success: function (response) {
            localStorage.clear();
            window.location="/"
        }
    });
}