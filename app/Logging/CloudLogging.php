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
        if (app()->environment(['local'])) {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=/var/www/html/.tic-ssi.json');
        }
        else {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . config('google.service_account.filepath'));
        }
        $logging = new LoggingClient(['projectId' => env('GOOGLE_PROJECT_ID')]);
        $psrLogger = $logging->psrLogger('neosalud');
        $handler = new PsrHandler($psrLogger);
        $logger = new Logger('app', [$handler]);
        return $logger;
        // $logger = LoggingClient::psrBatchLogger('app');
        // $handler = new PsrHandler($logger);

        // return new Logger('stackdriver', [$handler]);

        // $logging = new LoggingClient([
        //     'projectId' => env('GOOGLE_PROJECT_ID')
        // ]);
        
        // return $logging->psrLogger('app');

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


    }
}
