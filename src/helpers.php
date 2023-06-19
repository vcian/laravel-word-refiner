<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('refiner')) {
    /**
     * @param $request
     * @return mixed
     */
    function refiner($request) : mixed
    {
        try {
            if (!is_array($request)) {
                $requestData = $request->all();

                foreach ($requestData as $key => $value) {
                    if (!is_array($value)) {
                        $requestedString = strtolower($value);
                        $requestedString = explode(' ', $requestedString);

                        $detectWords = array_flip(config('refiner'));

                        $filterString = array_filter($requestedString, function ($word) use ($detectWords) {
                            $filterWords = rtrim($word, '.');
                            return !isset($detectWords[$filterWords]);
                        });

                        $filterString = implode(' ', $filterString);
                        $request = $request->merge([$key => $filterString]);
                    }
                }
            }

            return $request;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return collect([]);
        }
    }
}
