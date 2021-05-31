function logout()
{
    $.ajax({

        type: "POST",
        headers: {"Authorization": localStorage.getItem('token')},
        contentType: "application/json",
        url: "https://usercontroller.include.ninja/api/logout",
        dataType: "json",
        success: function (response) {
            console.log(localStorage.getItem('token'))
            window.location="/"
            
        }
    });
}