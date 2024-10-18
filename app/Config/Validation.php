<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public $rules = [
        // Aturan validasi lainnya
        'captcha' => 'validateCaptcha',
    ];

    public $errors = [
        // Pesan kesalahan untuk aturan validasi CAPTCHA
        'captcha' => [
            'validateCaptcha' => 'CAPTCHA validation failed. Please try again.',
        ],
    ];

    public function validateCaptcha(string $captcha, string &$error = null): bool
    {
        // Logika validasi CAPTCHA di sini
        // Return true jika valid, false jika tidak

        return true; // Gantilah dengan logika sesuai kebutuhan
    }

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
