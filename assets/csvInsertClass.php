<?php

class csv
{
    //create table method
    function createTable($fileName)
    {
        require '../assets/dbconnect.php';

        $file = fopen($fileName, 'r');
        while (($row = fgetcsv($file)) !== false) {
            $data[] = $row;
        }

        $fileName = explode(".", $fileName); 
        $fileName = $fileName[0]; // get file name

        $tableData = current($data); // gat column name

        $query = "CREATE TABLE `userlogin`.`$fileName` (`id` INT NOT NULL AUTO_INCREMENT,";
        for ($i = 0; $i < count(current($data)); $i = $i + 1) {
            $query .= " " . strtolower(str_replace(" ", "_", $tableData[$i])) .  " " . "VARCHAR" . "(255)" . " NOT NULL,";
        }
        $query .= "  PRIMARY KEY (`id`));";
        $result=mysqli_query($conn,$query);
    }
    
    // method to check table exist of not
    function isTableExist($fileName)
    {
        require '../assets/dbconnect.php';
        $fileName = explode(".", $fileName);
        $fileName = $fileName[0]; // get file name
        $exist = mysqli_query($conn, "SHOW TABLES LIKE'" . $fileName . "'");
        if ($exist->num_rows) {
            return true;
        } else {
            return false;
        }
    }

    //method to insert data in DB

    function insertData($fileName)
    {
        require '../assets/dbconnect.php';
        $file = fopen($fileName, 'r'); // open file
        $data = [];

        $head = fgets($file); // get column name
        print_r($head);
        $head = explode(',', $head);

        $fileName = explode(".", $fileName);
        $fileName = $fileName[0];

        $query = "INSERT INTO `$fileName` ("; // query to insert data to db
        for ($i = 0; $i < count($head); $i = $i + 1) {
            $query .= " " . strtolower(str_replace(" ", "_", $head[$i])) .  "";
            if ($i < count($head) - 1) {
                $query .= ",";
            };
        }
        while ((!feof($file))) {
            $data[] = fgetcsv($file);
        }
        $query .= " ) VALUES";
        for ($i = 0; $i < count($data); $i++) {
            $query .= "(";
            for ($j = 0; $j < count(($head)); $j++) {
                $query .= '\'' . strtolower(str_replace(" ", "_", $data[$i][$j])) . '\'';
                if ($j < count($head) - 1) {
                    $query .= ",";
                }
            }
            if ($i < count($data) - 1) {
                $query .= "),";
            }
        }
        $query .= "  );";

        echo $query;
        $result = mysqli_query($conn, $query);
        echo $result;
    }
    function isAllColumExist($fileName)  //working on that
    {
        require '../assets/dbconnect.php';
        $tableName = explode(".", $fileName);
        $tableName = $tableName[0];

        //sql query to get table columns
        $sql = "SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='$tableName'";
        $result = mysqli_query($conn, $sql);
        $columnArr = [];

        //get table header 

        while ($row = mysqli_fetch_assoc($result)) {
            if($row['COLUMN_NAME']=='id'){ continue; }
            $columnArr[] = $row['COLUMN_NAME'];

        }

        //get file header
        $file = fopen($fileName, 'r');
        $head = strtolower(str_replace(" ", "_", fgets($file)));
        $arrHead = explode(",", $head);
        // print_r(array_diff($columnArr, $arrHead));

        echo "<pre>";
        print_r($arrHead);
        echo "</pre>";

        echo "<br>";

        echo "<pre>";
        print_r($columnArr);
        echo "</pre>";

    }
}
