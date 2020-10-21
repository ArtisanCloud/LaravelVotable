<?php

namespace ArtisanCloud\Votable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class VotableService
 * @package ArtisanCloud\LaravelVotable
 */
class VotableService extends Facade
{
    //
    protected static function getFacadeAccessor()
    {
        return VotableService::class;
    }
}
