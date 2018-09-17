<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Greeting;
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
    public function acceptNewGreeting(string $name) : Response
    {
        dispatch(new GreetingJob($name));

        return response(null, Response::HTTP_ACCEPTED);
    }

    /**
     * List greetings
     */
    public function listGreetings() : JsonResponse
    {
        $greetings = Greeting::all();

        return response()->json(['greetings' => $greetings]);
    }
}
