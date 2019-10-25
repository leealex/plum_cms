<?php

namespace app\modules\admin\models;

/**
 * Signup form
 */
class SignupForm extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'tmp_password'], 'string', 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            [['username', 'email', 'tmp_password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Этот email уже используется.'],

            ['status', 'default', 'value' => User::STATUS_ACTIVE],
            ['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_INACTIVE]],

            ['role', 'default', 'value' => User::ROLE_USER],
            ['role', 'in', 'range' => [User::ROLE_USER, User::ROLE_ADMINISTRATOR]]
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws \Exception
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->setAttributes($this->attributes);
            $user->status = User::STATUS_ACTIVE;
            $user->setPassword($this->tmp_password);
            $user->generateAuthKey();
            $user->generateAccessToken();

            if (!$user->save(false)) {
                return null;
            }

            return $user;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин (имя пользователя)',
            'email' => 'E-mail',
            'tmp_password' => 'Пароль'
        ];
    }
}
