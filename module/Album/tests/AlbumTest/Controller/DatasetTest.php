<?php
class DatasetTest extends PHPUnit_Extensions_Database_TestCase
{
    protected $connection = null;

    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('dataset.xml');
    }

    protected function setUp()
    {
        $conn=$this->getConnection();
        //$conn->getConnection()->query("set foreign_key_checks=0");
        $conn->getConnection()->query("delete from album");
        parent::setUp();
        //$conn->getConnection()->query("set foreign_key_checks=1");
    }

    protected function getConnection()
    {
        if ($this->connection === null)
        {
            $connectionString = $GLOBALS['DB_DRIVER'].':host='.$GLOBALS['DB_HOST'].';dbname='.$GLOBALS['DB_DATABASE'];
            $this->connection = $this->createDefaultDBConnection(new PDO($connectionString,$GLOBALS['DB_USER'],$GLOBALS['DB_PASSWORD']));
        }

        return $this->connection;
    }

    public function testConsumer()
    {
        $stm = $this->getConnection()->getConnection()->prepare("select * from album where id= :id");

        $stm->execute(array('id' => 2));
        $result = $stm->fetch();

        $this->assertEquals("test_artist2", $result['artist']);

        $dbTable = $this->getConnection()->createQueryTable('album', 'SELECT * FROM album');

        $datasetTable = $this->getDataSet()->getTable("album");

        $this->assertTablesEqual($dbTable, $datasetTable);
    }

    public function testInvoice()
    {
        $dataSet = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
        $dataSet->addTable('album');
        $dataSet->addTable('task_item');
        $expectedDataSet = $this->getDataSet();

        $this->assertDataSetsEqual($expectedDataSet, $dataSet);
    }
}
