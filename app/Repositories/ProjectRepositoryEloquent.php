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
use CodeProject\Presenters\ProjectPresenter;


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

    public function isOwner($projectId, $userId)
    {
        if (count($this->findWhere(['id' => $projectId, 'owner_id' => $userId]))) {
            return true;
        }
        return false;
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->find($projectId);

        foreach($project->members as $member)
        {
            if($member->id == $memberId)
            {
                return true;
            }
        }

        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }


}