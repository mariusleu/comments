### Comments
============

This is an package that allows you to add comments to anything entity in your application.
For example if you have a blog, you may want to add comments to articles, or if you have an social networking application, you may want to add comments on anything, like facebook does.

#### Usage

The first thing that you need to do is to create your implementation of "what will be commented" and "who will post the comment".

The `CommenterInterface`  describes the objects that will post the comments.

````php
use Softservlet\Comments\CommenterInterface;

class User implements CommenterInterface
{
	...
	
	//get the id of the user that post a comment
	public function getId()
	{
		return $this->id;
	}
	
	//get the common name of the user that post
	//a comment, so we will can display it
	public function getName()
	{
		if(strlen($this->firstname) > 0) {
			return $this->firstname;
		}

		return $this->email;
	}
}
````

The `CommentableInterface` describes the objects that are commented by commenters.

````php
use Softservlet\Comments\Commentableinterface;

class Article implements CommentableInterface
{
	...

	//get the id of the article so we will can
	//attach the comment to it
	public function getId()
	{
		return $this->id;
	}
}
````
