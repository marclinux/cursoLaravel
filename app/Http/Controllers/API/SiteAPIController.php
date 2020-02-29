<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteAPIRequest;
use App\Http\Requests\API\UpdateSiteAPIRequest;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SiteController
 * @package App\Http\Controllers\API
 */

class SiteAPIController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     * GET|HEAD /sites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sites = $this->siteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sites->toArray(), 'Sites retrieved successfully');
    }

    /**
     * Store a newly created Site in storage.
     * POST /sites
     *
     * @param CreateSiteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteAPIRequest $request)
    {
        $input = $request->all();

        $site = $this->siteRepository->create($input);

        return $this->sendResponse($site->toArray(), 'Site saved successfully');
    }

    /**
     * Display the specified Site.
     * GET|HEAD /sites/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        return $this->sendResponse($site->toArray(), 'Site retrieved successfully');
    }

    /**
     * Update the specified Site in storage.
     * PUT/PATCH /sites/{id}
     *
     * @param int $id
     * @param UpdateSiteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        $site = $this->siteRepository->update($input, $id);

        return $this->sendResponse($site->toArray(), 'Site updated successfully');
    }

    /**
     * Remove the specified Site from storage.
     * DELETE /sites/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        $site->delete();

        return $this->sendSuccess('Site deleted successfully');
    }
}
