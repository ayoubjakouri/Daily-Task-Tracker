<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class generateRecurringCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-recurring-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::chunk(100, function ($users) {

            if ($users->isEmpty()) {
                $this->line('No users found');
                return;
            }
            foreach ($users as $user) {

                $isCategoryExists = Category::firstOrCreate(
                    [
                        'user_id' => $user->id,
                        'name' => 'Personal'
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
                
                if($isCategoryExists){
                    $this->line("Category already exists for user {$user->id}");
                    continue;
                }

                $this->info("Category create for user {$user->id}");
            }

            $this->info(' Recurring Category generation completed ! ');
            return Command::SUCCESS;
        });
    }
}
