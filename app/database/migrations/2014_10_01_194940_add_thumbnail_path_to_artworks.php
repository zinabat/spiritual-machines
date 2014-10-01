<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddThumbnailPathToArtworks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('artworks', function(Blueprint $table)
		{
			$table->string('thumbnail_path');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('artworks', function(Blueprint $table)
		{
			$table->dropColumn('thumbnail_path');
		});
	}

}
