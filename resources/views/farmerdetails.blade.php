<head>
    <link rel="stylesheet" href="/assets/css/farmerdetails.css">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">

    <link rel="stylesheet" href="/assets/css/chatbox.css">
</head>

<div class="header">
<a href="/home" class="logo" id="companyname"></a>
    <div class="header-right">
        <a href="/product">Product</a>
        <a class="active" href="/farmerslist">Farmers</a>
        <a href="/queries">Queries</a>
        <a href="/negotiation">Negotiations</a>
    </div>
</div>
<div class="container">
    <h2 id="farmername"> has made a deal with you for....</h2>
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
                <label for="price">Price ($) / Kg</label>
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
            <button type="button" class="chat-button" onclick="openForm()">Chat</button>
            <input style="margin-right: 10px" class="chat-button" type="button" value="Close" onclick=closesuccess()>
        </div>
    </form>
</div>


<div class="chat-popup" id="myForm">
    <form class="form-container">
        <h1>Chat</h1>

        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>
        <select id="question" name="question">
            <option>Rice</option>
            <option>Wheat</option>
            <option>Potato</option>
            <option>Tomatos</option>
            <option>Peas</option>
        </select>
        <button type="button" class="btn" onclick="chat()">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<script type="text/javascript" src="/assets/js/farmerdetails.js"></script>