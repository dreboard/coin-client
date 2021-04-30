<?php


namespace App\Http\Helpers;


abstract class SiteHelper
{

    static public function gitVersions() {
        $hash = exec("git rev-list --tags --max-count=1");
        return exec("git describe --tags $hash");
    }
}
