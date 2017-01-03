<?php
$policy = '<meta http-equiv="Content-Security-Policy" content="default-src \'self\' data: gap: http: https: ws: \'unsafe-inline\' https://ssl.gstatic.com; style-src * blob: \'unsafe-inline\'; media-src *; img-src * data:; script-src * \'unsafe-inline\'">';

`rm -rf www`;
`cp -r ../core.vue/dist www`;
`cp -r resources www`;
`cp config.xml.original www/config.xml`;

$index = str_replace(
    [
        "<head>",
        "/static",
        "<div id=app></div>"
    ],
    [
        "<head>".$policy."\n",   // Without the \n phonegap will not render styles (only god knows why, but it took me about an hour to find out!)
        "static",
        '<div id=app></div><script type="text/javascript" src="cordova.js"></script>'
    ],
    file_get_contents("www/index.html")
);

file_put_contents("www/index.html", $index);
