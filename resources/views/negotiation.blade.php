<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/negotiation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    

    
</head>

<body>
    <div class="header">
    <a href="/home" class="logo" id="companyname"></a>
        <div class="header-right">
            <a href="/product">Product</a>
            <a href="/farmerslist">Farmers</a>
            <a href="/queries">Queries</a>
            <a class="active" href="/negotiation">Negotiations</a>
            <a style="float:right" onclick="logout()">Logout</a>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table id="myTable">
        </table>
    </div>
</body>
<script src="/assets/js/negotiation.js"></script>
</html>