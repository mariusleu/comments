<?php namespace Softservlet\Comments\Repo;

interface CommenterFinderInterface
{
	/**
	 * @brief find a commenter by id
	 *
	 * @param int id
	 * @param string type - commenter type
	 *
	 * @return CommenterInterface
	 */
	public function find($id, $type);
}
