<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Jobs\GreetingJob;

class GreetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Accept a new greeting.
     *
     * @return Response
     */
    public function acceptNewGreeting() : Response
    {
        dispatch(new GreetingJob());

        return response(null, Response::HTTP_ACCEPTED);
    }
}
