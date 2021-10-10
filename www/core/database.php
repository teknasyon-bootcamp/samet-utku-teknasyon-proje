<?php 
namespace Core;
class database  extends \PDO
{
	public $pdo;
	public $table;
	public $data;
	public function __construct() { 
		$config = \Core\classes\config::get();
		$db = $config['db'];
		$this->pdo = new \PDO("mysql:host=".$db['host'].";dbname=".$db['dbname'], $db['user'], $db['password'], $db['options']);
		return $this;
	}
	public function connect(
		$db=[]
	) { 
		$this->pdo = new \PDO("mysql:host=".$db['host'], $db['user'], $db['password'], $db['options']);
		return $this;
	}
	public function return()
	{
		return $this->data;
	}
	public function beginTransaction()
	{
		$this->pdo->beginTransaction();
		return $this;
	}
	public function commit()
	{
		$this->pdo->commit();
		return $this;
	}
	public function rollBack()
	{
		$this->pdo->rollBack();
		return $this;
	}
	public function inTransaction()
	{
		$this->pdo->inTransaction();
		return $this;
	}

	public function all()
    {
		$table = $this->table;
        $query = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($query);
        $statement->execute(); 
        $this->data = $statement->fetchAll(self::FETCH_ASSOC);
        return $this;
    }
	public function find(array $values): mixed
    {
		$table = $this->table;
        $whereSerialize = $this->serialize($values,'where');
        $query = "SELECT * FROM $table WHERE $whereSerialize";
        $statement = $this->pdo->prepare($query);
        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value); 
        }
        $statement->execute(); 
        $result = $statement->fetchAll(self::FETCH_ASSOC);
		$this->data = $result;
		return $this;
    }

	public function create(array $values) 
    {
		$table = $this->table;
        $columnSerialize = $this->serialize($values,'column');
        $valuesSerialize = $this->serialize($values,'value'); 
        $query = "INSERT INTO $table($columnSerialize) values($valuesSerialize)";
        $statement = $this->pdo->prepare($query);
        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value); 
        }
        $result = $statement->execute(); 
		$this->data = $result;
		return $this;
    }
	public function update(mixed $id, array $values)
    {
		$table = $this->table;
        $setSerialize = $this->serialize($values,'set');
        $query = "UPDATE $table SET $setSerialize WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }
        $statement->bindValue(":id", $id);

        $result = $statement->execute();
		$this->data = $result;
		return $this;
    }
    public function delete(mixed $id) 
    {
		$table = $this->table;
        $query = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($query);
        $result = $statement->execute([
            'id' => $id
        ]);
        $this->data = $result;
		return $this;
    }
	public function serialize(array $values, string $type)
    {
        $propertiesCounter = 1;
        $result = '';
        foreach ($values as $column => $value )
        {
            if ($propertiesCounter > 1) 
            {
                if ($type == 'where') 
                {
                    $result .= " and "; 
                }
                else
                {
                    $result .= ","; 
                }
            }
            if ($type == 'value') 
            {
                $result .= ":$column";
            }
            elseif ($type == 'column') 
            {
                $result .= $column;
            }
            elseif ($type == 'set' || $type == 'where') 
            {
                $result .= "$column=:$column"; 
            }
            $propertiesCounter++; 
        }
		return $result;
	}
}