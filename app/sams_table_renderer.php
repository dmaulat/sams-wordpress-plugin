<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\TableURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\SAMSTable;
use SAMSPlugin\Presenters\TablePresenter;

class SAMSTableRenderer {

    public static function fetchAndRender($verband, $apiKey, $matchSeriesId) {
        $tableUri = new TableURI($verband, $apiKey, $matchSeriesId);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($tableUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $table = new SAMSTable($fetchedXml);
            return TablePresenter::render($table);
        } else {
            return "Table not found (Verband: $verband, Match Series ID: $matchSeriesId, API Key: $apiKey)";
        }
    }
}

?>
