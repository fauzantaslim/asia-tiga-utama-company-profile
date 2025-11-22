<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\About;
use Spatie\Activitylog\Models\Activity;

class TestActivityLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-activity-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the activity log functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get existing About record or create one
        $about = About::first();

        if (!$about) {
            $about = About::create([
                'description' => 'Test Description',
                'vision' => 'Test Vision',
                'mission' => 'Test Mission'
            ]);
            $this->info('Created About record with ID: ' . $about->id);
        } else {
            $this->info('Using existing About record with ID: ' . $about->id);
        }

        // Update the record
        $about->update([
            'description' => 'Updated Test Description'
        ]);

        $this->info('Updated About record');

        // Get the activities
        $activities = Activity::latest()->limit(5)->get();

        $this->info('Recent activities logged: ' . $activities->count());

        foreach ($activities as $activity) {
            $this->line('Activity: ' . $activity->description . ' on ' . $activity->created_at);
        }

        $this->info('Test completed successfully!');
    }
}
