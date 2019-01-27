<?php

namespace DataCue\Modules;

/**
 * Class Order
 * @package DataCue\Modules
 */
class Order extends Base
{
    /**
     * Create order
     * @param $orderData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function create($orderData)
    {
        return $this->request->post($this->url('orders'), $orderData);
    }

    /**
     * Batch create orders
     * @param array $orderDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function batchCreate(array $orderDataList)
    {
        return $this->request->post($this->url('batch'), [
            'type' => 'orders',
            'batch' => $orderDataList,
        ]);
    }

    /**
     * Cancel order
     * @param $orderId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function cancel($orderId)
    {
        return $this->request->put($this->url("orders/$orderId"), [
            'order_status' => 'cancelled',
        ]);
    }

    /**
     * Batch cancel orders
     * @param array $orderIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
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
     * @param $orderId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function delete($orderId)
    {
        return $this->request->delete($this->url("orders/$orderId"));
    }
}
