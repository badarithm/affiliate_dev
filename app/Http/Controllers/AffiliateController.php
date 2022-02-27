<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliateFileUploadRequest;
use App\Models\Dtos\AffiliateEntryDto;
use App\Services\DistanceCalculationService;
use App\Services\FileParserService;
use Illuminate\View\View;

class AffiliateController extends Controller
{
    protected DistanceCalculationService $distanceCalculationService;

    protected FileParserService $fileParserService;

    public function __construct(DistanceCalculationService $distanceCalculationService, FileParserService $fileParserService)
    {
        $this->distanceCalculationService = $distanceCalculationService;
        $this->fileParserService = $fileParserService;
    }

    /**
     * Doesn't belong here, but cannot allow callables in the route
     */
    public function welcome(): View
    {
        return view('welcome');
    }

    /**
     * Serves file submission form only
     */
    public function form(): View
    {
        return view('implementation.file_submit_view');
    }

    /**
     *  Process file and serve filtered list
     */
    public function affiliateList(AffiliateFileUploadRequest $request): View
    {
        $collection =$this->fileParserService
            ->parseAffiliateCoordinateFile($request->getAffiliateFile())
            ->map(function(AffiliateEntryDto $entry): AffiliateEntryDto {
                $entry->setDistancePoint($this->distanceCalculationService->calculateDistanceToCentre($entry));
                return $entry;
            })
            ->withinRadius(100.0)
            ->sortByRadius();

        return view('implementation.affiliate_list_view', compact('collection'));
    }
}
