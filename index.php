<!DOCTYPE HTML

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #signup_form {
            display:none;
        }
            
    </style>
    <script>
        function switchForm(n){
            var x = document.getElementById("login_form");
            var y = document.getElementById("signup_form");
            if (n==1){
                x.style.display = "block";
                y.style.display = "none";
            }
            else{
                x.style.display = "none";
                y.style.display = "block";
            }
            
        }
    </script>

</head>

<body>
    
    <div class="container">
        
        <button type="submit" class="btn btn-outline-light btn-lg" style="margin:20px;" onclick="switchForm(1)">Login form</button>
        
        <button type="submit" class="btn btn-outline-light btn-lg" style="margin:20px;" onclick="switchForm(0)">Sign up form</button>
        
        <div id="login_form">
            <form action="login.php" method="post">
                <h1>Login your BookMarks</h1>
        
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['complete'])) { ?>
                    <p class="complete"><?php echo $_GET['complete']; ?></p>
                <?php } ?>
                
                <div id="login">
                    <label>ID</label>
                    <input type="text" name="userid" placeholder="ID" style="color:black">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" style="color:black">
                    <br>
                </div>
                <button type="submit" class="btn btn-outline-light btn-lg">Login</button>
                
            </form>
        </div>
        <div id="signup_form">
            <form action="register.php" method="post">
                <h1>Create an account</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['complete'])) { ?>
                    <p class="complete"><?php echo $_GET['complete']; ?></p>
                <?php } ?>
            <div id="signup">
                <label>ID (only integer is accepted)</label>
                <input type="text" name="userid" placeholder="ID" style="color:black">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" style="color:black">
                <label>Name</label>
                <input type="text" name="name" placeholder="name" style="color:black">
                <br>
            </div>
            <button type="submit"  class="btn btn-outline-light btn-lg">Sign up</button>
            </form>
        </div>
    </div>
    
</body>
</html>