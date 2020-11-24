<?php
return [
    'doctrine' => [
        'driver' => [
            'Users_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => './module/Users/src/V1/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Users' => 'Users_driver',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'users.rest.doctrine.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'Users\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
            'users.rest.doctrine.emails' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]/email[/:email_id]',
                    'defaults' => [
                        'controller' => 'Users\\V1\\Rest\\Email\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'users.rest.doctrine.user',
            1 => 'users.rest.doctrine.emails',
        ],
    ],
    'api-tools-rest' => [
        'Users\\V1\\Rest\\User\\Controller' => [
            'listener' => \Users\V1\Rest\User\UserResource::class,
            'route_name' => 'users.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Users\V1\Entity\User::class,
            'collection_class' => \Users\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
        'Users\\V1\\Rest\\Email\\Controller' => [
            'listener' => \Users\V1\Rest\Emails\EmailsResource::class,
            'route_name' => 'users.rest.doctrine.emails',
            'route_identifier_name' => 'emails_id',
            'entity_identifier_name' => 'emailId',
            'collection_name' => 'emails',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Users\V1\Entity\Email::class,
            'collection_class' => \Users\V1\Rest\Emails\EmailsCollection::class,
            'service_name' => 'Email',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Users\\V1\\Rest\\User\\Controller' => 'HalJson',
            'Users\\V1\\Rest\\Email\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Users\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.users.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Users\\V1\\Rest\\Email\\Controller' => [
                0 => 'application/vnd.users.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Users\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.users.v1+json',
                1 => 'application/json',
            ],
            'Users\\V1\\Rest\\Email\\Controller' => [
                0 => 'application/vnd.users.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        \Doctrine\ORM\PersistentCollection::class => [
            'hydrator' => 'ArraySerializable',
            'isCollection' => true,
        ],
        'metadata_map' => [
            \Users\V1\Entity\User::class => [
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'users.rest.doctrine.user',
                'hydrator' => 'Users\\V1\\Rest\\User\\UserHydrator',
                'max_depth' => 1,
            ],
            \Users\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'users.rest.doctrine.user',
                'is_collection' => true,
            ],
            \Users\V1\Entity\Email::class => [
                'route_identifier_name' => 'emails_id',
                'entity_identifier_name' => 'emailId',
                'route_name' => 'users.rest.doctrine.emails',
                'hydrator' => 'Users\\V1\\Rest\\Email\\EmailsHydrator',
                'max_depth' => 0,
            ],
            \Users\V1\Rest\Emails\EmailsCollection::class => [
                'entity_identifier_name' => 'emailId',
                'route_name' => 'users.rest.doctrine.emails',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools' => [
        'doctrine-connected' => [
            \Users\V1\Rest\User\UserResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Users\\V1\\Rest\\User\\UserHydrator',
            ],
            \Users\V1\Rest\Emails\EmailsResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Users\\V1\\Rest\\Email\\EmailsHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Users\\V1\\Rest\\User\\UserHydrator' => [
            'entity_class' => \Users\V1\Entity\User::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Users\\V1\\Rest\\Email\\EmailsHydrator' => [
            'entity_class' => \Users\V1\Entity\Email::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'api-tools-content-validation' => [
        'Users\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Users\\V1\\Rest\\User\\Validator',
        ],
        'Users\\V1\\Rest\\Email\\Controller' => [
            'input_filter' => 'Users\\V1\\Rest\\Email\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Users\\V1\\Rest\\User\\Validator' => [
            0 => [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 80,
                        ],
                    ],
                ],
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'emails',
            ],
        ],
        'Users\\V1\\Rest\\Email\\Validator' => [
            0 => [
                'name' => 'email',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 254,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
