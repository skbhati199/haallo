<?php
require_once __DIR__.'/vendor/autoload.php';

\Telnyx\Telnyx::setApiKey('KEY0176CE38C50256436E96333F1CFC251E_RMQUgQC8jNwnx0oSvphleR');

$your_telnyx_number = '+16187471119';
$destination_number = '+919315885396';

$new_message = \Telnyx\Message::Create(['from' => $your_telnyx_number, 'to' => $destination_number, 'text' => 'Hello, world!']);