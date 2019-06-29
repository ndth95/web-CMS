<?php
// This function is going to make the connection with the databse
class Database_Connection {
    private static $hostname;
    private static $username;
    private static $userpass;
    private static $tablename;
    private static $connection;
    
    public function __construct($hostname, $username, $userpass, $tablename){
        self::$hostname = $hostname;
        self::$username = $username;
        self::$userpass = $userpass;
        self::$tablename = $tablename;
    }
    
    public function establishConnection(){
        self::$connection = mysqli_connect(self::$hostname, self::$username, self::$userpass, self::$tablename);
        if (!self::$connection){
            die("<p><b>Connection Failed !!!</b></p>" . mysqli_errno(self::$connection));
            return -1;
        } else {
            return self::$connection;
        }
    }
    
    public function database_shield($user_string){
        $databaseConn = self::establishConnection();
        $user_string = mysqli_real_escape_string($databaseConn, $user_string);
        return $user_string;
    }
    
    public function closeConnection(){
        mysqli_close(self::$connection);
    }
    
    // The input of the command in this function must be a sql statement
    public function getData($sqlCmd){
        $tempConnection = self::establishConnection();
        $sqlCmd = mysqli_real_escape_string($tempConnection, $sqlCmd);
        $queryStatus = mysqli_query($tempConnection, $sqlCmd);
        if (!$queryStatus){
            die("<p><b>Query Failed !!!</b></p>" . mysqli_error($tempConnection));
            self::closeConnection();
            return -1;
        } else {
            $counter = mysqli_num_rows($queryStatus);
            if ($counter > 0){
                $datalist = array();
                while ($row = mysqli_fetch_assoc($queryStatus)){
                    $datalist[] = $row;
                }
            } else {
                return -1;
            }
        }
        return $datalist;
    }

    // Query Data
    public function queryDatabase($sqlCommand){
        $connection = self::establishConnection();
        $queryStatus = mysqli_query($connection, $sqlCommand);
        if (!$queryStatus){
            return $queryStatus;
        } else {
            return -1;
        }
    }
}
?>










