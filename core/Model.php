<?php
namespace Kibalanga\Core;

use mysqli;

class Model
{
    protected $db;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/config.php';
        $this->db = new mysqli(
            $config['db']['host'],
            $config['db']['username'],
            $config['db']['password'],
            $config['db']['database']
        );

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }
}
