<?php

namespace Acrnogor\CrontabManagerBundle\Manager;

use QAlliance\CrontabManager\Writer;

class CrontabManager
{
    private $writer;

    private $cronJobs = [];

    public function __construct(Writer $writer, array $cronJobs)
    {
        $this->writer = $writer;
        $this->cronJobs = $cronJobs;
    }

    public function update(): bool
    {
        return $this->writer->updateManagedCrontab($this->cronJobs);
    }

    public function getWriter(): Writer
    {
        return $this->writer;
    }
}