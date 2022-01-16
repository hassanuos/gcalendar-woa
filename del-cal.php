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

$event_id = '35u76luscd5famkc8n8mh9bkfk';

$calendarService->events->delete($cal_id, $event_id);