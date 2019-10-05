<?php
namespace Armanco\BootstrapRenderer;

class Bootstrap
{
    private $rendered;
    private $title;
    private $jsScript;
    private $cssScript;
    private $headScript;
    private $language;
    private $charset;

    function __construct()
    {
        $this->rendered = '';
        $this->language = 'en';
        $this->charset = 'utf-8';
        $this->addCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        $this->addJsFile('https://code.jquery.com/jquery-3.3.1.slim.min.js');
        $this->addJsFile('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
        $this->addJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    }

    function addTitle($title)
    {
        $this->title = $title;
    }

    function addCharset($charset)
    {
        $this->charset = $charset;
    }

    function addLanguage($language)
    {
        $this->language = $language;
    }

    function addHtmlScript($script)
    {
        $this->rendered .= $script;
    }

    function addCssFile($url)
    {
        $this->cssScript .= '<link rel="stylesheet" href="' . $url . '">';
    }

    function addJsFile($url)
    {
        $this->jsScript .= '<script src="' . $url . '"></script>';
    }

    function start()
    {
        $this->head();
        $this->addHtmlScript('<!doctype html><html lang="' . $this->language . '">' . $this->headScript . '<body>');
    }

    function end()
    {
        $this->addHtmlScript($this->jsScript . '</html>');
    }

    private function head()
    {
        $this->headScript = '<head>'
            . '<meta charset="' . $this->charset . '">'
            . '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'
            . $this->cssScript
            . '<title>' . $this->title . '</title>'
            . '</head>';
    }

    function containerOpen($class = 'container')
    {
        $this->addHtmlScript('<div class="' . $class . '">');
    }

    function containerClose()
    {
        $this->addHtmlScript('</div>');
    }

    function rowOpen($class = '')
    {
        if ($class !== '') $class = ' ' . $class;
        $this->addHtmlScript('<div class="row' . $class . '">');
    }

    function rowClose()
    {
        $this->addHtmlScript('</div>');
    }

    function columnOpen($type = false, $size = false)
    {
        if ($type) $type = '-' . $type;
        if ($size) $size = '-' . $size;
        $this->addHtmlScript('<div class="col' . $type . $size . '">');
    }

    function columnClose()
    {
        $this->addHtmlScript('</div>');
    }

    function h1($heading)
    {
        $this->addHtmlScript('<h1>' . $heading . '</h1>');
    }

    function h2($heading)
    {
        $this->addHtmlScript('<h2>' . $heading . '</h2>');
    }

    function h3($heading)
    {
        $this->addHtmlScript('<h3>' . $heading . '</h3>');
    }

    function h4($heading)
    {
        $this->addHtmlScript('<h4>' . $heading . '</h4>');
    }

    function h5($heading)
    {
        $this->addHtmlScript('<h5>' . $heading . '</h5>');
    }

    function h6($heading)
    {
        $this->addHtmlScript('<h6>' . $heading . '</h6>');
    }

    function alert($text, $type = 'primary')
    {
        $this->addHtmlScript('<div class="alert alert-' . $type . '" role="alert">' . $text . '</div>');
    }

    function badge($text, $type = 'primary')
    {
        $this->addHtmlScript('<span class="badge badge-' . $type . '">' . $text . '</span>');
    }

    function button($text, $type = 'primary')
    {
        $this->addHtmlScript('<button type="button" class="btn btn-' . $type . '">' . $text . '</button>');
    }

    function render()
    {
        echo $this->rendered;
    }
}