<?php namespace Softservlet\Comments;

interface CommentableInterface
{
	/**
	 * @brief get the id of the commentable object
	 *
	 * @return int id
	 */
	public function getId();
}
