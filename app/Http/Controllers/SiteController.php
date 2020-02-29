<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Repositories\SiteRepository;
use App\Type_site;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteController extends AppBaseController
{
    /** @var  SiteRepository */
    private $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Site.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sites = $this->siteRepository->paginate(10);

        return view('sites.index')
            ->with('sites', $sites);
    }

    /**
     * Show the form for creating a new Site.
     *
     * @return Response
     */
    public function create()
    {
        $tipos = \App\Site_type::all('name', 'id');
        $site = new \App\Site();
        return view('sites.create')
                ->with('tipos', $tipos)
                ->with('site', $site);
    }

    /**
     * Store a newly created Site in storage.
     *
     * @param CreateSiteRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteRequest $request)
    {
        $input = $request->all();

        $site = $this->siteRepository->create($input);

        Flash::success('Site saved successfully.');

        return redirect(route('sites.index'));
    }

    /**
     * Display the specified Site.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        return view('sites.show')->with('site', $site);
    }

    /**
     * Show the form for editing the specified Site.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }
        $tipos = \App\Site_type::all('name', 'id');
        return view('sites.edit')->with('site', $site)->with('tipos', $tipos);
    }

    /**
     * Update the specified Site in storage.
     *
     * @param int $id
     * @param UpdateSiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteRequest $request)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        $site = $this->siteRepository->update($request->all(), $id);

        Flash::success('Site updated successfully.');

        return redirect(route('sites.index'));
    }

    /**
     * Remove the specified Site from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            Flash::error('Site not found');

            return redirect(route('sites.index'));
        }

        $this->siteRepository->delete($id);

        Flash::success('Site deleted successfully.');

        return redirect(route('sites.index'));
    }
}
