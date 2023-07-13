<?php
    session_start();
    require_once "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
</head>
<body>
    id=yaasir
    pw=admin
    <form action="" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit" name="loginbtn">Login</button>
        </div>
    </form>

    <div>
        <?php
        if(isset($_POST['loginbtn'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = mysqli_query($con, "SELECT * FROM pengguna WHERE username= '$username'");

            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if($countdata>0){
                if(password_verify($password, $data['password'])){
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    header('location:  ../adminpage');
                }
                else{
                    ?>
                    <h2>Password Salah Broo!!!</h2>
                    <?php
                }
            }
            else{
                ?>
                <h2>Akun Tidak Tersedia Broo!!!</h2>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>