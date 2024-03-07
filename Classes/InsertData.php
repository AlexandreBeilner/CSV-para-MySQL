<?php
namespace Classes;
require_once ("DB.php");
class InsertData
{
    private array $collumn;
    private array $datas;
    private string $tableName;

    public function __construct(array $collumn, array $data, string $tableName)
    {
        $this->datas = $data;
        $this->collumn = $collumn;
        $this->tableName = $tableName;
    }

    private function setKeys(): string{
        return str_replace('ç', 'c', strtolower(implode(",", $this->collumn)));
    }

    private function setValues(array $data):string{
        return "'" . implode("','", $data) . "'";
    }

    public function execute(){
        $conn = new DB();
        $keys = $this->setKeys();
        foreach ($this->datas as $data){
            $values = $this->setValues($data);
            $sqlQuery = "INSERT INTO $this->tableName ($keys) VALUES ($values)";
            $conn->getConn()->query($sqlQuery);
        }
        $conn->getConn()->close();
    }
}
