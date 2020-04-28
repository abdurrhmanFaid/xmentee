<?php

namespace App\Support\Parsing;

use Parsedown;

class Parser
{
    protected $parser;

    public function __construct()
    {
        $this->parser = new Parsedown;

        $this->parser->setSafeMode(true);
        $this->parser->setMarkupEscaped(true);
    }

    public function toHtml($text)
    {
        return $this->parser->text($text);
    }
}
