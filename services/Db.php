<?php
namespace app\services;

class Db{

    private static $_instance = null;
    
    private $config = [
        'driver' => 'mysql',
        'host' => '185.80.130.82',
        'login' => 'php1user',
        'password' => 'php1user',
        'database' => 'php1L7',
        'charset' => 'utf8'
    ];

	private function __construct () {
            self::$_instance = new \PDO(
            $this->prepareDsnString(),
            $this->config['login'],
            $this->config['password']
            );
            //self::$_instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            self::$_instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            self::$_instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return self::$_instance;
	}

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance(){
		if (self::$_instance != null) {
			return self::$_instance;
		}
		return new self;
	}

    private function query(string $sql, array $params = []){
        $pdoStatement = $this->getInstance()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
}

    public function queryOne(string $sql, array $params = []){
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = []){
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params = []){
        $this->query($sql, $params);
    }

    private function prepareDsnString(): string{
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}
