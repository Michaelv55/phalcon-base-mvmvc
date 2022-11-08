<?php

declare(strict_types=1);

use Phalcon\Incubator\Test\PHPUnit\UnitTestCase;
use PHPUnit\Framework\IncompleteTestError;
use Phalcon\Di\FactoryDefault;
use Phalcon\Di;

abstract class AbstractUnitTest extends UnitTestCase {

    protected static FactoryDefault $phalconDi;

    protected function setUp(): void {
        try {
            $this->checkExtension('phalcon');

            // Reset the DI container
            Di::reset();

            // Instantiate a new DI container
            $diBase = new Di();

            if(!in_array($this->getPhalconConfigPath(), get_included_files())){
                include $this->getPhalconConfigPath();
                self::setPhalconDi($di);
            }

            // set the app services for tests
            foreach (self::getPhalconDi()->getServices() as $name => $service) {
                $diBase->setService($name, $service);
            }

            $this->setDI($diBase);
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