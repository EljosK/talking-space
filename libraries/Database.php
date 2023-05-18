<?php
class Database{ //create the Database class
    //Set the variables private, so they can only be accessed in this class
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; //handler so we can interact with database
    private $error;
    private $stmt; //used to prepare statements

    //Whatever is inside '__construct()' will be called whenever we create a new database object
    public function __construct(){
        //Set DSN
        //Set database name to the current name
        $dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->dbname;
        //Set Options
        $options = array(
            PDO::ATTR_PERSISTENT => true, //we can create one object and have multiple interactions with it
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //reflect the error code and error information
        );
        //Create a new PDO instance
        try {//try this code
            //connecting string by creating mew PDO object and passing our credentials
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        //Catch Any Errors
        catch (PDOException $e) {//if it fails we will get an error message
            $this->error = $e->getMessage();
        }
    }

    public function query($query){ //query function is going to create the statement for us
        $this->stmt = $this->dbh->prepare($query);
    }

    //Bind values
    public function bind($param, $value, $type = null){ //use bind to pick the id you won't and preventing SQL injections
        if (is_null($type)) {
            switch (true) {//check the type of input
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue ($param, $value, $type);
    }

    public function execute(){ //execute the statement
        return $this->stmt->execute();
    }

    public function resultset(){//grab the result object
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){//get only one result
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){//return the amount of rows
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){//get the id of the last item inserted
        return$this->dbh->lastInsertId();
    }

    public function beginTransaction(){
        return $this->dbh->beginTransaction();
    }

    public function endTransaction(){
        return $this->dbh->commit();
    }

    public function cancelTransaction(){
        return $this->dbh->rollBack();
            }
}