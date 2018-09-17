<?php

use App\Jobs\GreetingJob;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class GreetingJobTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @test
     */
    public function shouldCreateNewGreeting()
    {
        $subject = new GreetingJob('alexa');

        $subject->handle();

        $this->seeInDatabase('greetings', [
            'name' => 'alexa'
        ]);
    }
}
