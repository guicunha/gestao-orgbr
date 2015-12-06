<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 06/12/15
 * Time: 19:40
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }


}