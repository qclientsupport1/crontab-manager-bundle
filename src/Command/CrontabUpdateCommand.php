<?php

namespace Acrnogor\CrontabManagerBundle\Command;

use Acrnogor\CrontabManagerBundle\Manager\CrontabManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CrontabUpdateCommand extends Command
{
    private $crontabManager;

    protected static $defaultName = 'acrnogor:crontab:update';

    public function __construct(CrontabManager $crontabManager)
    {
        $this->crontabManager = $crontabManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('acrnogor:crontab:update')
            ->setDescription('Update crontab with cron jobs added to configuration')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('<comment> > Updating crontab ... </comment>');
        $success = $this->crontabManager->update();
        $success ? $output->writeln('<info>DONE</info>') : $output->writeln('<error>ERROR</error>');
    }
}
