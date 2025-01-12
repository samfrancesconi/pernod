<?php
namespace App\Loggers;

use Google\Cloud\Logging\LoggingClient;
use Illuminate\Support\Arr;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;

class GoogleCloudLogging
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $loggingClient = null;
        $logName = $config['log_name'];
        $keyFile = $config['logging_key_file_path'];

        if (is_string($keyFile)) {
            $loggingClient =  new LoggingClient([
                'projectId' => $config['logging_project_id'],
                'keyFilePath' => $config['logging_key_file_path'],
            ]);
        } else {
            return null;
        }

        $psrLogger = $loggingClient->psrLogger($logName);

        $handler = new PsrHandler($psrLogger);

        return new Logger($logName, [$handler]);

    }
}
