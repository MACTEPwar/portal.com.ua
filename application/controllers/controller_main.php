<?php

class Controller_Main extends Controller
{

	function action_index()
	{
	    if ($_SESSION['IsGuest'])
		    $this->view->generate('main_view.php', 'template_view.php',"");
	    else
	        $this ->view->redirect('login', 'template_view.php',"");
	}
}