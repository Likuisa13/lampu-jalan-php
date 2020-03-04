<?php  
include 'config/class.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detra</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--     <link href="apps/css/bootstrap.min.css" rel="stylesheet"> -->
<style>
    .alert-up
    {
        background: #F8D7DA;
        padding: 20px;
        margin-bottom: 10px;
        text-align: center;
        border: 1px solid #A8686E;
        color: #A8686E;
    }
</style>
</head>
<body>

    <div class="kotak_login">
        <div class="avatar"><i class="fa fa-user"></i></div>
        <h4 class="modal-title">Login to Your Account</h4>
        <?php  
        if (isset($_POST['login'])) 
        {
            $hasil = $user->login($_POST['username'],$_POST['password']);
            if ($hasil=="sukses") 
            {
                echo "<script>location='apps/./';</script>";
            }
            else
            {
                echo "<div class='alert alert-danger alert-up'><i class='fa fa-info-circle'></i> Username & Password tidak sesuai!</div>";
            }
        }
        ?>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username" required="">
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password" required="">
            <button class="tombol_login" name="login"> LOGIN</button>
            <br/>
            <br/>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="apps/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(".alert-up").alert().delay(2000).slideUp('slow');
    </script>
</body>
</html>