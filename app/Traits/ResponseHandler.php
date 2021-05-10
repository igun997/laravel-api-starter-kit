<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;

trait ResponseHandler
{
    /**
     * @param $code
     * @param array $data
     * @param string $msg
     * @return JsonResponse
     */
    public static function makeResponse($code, array $data = [], string $msg="OK"): JsonResponse
    {
        if ($code >= 400 && $code < 500){
            if ($msg === "OK"){
                $msg = "Bad Request";
            }
        }elseif ($code >= 500){
            if ($msg === "OK"){
                $msg = "Server Error";
            }
        }

        if (count($data) > 0){
            $data = [
              "data"=>[]
            ];
        }

        return response()->json($data,$code);
    }
}
