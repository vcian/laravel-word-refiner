<?php

if (!function_exists('refiner')) {
    /**
     * @param $request
     * @return \Illuminate\Support\Collection
     */
    function refiner($request)
    {
        try {
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
                        if (!isset($detectWords[$words])) {
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
