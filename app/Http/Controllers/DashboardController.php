<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();

        $categoriesWithTasks = Category::where('user_id', $user->id)
        ->with(['tasks' => function ($q) {
            $q->latest()->take(5);
        }])
        ->latest()
        ->get();

        return view('dashboard', [
            'categoriesWithTasks' => $categoriesWithTasks,
            'totalTasks' => Task::where('user_id', $user->id)
                ->count(),

            'completedToday' => Task::where('user_id', $user->id)
                ->whereDate('completed_at', $today)
                ->count(),

            'overdueTasks' => Task::where('user_id', $user->id)
                ->whereNull('completed_at')
                ->whereDate('due_date', '<', $today)
                ->count(),

            // Recent
            'recentCategories' => Category::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get(),

            'recentTasks' => Task::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get(),


        ]);
    }
}
