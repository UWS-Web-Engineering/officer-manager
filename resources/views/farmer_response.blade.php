<head>
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/product_ad.css">
    <link rel="stylesheet" href="/assets/css/productlist.css">
    <script type="text/javascript" src="/assets/js/farmer_response.js"></script>
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
                <input type="button" value="Action" onclick="openaction()">
                <input style="margin-right: 10px" type="button" value="Close">
            </div>
        </form>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span onclick="closemodal()" class="close-button">x</span>
            <h2>Conter the offer</h2>
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Product Name</label>
                        </div>
                        <div class="col-75">
                            <label style="padding-left: 0" for="product_name">Rice (This name should be gotten from the
                                request.)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Price /Kg</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname" name="price" placeholder="Price set at...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="qauntity">Qauntity</label>
                        </div>
                        <div class="col-75">
                            <select id="qauntity" name="Qauntity">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                            </select>
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
                        <input type="button" value="Counter" onclick="opensuccess()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="successmodal" class="modal">
        <div style="width: 28%;height: 150px;" class="modal-content">
            <span onclick="closesuccess()" class="close-button">x</span>
            <h4 style="text-align: center;">You have successfully countered the offer!</h4>
            <input style="position:absolute; left:42%" type="button" value="Close" onclick="closesuccess()">
        </div>
    </div>
    <div id="action" class="modal">
        <div style="width: 30%;height: 150px;" class="modal-content">
            <span onclick="closesuccess()" class="close-button">x</span>
            <h4 style="text-align: center;">What do you want to do with this offer?</h4>
            <input style="margin-right: 75px" type="button" value="Reject">
            <input style="margin-right: 10px" type="button" value="Counter" onclick="opencounter()">
            <input style="margin-right: 10px" type="button" value="Accept">

        </div>
    </div>
</body>