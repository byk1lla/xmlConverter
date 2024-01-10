<?php
namespace byk1lla\libs;
class Logger {
    private $logPath;

    public function __construct($logPath) {
        $this->logPath = $logPath;
    }

    public function write($requestData) {
        $logDate = date("Y-m-d");
        $logTime = date("H-i-s");

        $logFolder = "{$this->logPath}/$logDate";
        if (!file_exists($logFolder)) {
            mkdir($logFolder, 0755, true);
        }

        $logFileName = "{$logFolder}/$logTime.txt";

        $logData = "[{$logDate} {$logTime}] aktivite - {$requestData}\n";

        file_put_contents($logFileName, $logData, FILE_APPEND);
    }
}
