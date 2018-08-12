<?php
namespace ArtinCMS\LVS;
use Illuminate\Support\Facades\Facade;

class LVSFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return 'LVS';
	}
}