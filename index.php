<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.inc.php";?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
                Realtime Chat app
            </header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First name</label>
                        <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="">Email address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter your Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Select Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="feild button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                
            </form>
            <div class="link">
                Already signed up ?  <a href="login.php">Login now</a>
            </div>
        </section>
    </div>


    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/singup.js"></script>
</body>
</html>