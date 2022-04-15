<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <title>Registration</title>
    <style>
        body {
            background: linear-gradient(-45deg, #4affde, #5b9dff, #d06bff, #ff34d2);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        form {
            box-sizing: border-box;
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ddd;
            box-shadow: 5px 5px 10px grey;
            padding: 20px;
            border-radius: 10px;
        }

        form label {
            color: #fff;
            font-size: larger;
            font-weight: bold;
        }

        input[type] {
            box-sizing: border-box;
            width: 100%;
            padding: 8px;
            background: transparent;
            outline: none;
            border: 3px solid #ddd;
            border-radius: 10px;
            margin: 10px 0px;
        }

        input[type=submit] {
            box-sizing: border-box;
            border: 3px solid #ddd;
            border-radius: 10px;
            background: transparent;
            color: white;
            padding: 15px;
            font-size: larger;

        }

        span {
            display: block;
            color: red;
        }
    </style>
</head>

<body>
    <form action="../assets/submit.php" method="post" onsubmit=" return validation()">
        <h1 style="color:white;">Registration Form</h1>
        <hr><br>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <span id="nameerr"></span>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <span id="emailerr"></span>

        <label for="phone">Mobile</label>
        <input type="text" name="phone" id="phone" required>
        <span id="mobileerr"></span>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <span id="passerr"></span>

        <label for="password">Confirm Password</label>
        <input type="password" name="confpassword" id="confpassword" required>
        <span id="confpasserr"></span>

        <input type="submit" name="submit" value="Submit">
    </form>
    <script src="../js/javascript.js"></script>
</body>

</html>