<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FahrenheitToCelsiusCommand extends Command
{
    protected static $defaultName = 'app:farenheit-to-celsius';
    protected static $defaultDescription = 'Convert a fahrenheit temperature to celsius';

    protected function configure(): void
    {
        $this
            ->addArgument('farenheit', InputArgument::REQUIRED, 'Fahrenheit temperature')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('farenheit');   

        if(!is_numeric($arg1)) {
            $output->writeln('farenheit must be an integer.');

            return Command::INVALID;
        }

        $cel = round(($arg1 - 32)/1.8);

        $output->writeln($cel . ' Celsius');

        return Command::SUCCESS;
    }
}
