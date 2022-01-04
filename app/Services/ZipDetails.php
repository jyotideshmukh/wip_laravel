<?php

namespace App\Services;

class ZipDetails
{
    public function getZipDetails($zip)
    {
        $url = 'http://api.zippopotam.us/us/' . $zip;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $responsedata = $this->getDetails(json_decode($response->getBody()->getContents(), true));
        return $responsedata;
    }

    public function getDetails($data)
    {
        //{"post code": "90210", "country": "United States", "country abbreviation": "US", "places": [{"place name": "Beverly Hills", "longitude": "-118.4065", "state": "California", "state abbreviation": "CA", "latitude": "34.0901"}]}
        $place = $data['places'][0];
        return [
            'country' => $data['country'],
            'country_code' => $data['country abbreviation'],
            'state' => $place['state'],
            'state_code' => $place['state abbreviation'],
            'city' => $place['place name'],
            'zip' => $data['post code']
        ];
    }
}
