<?php

class UserValidator
{
    private $errors = [];

    public function validateUser($userData)
    {
        if (!isset($userData['email']) || empty($userData['email'])) {
            $this->errors[] = 'Email is required';
        } elseif (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Invalid email format';
        }

        if (!isset($userData['password']) || strlen($userData['password']) < 8) {
            $this->errors[] = 'Password must be at least 8 characters';
        }

        if (isset($userData['age']) && ($userData['age'] < 13 || $userData['age'] > 120)) {
            $this->errors[] = 'Age must be between 13 and 120';
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function sanitizeInput($data)
    {
        $cleaned = [];
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $cleaned[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            } else {
                $cleaned[$key] = $value;
            }
        }
        return $cleaned;
    }
}
