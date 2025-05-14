<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Resposta padrão para sucesso
     */
    protected function successResponse($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Resposta padrão para erros
     */
    protected function errorResponse($message = null, $code = 400, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    /**
     * Log de erros e resposta
     */
    protected function logAndRespond(\Exception $e, $context = [])
    {
        Log::error($e->getMessage(), [
            'exception' => $e,
            'context' => $context
        ]);

        return $this->errorResponse(
            'Ocorreu um erro interno no servidor',
            500,
            config('app.debug') ? $e->getMessage() : null
        );
    }

    /**
     * Processa datatables server-side
     */
    protected function dataTableResponse($query, $resourceClass = null)
    {
        $data = $query->paginate(request('perPage', 10));

        return $resourceClass 
            ? $resourceClass::collection($data)
            : response()->json($data);
    }

    /**
     * Validação para operações em massa
     */
    protected function validateBatchRequest($rules)
    {
        return request()->validate([
            'ids' => 'required|array',
            'ids.*' => $rules
        ]);
    }

    /**
     * Autorização para ações do controller
     */
    protected function authorizeAction($ability, $arguments = [])
    {
        $this->authorize($ability, $arguments);
    }
}