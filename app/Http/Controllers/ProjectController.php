<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;
    /**
     * @param  ProjectRepository $repository
     * @param ProjectService $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->checkProjectPermissions($id))
            return $this->repository->find($id);
        else
         return ['error' => 'Access Forbidden'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkProjectOwner($id))
            $this->repository->find($id)->update($request->all());
        else
            return ['error' => 'Access Forbidden'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->checkProjectOwner($id))
            $this->repository->find($id)->delete();
        else
            return ['error' => 'Access Forbidden'];
    }

    private function checkProjectOwner($projectId)
    {

        $userId = \Authorizer::getResourceOwnerId();

        if($this->repository->isOwner($projectId , $userId) == false)
        {
            return false;
        }

        return true;
    }

    private function checkProjectMember($projectId)
    {

        $userId = \Authorizer::getResourceOwnerId();

        if($this->repository->hasMember($projectId , $userId) == false)
        {
            return false;
        }

        return true;
    }

    private function checkProjectPermissions($projectId)
    {

        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId))
            return true;
        else
            return false;

    }
}
