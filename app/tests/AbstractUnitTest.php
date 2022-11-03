<?php

declare(strict_types=1);

use Phalcon\Incubator\Test\PHPUnit\UnitTestCase;
use PHPUnit\Framework\IncompleteTestError;
use Phalcon\Di\FactoryDefault;

abstract class AbstractUnitTest extends UnitTestCase {

    protected static FactoryDefault $phalconDi;

    protected function setUp(): void {
        try {
            parent::setUp();
            if(!in_array($this->getPhalconConfigPath(), get_included_files())){
                include $this->getPhalconConfigPath();
                self::setPhalconDi($di);
            }
        } catch (\Exception $ex) {
            throw new IncompleteTestError('Error to running app (phalcon) configuration.', 500, $ex);
        }
    }

    private function getPhalconConfigPath() : string {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'app'. DIRECTORY_SEPARATOR . 'index.php';
    }

    public static function getPhalconDi() : FactoryDefault {
        return self::$phalconDi;
    }

    private static function setPhalconDi(FactoryDefault $phalconDi) : void{
        self::$phalconDi = $phalconDi;
    }

}