<?php

namespace App\Logging;

use Google\Cloud\Logging\LoggingClient;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;

class CloudLogging
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        //$app['project_id'] = getenv('GOOGLE_PROJECT_ID');
        // putenv('GOOGLE_APPLICATION_CREDENTIALS=' . config('google.service_account.filepath'));

        // $logger = LoggingClient::psrBatchLogger('app');
        // $handler = new PsrHandler($logger);

        // return new Logger('stackdriver', [$handler]);

        // $logging = new LoggingClient([
        //     'projectId' => env('GOOGLE_PROJECT_ID')
        // ]);
        
        // return $logging->psrLogger('app');

        $logName = isset($config['logName']) ? $config['logName'] : 'app';
        $psrLogger = LoggingClient::psrBatchLogger($logName);
        $handler = new PsrHandler($psrLogger);
        $logger = new Logger($logName, [$handler]);
        return $logger;
    }
}
