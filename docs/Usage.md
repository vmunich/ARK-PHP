## Usage

``` php
<?php

// Setup a new ark client
$client = new BrianFaust\Ark\Client('node1.arknet.cloud', 4001, 'some_magical_nethash', '1.0.1');

// Use try/catch to catch the exception thrown if the response contains "success=false" since ark-node doesn't use proper status codes.
try {
    // Send a request to peers/version
    $response = $client->api('Peer')->version();

    dd($response);
} catch (BrianFaust\Ark\Exceptions\InvalidResponseException $e) {
    dd($e->getMessage());
}
```
