<?php

namespace App\Helper\Session;


/**
 * Class SessionHandler
 * @package App\Helper\Session
 */
class SessionHandler implements SessionHandlerInterface
{
    /**
     * @var
     */
    private $savePath;

    /**
     * @param $savePath
     * @param $sessionName
     * @return bool
     */
    public function open($savePath, $sessionName)
    {
        $this->savePath = $savePath;
        if (!is_dir($this->savePath)) {
            mkdir($this->savePath, 0777);
        }

        return true;
    }

    /**
     * @return bool
     */
    public function close()
    {
        return true;
    }

    /**
     * @param $id
     * @return string
     */
    public function read($id)
    {
        return (string)@file_get_contents("$this->savePath/sess_$id");
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function write($id, $data)
    {
        return file_put_contents("$this->savePath/sess_$id", $data) === false ? false : true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $file = "$this->savePath/sess_$id";
        if (file_exists($file)) {
            unlink($file);
        }

        return true;
    }

    /**
     * @param $maxLifetime
     * @return bool
     */
    public function gc($maxLifetime)
    {
        foreach (glob("$this->savePath/sess_*") as $file) {
            if (filemtime($file) + $maxLifetime < time() && file_exists($file)) {
                unlink($file);
            }
        }

        return true;
    }
}