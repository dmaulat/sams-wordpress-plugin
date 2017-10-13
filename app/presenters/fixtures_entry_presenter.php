<?php

namespace WVVPlugin\Presenters;

use WVVPlugin\Models\FixturesEntry;

class FixturesEntryPresenter {

    public static function render(FixturesEntry $fixturesEntry) {
        $htmlBody = file_get_contents(__DIR__ . "/../templates/__fixtures_entry.html");

        return str_replace(
            FixturesEntryPresenter::$entryTemplateKeys,
            FixturesEntryPresenter::getFormattedEntryValues($fixturesEntry),
            $htmlBody);
    }

    private static function getFormattedEntryValues($fixtureEntry) {
        return array(
            FixturesEntryPresenter::getFormattedDateTime($fixtureEntry),
            FixturesEntryPresenter::getFormattedFixtureName($fixtureEntry),
            $fixtureEntry->venue,
            FixturesEntryPresenter::getFormattedResult($fixtureEntry)
        );
    }

    private static function getFormattedDateTime($fixtureEntry) {
        return $fixtureEntry->date . " " . $fixtureEntry->startTime . " Uhr";
    }

    private static function getFormattedFixtureName($fixtureEntry) {
        return $fixtureEntry->teamHome . " - " . $fixtureEntry->teamAway;
    }

    private static function getFormattedResult($fixtureEntry) {
        return ($fixtureEntry->hasResult())
            ? $fixtureEntry->scoreHome . ":" . $fixtureEntry->scoreAway
            : "-:-";
    }

    private static $entryTemplateKeys = array(
        "{{%datetime}}",
        "{{%fixtureName}}",
        "{{%venue}}",
        "{{%gameResult}}"
    );
}

?>