<?php

namespace App\Observers;

use App\Site;

class SiteObserver
{
    /**
     * Handle the site "created" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function created(Site $site)
    {
        //
    }

    /**
     * Handle the site "updated" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function updated(Site $site)
    {
        info('SiteObserver: updated()', ['site_id' => optional($site)->id]);

        if ($site->online) {
            // site came back on; add ended_at for downtime
            optional($site->downtimes()
                    ->whereNull('ended_at')
                    ->latest('started_at')
                    ->first()
            )->update(['ended_at' => now()]);

        } else {
            // site went down; add entry in downtime
            if ($site->downtimes()->whereNull('ended_at')->doesntExist()) {
                $site->downtimes()->create([
                    'started_at' => now(),
                ]);
            }
        }
    }

    /**
     * Handle the site "deleted" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function deleted(Site $site)
    {
        //
    }

    /**
     * Handle the site "restored" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function restored(Site $site)
    {
        //
    }

    /**
     * Handle the site "force deleted" event.
     *
     * @param  \App\Site  $site
     * @return void
     */
    public function forceDeleted(Site $site)
    {
        //
    }
}
