<?php

class Database
{
    function makeConnection()
    {
        $databaseConnection = mysqli_connect(hostname, username, userpass, tablename);
        if (!$databaseConnection) {
            die('<p><b>Connection Failed !!!</b></p>' . mysqli_error($databaseConnection));
            return -1;
        } else {
            return $databaseConnection;
        }
    }

    function killConnection($connection)
    {
        mysqli_close($connection);
    }

    function queryDatabase($queryCommand)
    {
        $connection = $this->makeConnection();
        $queryStatus = mysqli_query($connection, $queryCommand);
        if (!$queryStatus) {
            echo "<p><b>Query Failed !!!</b></p>" . mysqli_error($connection);
            $this->killConnection($connection);
            return -1;
        } else {
            return $queryStatus;
        }
    }

    function getData($sqlCmd)
    {
        $connection = $this->makeConnection();
        $sqlCmd = mysqli_real_escape_string($connection, $sqlCmd);
        $queryStatus = $this->queryDatabase($sqlCmd);
        if ($queryStatus) {
            $counter = mysqli_num_rows($queryStatus);
            if ($counter > 0) {
                $datalist = array();
                while ($row = mysqli_fetch_assoc($queryStatus)) {
                    $datalist[] = $row;
                }
            } else {
                $this->killConnection($connection);
                return -1;
            }
        } else {
            $this->killConnection($connection);
            return -1;
        }
        $this->killConnection($connection);
        return $datalist;
    }

    function category_is_exists($item){
        $item = strtolower($item);
        $sql_command = "SELECT * FROM Category";
        $cms_data = self::getData($sql_command);
        $counter = 0;
        for ($counter; $counter < sizeof($cms_data); ++$counter){
            $cat_title = $cms_data[$counter]['Cat_Title'];
            $cat_title = strtolower($cat_title);
            if ($cat_title == $item){
                return true;
            }
        }
        return false;
    }
}

?>