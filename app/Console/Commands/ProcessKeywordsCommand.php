<?php

namespace App\Console\Commands;

use App\Jobs\ProcessKeywordsChunk;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProcessKeywordsCommand extends Command
{
    protected $signature = 'keywords:process';
    protected $description = 'Process keywords';

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

        $oldKeywords = DB::connection('mysql-old')->table('LbKeyword')->orderBy('id')->get();
        $keywordChunks = $oldKeywords->chunk($chunkSize);
        $processedKeywords = 0;

        foreach ($keywordChunks as $chunk) {
            dispatch(new ProcessKeywordsChunk($chunk));
            $processedKeywords += $chunk->count();
            $bar->advance($chunk->count());
        }

        $bar->finish();
        $this->info("\nKeywords import completed!");
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
