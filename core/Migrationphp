<?php

namespace Kibalanga\Core;

use PDO;

class Migration
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Run all the migrations
    public function run()
    {
        $this->createMigrationsTable();
        $migrations = $this->getPendingMigrations();

        if (empty($migrations)) {
            echo "All migrations are up to date.\n";
            return;
        }

        foreach ($migrations as $migration) {
            require_once 'database/migrations/' . $migration;
            $migrationClass = pathinfo($migration, PATHINFO_FILENAME);
            $this->{$migrationClass}();
            $this->markMigrationAsRun($migration);
            echo "Migrated: $migrationClass\n";
        }
    }

    // Create the migrations table if it doesn't exist
    private function createMigrationsTable()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->pdo->exec($query);
    }

    // Get a list of migrations that have not been run yet
    private function getPendingMigrations()
    {
        $migrated = $this->getMigratedMigrations();
        $allMigrations = scandir(__DIR__ . '/../database/migrations');

        // Filter out the migrations that have already been run
        return array_diff($allMigrations, $migrated);
    }

    // Get a list of migrations that have already been run
    private function getMigratedMigrations()
    {
        $stmt = $this->pdo->query('SELECT migration FROM migrations');
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Mark a migration as run in the migrations table
    private function markMigrationAsRun($migration)
    {
        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES (:migration)");
        $stmt->execute(['migration' => $migration]);
    }
}
