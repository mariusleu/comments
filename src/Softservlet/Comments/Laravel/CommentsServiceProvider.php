<?php namespace Softservlet\Comments\Laravel;

use Illuminate\Support\ServiceProvider;
use Softservlet\Comments\Laravel\Repo\CommentRepository;
use Softservlet\Comments\Laravel\ORM\CommentDB;


class CommentsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('softservlet/comments');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Softservlet\Comments\Repo\CommentRepositoryInterface', function($app)
		{
				return new CommentRepository(	
					$app->make('Friends\Repo\UserRepositoryInterface'),
					new CommentDB
				);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
