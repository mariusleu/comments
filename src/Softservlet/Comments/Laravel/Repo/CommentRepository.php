<?php namespace Softservlet\Comments\Laravel\Repo;

use Softservlet\Comments\Repo\AbstractCommentRepository;
use Softservlet\Comments\CommentableInterface;
use Softservlet\Comments\CommentInterface;
use Softservlet\Comments\Laravel\ORM\CommentDB;
use Softservlet\Comments\Laravel\Comment;
use Softservlet\Comments\Repo\CommenterFinderInterface;
use Softservlet\Comments\CommenterInterface;

class CommentRepository extends AbstractCommentRepository 
{
	/**
	 * @brief eloqunt model instance of comment
	 *
	 * @var CommentDB
	 */
	protected $orm;


	public function __construct(CommenterFinderInterface $finder, CommentDB $orm)
	{
		parent::__construct($finder);
		$this->orm = $orm;
	}

	/** 
	 * @brief create a new comment
	 *
	 * @param the content of the comment
	 * @param CommentableInterface object to attach comment
	 * @param CommentInterface default is null
	 *			  An instance of CommentableInterface if you want that this
	 *				comment to be creaded as a reply to it
	 *  
	 * @return commentinterface comment that was created
	 */
	public function create($content, CommentableInterface $commentable, CommenterInterface $commenter, CommentInterface $comment = null)
	{
		$this->orm->unguard();

		$data = array(
			'content' => $content,
			'commentable_id' => $commentable->getId(),
			'commentable_type' => get_class($commentable),
			'commenter_type' => get_class($commenter),
			'commenter_id' => $commenter->getId()
		);

		if(!is_null($comment)) {
			$data['parent_id'] = $comment->getId();
		}

		return new Comment($this->orm->create($data));
	}

	/**
	 * @brief delete a comment by id
	 *
	 * @param int id
	 *
	 * @return void
	 */
	public function delete($id)
	{
		$this->orm->where('parent_id','=',$id)->delete();

		return $this->orm->where('id','=',$id)->delete();
	}

	/**
	 * @brief get the comments of a commentable object
	 *
	 * @param CommentableInterface commentable object
	 *
	 * @return Array<CommentInterface>
	 */
	public function get(CommentableInterface $commentable)
	{
		$data = array();

		foreach($this->orm->where('commentable_id','=',$commentable->getId())
		->where('commentable_type','=',get_class($commentable))->get() as $comment) {
			
				$data[] = new Comment($comment);
		}

		return $data;
	}

	/**
	 * @brief find a comment by id
	 *
	 * @param int $id
	 * 
	 * @return CommentInterface $comment
	 */
	public function find($id)
	{
		$comment = $this->orm->find($id);

		if($comment == null) {
			return null;
		}

		return new Comment($comment);
	}

	/**
	 * @brief update the comment content
	 *
	 * @param string new content
	 *
	 * @return void
	 */
	public function edit(CommentInterface $comment, $string)
	{
		return $this->orm->where('id','=',$comment->getId())->update(array(
			'content' => $string
		));
	}	

}
