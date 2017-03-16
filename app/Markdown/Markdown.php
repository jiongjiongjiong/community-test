<?php
/**
 * Created by PhpStorm.
 * User: mars
 * Date: 2017/3/4
 * Time: 23:07
 */

namespace App\Markdown;


class Markdown
{
    protected $parser;
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        $html = $this->parser->makeHtml($text);
        return $html;
    }

}