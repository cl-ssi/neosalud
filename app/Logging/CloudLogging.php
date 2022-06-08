<?php

namespace App\Logging;

use Google\Cloud\Logging\LoggingClient;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;
//use Monolog\Handler\AbstractProcessingHandler;

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
        $logging = new LoggingClient(['projectId' => env('GOOGLE_PROJECT_ID')]);
        $psrLogger = $logging->psrLogger('app');
        // $logger = $logging->logger('app', [
        //     'resource' => [
        //         'type' => 'gcs_bucket',
        //         'labels' => [
        //             'bucket_name' => 'my_bucket'
        //         ]
        //     ]
        // ]);
        // dd($logger);

        // $entry = $logger->entry($message);
        // $logger->write($entry);

        // $logName = isset($config['logName']) ? $config['logName'] : 'app';
        // $psrLogger = LoggingClient::psrBatchLogger('app');

        $handler = new PsrHandler($psrLogger);
        $logger = new Logger('app', [$handler]);
        //dd($logger);
        return $logger;
    }
}
