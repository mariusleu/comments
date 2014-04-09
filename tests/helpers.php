<?php 

use Softservlet\Comments\CommentableInterface;
use Softservlet\Comments\CommenterInterface;
use Softservlet\Comments\Repo\CommenterFinderInterface;

class Commentable implements CommentableInterface
{
	public function __construct($id)
	{
		$this->id = $id;
	}
	
	public function getId()
	{
		return $this->id;
	}	
}

class Commenter implements CommenterInterface
{
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
}

class CommenterFinder implements CommenterFinderInterface
{
	public function find($id, $type)
	{
		return new Commenter($id, "Commenter #{$id}");
	}	
}