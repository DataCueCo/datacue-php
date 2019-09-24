<?php

namespace DataCue\Modules;

/**
 * Class Product
 * @package DataCue\Modules
 */
class Product extends Base
{
    /**
     * Create product
     *
     * @param $productData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function create($productData)
    {
        return $this->request->post($this->url('products'), $productData);
    }

    /**
     * Batch create products
     *
     * @param array $productDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchCreate(array $productDataList)
    {
        return $this->request->post($this->url('batch'), [
            'type' => 'products',
            'batch' => $productDataList,
        ]);
    }

    /**
     * Update product
     *
     * @param $productId
     * @param $variantId
     * @param $productData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function update($productId, $variantId, $productData)
    {
        return $this->request->put($this->url("products/$productId/$variantId"), $productData);
    }

    /**
     * Batch update products
     *
     * @param array $productDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchUpdate(array $productDataList)
    {
        return $this->request->put($this->url('batch/products'), [
            'batch' => $productDataList,
        ]);
    }

    /**
     * Delete product
     *
     * @param $productId
     * @param null $variantId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function delete($productId, $variantId = null)
    {
        if ($variantId) {
            return $this->request->delete($this->url("products/$productId/$variantId"));
        } else {
            return $this->request->delete($this->url("products/$productId"));
        }
    }

    /**
     * Batch delete products
     *
     * @param array $productAndVariantIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchDelete(array $productAndVariantIdList)
    {
        return $this->request->delete($this->url('batch'), [
            'type' => 'products',
            'batch' => $productAndVariantIdList,
        ]);
    }

    /**
     * Delete all products
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function deleteAll()
    {
        return $this->request->delete($this->url('batch/products/all'));
    }
}
