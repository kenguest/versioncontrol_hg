<?php

namespace Siad007\VersionControl\HG\Tests;

use Siad007\VersionControl\HG\Factory;

class FactoryTest extends Helpers\TestCase
{
    /**
     * @test
     */
    public function instantiateHgCommands()
    {
        $commands = [
            'clone',
            'init',
            'paths',
            'pull',
            'push',
            'root',
            'summary',
            'tags',
            'update',
            'verify',
            'version'
        ];

        foreach ($commands as $command) {
            $this->assertInstanceOf(
                sprintf('Siad007\VersionControl\HG\Command\%sCommand', $command),
                Factory::getInstance($command)
            );
        }
    }

    /**
     * @test
     */
    public function privateConstructor()
    {
        $refClass  = new \ReflectionClass('\\Siad007\\VersionControl\\HG\\Factory');
        $refMethod = $refClass->getConstructor();

        $this->assertTrue($refMethod->isPrivate());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function notExistingCommand()
    {
        Factory::getInstance('test');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function invokeByNonCreate()
    {
        Factory::nonExisting('test');
    }
}
