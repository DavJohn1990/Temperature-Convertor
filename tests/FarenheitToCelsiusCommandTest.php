<?php

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class FarenheitToCelsiusCommandTest extends KernelTestCase
{

    public function testCelsiusConvertedToFarenheit()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:farenheit-to-celsius');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'farenheit' => '86'

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ]);

        $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('30 Celsius', $output);
    }
}