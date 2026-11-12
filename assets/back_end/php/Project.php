<?php

class Project
{
    private $banco;
    private $manager;

    public function __construct($banco)
    {
        $this->banco = $banco;
        if (!extension_loaded('mongodb')) {
            throw new RuntimeException('Extensão mongodb ausente. Consulte INSTALACAO.md.');
        }
        $this->manager = new MongoDB\Driver\Manager($banco['uri']);
    }

    private function path($path)
    {
        return dirname(__DIR__, 3) . '/' . $path;
    }

    public function getJson(string $caminho)
    {
        $contents = file_get_contents($this->path($caminho));
        if ($contents === false) {
            throw new RuntimeException('Não foi possível ler: ' . $caminho);
        }
        $data = json_decode($contents, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)
            || array_values($data) !== $data) {
            throw new RuntimeException('JSON inválido ou fora do formato de lista: ' . $caminho);
        }
        foreach ($data as $document) {
            if (!is_array($document)) {
                throw new RuntimeException('Documento inválido: ' . $caminho);
            }
        }
        return $data;
    }

    public function setJson(string $caminho, array $array)
    {
        $json = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if ($json === false || file_put_contents($this->path($caminho), $json, LOCK_EX) === false) {
            throw new RuntimeException('Não foi possível exportar: ' . $caminho);
        }
    }

    public function updateData($force = false)
    {
        // Valida todos os arquivos e verifica todas as coleções antes de escrever.
        $datasets = [];
        foreach ($this->banco['collections'] as $collection => $config) {
            $datasets[$collection] = $this->getJson($config['file']);
            $query = new MongoDB\Driver\Query([], ['limit' => 1]);
            $cursor = $this->manager->executeQuery($this->banco['nomeDB'] . '.' . $collection, $query);
            if (!$force && count($cursor->toArray()) > 0) {
                throw new RuntimeException('Banco já contém dados. Faça backup; use --force somente para substituir.');
            }
        }
        foreach ($datasets as $collection => $documents) {
            $bulk = new MongoDB\Driver\BulkWrite;
            if ($force) {
                $bulk->delete([]);
            }
            foreach ($documents as $document) {
                unset($document['_id']);
                $bulk->insert($document);
            }
            if ($force || count($documents) > 0) {
                $this->manager->executeBulkWrite($this->banco['nomeDB'] . '.' . $collection, $bulk);
            }
            echo $collection . ': ' . count($documents) . " documentos\n";
        }
    }

    public function downloadData()
    {
        foreach ($this->banco['collections'] as $collection => $config) {
            $query = new MongoDB\Driver\Query([]);
            $cursor = $this->manager->executeQuery($this->banco['nomeDB'] . '.' . $collection, $query);
            $list = [];
            foreach ($cursor as $document) {
                $row = (array) $document;
                unset($row['_id']);
                $list[] = $row;
            }
            $this->setJson($config['file'], $list);
            echo $collection . ': ' . count($list) . " documentos\n";
        }
    }
}
