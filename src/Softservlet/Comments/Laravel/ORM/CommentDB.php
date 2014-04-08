<?php namespace Softservlet\Comments\Laravel\ORM;

use Illuminate\Database\Eloquent\Model;

class CommentDB extends Model
{
	/**
	 * @brief model table in db
	 *
	 * @var string
	 */
	protected $table = 'comments';

	
	/**
	 * @brief eager loads children
	 *
	 * @var array
	 */
	protected $includes = array('children');


	/**
	 * @brief return relationship to this children
	 *
	 * @return arrayinterface
	 */
	public function children()
	{
		return $this->hasMany('Softservlet\Comments\Laravel\ORM\CommentDB', 'parent_id');
	}
}
