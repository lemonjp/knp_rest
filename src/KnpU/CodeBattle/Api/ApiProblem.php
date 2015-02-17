<?php

namespace KnpU\CodeBattle\Api;

class ApiProblem 
{
    const TYPE_VALIDATION_ERROR = 'validation_error';

    const TYPE_INVALID_REQUEST_BODY_FORMAT = 'invalid_body_format';

    static private $titles = array(
        self::TYPE_VALIDATION_ERROR => 'There was a validation error',
        self::TYPE_INVALID_REQUEST_BODY_FORMAT => 'Invalid JSON format sent',
    );


    private $statusCode;

    private $type;

    private $extraData = array();

    public function __construct($statusCode,$type)
    {
        $this->statusCode = $statusCode;
        $this->type = $type;

        if (!isset(self::$titles[$type])){
            throw new \InvalidArgumentException('No title for type'.$type);
        }

        $this->title = self::$titles[$type];
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function set($name, $value)
    {
        $this->extraData[$name] = $value;
    }

    public function toArray()
    {
        return array_merge(
            $this->extraData,
            [
                'status' => $this->statusCode,
                'type' => $this->type,
                'title' => $this->title
            ]
        );
    }
}
