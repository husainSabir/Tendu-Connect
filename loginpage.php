<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="1607421792.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Tendua</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: gray;

        }

        .row {
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px gray;
        }

        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btn1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn1:hover {
            background: white;
            border: 1px solid;
            color: black;

        }
    </style>

</head>

<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="tendua.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-wieght-bold py-3">Welcome!</h1>
                    <h4>Sign in to your account</h4>
                    <form method="post" action="db.php" name="login-form">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" name="email" class="form-control my-3 p-4"
                                    placeholder="Email-Address">
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="pass"  class="form-control my-3 p-4"
                                    placeholder="*********">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 mb-5"  name="login" value="login">Login</button>
                                <?php
                                if(isset($_SESSION["error"])){
                                    $error = $_SESSION["error"];
                                   
                                  echo'  <div class="alert alert-danger" role="alert">
                                            '.$error.'
                                            </div>';
                                 }
                                 if(isset($_SESSION["db_conn_error"])){
                                    $error = $_SESSION["db_conn_error"];
                                   
                                  echo'  <div class="alert alert-danger" role="alert">
                                            '.$error.'
                                            </div>';
                                 }
                            ?>
                            </div>
                        </div>
                        <p>Don't have an account?<a href="register.php">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Tendua.inc@2020</p>
        </div>
        <!-- /.container -->
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>