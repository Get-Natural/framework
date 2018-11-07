<?php
/**
 * Class View
 * @package Natural\App\Views
 */
namespace Natural\App\Views;

use Philo\Blade\Blade;

class View
{
    public $views = BASE_PATH . 'resources/views';
    public $cache = BASE_PATH . 'Cache';

    private $blade;

    public function __construct()
    {
        $this->blade = new Blade($this->views, $this->cache);
    }

    public static function make($view = null, $data = []) {
        $views = BASE_PATH . 'resources/views';
        $cache = STORAGE_PATH . 'cache';
        $blade = new Blade($views, $cache);
        echo $blade->view()->make($view, $data)->render();
    }

    public function directive($directive) {
        $blade = new Blade($this->views, $this->cache);
        $compiler = $blade->getCompiler();
        $compiler->directive($directive);
    }

}
