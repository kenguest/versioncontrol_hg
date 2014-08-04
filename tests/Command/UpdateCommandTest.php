<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class UpdateCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function updateCommand()
    {
        /* @var $updateCmd \Siad007\VersionControl\HG\Command\UpdateCommand */
        $updateCmd = Factory::getInstance('update');
        $updateCmd->setClean(true);
        $updateCmd->setCheck(true);
        $updateCmd->setDate('date');
        $updateCmd->setRev('rev');

        $expected = 'hg update --clean --check --date date --rev rev';

        $this->assertSame($expected, $updateCmd->run(true));
    }
}
