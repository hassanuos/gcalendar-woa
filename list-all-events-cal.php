<?php

include_once 'vendor/autoload.php';

$client = new Google\Client();
$jsonKey = 'gcp-vision-208716-58a0c3fc8b02.json';
$client->setAuthConfig($jsonKey);
$client->setScopes([
    'https://www.googleapis.com/auth/calendar.readonly',
    'https://www.googleapis.com/auth/calendar',
    'https://www.googleapis.com/auth/calendar.events',
    'https://www.googleapis.com/auth/calendar.events.readonly',
    'https://www.googleapis.com/auth/calendar.addons.execute',
    'https://www.googleapis.com/auth/calendar.settings.readonly',
//    'https://www.googleapis.com/auth/calendar.events',
//    'https://www.googleapis.com/auth/admin.reports.audit.readonly'
]);

$client->setSubject('calendar-api@gcp-vision-208716.iam.gserviceaccount.com');

$client->setAccessType('offline');

$cal_id = 'hassan@aaclean.us';

$calendarService = new Google\Service\Calendar($client);

$eventId = 'duet0d9jdnli3f8o5jkk33qo2c';
$calendarID='hassan@aaclean.us';
$maxEvents = 100;
$minStartDate = date('c');

//options link
//  https://developers.google.com/google-apps/calendar/v3/reference/events/list
$options = array(
    'maxResults' => $maxEvents,
    'orderBy' => 'startTime',
    'singleEvents' => TRUE,
    //UNIX timestamp format
    'timeMin' => $minStartDate,
    //to use a calendar other than the default uncomment and enter the calendar's ID
    //not really needed here since you're using the $calendarId but does pull another calendar and more for completeness
    //'iCalUID' => 'CAL_ID_FROM_GOOGLE_CALENDAR'
);

$results = $calendarService->events->listEvents($calendarID, $options);
//echo 'results<br><pre>';print_r($results->getItems()); echo '</pre><br>';

$events = $results->getItems();

if (empty($events)) {
    print "No upcoming events found.\n";
} else {
    print "Upcoming events:\n";
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        printf("%s (%s)\n", $event->getSummary(), $start);
    }
}
?>