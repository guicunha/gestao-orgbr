<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 09/12/15
 * Time: 01:04
 */

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Project;


class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

}