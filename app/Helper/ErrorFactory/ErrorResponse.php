<?php

namespace App\Helper\ErrorFactory;

use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
/**
 * Class ErrorResponse
 * @package app\Helper\ErrorFactory
 */
class ErrorResponse implements ErrorHandlerInterface
{
    /**
     * @var
     */
    public $server_code;
    /**
     * @var
     */
    public $client_code;
    /**
     * @var
     */
    public $message;

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * ErrorResponse constructor.
     * @param $server_code
     * @param $client_code
     * @param $message
     */
    public function __construct($server_code, $client_code, $message) {
        $this->server_code = $server_code;
        $this->client_code = $client_code;
        $this->message = $message;
        $this->logger = new Logger('ErrorResponse');
        $this->logger->pushHandler(new StreamHandler(LOG_PATH, Logger::WARNING));

    }

    /**
     * @param $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return false|string
     */
    public function getJSONResponse() {
        $this->logger->info("Sending response with server_code {$this->server_code}, client_code {$this->client_code}, message {$this->message}");
        return json_encode(array("code" => $this->client_code, "message" => $this->message));
    }

    /**
     * @param false $die
     * @param false $errorMessage
     */
    public function sendResponse($die = false, $errorMessage = FALSE) {
        $this->logger->info("Sending response with server_code {$this->server_code}, client_code {$this->client_code}, message {$this->message}");
        header('HTTP/1.1 ' . $this->client_code . ' ' . $this->message . " (" . $this->server_code . ")");
        if($errorMessage){
            echo $this->message;
        }
        if ($die)
            exit();
    }

    /**
     *
     */
    public function responseInfo() {
        $this->logger->info("Sending response with server_code {$this->server_code}, client_code {$this->client_code}, message {$this->message}");
    }

    /**
     * @param false $die
     */
    public function responseWarn($die = false) {
        $this->logger->warning("Sending response with server_code {$this->server_code}, client_code {$this->client_code}, message {$this->message}");
        header('HTTP/1.1 ' . $this->client_code . ' ' . $this->message . " (" . $this->server_code . ")");
        if ($die){
            echo $this->message;
            exit;
        }

    }

    /**
     * @param false $die
     */
    public function responseError($die = false) {
        $this->logger->error("Sending response with server_code {$this->server_code}, client_code {$this->client_code}, message {$this->message}");
        header('HTTP/1.1 ' . $this->client_code . ' ' . $this->message . " (" . $this->server_code . ")");
        if ($die){
            echo $this->message;
            exit;
        }
    }

}