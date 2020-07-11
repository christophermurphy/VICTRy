<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('repo_id');
            $table->string('name');
            $table->string('url');
            $table->date('created_date');
            $table->date('last_push_date');
            $table->text('description');
            $table->integer('stargazers_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('github_projects');
    }
}
