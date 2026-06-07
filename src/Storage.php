<?php

namespace App;

use PDO;

class Storage
{
    /**
     * @var PDO
     */
    private PDO $db;

    /**
     *
     */
    public function __construct()
    {
        $this->db = new PDO('sqlite:' . __DIR__ . '/../storage/database.sqlite');
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS processed (
                auto_id INTEGER PRIMARY KEY
            )
        ");
    }

    /**
     * @param int $id
     * @return bool
     */
    public function exists(int $id): bool
    {
        $stmt = $this->db->prepare("SELECT auto_id FROM processed WHERE auto_id = ?");
        $stmt->execute([$id]);
        return (bool)$stmt->fetch();
    }

    /**
     * @param int $id
     * @return void
     */
    public function save(int $id): void
    {
        $stmt = $this->db->prepare("INSERT OR IGNORE INTO processed(auto_id) VALUES(?)");
        $stmt->execute([$id]);
    }
}
