<?php

namespace Deliverea\CoffeeMachine\Tests\Integration;

use Deliverea\CoffeeMachine\Console\MysqlPdoClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;

class IntegrationTestCase extends TestCase
{
    /** @var Application */
    protected $application;
    /** @var \PDO */
    protected $pdo;

    protected function setUp()
    {
        parent::setUp();

        $this->application = new Application();

        $this->pdo = MysqlPdoClient::getPdo();

        $this->pdo->beginTransaction();
    }

    protected function tearDown()
    {
        $this->pdo->rollBack();
        unset($this->pdo);

        parent::tearDown();
    }
}
