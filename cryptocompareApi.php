<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/6/17
 * Time: 8:05 AM
 */

namespace Webpwnize\Modules\Dashboard\Controllers;


use Webpwnize\AnsibleHelper;
use Asm\Ansible\Ansible;
use Webpwnize\Icinga2;
use Webpwnize\Models\Server;

class TestController extends DashboardControllerBase
{
    public function apiAction() {
        echo "here we go";
        $cryptocompareApi = new \CryptocompareApi();
        $r = $cryptocompareApi->availableCalls();
        print_r($r);
        echo "end";
        die();
    }
    public function icingaaddAction() {
        $icinga = new Icinga2();
        $servers = Server::find("active=1");

        $i = 0;
        echo count($servers);
        foreach ($servers as $i => $server ) {
            echo "<br>"  . $server->getServername() . " -- ";
            if ($server->getInternalIp() != $icinga->getHost($server->getInternalName())->address ) {
                echo "doesnt match";
            }
        }
        die();
    }
    public function icingatestAction() {
        $icinga = new Icinga2();
        $servers = Server::find();
        $i = 0;
        echo count($servers);
        foreach ($servers as $server ) {
            echo "<br>" . $i . " - "  . $server->getServername();
            if ($server->getInternalName() == "" ) {

                $r1 = $this->getInternalHostname($server);

                if ($r1 != false ) {
                    $server->setInternalName($r1);
                    $server->save();
                }
                else {
                    if (fnmatch("*ccc-streamer*", $server->getServername())) {
                        $r1 = $server->getServername() . $server->getSuffix() . ".ccc-stream.a6.internal.cloudapp.net";
                        $server->setInternalName($r1);
                        $server->save();
                    } elseif (fnmatch("*ccc-api*", $server->getServername())) {
                        $r1 = $server->getServername() . $server->getSuffix() . ".ccc-api.a3.internal.cloudapp.net";
                        $server->setInternalName($r1);
                        $server->save();
                    }  elseif (fnmatch("*ccc-web*", $server->getServername())) {
                        $r1 = $server->getServername() . $server->getSuffix() . ".ccc-web.cloudapp.net";
                        $server->setInternalName($r1);
                        $server->save();
                    }   elseif (fnmatch("*ccc-widgets*", $server->getServername())) {
                        $r1 = $server->getServername() . $server->getSuffix() . ".ccc-widgets.a10.internal.cloudapp.net";
                        $server->setInternalName($r1);
                        $server->save();
                    } else {
                        $r1 = $server->getServername() . $server->getSuffix() . ".cloudapp.net";
                    }
                }
            }
            else {
                $r1 = $server->getInternalName();
            }
            echo $r1;

            //$r = $icinga->getHost($r1);
            //print_r($r);

            echo "<br>";
            $i++;
        }
        die();
    }
    public function bruteforceipsAction() {
        $servers = Server::find();
        foreach ($servers as $server ) {
            if ($server->getInternalIp() == "" ) {
                $hostname = $this->hostnamebase($server);

                $i = 1;
                while ($i <= 10) {
                    $thost = $hostname . "a" . $i . ".internal.cloudapp.net";
                    $lookup = gethostbyname($thost);
                    if ($lookup != $thost) {
                        echo "FOUND: " . $lookup;
                        $server->setInternalIp($lookup);
                        $server->save();
                        break;
                    }
                    $i++;
                }
            }
            else {
                $hostname = "local ip: " . $server->getInternalIp();
            }
            echo $server->getServername() . " - " .  $hostname . "<br>";


            if ($server->getPublicIp() == "" ) {
                $_server = $server->getServername();
                if ($server->getSuffix() != "" ) {
                    $_server = $_server . $server->getSuffix();
                }
                $lookup = gethostbyname($_server . ".cloudapp.net");
                if ($lookup != $_server . ".cloudapp.net" ) {
                    $server->setPublicIp($lookup);
                    $server->save();
                }

                $lookup = gethostbyname($_server . ".westeurope.cloudapp.azure.com");
                if ($lookup != $_server . ".westeurope.cloudapp.azure.com" ) {
                    $server->setPublicIp($lookup);
                    $server->save();
                }
            }
        }
    }
    public function hostnamebase($server) {

        $t = $server->getServername();
        $t = $t . ".";
        $t = $t . $server->getServername();

        if ($server->getInternalIp() == "" ) {
            $t = $t . ".";
            $t = $t . $server->getServername();
            if ($server->getSuffix() != "" ) {
                $t = $t . $server->getSuffix();
            }
        }
        else {
            if ($server->getSuffix() != "" ) {
                $t = $t . $server->getSuffix();
            }
        }
        $t = $t . ".";
        return $t;
    }
    public function getInternalHostname($server) {
        $hostname = $this->hostnamebase($server);

        $i = 1;
        while ($i <= 10) {
            $thost = $hostname . "a" . $i . ".internal.cloudapp.net";

            $lookup = gethostbyname($thost);

            if ($lookup != $thost) {
                return $thost;
            }
            $i++;
        }
        return false;
    }

    public function getInternalIp($server) {
        $hostname = $this->hostnamebase($server);
        $i = 1;
        while ($i <= 10) {
            $thost = $hostname . "a" . $i . ".internal.cloudapp.net";
            $lookup = gethostbyname($thost);

            if ($lookup != $thost) {
                return $lookup;
            }
            $i++;
        }
    }
}
