<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 3/7/2018
 * Time: 3:28 PM
 */

namespace console\controllers;
use console\daemons\EchoServer;
use yii\console\Controller;

class ServerController extends Controller
{
    public function actionStart($port = null)
    {
        $server = new EchoServer();
        if ($port) {
            $server->port = $port;
        }
        $server->start();
    }
}