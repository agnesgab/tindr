<?php

namespace App\Services\Match\Get;

use Illuminate\Http\Request;

class MatchGetService {

    private Request $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    public function execute()
    {

    }
}
