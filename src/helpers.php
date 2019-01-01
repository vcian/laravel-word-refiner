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
                foreach ($requestData as $individualKey => $individualValue) {
                    $filterString = [];
                    $requestedString = [];

                    if (!is_array($individualValue)) {
                        $requestedString = strtolower($individualValue);
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
                    $request = $request->merge([$individualKey => $filterString]);
                }
            }

            return $request;
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return collect([]);
        }
    }
}
