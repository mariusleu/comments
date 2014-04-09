<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
				$table->increments('id');
				$table->timestamps();
				$table->integer('parent_id')->unsigned()->nullable();
				$table->text('content');
				
				$table->integer('commentable_id')->unsigned();
				$table->string('commentable_type',255);
				$table->integer('commenter_id')->unsigned();
				

				$table->index('commentable_id');
				$table->index('commentable_type');
				$table->index('commenter_id');
				$table->index('parent_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
