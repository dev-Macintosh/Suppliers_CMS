<?
namespace App;
use App;
use View;
class Db 
{

    public static $pdo;
    
    public function __construct()
    {
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $settings = $this->getPDOSettings();

        try {
            $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], $options);
       } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
       }
        
    }
    
    protected function getPDOSettings()
    {
        $config = include ROOTPATH.DIRECTORY_SEPARATOR.'app\\config'.DIRECTORY_SEPARATOR.'db_cfg.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;       
    }
    
    public function execute($query, array $params=null)
    {
        
        if(is_null($params)){
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(count($params) > 0 ? $params : null );
        return $stmt->fetchAll();
        
    }    
}