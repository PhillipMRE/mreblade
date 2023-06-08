<?php

namespace App\Console\Commands;

use App\Models\Keyword;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ImportKeywords extends Command
{
    protected $signature = 'import:keywords';
    protected $description = 'Import keywords from the old database';

    public function handle()
    {
        DB::connection()->disableQueryLog();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $chunkSize = 500;
        $totalKeywords = DB::connection('mysql-old')->table('LbKeyword')->count();
        $bar = $this->output->createProgressBar($totalKeywords);
        $bar->setFormat("Processing... %current%/%max% %bar% %percent:3s%%\nEstimated Time: %estimated%\nElapsed Time: %elapsed%");
        $bar->start();

        $startTime = Carbon::now();
        $chunksCount = 0;

        DB::connection('mysql-old')->table('LbKeyword')->orderBy('id')->chunk($chunkSize, function ($oldKeywords) use ($bar, $totalKeywords, $startTime, &$chunksCount, $chunkSize) {
            $chunksCount++;
            $keywordData = [];

            foreach ($oldKeywords as $oldKeyword) {
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

                $bar->advance();
            }

            $newKeywordsCount = 0;
            $updatedKeywordsCount = 0;

            DB::transaction(function () use ($keywordData &$newKeywordsCount, &$updatedKeywordsCount) {
                $result = DB::table('keywords')->upsert($keywordData, 
                    ['name'], 
                    [
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
                        'customer_id'
                    ]
                );
                $newKeywordsCount += $result['new'];
                $updatedKeywordsCount += $result['updated'];
            });

            $currentTime = Carbon::now();
            $elapsedTime = $currentTime->diffInSeconds($startTime);
            $averageTimePerChunk = $elapsedTime / $chunksCount;
            $remainingChunks = max(0, ceil(($totalKeywords - ($chunkSize * $chunksCount)) / $chunkSize));
            $estimatedTimeInSeconds = $averageTimePerChunk * $remainingChunks;
            $estimatedTime = Carbon::now()->addSeconds($estimatedTimeInSeconds);
            $bar->setMessage($estimatedTime->diffForHumans(null, true, false), 'estimated');
            $bar->setMessage($this->formatElapsedTime($elapsedTime), 'elapsed');
        });

        $bar->finish();
        
        $this->info("\nKeywords import completed!");
        $this->comment("New Keywords: {$newKeywordsCount}");
        $this->comment("Updated Keywords: {$updatedKeywordsCount}");

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
     

     

    protected function formatElapsedTime($seconds)
    {
        $dt = Carbon::now()->diffInSeconds(Carbon::now()->subSeconds($seconds));
        $h = floor($dt / 3600);
        $m = floor(($dt % 3600) / 60);
        $s = $dt % 60;

        return sprintf('%02d:%02d:%02d', $h, $m, $s);
    }

}