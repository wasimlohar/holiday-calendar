<?php
// app/Console/Commands/FetchHolidays.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Holiday;
use GuzzleHttp\Client;

class FetchHolidays extends Command
{
    protected $signature = 'fetch:holidays';
    protected $description = 'Fetch holidays from Calendarific API and store in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $client = new Client();
        $apiKey = env('CALENDARIFIC_API_KEY');
        $year = date('Y'); // Get the current year

        $response = $client->get("https://calendarific.com/api/v2/holidays?&api_key={$apiKey}&country=IN&year={$year}");
        $holidays = json_decode($response->getBody(), true)['response']['holidays'];

        foreach ($holidays as $holiday) {
            Holiday::updateOrCreate(
                ['name' => $holiday['name'], 'date' => $holiday['date']['iso']],
                ['type' => implode(', ', $holiday['type'])]
            );
        }

        $this->info('Holidays fetched and stored successfully!');
    }
}
