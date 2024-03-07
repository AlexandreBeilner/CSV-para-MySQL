<?php

namespace Classes;

class CSVData
{
    private array $data;
    private string $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    private function searchInFile(): array
    {
        $file = fopen($this->fileName, 'r');
        if (!$file) {
            die("Não foi possivel abrir o arquivo");
        }
        fgets($file);
        while (($line = fgets($file)) !== false) {
            $this->data[] = explode(';', $line);
        }
        fclose($file);
        return $this->data;
    }

    public function getCollumns()
    {
        $file = fopen($this->fileName, 'r');
        if (!$file) {
            die("Não foi possivel abrir o arquivo");
        }
        $column = fgets($file);
        fclose($file);
        return explode(";", $column);
    }

    public function getData(): array
    {
        return $this->searchInFile();
    }

}
