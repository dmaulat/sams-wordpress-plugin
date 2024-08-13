<?php
namespace SAMSPlugin;

use SAMSPlugin\Remote\URIs\FixturesURI;
use SAMSPlugin\Remote\XMLFetcher;
use SAMSPlugin\Models\SAMSFixtures;
use SAMSPlugin\Presenters\FixturesPresenter;

class SAMSFixturesRenderer {

    public static function fetchAndRender($verband, $apiKey, $matchSeriesId, $teamId) {
        $fixturesUri = new FixturesURI($verband, $apiKey, $matchSeriesId, $teamId);
        $fetcher = new XMLFetcher();
        $fetchedXml = $fetcher->fetch($fixturesUri->toString());
        if (\is_a($fetchedXml, "SimpleXMLElement")) {
            $fixtures = new SAMSFixtures($fetchedXml);
            return FixturesPresenter::render($fixtures);
        } else {
            return "Fixtures not found (Verband: $verband, MatchSeriesID: $matchSeriesId, TeamID: $teamId, API-Key: $apiKey)";
        }
    }
}

?>
