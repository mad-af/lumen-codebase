<?php

namespace App\Exceptions;

use App\Helpers\Wrapper\Wrapper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Throwable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        $rendered = parent::render($request, $exception);
        $code = $rendered->getStatusCode();
        $message = $exception->getMessage() ?? 'Contact developer!!';
        if ($exception instanceof NotFoundHttpException) {
            $message = '404 Not Found';
        }
        else if ($exception instanceof ValidationException) {
            $errors = array_values($exception->errors());
            $error = array_shift($errors);
            $code = 422;
            $message = array_merge(...$error);
        }

        return Wrapper::sendResponse(Wrapper::error($message, $code));
    }
}
