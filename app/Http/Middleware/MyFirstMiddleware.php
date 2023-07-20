<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyFirstMiddleware
{
    private $users;
    public function __construct(User $users){
        $this->users = $users;
    }
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if($this->users->count() >= 6)
            return $response;

        dd("menos que 6");
    }
}
