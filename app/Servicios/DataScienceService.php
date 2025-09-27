<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class DataScienceService
{
    protected string $baseUrl;
    protected int $timeout;
    protected int $retries;

    public function __construct()
    {
        $this->baseUrl = config('services.datascience.url', env('DATASCIENCE_URL', 'http://127.0.0.1:8000'));
        $this->timeout = (int) env('DATASCIENCE_TIMEOUT', 10);
        $this->retries = (int) env('DATASCIENCE_RETRIES', 2);
    }

    public function predictMatch(int $c1, int $c2): array
    {
        $url = rtrim($this->baseUrl, '/') . '/predict';
        $payload = ['c1' => $c1, 'c2' => $c2];

        $attempt = 0;
        $lastException = null;

        while ($attempt <= $this->retries) {
            try {
                $resp = Http::timeout($this->timeout)
                            ->acceptJson()
                            ->post($url, $payload);

                if ($resp->successful()) {
                    return $resp->json();
                }

                if ($resp->clientError()) {
                    Log::warning('DataScienceService client error', ['status' => $resp->status(), 'body' => $resp->body()]);
                    throw new Exception('Client error calling DS service: ' . $resp->status());
                }

                Log::warning('DataScienceService server error, retrying', ['status' => $resp->status()]);
            } catch (\Throwable $e) {
                $lastException = $e;
                Log::warning('DataScienceService attempt failed', ['attempt' => $attempt, 'message' => $e->getMessage()]);
            }

            $attempt++;
            sleep(1);
        }

        throw $lastException ?? new Exception('DataScience service unavailable');
    }
}
