<?php declare(strict_types=1);

namespace Amplify;

use Aerys\Request;
use Aerys\Response;
use function Aerys\router;
use function Aerys\websocket;

$router = router()
    ->route('GET', '/', function(Request $request, Response $response) use ($template) {
        $response->send(file_get_contents(__DIR__ . '/templates/page.phtml'));
    })
    ->route('GET', '/ws', websocket(new Handler(), ["maxBytesPerMinute" => 1 << 26, "maxFramesPerSecond" => 1000000]))
    ->route('GET', '/stop', function() { \Amp\stop(); })
;
