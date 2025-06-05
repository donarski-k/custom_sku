<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Cron;

use Kdev\CustomSku\Model\TableCleaner;

class CleanTable
{
    public function __construct(
        private TableCleaner $tableCleaner,
    ) {}

    public function execute(): void
    {
        $this->tableCleaner->execute();
    }
}
