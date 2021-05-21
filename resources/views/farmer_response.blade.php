<head>
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/product_ad.css">
    <link rel="stylesheet" href="/assets/css/productlist.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
        <h2 id="farmername"> has offered you a deal.</h2>
        <h4>Do you accept this offer?</h4>
        <form>
            <div class="row">
                <div class="col-25">
                    <label for="product">Product Name</label>
                </div>
                <div class="col-75">
                    <label id="product_name" for="product_name"></label>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-25">
                    <label for="product">Farmer Name</label>
                </div>
                <div class="col-75">
                    <label id="farmer_name" for="product_name"></label>
                </div>
            </div> -->
            <div class="row">
                <div class="col-25">
                    <label for="price">Price / Kg</label>
                </div>
                <div class="col-75">
                    <label id="product_price" for="product_price"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="qauntity">Qauntity</label>
                </div>
                <div class="col-75">
                    <label id="product_qauntity"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fulfill">Fulfilled By</label>
                </div>
                <div class="col-75">
                    <label id="fulfill" for="fulfill"></label>
                </div>
            </div>
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
                            <label id="product_counter_name" style="padding-left: 0" for="product_name"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Price /Kg</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="product_counter_price" name="price" placeholder="Price set at...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="qauntity">Qauntity</label>
                        </div>
                        <div class="col-75">
                            <select id="product_counter_quantity" name="Qauntity">
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
                    <div class="row">
                        <div class="col-25">
                            <label for="note">Fulfill By</label>
                        </div>
                        <div class="col-75">
                            <input type="date" id="product_counter_fulfill" name="prodfulfill">
                        </div>
                    </div>
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
            <span onclick="closemodal()" class="close-button">x</span>
            <h4 style="text-align: center;">What do you want to do with this offer?</h4>
            <input style="margin-right: 75px" type="button" value="Reject" onclick="rejectoffer()">
            <input style="margin-right: 10px" type="button" value="Counter" onclick="opencounter()">
            <input style="margin-right: 10px" type="button" value="Accept" onclick="acceptoffer()">
        </div>
        <div id="acceptsuccess" class="modal">
            <div style="width: 30%;height: 175px;" class="modal-content">
                <span onclick="closesuccess()" class="close-button">x</span>
                <h2 style="text-align: center;">Congratulations!</h2>
                <h4 style="text-align: center;">You have Accepted the offer!</h4>
                <input style="position:absolute; left:42%" type="button" value="Close" onclick="closesuccess()">
            </div>
        </div>
        <div id="rejectsuccess" class="modal">
            <div style="width: 30%;height: 175px;" class="modal-content">
                <span onclick="closesuccess()" class="close-button">x</span>
                <h2 style="text-align: center;">Awwww :(</h2>
                <h4 style="text-align: center;">You have Reject the offer!</h4>
                <input style="position:absolute; left:42%" type="button" value="Close" onclick="closesuccess()">
            </div>
        </div>
    </div>
</body>