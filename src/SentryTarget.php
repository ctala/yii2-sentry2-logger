<?php


namespace ctala\Sentry2;

use yii\log\Target;
use Sentry;
use Yii;

class SentryTarget extends Target
{
    /**
     * @var
     */
    public $dsn = null;

    /**
     * Enviroment for the configuration of Sentry
     */
    public $environment = "environment";


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->dsn==null) {
            throw new InvalidConfigException(' DSN must be configured in order to send information to Sentry');
        }
        Sentry\init(['dsn' => $this->dsn,
            'environment' => $this->environment,
        ]);

    }

    /**
     *  Maps all the messages and send the information as a encoded json message to Sentry
     */
    public function export()
    {
        Yii::info("Export function on Sentry2 Logger");
        $messages = array_map([$this, 'formatMessage'], $this->messages);
        Yii::info($messages,"2SendSentry");
        $jsonMessages = json_encode($messages);
        Sentry\captureMessage($jsonMessages);
        Yii::info("End export function Sentry2 Logger");
    }
}