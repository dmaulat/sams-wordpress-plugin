<?php

namespace SAMSPlugin\Remote\URIs;

class TableURI {

    private $verband;
    private $apiKey;
    private $matchSeries;

    public function __construct($verband, $apiKey, $matchSeriesId) {
        $this->validateArguments($apiKey, $matchSeriesId);

        $this->verbandUri = $this->getUriForVerband($verband);
        $this->apiKey = $apiKey;
        $this->matchSeries = $matchSeriesId;
    }

    public function toString() {
        return "https://"
        . $this->verbandUri
        . "/xml/rankings.xhtml?apiKey=" 
        . $this->apiKey 
        . "&matchSeriesId=" 
        . $this->matchSeries;
    }    

    // see http://wiki.sams-server.de/wiki/XML-Schnittstelle#Spielplan_und_Ergebnisse#Abfragen
    private function getUriForVerband($verband) {
        switch ($verband) {
            case "flvb": 
            case "international": 
                return "flvb.sams-server.de";
            case "bundesliga": 
                return "www.volleyball-bundesliga.de";
            case "dritte-liga": 
                return "www.dvv-ligen.de";
            case "regionalliga-west": 
            case "regionalliga-nordost": 
            case "regionalliga-ost": 
            case "regionalliga-suedwest": 
                return "www.dvv-ligen.de";
            case "regionalliga-sued": 
            case "baden": 
                return "www.volleyball-baden.de";
            case "regionalliga-nord": 
            case "shvv": 
                return "www.shvv.de";
            case "regionalliga-nordwest": 
            case "nwvv": 
            case "niedersachsen": 
            case "bremen": 
                return "www.nwvv.de";
            case "vvrp": 
            case "rheinland-pfalz": 
                return "www.vvrp.de";
            case "ssvb": 
            case "sachsen": 
                return "www.ssvb.de";
            case "tvv": 
            case "thueringen": 
                return "www.tv-v.de";
            case "vlw": 
            case "wuerttemberg": 
                return "www.vlw-online.de";
            case "hvv": 
            case "hessen": 
                return "hessen-volley.de";
            case "svv": 
            case "saarland": 
                return "svv.sams-server.de";
            case "vvb": 
            case "berlin": 
                return "vvb.sams-server.de";
            case "vvsa": 
            case "sachsen-anhalt": 
                return "vvsa.sams-server.de";
            case "wvv": 
            case "nrw": 
            case "nordrhein-westfalen": 
                return "wvv.sams-server.de";                
            default: 
                return "dvv.sams-server.de";
        }
    }

    private function validateArguments($apiKey, $matchSeriesId) {
        if (($apiKey == null) || ($matchSeriesId == null)) {
            throw new \InvalidArgumentException("apiKey and matchSeriesId cannot be NULL");
        }
    }
}

?>
