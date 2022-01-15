<?php

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CelsiusToFarenheitCommandTest extends KernelTestCase
{

    public function testCelsiusConvertedToFarenheit()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:celsius-to-farenheit');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'celsius' => '30'

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
        ]);

        $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('86 Farenheit', $output);
    }
}