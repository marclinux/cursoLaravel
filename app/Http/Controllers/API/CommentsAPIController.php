<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommentsAPIRequest;
use App\Http\Requests\API\UpdateCommentsAPIRequest;
use App\Models\Comments;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CommentsController
 * @package App\Http\Controllers\API
 */

class CommentsAPIController extends AppBaseController
{
    /** @var  CommentsRepository */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * Display a listing of the Comments.
     * GET|HEAD /comments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comments = $this->commentsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully');
    }

    /**
     * Store a newly created Comments in storage.
     * POST /comments
     *
     * @param CreateCommentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentsAPIRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        return $this->sendResponse($comments->toArray(), 'Comments saved successfully');
    }

    /**
     * Display the specified Comments.
     * GET|HEAD /comments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comments $comments */
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully');
    }

    /**
     * Update the specified Comments in storage.
     * PUT/PATCH /comments/{id}
     *
     * @param int $id
     * @param UpdateCommentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comments $comments */
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        $comments = $this->commentsRepository->update($input, $id);

        return $this->sendResponse($comments->toArray(), 'Comments updated successfully');
    }

    /**
     * Remove the specified Comments from storage.
     * DELETE /comments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comments $comments */
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            return $this->sendError('Comments not found');
        }

        $comments->delete();

        return $this->sendSuccess('Comments deleted successfully');
    }
}
