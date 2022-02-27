<?php

namespace App\Services;

use App\Models\Dtos\AffiliateEntryDto;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileParserService
{
    /**
     * Gets the whole content of the file, separates it line by line and casts each line into
     * stdClass object. This is less than ideal, because depending on the file size the
     * the outcome might be unpredictable. Storing file and then paginating it would be much
     * safer, but because I assume that given file is the only one that will ever be used.
     *
     * @param UploadedFile $file
     * @return Collection
     */
    public function parseAffiliateCoordinateFile(UploadedFile $file): Collection
    {
        return collect(explode(PHP_EOL, $file->getContent()))
            ->map(function(string $line): AffiliateEntryDto {
                $parsed = json_decode($line);
                return new AffiliateEntryDto($parsed->affiliate_id, $parsed->name, $parsed->latitude, $parsed->longitude);
            });
    }
}
