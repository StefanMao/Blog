<?php 

class Dbh {
    private $dbh;
    private $error;

    public function __construct() {
        $this->dbh = new PDO("mysql:dbname=blog;host=localhost;", 'root', '5566');
        $this->dbh->exec("SET CHARACTER SET utf8");
    }

    public function executeQuery($query) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();
        $this->error = $this->dbh->errorInfo();
    }

    public function executeSelect($query) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();

        $this->error = $this->dbh->errorInfo();
        //print_r($this->error);

        $entry = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r($entry);

        return $entry;
    }

    public function login_data($query,&$dbusername,&$dbuserpassword)
    {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();
        

        //$row_result = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if($row_result=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $dbusername=$row_result['username'];
            $dbuserpassword=$row_result["password"];
             //print_r($dbusername);
             //print_r($dbuserpassword);            
            return true; //有找到符合的帳號資料
        }
        else
        {
            return false;//沒有找到符合的帳號資料
        }



    }
}

?>