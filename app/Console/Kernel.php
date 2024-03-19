<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            try {
                $posts = DB::table('mstpost')->where('content_type', 'story')->get();
                foreach ($posts as $post) {
                    $postedDate = Carbon::parse($post->posted_date);
                    $twentyFourHoursAgo = Carbon::now()->subHours(24);
                    if ($postedDate <= $twentyFourHoursAgo) {
                        DB::table('mstpost')->where('postId', $post->postId)->delete();
                        Log::info('Story Deleted: ' . $post->postId);
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error executing scheduled task: ' . $e->getMessage());
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
