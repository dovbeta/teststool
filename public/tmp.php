<?php
preg_match_all("/^http:\/\/.+@(.+)$/","http://info@abtosoftware.com",$found);
var_dump($found);