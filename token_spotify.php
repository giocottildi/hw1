<?php
   

    $data = json_decode(file_get_contents("php://input"), true);
    $playlist_name = $data['playlist_searched'];

    function accessoSpotify() {
        $client_id = "b578f91cd2f642d5b42918f1d732b32a";
        $client_secret = "92148741eb824bb5898f8b23b8695f46";


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));

        $response = curl_exec($curl);
        curl_close($curl);

        $token_info = json_decode($response, true);

        return $token_info['access_token'];
    }

    function richiesta($access_token, $playlist_name){
        $curl = curl_init();
        $query = urlencode($playlist_name);

        curl_setopt($curl, CURLOPT_URL, 'https://api.spotify.com/v1/search?q='.$query.'&type=playlist&limit=12');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$access_token));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    $access_token = accessoSpotify();
    $getPlaylist = richiesta($access_token, $playlist_name);

    if($getPlaylist){
        echo json_encode(array("getPlaylist" => $getPlaylist, "playlist" => $playlist_name));
    } else {
        echo json_encode(array("getPlaylist" => false, "query" => false));
    }
?>