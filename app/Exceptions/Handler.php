<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Request;
use Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        // if ($request->expectsJson()) {
        //         return response()->json(['error' => 'Unauthenticated.'], 401);
        // }

        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest(route('customer.login', ['account' => $request->route('account')]));

        $guard = array_get($exception->guards(),0);
        switch ($guard) {
          case 'admin':
            $login = 'admin.login';
            break;

          case 'customer':
            $login = 'customer.login';
            break;

          default:
            $login = 'login';
            break;
        }
        return redirect()->guest(route($login));
    }

    protected function prepareException(Exception $e)
    {
        $guard = array_get($exception->guards(),0);
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        } elseif ($e instanceof AuthorizationException) {
            $e = new AccessDeniedHttpException($e->getMessage(), $e);
        } elseif ($e instanceof TokenMismatchException) {
            //   return redirect()->route('customer.login');
            switch ($guard) {
                case 'admin':
                  $login = 'admin.login';
                  break;
      
                case 'customer':
                  $login = 'customer.login';
                  break;
      
                default:
                  $login = 'login';
                  break;
              }
              return redirect()->route($login);
        }

        return $e;
    }

}
