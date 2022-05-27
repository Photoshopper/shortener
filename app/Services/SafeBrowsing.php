<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class SafeBrowsing
{
    public string $apiUrl = '';

    public function __construct()
    {
        $this->apiUrl = 'https://safebrowsing.googleapis.com/v4/threatMatches:find?key=' . env('GOOGLE_API_KEY');
    }

    public function validateUrl(string $url): bool
    {
        try {
            $client = new Client();

            $response = $client->post($this->apiUrl, [
                'json' => [
                    "threatInfo" => [
                        "threatTypes" => [
                            "MALWARE",
                            "SOCIAL_ENGINEERING",
                            "UNWANTED_SOFTWARE",
                            "POTENTIALLY_HARMFUL_APPLICATION"
                        ],
                        "platformTypes" => ["ALL_PLATFORMS"],
                        "threatEntryTypes" => ["URL"],
                        "threatEntries" => [
                            ["url" => $url]
                        ]
                    ]
                ]
            ]);

            $response = json_decode($response->getBody()->getContents());

            if (isset($response->matches)) {
                return false;
            }
        } catch (GuzzleException $e) {
            Log::error($e);
        }

        return true;
   }
}
