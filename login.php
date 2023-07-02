<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.inc.php";?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                Realtime Chat app
            </header>
            <form action="#">
                <div class="error-txt"></div>
        
                    <div class="field input">
                        <label for="">Email address</label>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter your Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div class="feild button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                
            </form>
            <div class="link">
                Not yet signed now ?  <a href="index.php">Signup now</a>
            </div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js "></script>

</body>
</html>

