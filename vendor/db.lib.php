<?php 


class DBException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    
}


class DB{
    private $conn;

    public function __construct(string $cn, string $username, string $passwd = ""){
        $this->conn = new PDO($cn,$username,$passwd);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query(string $tableName, array $params){
       
        $query = "SELECT * FROM $tableName";

            
        if (!empty($params)) {
            $conditions = [];
            foreach ($params as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results ?? [];
    }

    public function insert(string $tableName, array $data)
{


    $columns = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    try {
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->conn->lastInsertId();
    } catch (PDOException $ex) {
        return $ex->getMessage();
    }
}





    public function deleteByCondition(string $tableName, array $data) {
        $whereClause = implode(' AND ', array_map(fn($column) => "$column = :$column", array_keys($data)));
        
        $query = "DELETE FROM $tableName WHERE $whereClause";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
    
        return $stmt->rowCount(); 
    }
    


    public function update(string $tableName, array $data, string $whereCondition = null) {
        $columns = implode(', ', array_keys($data));
        $setValues = implode(', ', array_map(fn($column) => "$column = :$column", array_keys($data)));
        
        $query = "UPDATE $tableName SET $setValues";
    
        if ($whereCondition) {
            $query .= " WHERE $whereCondition";
        }
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);
        return $stmt->rowCount(); 
    }
    
}



?>                      