<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>login</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    :root {
        --success-color: #2ecc71;
        --error-color: #e74c3c;
    }

    * {
        box-sizing: border-box;
    }

    .container {
        margin-top: 10vh;
        background-color: rgba(191, 189, 187, 0.1);
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        width: 450px;
        border-radius: 10%;
    }

    h4 {
        text-align: center;
        margin: 0 0 20px;
    }

    .form {
        padding: 30px 40px;
    }

    .form-group {
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
    }

    .form-group label {
        color: black;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 14px;
    }

    .form-group input:focus {
        outline: 0;
        border-color: #777;
    }

    .form-group.success input {
        border-color: var(--success-color);
    }

    .form-group.error input {
        border-color: var(--error-color);
    }

    .form-group small {
        color: var(--error-color);
        position: absolute;
        bottom: 0;
        left: 0;
        visibility: hidden;
    }

    .form-group.error small {
        visibility: visible;
    }

    .form button {
        cursor: pointer;
        background-color: #44514d;
        border: 2px solid #44514d;
        border-radius: 10px;
        color: #fff;
        display: block;
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        width: 100%;
    }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Login</h4>
                <div class="card-body">
                    <form action="select.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="em" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="ps" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" value="Sign-in" name="update_stud_data" class="btn btn-primary"
                                style="background-color: #44514d; border: 2px solid  #44514d;">Login</button>
                        </div>
                        <p class="p1">You don't have an account? <a href="Register.php" class="signup">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>