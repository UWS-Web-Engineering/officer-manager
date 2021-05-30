<head>
    <link rel="stylesheet" href="/assets/css/login.css">
    <script type="text/javascript" src="/assets/js/login.js"></script>
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
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
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
                <div class="group">
                    <label for="user" class="label">First Name</label>
                    <input id="firstname" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Surname</label>
                    <input id="surname" type="text" class="input">
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
                    <button type="submit" class="button" value="Sign Up" onclick="signup()">Sign Up</button>
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</a>
                </div>
            </div>
        </div>
    </div>
</div>