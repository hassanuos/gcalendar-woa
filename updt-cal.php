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

// Get Event for edit
$event = $calendarService->events->get($calendarID, $eventId);

$event->setSummary('New title');
$event->setDescription('New describtion');

$event->setStart(
    new Google_Service_Calendar_EventDateTime(['dateTime' => date("c", strtotime("2022-01-17 09:40:00")),'timeZone' => 'Europe/Moscow'])
);

$event->setEnd(
    new Google_Service_Calendar_EventDateTime(['dateTime' => date("c", strtotime("2022-01-17 10:40:00")),'timeZone' => 'Europe/Moscow'])
);

$updatedEvent = $calendarService->events->update($calendarID, $eventId, $event);
