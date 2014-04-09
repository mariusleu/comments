<?php namespace Softservlet\Comments\Repo;

use Softservlet\Comments\CommentInterface;
use Softservlet\Comments\Repo\CommenterFinderInterface;

abstract class AbstractCommentRepository implements CommentRepositoryInterface
{
	/**
	 * @brief commenter finder instance
	 *
	 * @var CommenterFinder
	 */
	protected $finder;
	
	/**
	 * @brief class constructor
	 * 
	 * @param CommenterFinder instance
	 */
	public function __construct(CommenterFinderInterface $repo)
	{
		$this->finder = $repo;
	}

	/**
	 * @brief get the object that posted a comment
	 *
	 * @param CommentInterface comment
	 * 
	 * @return CommenterInterface
	 */
	public function getCommenter(CommentInterface $comment, $type)
	{
		return $this->finder->find($comment->getCommenterId(), $comment->getCommenterType());
	}

}
