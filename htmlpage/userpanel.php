<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:../indexd.php?loggedin=false");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .container {
            width: 300px;
            border: 1px solid black;
            height: 100px;
            display: inline-block;
            background-color: gray;
        }

        li {
            text-align: center;
            font-size: 30px;
            list-style: none;
            color: white;
        }

        h1 {
            background-color: black;
            color: white;
            font-size: 60px;
            text-align: center;


        }

        a {
            text-decoration: none;
            color: white;
        }

        table {
            /* position: absolute;
            top: 20%;
            left: 10%; */
            margin-left: 300px;
            border-collapse: collapse;
            border-spacing: 0;
            width: 900px;
            border: 1px solid #ddd;
            margin-left: 300px;
        }

        th,
        td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1> Admin Panel</h1>
    <div class="container">
        <li>
            <?php
            echo $_SESSION['user_name'];
            ?>
        </li>
        <hr color=red>
        <li>
            <a href="../assets/logout.php?t=1">Log Out</a>
        </li>
        <hr color=red>
    </div>
    <table>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Mobile</td>
        </tr>
        <?php
         
        require '../assets/dbconnect.php';
        $sql = " SELECT * FROM `register`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { // show table data
            echo "<tr>
            
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['mobile'] . "</td>
        </tr>";
        }
        ?>
    </table>
    <?php
    if (isset($_POST['submit'])) {
        
        $filename = $_FILES['csv']['name'];
        $tmpname = $_FILES['csv']['tmp_name'];
        $dir = '';
        $target = $dir . $filename;
        move_uploaded_file($tmpname, $target); //insert file to folder

        require '../assets/csvInsertClass.php';
        $obj = new csv(); //create object
        $dir = $_FILES['csv']['name'];

        if (!$obj->isTableExist($dir)) { 
            $obj->createTable($dir);
            $obj->insertData($dir);
        } else {
            echo "Table Already Exist";
        }
    }

    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="csv" id="csv" required>
        <input type="submit" name="submit" id="csv">
    </form>

    <table>
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>DOB</td>
        </tr>
        <?php
        // require '../assets/dbconnect.php';
        // $sql = " SELECT * FROM `data`";
        // $result = mysqli_query($conn, $sql);
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo "<tr>

        //     <td>" . $row['name'] . "</td>
        //     <td>" . $row['age'] . "</td>
        //     <td>" . $row['dob'] . "</td>
        // </tr>";
        // }
        ?>
    </table>
</body>

</html>