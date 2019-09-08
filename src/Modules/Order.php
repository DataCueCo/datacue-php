<?php

namespace DataCue\Modules;

/**
 * Class Order
 * @package DataCue\Modules
 */
class Order extends Base
{
    /**
     * Transform order data
     * 
     * @param $orderData
     * @return array
     */
    public static function transformOrderData($orderData)
    {
        $cart = [];
        foreach($orderData['cart'] as $orderItem) {
            $existing = false;
            foreach ($cart as &$item) {
                if ($item['product_id'] === $orderItem['product_id'] && $item['variant_id'] === $orderItem['variant_id'] && $item['unit_price'] === $orderItem['unit_price']) {
                    $item['quantity'] = intval($item['quantity']) + intval($orderItem['quantity']);
                    $existing = true;
                }
            }
            if (!$existing) {
                $cart[] = $orderItem;
            }
        }

        $orderData['cart'] = $cart;

        return $orderData;
    }

    /**
     * Create order
     *
     * @param $orderData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function create($orderData)
    {
        return $this->request->post($this->url('orders'), static::transformOrderData($orderData));
    }

    /**
     * Batch create orders
     *
     * @param array $orderDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchCreate(array $orderDataList)
    {
        return $this->request->post($this->url('batch'), [
            'type' => 'orders',
            'batch' => array_map(function ($item) {
                return static::transformOrderData($item);
            }, $orderDataList),
        ]);
    }

    /**
     * Cancel order
     *
     * @param $orderId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function cancel($orderId)
    {
        return $this->request->put($this->url("orders/$orderId"), [
            'order_status' => 'cancelled',
        ]);
    }

    /**
     * Batch cancel orders
     *
     * @param array $orderIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchCancel(array $orderIdList)
    {
        return $this->request->put($this->url('batch/orders'), [
            'batch' => array_map(
                function ($id) {
                    return [
                        'order_id' => $id,
                        'order_status' => 'cancelled',
                    ];
                },
                $orderIdList
            ),
        ]);
    }

    /**
     * Delete order
     *
     * @param $orderId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function delete($orderId)
    {
        return $this->request->delete($this->url("orders/$orderId"));
    }
}
