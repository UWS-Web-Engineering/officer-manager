<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/negotiation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/assets/js/negotiation.js"></script>
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">CompanyLogo</a>
        <div class="header-right">
            <a href="/product">Product</a>
            <a href="/farmerslist">Farmers</a>
            <a href="/queries">Queries</a>
            <a class="active" href="/negotiation">Negotiations</a>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table id="example" style="text-align: center;">
            <tr>
                <th>Farmer</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qauntity / KGs</th>
                <th>Status</th>
            </tr>
            <tr class="table-row" data-href="checkstatus()">
                <td>Jill</td>
                <td>Rice</td>
                <td>20</td>
                <td>50</td>
                <td>Rejected</td>
            </tr>
            <tr class="table-row" data-href="checkstatus()">
                <td>Bill</td>
                <td>Tomatos</td>
                <td>15</td>
                <td>30</td>
                <td>In progress</td>
            </tr>
            <tr class="table-row" data-href="checkstatus()">
                <td>Jake</td>
                <td>Potatos</td>
                <td>8</td>
                <td>68</td>
                <td>Accepted</td>
            </tr>
        </table>
    </div>

</body>

</html>