<?php

declare(strict_types = 1);

namespace Trscca\Filepond\Http\Controllers;

use Trscca\Filepond\Data\Data;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LoadController
{
    public function __invoke(NovaRequest $request): StreamedResponse
    {
        $data = Data::fromEncrypted($request->input('serverId'));

        return Storage::disk($data->disk)->response($data->path, urlencode($data->filename));
    }
}
