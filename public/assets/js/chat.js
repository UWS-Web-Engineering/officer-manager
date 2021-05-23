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
xmlhttp.open("GET", "/api/chat");
var farmerid;
xmlhttp.onload = function () {
    loadAPI(JSON.parse(xmlhttp.responseText));
    xmlhttp.abort();
}
function loadAPI(xml) {
    for (var i = 0; i < xml.length; i++) {
        farmerid = xml[i].id
        $('<li class="contact"><div class="wrap"> <div class="meta"><p class="name">' + xml[i].farmername.toString() + '</p><p class="preview"></p></div></div></li>').appendTo($('#contacts ul'));
        // document.getElementById('farmername').prepend(document.createTextNode(xml[i].farmername.toString()));
    }
}
xmlhttp.send();