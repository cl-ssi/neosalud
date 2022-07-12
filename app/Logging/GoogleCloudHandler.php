<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Google\Cloud\Logging\LoggingClient;

class GoogleCloudHandler extends AbstractProcessingHandler {

    public function __construct($projectId, $logName, $labels, $level = Logger::DEBUG, $bubble = true)
    {
        $this->projectId    = $projectId;
        $this->logName      = $logName;
        $this->labels       = $labels;

        parent::__construct($level, $bubble);
    }

    protected function write(array $record):void
    {
        $httpRequest = [
            'requestMethod' => $_SERVER['REQUEST_METHOD'] ?? '',
            'requestUrl'    => $_SERVER['APP_URL'].$_SERVER['REQUEST_URI'],
            'status'        => $record['level'] ?? '',
            'userAgent'     => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'remoteIp'      => $_SERVER['REMOTE_ADDR'] ?? '',
            'referer'       => $_SERVER['HTTP_REFERER'] ?? '',
            'protocol'      => $_SERVER['SERVER_PROTOCOL'] ?? '',
            //'latency'     => '60.005603935s',
            //'requestSize' => '1593',
            //'responseSize'=> '1176',
        ];


        $resource = [
            "type" => "cloud_run_revision",
            "labels" => [
                "location" => "us-central1",
                "revision_name" => "neosalud-00075-wiq",
                "configuration_name" => "neosalud",
                "project_id" => "saludiquique",
                "service_name" => "neosalud"
            ]
        ];

        $options = [
            'httpRequest'   => $httpRequest,
            'resource'   => $resource,
            'severity'      => $record['level_name'],
            'labels'        => $this->labels,
        ];
        /*
        I had to "manually" set logging.Entry.Resource, specifying resource type and labels.
        {
  "insertId": "62cdae25000338141640a636",
  "httpRequest": {
    "requestMethod": "GET",
    "requestUrl": "https://neo.saludtarapaca.org/samu/keys/2",
    "requestSize": "2204",
    "status": 500,
    "responseSize": "3934",
    "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49",
    "remoteIp": "186.78.183.13",
    "serverIp": "34.107.148.8",
    "latency": "0.299710749s",
    "protocol": "HTTP/1.1"
  },
  "resource": {
    "type": "cloud_run_revision",
    "labels": {
      "location": "us-central1",
      "revision_name": "neosalud-00075-wiq",
      "configuration_name": "neosalud",
      "project_id": "saludiquique",
      "service_name": "neosalud"
    }
  },
  "timestamp": "2022-07-12T17:23:49.210964Z",
  "severity": "ERROR",
  "labels": {
    "managed-by": "gcp-cloud-build-deploy-cloud-run",
    "gcb-trigger-id": "5a7117ce-65f8-4713-9fa0-0d1c3182dbdb",
    "instanceId": "00c527f6d465118ed7b08870cfddbb18ee85e32fda558ac698d1febe5e1c405fd6e381fb7cc09bee661c13066336bf304b600857b7c1789703e17e2e4326a71679",
    "gcb-build-id": "051bafb5-2946-4263-9b6b-02d9a92072ab",
    "commit-sha": "f02eea3ea802a4f305da3a184df0030b43985734"
  },
  "logName": "projects/saludiquique/logs/run.googleapis.com%2Frequests",
  "trace": "projects/saludiquique/traces/14ecefe13c31181331ece334e1a832de",
  "receiveTimestamp": "2022-07-12T17:23:49.412250036Z",
  "spanId": "14300753631205191696"
}
         */

        $logger = (new LoggingClient([
            'projectId' => $this->projectId]
            ))->logger($this->logName, $options);


        $data = array(
            'user_id'       => auth()->user()->id ?? '',
            'message'       => $record['message'],
            'uri'           => $_SERVER['APP_URL'].$_SERVER['REQUEST_URI'],
            'formatted'     => $record['formatted'],
            'context'       => json_encode($record['context']),
            'extra'         => json_encode($record['extra']),
            'channel'       => $record['channel'],
            //'level'         => $record['level'],
            //'level_name'    => $record['level_name'],
            //'record_datetime' => $record['datetime']->format('Y-m-d H:i:s'),
            //'created_at'    => date("Y-m-d H:i:s"),
        );

        $entry = $logger->entry($data, $options);
        $logger->write($entry);
    }
}
