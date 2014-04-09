<?php namespace Softservlet\Comments\Repo;

use Softservlet\Comments\CommentableInterface;
use Softservlet\Comments\CommentInterface;
use Softservlet\Comments\CommenterInterface;

interface CommentRepositoryInterface
{
	/** 
	 * @brief create a new comment
	 *
	 * @param the content of the comment
	 * @param CommentableInterface object to attach comment
	 * @param CommenterInterface object who pasted the comment
	 * @param CommentInterface default is null
	 *			  An instance of CommentableInterface if you want that this
	 *				comment to be creaded as a reply to it
	 *  
	 * @return commentinterface comment that was created
	 */
	public function create($content, CommentableInterface $commentable, CommenterInterface $commenter, CommentInterface $comment = null);

	/**
	 * @brief delete a comment by id
	 *
	 * @param int id
	 *
	 * @return void
	 */
	public function delete($id);	

	/**
	 * @brief get the comments of a commentable object
	 *
	 * @param CommentableInterface commentable object
	 *
	 * @return Array<CommentInterface>
	 */
	public function get(CommentableInterface $commentable);

	/**
	 * @brief get the object that posted a comment
	 *
	 * @param CommentInterface comment
	 * 
	 * @return CommenterInterface
	 */
	public function getCommenter(CommentInterface $comment, $type);

	/**
	 * @brief find a comment by id
	 *
	 * @param int $id
	 * 
	 * @return CommentInterface $comment
	 */
	public function find($id);

	/**
	 * @brief update the comment content
	 *
	 * @param string new content
	 *
	 * @return void
	 */
	public function edit(CommentInterface $comment, $string);
}
