<?php 

namespace App\Db;
use \PDO;
use \PDOException;

class Database{
    const HOST = 'localhost';
    const NAME = 'wdev_vagas';
    const USER = 'root';
    const PASS = '';

    /**
    * Nome da tabela a ser manipulado
    * @return string
    */
    private $table;

    /**
    * Instancia de conexão com o banco de dados
    * @return PDO
    */
    private $connection;

    /**
     * Define a tabela e a instancia da conexão
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
    * Método responsável por criar a conexão com o banco de dados
    */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    /**
    * Médoto responsável por executar as queries dentro do banco de dados
    * @param string $query
    * @param array $params
    * @return PDOStatement
    */
    private function execute($query, $params = [])
    {
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    /**
    * Método responsável por cadastrar no banco de dados
    * @param array $values [ field => value ]
    * @return último id inserido
    */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = "INSERT INTO ". $this->table ." (". implode(', ', $fields) .") VALUES (". implode(',', $binds) .")";
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }
}