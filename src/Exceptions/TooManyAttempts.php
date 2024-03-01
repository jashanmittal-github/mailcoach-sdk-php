<?php

namespace Spatie\MailcoachSdk\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TooManyAttempts extends Exception
{
    public $response;
    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->response = new Response();
    }

    public function retryAfter()
    {
        return $this->response->header('Retry-After', 60);
    }
}

