<?php  
/**
 * View
 */
namespace Core;
class View
{
	public static function render($view, $args = null)
	{
		extract($args , EXTR_SKIP);
		$view = str_replace('.', '/', $view );
		$view .= '.php';
		$file = "../App/Views/$view";

		if (is_readable($file)) {
			require $file;
		}else{
			throw new \Exception("View file note found. $file can not be found");
		}
	}

	public static function renderTemplate($template, $args = []){
		// var_dump($args);
		// die;		
		static $twig = null;
		$template = str_replace('.', '/', $template );
		$template .= '.html';
		$file = "../App/Views/$template";
		if ($twig === null) {
			$loader = new \Twig_Loader_Filesystem('../App/Views');
			$twig = new \Twig_Environment($loader);
		}
		echo $twig->render($template, $args);
	}
}