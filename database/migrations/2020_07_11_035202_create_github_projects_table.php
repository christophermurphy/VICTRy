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
            $table->integer('repo_id')->unique('repo_id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->dateTime('created_date');
            $table->dateTime('last_push_date');
            $table->text('description')->nullable();
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
