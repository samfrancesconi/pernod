<?php

namespace App\Console\Commands;

use App\Models\Record;
use Dmgroup\PrSfmc\PrSfmc;
use Illuminate\Console\Command;

class SendRecordsToSfmc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'records:sendToSfmc {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $records = Record::all();
        foreach ($records as $record) {
            if (!empty($record->successfullyTransmittedAt()) && !$this->option('force')) {
                $this->info("Record {$record->email} already transmitted");
                continue;
            }

            $sfmc = new PrSfmc();
            $sfmc::setContactType('B2B');
            $sfmc::setTransmittableId($record->id);
            $sfmc::setFirstname($record->name);
            $sfmc::setLastname($record->last_name);
            $sfmc::setJobTitle($record->occupation);
            $sfmc::setEmail($record->email);
            $sfmc::setCreatedAt($record->created_at);
            if ($record->phone) {
                $sfmc::addPhoneNumber($record->phone, 'mobile');
            }
            $sfmc::addConsent((bool)$record->marketing_check, "Acconsento a ricevere notizie e informazioni promozionali su Beat");
            $transmission = $sfmc::sendData();

            if ($transmission->transmission_status) {
                $this->info("Record {$record->email} Successfully transmitted");
            } else {
                $this->error("Record {$record->email} Error: {$transmission->transmission_error_message}");
            }
        }
    }
}
