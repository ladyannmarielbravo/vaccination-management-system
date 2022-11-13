<?php 
$response = $client->request('POST', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer $accessToken"
            ],
            'json' => [
                "topic" => "Integrate zoom APIs",
                "type" => 3,
                "start_time" => "2020-06-22T20:30:00",    // meeting start time
                "duration" => "30",                       // 30 minutes
                "password" => "123456",
                // meeting password
            ],
        ]);
 $data = json_decode($response->getBody());

        echo "Join URL: ". $data->join_url;
 ?>