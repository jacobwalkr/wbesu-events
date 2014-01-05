<?php

class ErrorHandler {
    private $error;

    public function __construct(Exception $exception)
    {
        $this->error = array();

        $this->error['message'] = $exception->getMessage();
        $this->error['code'] = $exception->getCode();
    }

    public function Display()
    {
        // Use ob_* utilities to display template (core if not overridden
        // by application template)
    }
}