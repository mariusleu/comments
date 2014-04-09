Comments
============

This is an package that allows you to add comments to anything entity in your application.
For example if you have a blog, you may want to add comments to articles, or if you have an social networking application, you may want to add comments on anything, like facebook does.

This package implementation is documented and designed to work with Laravel 4 framework, but you can easily adapt it to your framework.

## Creating implemetations

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
## Laravel integration

Go to app/config/app.php file.

Register the package with the laravel application 
	
	...

	'providers' => array(
		...
		'Softservlet\Comments\CommentsServiceProvider'
	)

Register the comment facade for an fancy usage

	...

	'aliases' => array(
		...
		'Comment' => 'Softservlet\Comments\CommentsFacade'
	)

## The repository

Now, the entire usage is based on the `CommentRepositoryInterface`, which has an implementation for mysql database using Laravel connection layer.

The implementation can be found at `Softservlet\Comments\Laravel\Repo\CommentRepository`.
In the following examples the `Comment` will be the facade accessor of the `CommentRepository` and the `$comment` variable will be an instance of `Softservlet\Comments\Laravel\Comment` object that implements the `Softservlet\Comments\CommentInterface` interface.

#### Find a comment by id
````php
//The find method accepts as parameter an integer
//that represents the id and returns an CommentInterface
//or null if the comment was not found
$comment = Comment::find(1);
````
#### Create a comment
````php
//The object that will be commented
$commentable = new Article();

//The object that will post the comment
$commenter = new User();

//Optionally we can give another comment that
//the following one will belong to, so it will
//be created as an reply.
$parentComment = Comment::find(100);

//this will return an Softservlet\CommentInterface object
//and lets assume that it's id will be 1
$comment = Comment::create('Nice article!', $commentable, $commenter, $parentComment);
````

#### Get comments that belongs to an 'Commentable' object

Once we've added a comment to the article, we want to retrieve all the comments that belongs to it.

````php
$article = new Article();

//this method returns an array with all comments
//that belongs to the article object
$comments = Comment::get($article);

foreach($comments as $comment) {
	echo $comment->getContent() . PHP_EOL;
}
````

#### Update a comment's content
````php
$comment = Comment::find(1);

//this method accepts as parameter the
//comment object that we need to update
//and the new content of it
Comment::update($comment, 'Very nice article!');
````

#### Delete a comment
````php
//This method accepts as parameter the comment id
Comment::delete(1);
````
