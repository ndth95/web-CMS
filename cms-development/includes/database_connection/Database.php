<?php

class Database{
     function makeConnection() {
        $databaseConnection = mysqli_connect(hostname, username, userpass, tablename);
        if (!$databaseConnection) {
            die('<p><b>Connection Failed !!!</b></p>' . mysqli_error($databaseConnection));
            return -1;
        } else {
            return $databaseConnection;
        }
    }

    function killConnection($connection){
         mysqli_close($connection);
    }

    function queryDatabase($queryCommand){
         $connection = $this->makeConnection();
         $queryStatus = mysqli_query($connection, $queryCommand);
         if (!$queryStatus){
             echo "<p><b>Query Failed !!!</b></p>" . mysqli_error($connection);
             $this->killConnection($connection);
             return -1;
         } else {
             return $queryStatus;
         }
    }

    public function getData($sqlCmd){
         $connection = $this->makeConnection();
         $sqlCmd = mysqli_real_escape_string($connection, $sqlCmd);
         $queryStatus = $this->queryDatabase($sqlCmd);
         if ($queryStatus){
             $counter = mysqli_num_rows($queryStatus);
             if ($counter > 0){
                 $datalist = array();
                 while ($row = mysqli_fetch_assoc($queryStatus)){
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


}
?>