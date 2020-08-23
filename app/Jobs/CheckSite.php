<?php

namespace App\Jobs;

use App\Site;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CheckSite implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $site;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Site $site)
    {
        $this->site = $site;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info('Checksite: handle()', [
            'id' => optional($this->site)->id,
            'url' => optional($this->site)->url
        ]);

        try {
            $response = Http::get($this->site->url);

            $this->site->online = $response->successful();

        } catch (Exception $ex) {
            info('Checksite: EXCEPTION', ['ex' => $ex->getMessage()]);

            $this->site->online = false;
        }

        $this->site->save();
    }
}
