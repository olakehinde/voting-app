<?php

namespace App\Repositories;

use App\Models\NominationUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominationUserRepository
 * @package App\Repositories
 * @version October 18, 2018, 7:12 pm UTC
 *
 * @method NominationUser findWithoutFail($id, $columns = ['*'])
 * @method NominationUser find($id, $columns = ['*'])
 * @method NominationUser first($columns = ['*'])
*/
class NominationUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nomination_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NominationUser::class;
    }
}
