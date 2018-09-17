<?php

namespace App\Jobs;

use App\Greeting;

class GreetingJob extends Job
{
    private $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() : void
    {
        $greeting = new Greeting();
        $greeting->name = $this->name;
        $greeting->save();
    }
}
