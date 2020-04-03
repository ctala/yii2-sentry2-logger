<?php


namespace ctala\Sentry2;

use yii\log\Logger;
use yii\log\Target;
use Sentry;

class SentryTarget extends Target
{
    /**
     * @var
     */
    public $dsn = null;
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ($this->dsn==null) {
            throw new InvalidConfigException(' DSN must be configured in order to send information to Sentry');
        }
        Sentry\init(['dsn' => $this->dsn ]);

    }

    /**
     *
     */
    public function export()
    {
        $messages = array_map([$this, 'formatMessage'], $this->messages);
        Sentry\captureException($messages);
    }
}