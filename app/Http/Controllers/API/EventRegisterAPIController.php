<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventRegisterAPIRequest;
use App\Http\Requests\API\UpdateEventRegisterAPIRequest;
use App\Models\EventRegister;
use App\Repositories\EventRegisterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EventRegisterController
 * @package App\Http\Controllers\API
 */

class EventRegisterAPIController extends AppBaseController
{
    /** @var  EventRegisterRepository */
    private $eventRegisterRepository;

    public function __construct(EventRegisterRepository $eventRegisterRepo)
    {
        $this->eventRegisterRepository = $eventRegisterRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/eventRegisters",
     *      summary="Get a listing of the EventRegisters.",
     *      tags={"EventRegister"},
     *      description="Get all EventRegisters",
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
     *                  @SWG\Items(ref="#/definitions/EventRegister")
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
        $eventRegisters = $this->eventRegisterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($eventRegisters->toArray(), 'Event Registers retrieved successfully');
    }

    /**
     * @param CreateEventRegisterAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/eventRegisters",
     *      summary="Store a newly created EventRegister in storage",
     *      tags={"EventRegister"},
     *      description="Store EventRegister",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EventRegister that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EventRegister")
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
     *                  ref="#/definitions/EventRegister"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEventRegisterAPIRequest $request)
    {
        $input = $request->all();

        $eventRegister = $this->eventRegisterRepository->create($input);

        return $this->sendResponse($eventRegister->toArray(), 'Event Register saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/eventRegisters/{id}",
     *      summary="Display the specified EventRegister",
     *      tags={"EventRegister"},
     *      description="Get EventRegister",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EventRegister",
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
     *                  ref="#/definitions/EventRegister"
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
        /** @var EventRegister $eventRegister */
        $eventRegister = $this->eventRegisterRepository->find($id);

        if (empty($eventRegister)) {
            return $this->sendError('Event Register not found');
        }

        return $this->sendResponse($eventRegister->toArray(), 'Event Register retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEventRegisterAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/eventRegisters/{id}",
     *      summary="Update the specified EventRegister in storage",
     *      tags={"EventRegister"},
     *      description="Update EventRegister",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EventRegister",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="EventRegister that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/EventRegister")
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
     *                  ref="#/definitions/EventRegister"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEventRegisterAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventRegister $eventRegister */
        $eventRegister = $this->eventRegisterRepository->find($id);

        if (empty($eventRegister)) {
            return $this->sendError('Event Register not found');
        }

        $eventRegister = $this->eventRegisterRepository->update($input, $id);

        return $this->sendResponse($eventRegister->toArray(), 'EventRegister updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/eventRegisters/{id}",
     *      summary="Remove the specified EventRegister from storage",
     *      tags={"EventRegister"},
     *      description="Delete EventRegister",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of EventRegister",
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
        /** @var EventRegister $eventRegister */
        $eventRegister = $this->eventRegisterRepository->find($id);

        if (empty($eventRegister)) {
            return $this->sendError('Event Register not found');
        }

        $eventRegister->delete();

        return $this->sendSuccess('Event Register deleted successfully');
    }
}
