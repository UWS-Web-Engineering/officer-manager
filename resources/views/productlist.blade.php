<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <link rel="stylesheet" href="/assets/css/farmerdetails.css">
    <link rel="stylesheet" href="/assets/css/productlist.css">
    <link rel="stylesheet" href="/assets/css/product_ad.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
</head>

<body>
    <div class="header">
    <a href="/home" class="logo" id="companyname"></a>
        <div class="header-right">
            <a class="active" href="/product">Product</a>
            <a href="/farmerslist">Farmers</a>
            <a href="/queries">Queries</a>
            <a href="/negotiation">Negotiations</a>
            <a style="float:right" onclick="logout()">Logout</a>
        </div>
    </div>
    <br>
    <div>
        <button id="addproduct" type="button" style="margin-right: 10px;" class="chat-button" onclick="openad()">Add Product</button>
    </div>
    <br>
    <br>
    <br>
    <div style="overflow-x:auto;">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Crops..">
        <table id="myTable"> </table>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span onclick="closemodal()" class="close-button">x</span>
            <h2>Add new product</h2>
            <div class="container">
                <form  id="myform">
                    <div class="row">
                        <div class="col-25">
                            <label id="pname">Product Name</label>
                        </div>
                        <div class="col-75">
                            <select id="prodname" name="prodname">
                                <option value="http://bettybondoc.com/we/carrot.jpg">Carrot</option>
                                <option value="http://bettybondoc.com/we/wheat.jpg">Wheat</option>
                                <option value="http://bettybondoc.com/we/potato.jpg">Potato</option>
                                <option value="http://bettybondoc.com/we/onion.jpg">Onion</option>
                                <option value="http://bettybondoc.com/we/cauliflower.jpg">Cauliflower</option>
                              </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label id="plabel">Price /Kg</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="prodprice" name="prodprice" placeholder="Price set at...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label id="qauntitylabel">Qauntity</label>
                        </div>
                        <div class="col-75">
                            <select id="prodqty" name="prodqty">
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
                        <input type="date" id="prodfulfill" name="prodfulfill">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="button" value="Submit" onclick="opensuccess()" >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="successmodal" class="modal">
        <div style="width: 28%;height: 150px;" class="modal-content">
            <span onclick="closesuccess()" class="close-button">x</span>
            <h4 style="text-align: center;">You have successfully posted your product!</h4>
            <input style="position:absolute; left:42%" type="button" value="Close" onclick="closesuccess()">
        </div>
    </div>
    
</body><script type="text/javascript" src="/assets/js/productlist.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</html>