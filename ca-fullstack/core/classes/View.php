<?php

namespace Core;
//naudosime atvejais, kuriais noresime viename lange isspausdinti automatiskai kelias ir daugiau formas
class View
{
    protected $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    
    public function &getData()
    {
        return $this->data;
    }

    public function render(string $template_path)
    {
        //Check if template exists
        if (!file_exists($template_path)) {
            throw (new \Exception("Template with filename: " . "$template_path dose not exsist!"));
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }

}