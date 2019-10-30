<?php

namespace DataCue\Modules;

/**
 * Class Category
 * @package DataCue\Modules
 */
class Category extends Base
{
    /**
     * Create category
     *
     * @param $categoryData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function create($categoryData)
    {
        return $this->request->post($this->url('categories'), $categoryData);
    }

    /**
     * Batch create category
     *
     * @param array $categoryDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchCreate(array $categoryDataList)
    {
        return $this->request->post($this->url('batch/categories'), $categoryDataList);
    }

    /**
     * Update category
     *
     * @param $categoryId
     * @param $categoryData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function update($categoryId, $categoryData)
    {
        return $this->request->put($this->url("categories/$categoryId"), $categoryData);
    }

    /**
     * Batch update categories
     *
     * @param array $categoryDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchUpdate(array $categoryDataList)
    {
        return $this->request->put($this->url('batch/categories'), $categoryDataList);
    }

    /**
     * Delete category
     *
     * @param $categoryId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function delete($categoryId)
    {
        return $this->request->delete($this->url("categories/$categoryId"));
    }

    /**
     * Batch delete categories
     *
     * @param array $categoryIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchDelete(array $categoryIdList)
    {
        return $this->request->delete($this->url('batch/categories'), array_map(
            function ($id) {
                return ['category_id' => $id];
            },
            $categoryIdList
        ));
    }

    /**
     * Delete all categories
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
        return $this->request->delete($this->url('batch/categories/all'));
    }
}