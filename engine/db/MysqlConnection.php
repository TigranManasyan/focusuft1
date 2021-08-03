<?php /** @noinspection ALL */

namespace engine\db;
use engine\Application;

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
    public function __construct() {

        $this->hostname = Application::$configs

        /* try {
             $this->pdo = new PDO('mysql:host=localhost;dbname=framework','root','');
             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             return $this->pdo;
         } catch (PDOException $error) {
             echo $error->getMessage();
         }*/
    }

}