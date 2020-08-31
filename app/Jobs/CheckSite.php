<?php

namespace App\Jobs;

use App\Repositories\SiteRepository;
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
    protected $siteRepo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Site $site)
    {
        $this->site = $site;
        $this->siteRepo = new SiteRepository;
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

        $this->siteRepo->checkWebsite($this->site);
    }
}
