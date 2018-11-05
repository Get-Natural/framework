<?php
    /*
     * Load Composer packages
     */
    require "../vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Philo\Blade\Blade;

$views = __DIR__ . '/../resources/views';
$cache = __DIR__ . '/../Natural/Cache';

$blade = new Blade($views, $cache);

$compiler = $blade->getCompiler();
$compiler->directive('dumpExit', function ($expression) {
    return "<?php echo dump_exit({$expression}); ?>";
});
echo $blade->view()->make('welcome')->render();


$dotenv = new Dotenv\Dotenv(__DIR__. '/..');
$dotenv->load();
