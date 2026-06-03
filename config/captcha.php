<?php

return [
    'secret' => env('NOCAPTCHA_SECRET', '6Ld6sQEtAAAAANZ9-YitGaiLeVC6qTjhfG3Y2-W8'),
    'sitekey' => env('NOCAPTCHA_SITEKEY', '6Ld6sQEtAAAAAHhzrfRNKJThTwbrM6uX1Y1Ihh5P'),
    'options' => [
        'timeout' => 30,
    ],
];