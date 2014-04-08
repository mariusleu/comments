<?php namespace Softservlet\Comments\Repo;

interface CommenterFinderInterface
{
	/**
	 * @brief find a commenter by id
	 *
	 * @param int id
	 *
	 * @return CommenterInterface
	 */
	public function find($id);
}
