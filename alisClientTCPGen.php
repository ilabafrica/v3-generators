<?php

$value = 'genxpert';

    echo "-------------------------".$value."\tcreated\n";
    //headers
    $model="<?php
namespace App\Models;
/**
 * (c) @iLabAfrica
 * BLIS\t\t\t - a port of the Basic Laboratory Information System (BLIS) to Laravel.
 * Team Lead\t - Emmanuel Kweyu.
 * Devs\t\t\t - Brian Maiyo|Ann Chemutai|Winnie Mbaka|Ken Mutuma|Anthony Ereng
 */

use Illuminate\Database\Eloquent\Model;

class ".$value." extends Model
{
\t//
}";

    $myfile = fopen("Models/".$value.".php", "w") or die("Unable to open file!");

    fwrite($myfile, $model);
    fclose($myfile);
