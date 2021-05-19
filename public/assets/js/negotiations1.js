// $(document).ready(function($) {
//     $("myTable").click(function() {
//         txt = $(this).closest('tr').find('td:eq(2)').text();
//        console.log(txt);
//        // if (txt == 'In Progress') {
//        //     console.log(txt)
//        //     document.location.href = '/farmer_response';
//        // } else {
//        //     document.location.href = '/status';
//        // }
//    });
// });
// var cells = document.querySelectorAll("#position td");
// for (var i = 0; i < cells.length; i++) {
//   cells[i].addEventListener("click", function() {
//     console.log(this.innerHTML);
//   });
// }
// function addRowHandlers() {
//     var table = document.getElementById("position");
//     var rows = table.getElementsByTagName("tr");
//     for (i = 0; i < rows.length; i++) {
//       var currentRow = table.rows[i];
//       var createClickHandler =
//         function(row) {
//           return function() {
//             var cell = row.getElementsByTagName("td")[0];
//             var id = cell.innerHTML;
//             alert("id:" + id);
//           };
//         };
  
//       currentRow.onclick = createClickHandler(currentRow);
//     }
//   }
//   window.onload = addRowHandlers();
  