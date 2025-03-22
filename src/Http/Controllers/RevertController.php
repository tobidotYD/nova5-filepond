<?php

declare(strict_types = 1);

namespace Trscca\Filepond\Http\Controllers;

use Trscca\Filepond\Data\Data;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use Laravel\Nova\Http\Requests\NovaRequest;

class RevertController
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke(NovaRequest $request): Response
    {
        if (Data::fromEncrypted($request->getContent())->deleteDirectory()) {
            return response()->make();
        }

        return response()->setStatusCode(500);
    }
}
