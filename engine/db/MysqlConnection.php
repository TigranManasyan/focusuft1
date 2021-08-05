<?php /** @noinspection ALL */

namespace engine\db;
use engine\Application;
use PDO;
class MysqlConnection
{

    /**
     * @var PDO
     */
    public PDO $pdo;
    private string $hostname;
    private string $username;
    private string $password;
    private string $dbname;

    /**
     * MysqlConnection constructor.
     * @noinspection PhpUndefinedClassInspection
     * @noinspection PhpUndefinedMethodInspection
     */
    public function __construct($hostname, $username, $password, $dbname) {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

    }

    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->pdo;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

}