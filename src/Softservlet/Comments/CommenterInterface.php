<?php namespace Softservlet\Comments;

interface CommenterInterface
{
	/**
	 * @brief get the commenter ID
	 *
	 * @return int id
	 */
	public function getId();

	/**
	 * @brief get the commenter name
	 *
	 * @return string name
	 */
	public function getName();
}
