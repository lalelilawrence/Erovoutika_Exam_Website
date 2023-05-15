<?php

namespace Paymongo\Services;

class PaymentMethodService extends \Paymongo\Services\BaseService {
    const URI = '/payment_methods';

    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\PaymentMethod($apiResponse);
    }

    public function create($params) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\PaymentMethod($apiResponse);
    }
}