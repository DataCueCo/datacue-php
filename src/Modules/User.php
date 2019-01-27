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
     * @param $userData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function create($userData)
    {
        return $this->request->post($this->url('users'), $userData);
    }

    /**
     * Batch create users
     * @param array $userDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function batchCreate(array $userDataList)
    {
        return $this->request->post($this->url('batch'), [
            'type' => 'users',
            'batch' => $userDataList,
        ]);
    }

    /**
     * Update user
     * @param $userId
     * @param $userData
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function update($userId, $userData)
    {
        return $this->request->put($this->url("users/$userId"), $userData);
    }

    /**
     * Batch update users
     * @param array $userDataList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function batchUpdate(array $userDataList)
    {
        return $this->request->put($this->url('batch/users'), [
            'batch' => $userDataList,
        ]);
    }

    /**
     * Delete user
     * @param $userId
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function delete($userId)
    {
        return $this->request->delete($this->url("users/$userId"));
    }

    /**
     * Batch delete users
     * @param array $userIdList
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function batchDelete(array $userIdList)
    {
        return $this->request->delete($this->url('batch'), [
            'type' => 'users',
            'batch' => array_map(
                function ($id) {
                    return ['user_id' => $id];
                },
                $userIdList
            ),
        ]);
    }
}
