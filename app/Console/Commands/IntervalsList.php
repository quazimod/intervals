<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IntervalsList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intervals:list {--L|left=1} {--R|right=1000000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List intervals';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $left = $this->option('left');
        $right = $this->option('right');

        $intervals = DB::table('intervals')->select(['id', 'start', 'end'])
            ->where('start', '>=', $left)->where('end', '<=', $right)->get()->toArray();
        $result = json_decode(json_encode($intervals), true);

        $this->table(['ID', 'Left', 'Right'], $result);
    }
}
