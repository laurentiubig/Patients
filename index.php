<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script src="js/script.js"></script>
    
    
    </head>
    
    <body>
        <div class="bg-img-login"></div>

        <div class="form-op">
            <form id="login-form" class="inn">
                <div class="form-group">
                    <label for="l-email">Username</label>
                    <input class="form-control" type="text" id="l-email" name="email" placeholder="Username">
                    <label for="l-pass">Password</label>
                    <input class="form-control" type="password" id="l-pass" name="pass" placeholder="Password">
                </div>
                
                <button class="btn btn-primary" id="login-btn">Log In</button>
            </form>

            <form id="register-form">
                <div class="form-group">
                    <label for="l-email">Username</label>
                    <input class="form-control" type="text" id="register-username" name="email" placeholder="New Username">
                    <label for="l-email">Password</label>
                    <input class="form-control" type="password" id="register-pass" name="pass" placeholder="New Password">
                    <label for="l-email">Repeat Password</label>
                    <input class="form-control" type="password" id="register-cpass" name="cpass" placeholder="Repeat New Password">

                </div>
                <div class="form-group">
                    <span id="u-error">Please enter a username!</span>
                    <span id="r-error">The passwords don t match!</span>
                </div>
                <button class="btn btn-success" id="register-btn">Register</button>
            </form>

            <button class="btn btn-danger" id="registerH-btn">Register Here</button>
        
        </div>

        
    </body>

</html>
