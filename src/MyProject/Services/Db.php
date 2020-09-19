<?php

namespace MyProject\Services;

class Db {

    private static $instance;

    /** @var \PDO  */
    private $pdo;

    private function __construct() {
        $dbOptions = (require __DIR__.'/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:hostname='.$dbOptions['host'].':dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('SET NAMES UTF8');
        $this->pdo->prepare("USE badma3581g")->execute();
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query(string $sql, $params = [], string $classNamme = 'stdClass'): ?array {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $classNamme);
    }

    public function getLastInsertId(): int {
        return (int) $this->pdo->lastInsertId();
    }
}
