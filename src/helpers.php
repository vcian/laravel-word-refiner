<?php

if (!function_exists('refiner')) {
    /**
     * @param $request
     * @return \Illuminate\Support\Collection
     */
    function refiner($request)
    {
        try {
            if (is_array($request)) {
                return $request;
            }

            $requestData = $request->all();

            if ($requestData) {
                foreach ($requestData as $key => $value) {
                    $filterString = [];
                    $requestedString = [];

                    if (!is_array($value)) {
                        $requestedString = strtolower($value);
                        $requestedString = explode(' ', $requestedString);
                    }

                    $detectWords = config('refiner');
                    $detectWords = array_flip($detectWords);

                    foreach ($requestedString as $words) {
                        $filterWords = rtrim(clean($words), '.');

                        if (!isset($detectWords[$filterWords])) {
                            $filterString[] = $words;
                        }
                    }

                    $filterString = implode(' ', $filterString);
                    $request = $request->merge([$key => $filterString]);
                }
            }

            return $request;
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return collect([]);
        }
    }
}
