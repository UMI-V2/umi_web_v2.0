<?php

namespace App\Repositories;

use App\Models\ProductFile;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ProductFileRepository
 * @package App\Repositories
 * @version March 31, 2022, 7:00 am UTC
*/

class ProductFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_produk',
        'file',
        'video',
        'photo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductFile::class;
    }

    public function createProductFile(Request $request){
        $file = $request->file('image_url');
        $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $path = 'storage/assets/products/'.uniqid().'.'.$extension;
        $file->move(public_path('storage/assets/products'), $path);

        $input = $request->all();
        $input['image_url'] = $path;

        return $this->create($input);
    }
}
