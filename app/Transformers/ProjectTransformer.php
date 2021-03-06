<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 31/12/15
 * Time: 01:13
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['members'];

    public function transform(Project $project)
    {

        return[
          'project_id' => $project->id,
          'name' => $project->name,
          'client_id' => $project->client_id,
          'owner_id' => $project->owner_id,
          'description' => $project->description,
          'project_progress' => $project->progress,
          'project_status' => $project->status,
          'due_date' => $project->due_date
        ];

    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

}