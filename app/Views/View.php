<?php
/**
 * Class View
 * @package Natural\App\Views
 */
namespace App\Views;

use Philo\Blade\Blade;

class View
{
    private $blade;

    public function __construct()
    {
        $views = BASE_PATH . getenv('VIEW_PATH');
        $cache = STORAGE_PATH . '/cache';
        $this->blade = new Blade($views, $cache);
    }

    public function make($view = null, $data = []) {
        echo $this->blade->view()->make($view, $data)->render();
    }

    public function directive($directive) {
        $blade = new Blade($this->views, $this->cache);
        $compiler = $blade->getCompiler();
        $compiler->directive($directive);
    }

}
