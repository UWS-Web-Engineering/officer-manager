<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
</head>

<body>
    <div class="header">
    <a href="/home" class="logo">Manager Mode</a>
        <div class="header-right">
            <a href="/product">Product</a>
            <a class="active" href="/farmerslist">Farmers</a>
            <a href="/queries">Queries</a>
            <a href="/negotiation">Negotiations</a>
            <a style="float:right" onclick="logout()">Logout</a>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <div id="myTable">
        </div>
    </div>
    <script type="text/javascript" src="/assets/js/farmerslist.js"></script>
</body>

</html>