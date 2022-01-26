<?php

namespace App\Architeture\Comics\Services;

use App\Architeture\Comics\Interfaces\IWebService;
use App\Architeture\Comics\Validate\WebServiceValidate;
use Illuminate\Support\Facades\Http;
use App\Exceptions\SystemException;
use Throwable;

class Webservice implements IWebService
{
    /**
     * @var WebServiceValidate
     */
    protected $comicID;
    protected $timestamp;
    protected $hash;
    protected $WebServiceValidate;

    /**
     * @param WebServiceValidate $WebServiceValidate
     */
    public function __construct(WebServiceValidate $WebServiceValidate)
    {
        $this->WebServiceValidate = $WebServiceValidate;
    }

    /**
     * @param int|null $comicID
     * @return array|mixed
     * @throws SystemException
     * @throws Throwable
     */
    public function Consult(?int $comicID)
    {
        $this->timestamp = 1643037794;

        $this->hash = 'abc1ae15475862ff7174bd1c6d6b4049';

        if (is_null($comicID)) {
            $response = Http::get(
                env('API_URL_MARVEL').'/comics?ts='.$this->timestamp.'&apikey='.env('API_KEY_MARVEL_PUBLIC').'&hash='.$this->hash
            );
        } else {
            $this->WebServiceValidate->validateInt($comicID);

            $response = Http::get(
                env('API_URL_MARVEL').'/comics/'.$comicID.'?ts='.$this->timestamp.'&apikey='.env('API_KEY_MARVEL_PUBLIC').'&hash='.$this->hash
            );
        }

        return $response->json();
    }

    /**
     * @return WebServiceValidate
     */
    private function getValidate() : WebServiceValidate
    {
        return $this->WebServiceValidate;
    }
}
