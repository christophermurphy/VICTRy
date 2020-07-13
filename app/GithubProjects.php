<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubProjects extends Model
{
    protected $table = 'github_projects';

    protected $fillable = ['repo_id', 'name', 'url', 'created_date', 'last_push_date', 'description', 'stargazers_count'];

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
