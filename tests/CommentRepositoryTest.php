<?php 

use Softservlet\Comments\Laravel\Repo\CommentRepository as Repo;
use Softservlet\Comments\Laravel\ORM\CommentDB;

include __DIR__ . '/helpers.php';


class CommentRepositoryTest extends TestCase
{
	protected $comment;
	protected $children;
	protected $commenter;
	protected $commentable;

	
	public function __construct()
	{
		$this->repo = new Repo(new CommenterFinder ,new CommentDB);	
	}
	
	
	public function testRepo()
	{
		$this->rcreate();
		$this->rfind();
		$this->rget();
		$this->redit();
		$this->rdelete();
	}	

	//test create
	public function rcreate()
	{
		$commenter = new Commenter(1, 'John M.');
		$commentable = new Commentable(11);
		$this->commenter = $commenter;
		$this->commentable = $commentable;

		
		$comment = $this->repo->create(
			'My Fist Comment',
			$commentable,
			$commenter
		);
		
		//create a children
		$children = $this->repo->create(
			'First Children Comment',
			$commentable,
			$commenter,
			$comment
		);

		$this->comment = $comment;
		$this->children = $children;	
		
		$this->assertEquals($comment->getId(), $children->getParentId());
		$this->assertEquals($comment->getCommentableId(), $commentable->getId());
		$this->assertEquals($comment->getCommenterId(), $commenter->getId());
	}

	//test find
	public function rfind()
	{
		$comment = $this->repo->find($this->comment->getId());
		
		$this->assertEquals($comment->getId(), $this->comment->getId());
	}
	
	//test get
	public function rget()
	{
		$comments = $this->repo->get($this->commentable);
		$ids = array();
		foreach($comments as $c) {
			$ids[] = $c->getId();
		}	
		$this->assertContains($this->comment->getId(), $ids);
		$this->assertContains($this->children->getId(), $ids);
	}
	
	//test edit
	public function redit()
	{
		$this->repo->edit($this->comment, 'new');
		$comment = $this->repo->find($this->comment->getId());
		
		$this->assertEquals($comment->getContent(), 'new');
	}
	
	//test delete
	public function rdelete()
	{
		$this->repo->delete($this->comment->getId());
		
		$comment = $this->repo->find($this->comment->getId());
		$children = $this->repo->find($this->children->getId());
		
		$this->assertEquals(null, $comment);
		$this->assertEquals(null, $children);
	}
}