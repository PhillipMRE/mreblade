<?php

namespace App\Console\Commands;

use App\Models\Keyword;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ImportKeywords extends Command
{
    protected $signature = 'import:keywords';
    protected $description = 'Import keywords from the old database';

    public function handle()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $chunkSize = 500; 
        $totalKeywords = DB::connection('mysql-old')->table('LbKeyword')->count();
        $bar = $this->output->createProgressBar($totalKeywords);
        $bar->setFormat("Processing... %current%/%max% %bar% %percent:3s%%\nEstimated Time: %estimated%\nElapsed Time: %elapsed%");
        $bar->start();

        $startTime = Carbon::now();
        $elapsedTime = null;

        DB::connection('mysql-old')->table('LbKeyword')->orderBy('id')->chunk($chunkSize, function ($oldKeywords) use ($bar, $totalKeywords, $startTime, &$elapsedTime, $chunkSize) {
            $processedKeywords = 0;
            foreach ($oldKeywords as $oldKeyword) {
                $keywordData = [
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

                Keyword::updateOrCreate(
                    ['name' => $oldKeyword->name],
                    $keywordData
                );

                $processedKeywords++;
                $bar->advance();

                $currentTime = Carbon::now();
                $elapsedTime = $currentTime->diffInSeconds($startTime);
                $averageTimePerKeyword = $elapsedTime / $processedKeywords;
                $remainingKeywords = max(0, $totalKeywords - ($processedKeywords * $chunkSize));
                $estimatedTimeInSeconds = $averageTimePerKeyword * $remainingKeywords;
                $estimatedTime = Carbon::now()->addSeconds($estimatedTimeInSeconds);
                $bar->setMessage($estimatedTime->diffForHumans(null, true, false), 'estimated');
                $bar->setMessage($this->formatElapsedTime($elapsedTime), 'elapsed');
            }
        });

        $bar->finish();
        $this->info("\nKeywords import completed!");
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