<?php

namespace App\Http\Controllers\Bands;

use App\Models\Band;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\BandUpdateRequest;
use App\Repositiroes\Contracts\BandRepositoryInterface;

class BandController extends Controller
{
    /**
     * @var BandRepositoryInterface
     */
    protected $bands;

    /**
     * BandController constructor.
     * @param BandRepositoryInterface $bands
     */
    public function __construct(BandRepositoryInterface $bands)
    {
        $this->bands = $bands;
    }

    /**
     * @param Band $band
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Band $band)
    {
        $this->authorize('view', $band);

        return view('bands.show');
    }


    /**
     * @param Band $band
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Band $band)
    {
        $this->authorize('view', $band);

        return view('bands.edit');
    }

    /**
     * @param BandUpdateRequest $request
     * @param Band $band
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(BandUpdateRequest $request, Band $band)
    {
        $this->authorize('update', $band);

        $this->bands->update($band, $request->validated());

        return back();
        return redirect(route('bands.show', $band->slug))
            ->withSuccess(__('bands.updated'));
    }
}
