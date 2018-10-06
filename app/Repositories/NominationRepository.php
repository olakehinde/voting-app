<?php

namespace App\Repositories;

use App\Models\Nomination;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominationRepository
 * @package App\Repositories
 * @version October 6, 2018, 2:59 pm UTC
 *
 * @method Nomination findWithoutFail($id, $columns = ['*'])
 * @method Nomination find($id, $columns = ['*'])
 * @method Nomination first($columns = ['*'])
*/
class NominationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'bio',
        'gender',
        'occupation',
        'reasons_for_nomination',
        'no_of_nominations',
        'category_id',
        'user_id',
        'is_won',
        'is_admin_selected'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nomination::class;
    }
}
