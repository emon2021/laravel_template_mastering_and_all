<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class generateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category {count}'; //this is a new command that i created

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create automatic category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $category = $this->argument('count');
        for($i=0;$i<=$category;$i++)
        {
            Category::factory()->create();
        }
    }
}
