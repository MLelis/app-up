<?php

namespace App\Http\Controllers;

use App\ImportDataSite;

/**
 * Class ImportDataSiteController
 * @package App\Http\Controllers
 */
class ImportDataSiteController extends Controller
{
    /**
     * @var
     */
    private $siteUrl;
    /**
     * @var ImportDataSite
     */
    private $dataSite;

    /**
     * ImportDataSiteController constructor.
     */
    public function __construct()
    {
        $this->dataSite = new ImportDataSite;
    }

    /**
     * @param $url
     */
    public function setUrl($url): void
    {
        $this->siteUrl = $url;
    }

    /**
     * @return array
     */
    public function allItemsFound(): array
    {
        $i = 0;
        $allItems=[];
        foreach ($this->getContentSite() as $tag) {
            $content = preg_replace('/\s+/', ' ', $tag->nodeValue);
            if ($i % 2 == 0) {
                $car = $this->createDataItem($this->dataSite->aRegex, $content);
                $allItems[$i] = $car;
            }
            if ($i % 2 == 1) {
                $allItems[$i - 1]['link'] = $content;
            }
            $i++;
        }
        return $allItems;
    }

    /**
     * @param $aRegex
     * @param $str
     * @return array
     */
    private function createDataItem($aRegex, $str): array
    {
        $data = [];
        foreach ($aRegex as $key => $re)
            $data[$key] = trim(array_reverse($this->execRegex($re, $str))[0]);
        return $data;
    }

    /**
     * @param $re
     * @param $str
     * @return array
     */
    private function execRegex($re, $str): array
    {
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        return $matches[0];
    }

    /**
     * @return object
     */
    private function getContentSite(): object
    {
        libxml_use_internal_errors(true);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $this->siteUrl);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);

        ob_start();
        curl_exec($ch);
        curl_close($ch);
        $file_contents = ob_get_contents();
        ob_end_clean();

        $body = new \DOMDocument();
        $body->loadHTML($file_contents);
        $xpath = new \DOMXpath($body);
        return $xpath->query($this->dataSite->regDomXPath);
    }
}
