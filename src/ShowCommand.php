<?php
namespace Acme;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{
    protected function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }
}