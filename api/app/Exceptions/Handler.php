<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof AuthorizationException) {
            return response()->json([
                'error' => class_basename(AuthorizationException::class),
                'message' => 'This action is unouthorized'
            ], 403);
        }
        else if($exception instanceof ModelNotFoundException){
            $modelName = class_basename($exception->getModel());
            $apiErrorCode = $modelName . 'NotFoundException';
            $message = $modelName . ' not found.';

            return response()->json([
                'errors'   => $apiErrorCode,
                'message' => $message,
            ], 404);         
        }
        return parent::render($request, $exception);
    }
}
