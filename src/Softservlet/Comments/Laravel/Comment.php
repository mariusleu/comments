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
	public function __construct($orm)
	{
		$this->orm = $orm;
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
	
	/**
	 * @brief get the commenter id
	 * 
	 * @return int id
	 */
	public function getCommenterId()
	{
		return $this->orm->commenter_id;
	}
	
	/**
	 * @brief get the commentable id
	 * 
	 * @return int id
	 */
	public function getCommentableId()
	{
		return $this->orm->commentable_id;
	}
	
	/**
	 * @brief get parent id
	 *
	 * @return int id
	 */	
	public function getParentId()
	{
		return $this->orm->parent_id;
	}
	
	/**
	 * @brief return the commenter type
	 *
	 * @return string commenter type
	 */
	public function getCommenterType()
	{
		return $this->orm->commenter_type;
	}
	
	/**
	 * @brief get the commentable type
	 *
	 * @return string commentable type
	*/
	public function getCommentableType()
	{
		return $this->orm->commentable->type;
	}
}