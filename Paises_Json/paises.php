<!DOCTYPE html>
<html>
<head>
    <style>
        h2 {
            font-size: 1.5rem;
            color: #333;
            margin: 10px 0;
        }

        a {
            display: block;
            margin-top: 5px;
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $url = "https://restcountries.com/v3.1/all";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $json = curl_exec($curl);
    curl_close($curl);

    $objeto_json = json_decode($json);
    for ($i = 0; $i < count($objeto_json); ++$i) {
        echo '<h2>' . $objeto_json[$i]->name->common . '</h2>';
        if (isset($objeto_json[$i]->capital[0])) {
            echo $objeto_json[$i]->capital[0];
        } else {
            echo "No capital";
        }
        $urlMap = $objeto_json[$i]->maps->googleMaps;
        echo "<a href='$urlMap' target='_blank'>Ver en Google Maps</a>";
    }
    ?>
</body>
</html>
