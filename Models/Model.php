<?php

use Ramsey\Uuid\Converter\Number\DegradedNumberConverter;

class Model
{

    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'pw_trabalho';
    private $port = 3306;
    private $user = 'root';
    private $password = '';
    protected $table;
    protected $conex;
    public function __construct()
    {
        // descobre nome tabela
        $tbl = strtolower(get_class($this));
        $tbl .= 's';
        $this->table = $tbl;
        $this->conex = new PDO("{$this->driver}:host={$this->host}; port={$this->port}; dbname={$this->dbname}", $this->user, $this->password);
    }

    public function getAll($where = false, $whereGlue = 'AND')
    {
        if ($where) {
            $where_sql = $this->whereFields($where, $whereGlue);
            $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE {$where_sql}");
            $sql->execute($where);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = $this->conex->query("SELECT * FROM {$this->table}");
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function getById($id)
    {
        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $sql->execute([$id]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table}";

        $sqlFields = $this->sqlFields($data);

        $sql .= " SET {$sqlFields}";

        $insert = $this->conex->prepare($sql);

        $insert->execute($data);

        return $insert->errorInfo();
    }
    public function update($data, $id)
    {
        unset($data['id']);
        $sql = "UPDATE {$this->table}";
        $sql .= ' SET ' . $this->sqlFields($data);

        $sql .= ' WHERE id = :id';

        $data['id'] = $id;

        $upd = $this->conex->prepare($sql);
        $upd->execute($data);

        // $error = $upd->errorInfo();
        // var_dump($error);die;

    }

    private function mapFields($data)
    {
        foreach (array_keys($data) as $field) {
            $sqlFields[] = "{$field} = :{$field}";
        }
        return $sqlFields;
    }

    private function sqlFields($data)
    {
        $sqlFields = $this->mapFields($data);
        return implode(',', $sqlFields);
    }

    private function whereFields($data, $comp = 'AND')
    {
        $comp = $comp == 'OR' ? ' OR ' : ' AND ';
        $fields = $this->mapFields($data);
        return implode($comp, $fields);
    }
}
