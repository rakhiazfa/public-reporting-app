<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ExceptionResponse
{
    /**
     * @var Exception
     */
    protected Exception $exception;

    /**
     * Create a new ExceptionResponse instance.
     * 
     * @param Exception $exception
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Conver exception to json.
     * 
     * @return Response
     */
    public function json()
    {
        return response()->json([
            'success' => false,
            'code' => $this->exception->getCode() ?? 500,
            'message' => $this->exception->getMessage() ?? 'Internal server error',
        ], ((int) $this->exception->getCode()) ? ((int) $this->exception->getCode()) : 500);
    }
}
