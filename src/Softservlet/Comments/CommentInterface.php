<?php namespace Softservlet\Comments;

interface CommentInterface
{
	/**
	 * @brief get comment content
	 *
	 * @return string
	 */
	public function getContent();
	
	/**
	 * @brief get the commenter id
	 * 
	 * @return int id
	 */
	public function getCommenterId();
	
	/**
	 * @brief get the commentable id
	 * 
	 * @return int id
	 */
	public function getCommentableId();
	
	/**
	 * @brief get the comment id
	 *
	 * @return int id
	 */
	public function getId();
	
	/**
	 * @brief get parent id
	 * 
	 * @return int id
	 */
	public function getParentId();
	
	/**
	 * @brief return the commenter type
	 * 
	 * @return string commenter type
	 */
	public function getCommenterType();
	
	/**
	 * @brief get the commentable type
	 * 
	 * @return string commentable type
	 */
	public function getCommentableType();
}	
