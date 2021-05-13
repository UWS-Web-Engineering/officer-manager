<head>
    <link rel="stylesheet" href="/assets/css/farmerdetails.css">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">
    <script type="text/javascript" src="/assets/js/farmerdetails.js"></script>
    <link rel="stylesheet" href="/assets/css/chatbox.css">
</head>

<div class="header">
    <a href="#default" class="logo">CompanyLogo</a>
    <div class="header-right">
        <a href="/product">Product</a>
        <a class="active" href="/farmerslist.html">Farmers</a>
        <a href="/queries">Queries</a>
        <a href="/negotiation">Negotiations</a>
    </div>
</div>
<div class="container">
    <form>
        <div class="row">
            <div class="col-25">
                <label for="fname">Product Name</label>
            </div>
            <div class="col-75">
                <select id="product" name="product">
                    <option value="Rice">Rice</option>
                    <option value="Wheat">Wheat</option>
                    <option value="Potato">Potato</option>
                    <option value="Tomatos">Tomatos</option>
                    <option value="Peas">Peas</option>
                  </select>
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
        <br>
        <div>
            <button type="button" class="chat-button" onclick="openForm()">Chat</button>
        </div>
    </form>
</div>

<div class="chat-popup" id="myForm">
    <form class="form-container">
        <h1>Chat</h1>

        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message.." name="msg" required></textarea>

        <button type="button" class="btn" onclick="chat()">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>