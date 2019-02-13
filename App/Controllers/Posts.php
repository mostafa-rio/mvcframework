<?php
/**
 * posts controller 
 */
namespace App\Controllers;
use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller{
    
 	public function after()
 	{
 		// echo '<br/> its rewrited';
 	}

    public function addNewAction(){
        // echo 'Hello from the addNew action in the Posts controller';
    }

    public function indexAction()
    {
       $posts = Post::getPosts();
    	View::renderTemplate('Posts.index', [
			'posts' =>  $posts
		]);
    }

}