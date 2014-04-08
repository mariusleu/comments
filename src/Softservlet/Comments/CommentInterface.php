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
	 * @brief get the comment id
	 *
	 * @return int id
	 */
	public function getId();
}	
