<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBalancesAPIRequest;
use App\Http\Requests\API\UpdateBalancesAPIRequest;
use App\Models\Balances;
use App\Repositories\BalancesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BalancesController
 * @package App\Http\Controllers\API
 */

class BalancesAPIController extends AppBaseController
{
    /** @var  BalancesRepository */
    private $balancesRepository;

    public function __construct(BalancesRepository $balancesRepo)
    {
        $this->balancesRepository = $balancesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/balances",
     *      summary="Get a listing of the Balances.",
     *      tags={"Balances"},
     *      description="Get all Balances",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Balances")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $balances = $this->balancesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($balances->toArray(), 'Balances retrieved successfully');
    }

    /**
     * @param CreateBalancesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/balances",
     *      summary="Store a newly created Balances in storage",
     *      tags={"Balances"},
     *      description="Store Balances",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Balances that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Balances")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Balances"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBalancesAPIRequest $request)
    {
        $input = $request->all();

        $balances = $this->balancesRepository->create($input);

        return $this->sendResponse($balances->toArray(), 'Balances saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/balances/{id}",
     *      summary="Display the specified Balances",
     *      tags={"Balances"},
     *      description="Get Balances",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Balances",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Balances"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Balances $balances */
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            return $this->sendError('Balances not found');
        }

        return $this->sendResponse($balances->toArray(), 'Balances retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBalancesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/balances/{id}",
     *      summary="Update the specified Balances in storage",
     *      tags={"Balances"},
     *      description="Update Balances",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Balances",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Balances that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Balances")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Balances"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBalancesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Balances $balances */
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            return $this->sendError('Balances not found');
        }

        $balances = $this->balancesRepository->update($input, $id);

        return $this->sendResponse($balances->toArray(), 'Balances updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/balances/{id}",
     *      summary="Remove the specified Balances from storage",
     *      tags={"Balances"},
     *      description="Delete Balances",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Balances",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Balances $balances */
        $balances = $this->balancesRepository->find($id);

        if (empty($balances)) {
            return $this->sendError('Balances not found');
        }

        $balances->delete();

        return $this->sendSuccess('Balances deleted successfully');
    }
}
