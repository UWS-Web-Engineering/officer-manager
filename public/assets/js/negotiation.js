$(document).ready(function($) {
    $(".table-row").click(function() {
        txt = $(this).closest('tr').find("td:eq(4)").text();
        console.log(txt);

        if (txt == 'In progress') {
            document.location.href = '/farmer_response';
        } else {
            document.location.href = '/status';
        }
    });
});