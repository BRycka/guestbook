<?php

class GuestbookData
{

    // database object
    var $pdo = null;

    /* set database settings here! */
    // PDO database type
    var $dbtype = 'mysql';
    // PDO database name
    var $dbname = 'GUESTBOOK';
    // PDO database host
    var $dbhost = 'localhost';
    // PDO database username
    var $dbuser = 'root';
    // PDO database password
    var $dbpass = '';

    /**
     * class constructor
     */
    function __construct()
    {
        // instantiate the pdo object
        try {
            $dsn = "{$this->dbtype}:host={$this->dbhost};dbname={$this->dbname}";
            $this->pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    function isUserExists($name, $password)
    {
        if ($this->findUser($name, $password) != null) {
            return true;
        }
        return false;
    }

    function findUser($name, $password)
    {
        try {
            $result = $this->pdo->prepare("select * from user where Name = ? AND Password = ? LIMIT 1");
            $result->execute(array($name, $password));
            if ($result->rowCount() == 1) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
        }
        return null;
    }

    function findAllEntries()
    {
        $rows = array();
        try {
            foreach ($this->pdo->query(
                         "select * from GUESTBOOK order by EntryDate DESC") as $row)
                $rows[] = $row;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            return false;
        }
        return $rows;
    }

    function isUserEmailExists($email)
    {
        try {
            $result = $this->pdo->prepare("select * from user where Email = ? LIMIT 1");
            $result->execute(array($email));
            if ($result->rowCount() == 1) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
        }
        return false;
    }

    function addNewUser($user)
    {
        try {
            $rh = $this->pdo->prepare("insert into user values(0,:Name,:LastName,:Email,:Password)");
            $rh->execute($user);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage();
        }
    }

    function addNewEntry($entry)
    {
        try {
            $rh = $this->pdo->prepare("insert into GUESTBOOK values(0,:Name,NOW(),:Comment)");
            return $rh->execute($entry);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        return false;
    }

    function findUserNameById($id)
    {
        try {
            $result = $this->pdo->prepare("select Name from user where id = ? LIMIT 1");
            $result->execute(array($id));
            if ($result->rowCount() == 1) {
                return $result->fetchColumn(0);
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
        }
        return null;
    }
}