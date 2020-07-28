# favicon-by-realfavicongenerator-fork
Fork of the [Favicon by RealFaviconGenerator plugin](https://wordpress.org/plugins/favicon-by-realfavicongenerator/).

Currently contains the fix for the [WordPress core site icon issue](https://wordpress.org/support/topic/wordpress-default-icon-under-favicon-ico/) and composer support.

Main code fix:
https://github.com/strarsis/favicon-by-realfavicongenerator-fork/blob/868619043589e77627be92f09c87988fa870076b/public/class-favicon-by-realfavicongenerator-common.php#L242-L271

Previous implementation that parsed (using PHP DOM+json_decode) the stored HTML/manifest data instead:
https://github.com/strarsis/favicon-by-realfavicongenerator-fork/blob/53eb32163a16bf780a41d7c5ef167f22265a4029/public/class-favicon-by-realfavicongenerator-common.php#L242-L300
