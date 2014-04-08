<?php namespace Softservlet\Comments\Laravel;

use Softservlet\Comments\CommentInterface;
use Softservlet\Comments\Laravel\ORM\CommentDB;

class Comment implements CommentInterface
{

	/**
	 * @brief eloquent orm instance of comment
	 *
	 * @var CommentDB
	 */
	protected $orm;
	
	
	/** 
	 * @brief class constructor
	 *
	 * @param CommentDB comment eloquent instance
	 */
	public function __construct(CommentDB $comment)
	{
		$this->orm = $comment;
	}

	/**
	 * @brief get comment content
	 *
	 * @return string
	 */
	public function getContent()
	{
		return $this->orm->content;
	}

	/**
	 * @brief get the comment id
	 *
	 * @return int id
	 */
	public function getId()
	{
		return $this->orm->id;
	}
	
}
