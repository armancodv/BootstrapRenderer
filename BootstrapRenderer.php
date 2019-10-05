<?php

namespace Armanco\BootstrapRenderer;

class Bootstrap
{
    private $rendered;
    private $title;
    private $jsScript;
    private $cssScript;
    private $language;
    private $charset;

    public function __construct()
    {
        $this->rendered = '';
        $this->language = 'en';
        $this->charset = 'utf-8';
        $this->addCssFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        $this->addJsFile('https://code.jquery.com/jquery-3.3.1.slim.min.js');
        $this->addJsFile('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
        $this->addJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    }

    public function addTitle($title)
    {
        $this->title = $title;
    }

    public function addCharset($charset)
    {
        $this->charset = $charset;
    }

    public function addLanguage($language)
    {
        $this->language = $language;
    }

    public function addHtmlScript($script)
    {
        $this->rendered .= $script;
    }

    public function addCssFile($url, $attributes = [])
    {
        $attributes['rel'] = 'stylesheet';
        $attributes['href'] = $url;
        $this->cssScript .= '<link' . $this->returnAttributes($attributes) . '>';
    }

    public function addJsFile($url, $attributes = [])
    {
        $attributes['src'] = $url;
        $this->jsScript .= '<script' . $this->returnAttributes($attributes) . '></script>';
    }

    public function start($attributes = [], $render = true)
    {
        $attributes['lang'] = $this->language;
        $htmlScript = '<!doctype html><html' . $this->returnAttributes($attributes) . '>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function end($render = true)
    {
        $htmlScript = '</html>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function head($script = '', $render = true)
    {
        $htmlScript = '<head>'
            . '<meta charset="' . $this->charset . '">'
            . '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'
            . $this->cssScript
            . '<title>' . $this->title . '</title>'
            . $script
            . '</head>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function bodyOpen($attributes = [], $render = true)
    {
        $htmlScript = '<body' . $this->returnAttributes($attributes) . '>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function bodyClose($render = true)
    {
        $htmlScript = $this->jsScript . '</body>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function containerOpen($attributes = [], $render = true)
    {
        if (!isset($attributes['class'])) $attributes['class'] = 'container';
        return $this->divOpen($attributes, $render);
    }

    public function containerClose($render = true)
    {
        return $this->divClose($render);
    }

    public function rowOpen($attributes = [], $render = true)
    {
        if (!isset($attributes['class'])) $attributes['class'] = 'row';
        return $this->divOpen($attributes, $render);
    }

    public function rowClose($render = true)
    {
        return $this->divClose($render);
    }

    public function columnOpen($type = false, $size = false, $attributes = [], $render = true)
    {
        if ($type) $type = '-' . $type;
        if ($size) $size = '-' . $size;
        if (!isset($attributes['class'])) $attributes['class'] = 'col' . $type . $size;
        return $this->divOpen($attributes, $render);
    }

    public function columnClose($render = true)
    {
        return $this->divClose($render);
    }

    public function h1($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h1' . $this->returnAttributes($attributes) . '>' . $heading . '</h1>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function h2($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h2' . $this->returnAttributes($attributes) . '>' . $heading . '</h2>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function h3($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h3' . $this->returnAttributes($attributes) . '>' . $heading . '</h3>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function h4($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h4' . $this->returnAttributes($attributes) . '>' . $heading . '</h4>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function h5($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h5' . $this->returnAttributes($attributes) . '>' . $heading . '</h5>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function h6($heading, $attributes = [], $render = true)
    {
        $htmlScript = '<h6' . $this->returnAttributes($attributes) . '>' . $heading . '</h6>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function alert($text, $type = 'primary', $attributes = [], $render = true)
    {
        if (!isset($attributes['class'])) $attributes['class'] = 'alert alert-' . $type;
        if (!isset($attributes['role'])) $attributes['role'] = 'alert';
        $htmlScript = '<div' . $this->returnAttributes($attributes) . '>' . $text . '</div>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function badge($text, $type = 'primary', $attributes = [], $render = true)
    {
        if (!isset($attributes['class'])) $attributes['class'] = 'badge badge-' . $type;
        $htmlScript = '<span' . $this->returnAttributes($attributes) . '>' . $text . '</span>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function button($text, $type = 'primary', $attributes = [], $render = true)
    {
        if (!isset($attributes['class'])) $attributes['class'] = 'btn btn-' . $type;
        if (!isset($attributes['type'])) $attributes['type'] = 'button';
        $htmlScript = '<button' . $this->returnAttributes($attributes) . '>' . $text . '</button>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function divOpen($attributes = [], $render = true)
    {
        $htmlScript = '<div' . $this->returnAttributes($attributes) . '>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function divClose($render = true)
    {
        $htmlScript = '</div>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function paragraph($text, $attributes = [], $render = true)
    {
        $htmlScript = '<p' . $this->returnAttributes($attributes) . '>' . $text . '</p>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function link($href = '', $text = '', $attributes = [], $render = true)
    {
        if (!isset($attributes['href'])) $attributes['href'] = $href;
        $htmlScript = '<a' . $this->returnAttributes($attributes) . '>' . $text . '>';
        return $this->renderOrReturn($htmlScript, $render);
    }

    public function render()
    {
        echo $this->rendered;
    }

    private function returnAttributes($attributes)
    {
        $return = '';
        foreach ($attributes as $key => $value) {
            $return .= ' ' . $key . '="' . $value . '"';
        }
        return $return;
    }

    private function renderOrReturn($script, $render)
    {
        if($render) {
            $this->addHtmlScript($script);
        }
        return $script;
    }
}