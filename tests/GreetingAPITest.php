<?php

use Illuminate\Http\Response;
use App\Jobs\GreetingJob;

class GreetingAPITest extends TestCase
{
    /**
     *
     * @test
     * @return void
     */
    public function postNewGreetingShouldRespondWithAccepted()
    {
        $this->expectsJobs(GreetingJob::class);

        $this->post('/greetings/alexa');

        assertThat($this->response->status(), is(Response::HTTP_ACCEPTED));
    }
}
