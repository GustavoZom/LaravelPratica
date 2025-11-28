<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

// Verificar se o arquivo SQLite existe
$databasePath = __DIR__ . '/database/database.sqlite';
if (!file_exists($databasePath)) {
    touch($databasePath);
    echo "Arquivo database.sqlite criado!\n";
}

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

try {
    $kernel->call('migrate', ['--force' => true]);
    echo "Migrations executadas com sucesso!\n";
} catch (Exception $e) {
    echo "Erro nas migrations: " . $e->getMessage() . "\n";
}
?>