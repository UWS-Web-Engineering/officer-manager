<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
</head>

<body>
    <div class="header">
        <a href="#default" class="logo">CompanyLogo</a>
        <div class="header-right">
            <a href="productlist.html">Product</a>
            <a class="active" href="farmerslist.html">Farmers</a>
            <a href="chat.html">Quries</a>
            <a href="negotiation.html">Negotiations</a>
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