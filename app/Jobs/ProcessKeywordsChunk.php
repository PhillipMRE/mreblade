<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProcessKeywordsChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $keywords;

    public function __construct($keywords)
    {
        $this->keywords = $keywords;
    }

    public function handle()
    {
        $keywordData = [];

        foreach ($this->keywords as $oldKeyword) {
            $keywordData[] = [
                'name' => $oldKeyword->name,
                'template' => $oldKeyword->template,
                'map' => $oldKeyword->map,
                'house_types' => $oldKeyword->houseTypes,
                'status_types' => $oldKeyword->statusTypes,
                'shortcode' => $oldKeyword->shortcode,
                'listing_settings' => $oldKeyword->listingSettings,
                'sponsor_only' => $oldKeyword->sponsorOnly,
                'show_solds' => $oldKeyword->showSolds,
                'use_version_5' => $oldKeyword->useVersion5,
                'active' => $oldKeyword->active,
                'listhub' => $oldKeyword->listhub,
                'created_at' => $oldKeyword->createdAt,
                'updated_at' => $oldKeyword->updatedAt,
                'customer_id' => $oldKeyword->customerId,
            ];
        }

        if (! empty($keywordData)) {
            DB::table('keywords')->upsert($keywordData, ['name'], [
                'template',
                'map',
                'house_types',
                'status_types',
                'shortcode',
                'listing_settings',
                'sponsor_only',
                'show_solds',
                'use_version_5',
                'active',
                'listhub',
                'created_at',
                'updated_at',
                'customer_id',
            ]);
        }
    }
}
