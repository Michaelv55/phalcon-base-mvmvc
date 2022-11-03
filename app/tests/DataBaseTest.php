<?php

declare(strict_types=1);

class DataBaseTest extends AbstractUnitTest {

    /**
     * checks if a transaction can be started and finished
     *
     * @author Michael Velasco <maicolvelasco55@gmail.com>
     * @return void
     */
    public function testConnection(): void {
        $db = AbstractUnitTest::getPhalconDi()->get('db');
        $this->assertTrue($db->begin() && $db->commit());
    }

}