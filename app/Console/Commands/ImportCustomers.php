<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportCustomers extends Command
{
    protected $signature = 'import:customers';

    protected $description = 'Import customers from the old LbCustomer table to the new customers table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Retrieve data from the old LbCustomer table
        $oldCustomers = DB::connection('mysql-old')->table('LbCustomer')->get();

        $totalCustomers = count($oldCustomers);
        $processedCustomers = 0;

        // Start the progress bar
        $progressBar = $this->output->createProgressBar($totalCustomers);
        $progressBar->start();

        // Import each customer to the new customers table
        foreach ($oldCustomers as $oldCustomer) {
            DB::table('customers')->updateOrInsert(
                ['name' => $oldCustomer->name],
                [
                    'description' => $oldCustomer->description,
                    'rates' => $oldCustomer->rates,
                    'email' => $oldCustomer->email,
                    'technical_contact_email' => $oldCustomer->technicalContactEmail,
                    'phone' => $oldCustomer->phone,
                    'license' => $oldCustomer->license,
                    'address' => $oldCustomer->address,
                    'city' => $oldCustomer->city,
                    'state' => $oldCustomer->state,
                    'zip' => $oldCustomer->zip,
                    'website' => $oldCustomer->website,
                    'template' => $oldCustomer->template,
                    'level' => $oldCustomer->level,
                    //'settings' => $oldCustomer->settings,
                    'disclosure' => $oldCustomer->disclosure,
                    'estimated_mortgage_disclosure' => $oldCustomer->estimatedMortgageDisclosure,
                    'hubspot' => $oldCustomer->hubspotId,
                    'block_mre' => $oldCustomer->blockMre,
                    'block_login_as' => $oldCustomer->blockLoginAs,
                    'ep' => $oldCustomer->ep,
                    'created_at' => $oldCustomer->createdAt,
                    'updated_at' => $oldCustomer->updatedAt,
                    // 'client_id' => $oldCustomer->clientId,
                    'active' => $oldCustomer->active,
                    'published' => $oldCustomer->active, // Set the default value for the published column
                ]
            );

            // Update the progress bar and increment the processed customers count
            $progressBar->advance();
            $processedCustomers++;
        }

        // Finish the progress bar
        $progressBar->finish();

        // Output the summary
        $this->info("\nCustomers imported successfully. Total customers: $totalCustomers");
    }
}