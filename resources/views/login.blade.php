<head>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/farmerslist.css">

    <link rel="stylesheet" href="/assets/css/productlist.css">

    
</head>
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">E-mail</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <Button type="submit" class="button" value="Sign In" onclick="login()">Login</Button>
                </div>
            </div>
            <div class="sign-up-htm">
                <div id="roles" class="group">
                    <label for="user" class="label">Role</label>
                    <button id="manager" type="button" class="button-toggle drop " style="float:left" value="Manager" onclick="manager(this)">Manager</button>
                    <button id="operations_officer" type="button" class="button-toggle drop" style="float:right" value="Operations Officer" onclick="operations_officer(this)">Operations Officer</button>
                </div>
                <div id="company_name_div" class="group" style="display: none;">
                    <label for="user" class="label">Company Name</label>
                    <input id="company_name" type="text" class="input">
                </div>
                <div id="company" style="display:none" class="group">
                    <label for="company" class="label">Company Name</label>
                    <select id="listofCompanies" class="input">
                    </select>
                </div>
                <div class="group">
                    <label for="user" class="label">Name</label>
                    <input id="firstname" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="email" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="passs" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="cpass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <button id="signup" type="submit" class="button" value="Sign Up" onclick="signup()" disabled>Sign Up</button>
                </div>
            </div>
            <div id="successmodal" class="modal">
                <div style="width: 70%;height: 150px;" class="modal-content">
                    <span onclick="closesuccess()" class="close-button">x</span>
                    <h4 style="text-align: center;">You have successfully created your Account!</h4>
                    <input style="position:absolute; left:42%" type="button" value="Close" onclick="closesuccess()">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/login.js"></script>