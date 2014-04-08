<?php namespace Softservlet\Comments\Laravel;

use Illuminate\Support\Facades\Facade;


class CommentsFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Softservlet\Comments\Repo\CommentRepositoryInterface';
	}
}
