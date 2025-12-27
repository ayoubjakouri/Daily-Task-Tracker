<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class GenerateReccuringTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-recurring-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate daily recurring tasks for all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        User::chunk(100, function ($users) use ($today) {

            if ($users->isEmpty()) {
                $this->warn('No users found');
                return;
            }

            foreach ($users as $user) {

                $category = Category::firstOrCreate([
                    'user_id' => $user->id,
                    'name' => 'work',
                ], [
                    'description' => 'Auto-created work category',
                ]);

                $taskExists = Task::where('user_id', $user->id)
                    ->where('category_id', $category->id)
                    ->where('title', 'Plan your day')
                    ->whereDate('due_date', $today)
                    ->exists();

                if ($taskExists) {
                    $this->line("Task already exists for user {$user->id}");
                    continue;
                }

                try {
                    DB::transaction(function () use ($user, $category, $today) {
                        Task::create([
                            'title' => 'Plan your day',
                            'description' => 'Daily: plan your day',
                            'due_date' => $today,
                            'completed_at' => null,
                            'user_id' => $user->id,
                            'category_id' => $category->id,
                        ]);
                    });

                    $this->info("Task created for user {$user->id}");
                } catch (QueryException $e) {
                    $this->line("Duplicate prevented for user {$user->id}");
                } catch (\Exception $e) {
                    $this->error("Failed creating task for user {$user->id}: {$e->getMessage()}");
                }
            }
        });

        $this->info('Recurring taks generation completed.');

        return Command::SUCCESS;
    }
}
