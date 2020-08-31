<?php

namespace App\Repositories;

use App\Site;
use Exception;
use Illuminate\Support\Facades\Http;

class SiteRepository
{
    public function checkWebsite(Site $site) {
        info('SiteRepository.checkWebsite:', ['url' => optional($site)->url]);

        try {
            $response = Http::get($site->url);
            $site->online = $response->successful();

        } catch (Exception $ex) {
            info('checkWebsite: EXCEPTION:', ['ex' => $ex->getMessage()]);
            $site->online = false;
        }

        $site->updated_at = now(); // the 'updated' observer will be triggered always
        $site->save();
    }
}