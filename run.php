<?php

require_once __DIR__ . '/vendor/autoload.php';

$slackUrl = getopt('', ['slack-url:'])['slack-url'];
echo "Using slack URL: $slackUrl\n";

(new \Guillaumesmo\SCDF\Sink())->consume(function ($text) use ($slackUrl) {
	file_get_contents($slackUrl, false, stream_context_create([
		'http' => [
			'method'  => 'POST',
			'content' => json_encode(['text' => $text]),
		],
	]));
});