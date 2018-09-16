<?php

use Illuminate\Http\Response;

class GreetingAPITest extends TestCase
{
    /**
     *
     * @test
     * @return void
     */
    public function shouldAcceptNewGreeting()
    {
        $this->post('/greetings/alexa');

        assertThat($this->response->status(), is(Response::HTTP_ACCEPTED));
    }
}
