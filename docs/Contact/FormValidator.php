<?php

class FormValidator
{
    public $form_data = [];
    private $errors = [];
    private $fields = ['name', 'email', 'message'];

    public function __construct($post_data)
    {
        $this->form_data = $post_data;
    }

    public function validate()
    {
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $this->form_data)) {
                $this->addError($field, "エラー：{$field}に対応するデータがありません。");
            }
        }

        $this->validateName();
        $this->validateEmail();
        $this->validateMessage();

        return $this->errors;
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

    private function validateName()
    {
        $val = $this->form_data['name'];

        if (mb_strlen($val) < 2) {
            $this->addError('name', 'エラー：名前は2文字以上で入力してください。');
        }

        if (mb_strlen($val) > 30) {
            $this->addError('name', 'エラー：名前は30文字以内で入力してください。');
        }
    }

    private function validateEmail()
    {
        $val = $this->form_data['email'];

        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'エラー：無効なメールアドレスです。');
        }
    }

    private function validateMessage()
    {
        $val = $this->form_data['message'];

        if (mb_strlen($val) < 10) {
            $this->addError('message', 'エラー：メッセージは10文字以上で入力してください。');
        }
    }
}
