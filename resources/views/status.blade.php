<head>
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/product_ad.css">
    <link rel="stylesheet" href="/assets/css/productlist.css">
    <script type="text/javascript" src="/assets/js/status.js"></script>

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

    <div class="container">
        <h2>Name of farmer with ID 123 has offered you a deal.</h2>
        <h4>Do you accept this offer?</h4>
        <form>
            <div class="row">
                <div class="col-25">
                    <label for="product">Product Name</label>
                </div>
                <div class="col-75">
                    <label for="product_name">Rice (This name should be gotten from the request.)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Price /Kg</label>
                </div>
                <div class="col-75">
                    <label for="product_price">20 (This name should be gotten from the request.)</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="qauntity">Qauntity</label>
                </div>
                <div class="col-75">
                    <label for="product_qauntity">50 kgs (This name should be gotten from the request.)</label>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-25">
                    <label for="note">Notes</label>
                </div>
                <div class="col-75">
                    <textarea id="note" name="note" placeholder="Write something.." style="height:200px"></textarea>
                </div>
            </div> -->
            <br>
            <div class="row">
                <input type="button" value="Close" onclick="closepage()">
            </div>
        </form>
    </div>

</body>