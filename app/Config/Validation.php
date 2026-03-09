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
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    
    /**
     * Admin Profile Update Validation Rules
     *
     * @var array<string, array<string, string>>
     */
    public array $adminProfile = [
        'first_name' => [
            'rules' => 'required|min_length[2]|max_length[50]|alpha_space',
            'errors' => [
                'required' => 'First name is required.',
                'min_length' => 'First name must be at least 2 characters long.',
                'max_length' => 'First name cannot exceed 50 characters.',
                'alpha_space' => 'First name can only contain letters and spaces.'
            ]
        ],
        'last_name' => [
            'rules' => 'required|min_length[2]|max_length[50]|alpha_space',
            'errors' => [
                'required' => 'Last name is required.',
                'min_length' => 'Last name must be at least 2 characters long.',
                'max_length' => 'Last name cannot exceed 50 characters.',
                'alpha_space' => 'Last name can only contain letters and spaces.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|max_length[100]',
            'errors' => [
                'required' => 'Email address is required.',
                'valid_email' => 'Please provide a valid email address.',
                'max_length' => 'Email address cannot exceed 100 characters.'
            ]
        ],
        'contact_number' => [
            'rules' => 'required|numeric|min_length[10]|max_length[15]',
            'errors' => [
                'required' => 'Contact number is required.',
                'numeric' => 'Contact number must contain only numbers.',
                'min_length' => 'Contact number must be at least 10 digits.',
                'max_length' => 'Contact number cannot exceed 15 digits.'
            ]
        ],
        'address' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'Address is required.',
                'max_length' => 'Address cannot exceed 255 characters.'
            ]
        ]
    ];

    /**
     * Admin Change Password Validation Rules
     *
     * @var array<string, array<string, string>>
     */
    public array $changePassword = [
        'current_password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Current password is required.'
            ]
        ],
        'new_password' => [
            'rules' => 'required|min_length[8]|max_length[100]',
            'errors' => [
                'required' => 'New password is required.',
                'min_length' => 'New password must be at least 8 characters long.',
                'max_length' => 'New password cannot exceed 100 characters.'
            ]
        ],
        'confirm_password' => [
            'rules' => 'required|matches[new_password]',
            'errors' => [
                'required' => 'Please confirm your new password.',
                'matches' => 'Password confirmation does not match.'
            ]
        ]
    ];
    
}
