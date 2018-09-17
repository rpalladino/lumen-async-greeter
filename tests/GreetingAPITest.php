<?php

use App\Greeting;
use App\Jobs\GreetingJob;
use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class GreetingAPITest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

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

    /**
     * @test
     */
    public function getNamesThatHaveBeenGreeted()
    {
        $alexa = factory(Greeting::class)->create(['name' => 'Alexa']);
        $brian = factory(Greeting::class)->create(['name' => 'Brian']);

        $this->get('/greetings');

        assertThat($this->response->content(), containsString('Alexa'));
        assertThat($this->response->content(), containsString('Brian'));
    }
}
