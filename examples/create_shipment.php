<?php

use Imper86\PhpInpostApi\Enum\ServiceType;
use Imper86\PhpInpostApi\InpostApi;

require_once __DIR__ . '/../vendor/autoload.php';

$token = 'your token here';
$organizationId = 'your organization id here';
$isSandbox = false;

$api = new InpostApi($token, $isSandbox);

$response = $api->organizations()->shipments()->post($organizationId, [
    'receiver' => [
        'name' => 'Name',
        'company_name' => 'Company name',
        'first_name' => 'Jan',
        'last_name' => 'Kowalski',
        'email' => 'test@inpost.pl',
        'phone' => '111222333',
    ],
    'parcels' => [
        ['template' => 'small'],
    ],
    'insurance' => [
        'amount' => 25,
        'currency' => 'PLN',
    ],
    'cod' => [
        'amount' => 12.50,
        'currency' => 'PLN',
    ],
    'custom_attributes' => [
        'sending_method' => 'dispatch_order',
        'target_point' => 'KRA012',
    ],
    'service' => ServiceType::INPOST_LOCKER_STANDARD,
    'reference' => 'Test',
    'external_customer_id' => '8877xxx',
]);

$shipmentData = json_decode($response->getBody()->__toString(), true);

while ($shipmentData['status'] !== 'confirmed') {
    sleep(1);
    $response = $api->shipments()->get($shipmentData['id']);
    $shipmentData = json_decode($response->getBody()->__toString(), true);
}

$labelResponse = $api->shipments()->label()->get($shipmentData['id'], [
    'format' => 'Pdf',
    'type' => 'A6',
]);

file_put_contents('/tmp/inpost_label.pdf', $labelResponse->getBody()->__toString());
