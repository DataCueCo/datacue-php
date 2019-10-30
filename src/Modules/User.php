<?php

namespace DataCue\Modules;

/**
 * Class User
 * @package DataCue\Modules
 */
class User extends Base
{
    /**
     * Create user
     *
     * @param $userData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function create($userData)
    {
        return $this->request->post($this->url('users'), $userData);
    }

    /**
     * Batch create users
     *
     * @param array $userDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchCreate(array $userDataList)
    {
        return $this->request->post($this->url('batch/users'), $userDataList);
    }

    /**
     * Update user
     *
     * @param $userId
     * @param $userData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function update($userId, $userData)
    {
        return $this->request->put($this->url("users/$userId"), $userData);
    }

    /**
     * Batch update users
     *
     * @param array $userDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchUpdate(array $userDataList)
    {
        return $this->request->put($this->url('batch/users'), $userDataList);
    }

    /**
     * Delete user
     *
     * @param $userId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function delete($userId)
    {
        return $this->request->delete($this->url("users/$userId"));
    }

    /**
     * Batch delete users
     *
     * @param array $userIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function batchDelete(array $userIdList)
    {
        return $this->request->delete($this->url('batch/users'), array_map(
            function ($id) {
                return ['user_id' => $id];
            },
            $userIdList
        ));
    }

    /**
     * Delete all users
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
        return $this->request->delete($this->url('batch/users/all'));
    }
}
