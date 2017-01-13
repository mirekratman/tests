<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 17/12/14
 * Time: 10:27
 */

ERROR_REPORTING(E_ALL);
require_once __DIR__ . '/../loader.php';

use FatFree\Dao\Config\Connection\MysqlConnection;
use FatFree\Dao\Config\OrmConfig;
use Doctrine\Common\Cache\ArrayCache;
use Cds\Library\Mysql\Service\DomainService;
use Cds\Library\Mysql\Entity\CdsDomain;

class Doctrine2Test extends PHPUnit_Framework_TestCase
{
    private $domainService;

    public function __construct()
    {
        $mysqlConnection = new MysqlConnection();
        $mysqlConnection->host = 'localhost';
        $mysqlConnection->user = 'root';
        $mysqlConnection->password = '';
        $mysqlConnection->dbname = 'tdn';

        $ormConfig = new OrmConfig();
        $ormConfig->setConnection(
            $mysqlConnection
        );

        $ormConfig->setCache(new ArrayCache);
        $this->domainService = new DomainService($ormConfig);
    }

    public function orderBy()
    {
        return $this->domainService->get(new CdsDomain());
    }

    public function orderByWrong()
    {
        return $this->domainService->getWrong(new CdsDomain());
    }

    public function testOrderByWrong()
    {
        $this->assertEquals(
            self::orderBy(),
            self::orderByWrong()
        );
    }

}
