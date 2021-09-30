<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomepagesTables extends Migration
{
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->foreignId('template_id')->nullable()->constrained()->onDelete('set null');

        });

        Schema::create('homepage_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'homepage');

            $table->string('title', 200)->nullable();

            $table->string('heading')->nullable();
            $table->string('subheading')->nullable();

            $table->text('intro_content')->nullable();
        });

        Schema::create('homepage_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'homepage');
        });


    }

    public function down()
    {
        Schema::dropIfExists('homepage_revisions');
        Schema::dropIfExists('homepages');
    }
}
