<?php

return [

    'models' => [

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => App\Models\Profil::class, //ici on remplace le modèle Role par Profil
    ],

    'profil' => [

        'Administrateur' => 'all',

        'Equipe_Suivi_Evaluation' => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets' => [
                        'details_projet' => ['view']
                    ],
                ],
                'gestion_projet' => [
                    'synthese_projet' => [
                        'fiche_projet' => ['view',],
                        'fiche_financement' => ['view',]
                    ],
                    'definition_activites' => [
                        'composante' => ['view'],
                        'sous_composante' => ['view'],
                        'activite' => ['view']
                    ],
                    'rationnel_projet' => [
                        'rationnel' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'cadre_resultats' => [
                        'indicateur' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'documents_projet' => [
                        'document' => ['view'],
                        'dossier' => ['view']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view', 'edit', 'create'],
                        'ptba' => ['view', 'edit', 'create'],
                        'planification_ptba' => ['view', 'edit', 'create']
                    ],
                    'planification_rationnel' => [
                        'planification_rationnel' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'planification_cadre_resultats' => [
                        'planification_indicateur' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view', 'edit', 'create']
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view'],
                        'suivi_activites_ptba' => ['view', 'edit', 'create']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view', 'edit', 'create']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view', 'edit', 'create']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view', 'edit', 'create']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view']
                    ],
                ],
                'administration' => [
                    'cadre_resultats' => [
                        'indicateur' => ['view', 'edit', 'create']
                    ],
                    'portefeuille_projets' => [
                        'projet' => ['view' ]
                    ],
                ],
            ],
        ],
        'Equipe_Finance' => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets' => [
                        'details_projet' => ['view']
                    ],
                ],
                'gestion_projet' => [
                    'synthese_projet' => [
                        'fiche_projet' => ['view'],
                        'fiche_financement' => ['view']
                    ],
                    'definition_activites' => [
                        'composante' => ['view'],
                        'sous_composante' => ['view'],
                        'activite' => ['view']
                    ],
                    'rationnel_projet' => [
                        'rationnel' => ['view']
                        ],
                    'cadre_resultats' => [
                        'indicateur' => ['view']
                        ],
                    'documents_projet' => [
                        'document' => ['view', 'edit', 'create'],
                        'dossier' => ['view', 'edit', 'create']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view'],
                        'ptba' => ['view'],
                        'planification_ptba' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                    'planification_rationnel' => [
                        'planification_rationnel' => ['view']
                    ],
                    'planification_cadre_resultats' => [
                        'planification_indicateur' => ['view']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view']
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view', 'edit', 'create'],
                        'suivi_activites_ptba' => ['view', 'edit', 'create']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view']
                    ],
                ]
            ],
        ],

        'Coordonnateur' => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets'  => [
                        'details_projet' => ['view']
                    ],
                ],
                'gestion_projet' => [
                    'synthese_projet'  => [
                        'fiche_projet' => ['view'],
                        'fiche_financement' => ['view']
                    ],
                    'definition_activites'  => [
                        'composante' => ['view'],
                        'sous_composante' => ['view'],
                        'activite' => ['view']
                    ],
                    'documents_projet'  => [
                        'document' => ['view', 'edit', 'create'],
                        'dossier' => ['view', 'edit', 'create']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view'],
                        'ptba' => ['view'],
                        'planification_ptba' => ['view']
                    ],
                    'planification_rationnel' => [
                        'planification_rationnel' => ['view']
                    ],
                    'planification_cadre_resultats' => [
                        'planification_indicateur' => ['view']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view']
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view'],
                        'suivi_activites_ptba' => ['view']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view']
                    ],
                ]
            ],
        ],

        'Equipe_Passation_Marches' => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets'
                ],
                'gestion_projet' => [
                    'synthese_projet' => [
                        'fiche_projet' => ['view'],
                        'fiche_financement' => ['view']
                    ],
                    'definition_activites' => [
                        'composante' => ['view'],
                        'sous_composante' => ['view'],
                        'activite' => ['view']
                    ],
                    'rationnel_projet' => [
                        'rationnel' => ['view']
                    ],
                    'cadre_resultats' => [
                        'indicateur' => ['view']
                    ],
                    'documents_projet' => [
                        'document' => ['view','edit','create'],
                        'dossier' => ['view','edit','create']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view'],
                        'ptba' => ['view'],
                        'planification_ptba' => ['view']
                    ],
                    'planification_rationnel' => [
                        'planification_rationnel' => ['view']
                    ],
                    'planification_cadre_resultats' => [
                        'planification_indicateur' => ['view']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view','edit','create','delete','validate',]
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view'],
                        'suivi_activites_ptba' => ['view']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view','edit','create','delete','validate']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view']
                    ],
                ]
            ],
        ],

        'Expert'  => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets'
                ],
                'gestion_projet' => [
                    'synthese_projet' => [
                        'fiche_projet' => ['view'],
                        'fiche_financement' => ['view']
                    ],
                    'definition_activites' => [
                        'composante' => ['view'],
                        'sous_composante' => ['view'],
                        'activite' => ['view']
                    ],
                    'rationnel_projet' => [
                        'rationnel' => ['view']
                    ],
                    'cadre_resultats' => [
                        'indicateur' => ['view']
                    ],
                    'documents_projet' => [
                        'document' => ['view','edit','create'],
                        'dossier' => ['view','edit','create']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view', 'edit', 'create'],
                        'ptba' => ['view', 'edit', 'create'],
                        'planification_ptba' => ['view', 'edit', 'create']
                    ],
                    'planification_rationnel' => [
                        'rationnel' => ['view']
                    ],
                    'planification_cadre_resultats' => [
                        'indicateur' => ['view']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view']
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view'],
                        'suivi_activites_ptba' => ['view','edit','create']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view']
                    ],
                ]
            ],
        ],

        'Assistant_National_SE' => [
            'suivi_projet' => [
                'dash_bord' => [
                    'performances_projets' => [
                        'details_projet' => ['view','edit','create']
                    ],
                ],
                'gestion_projet' => [
                    'synthese_projet'  => [
                        'fiche_projet' => ['view', 'edit', 'create', 'delete', 'validate'],
                        'fiche_financement' => ['view', 'edit', 'create', 'delete']
                    ],
                    'definition_activites'  => [
                        'composante' => ['view','edit','create','delete','validate'],
                        'sous_composante' => ['view','edit','create','delete','validate'],
                        'activite' => ['view','edit','create','delete','validate']
                    ],
                    'rationnel_projet'  => [
                        'rationnel' => ['view','edit','create','delete','validate']
                    ],
                    'cadre_resultats'  => [
                        'indicateur' => ['view','edit','create','delete','validate']
                    ],
                    'documents_projet'  => [
                        'document' => ['view','edit','create','delete','validate'],
                        'dossier' => ['view','edit','create','delete','validate']
                    ],
                ],
                'espace_planification' => [
                    'planification_activites' => [
                        'planification_ptba' => ['view','edit','create','delete','validate'],
                        'ptba' => ['view','edit','create','delete','validate'],
                        'planification_ptba' => ['view','edit','create','delete','validate']
                    ],
                    'planification_rationnel' => [
                        'planification_rationnel' => ['view','edit','create','delete','validate']
                    ],
                    'planification_cadre_resultats' => [
                        'planification_indicateur' => ['view','edit','create','delete','validate']
                    ],
                    'passation_marches' => [
                        'planification_marche' => ['view','edit','create','delete','validate']
                    ],
                ],
                'espace_suivi_execution' => [
                    'suivi_execution_activites' => [
                        'suivi_ptba' => ['view','edit','create','delete','validate'],
                        'suivi_activites_ptba' => ['view','edit','create','delete','validate']
                    ],
                    'suivi_rationnel' => [
                        'suivi_rationnel' => ['view','edit','create','delete','validate']
                    ],
                    'suivi_engagements_decaissements' => [
                        'suivi_activites' => ['view','edit','create','delete','validate']
                    ],
                    'suivi_cadre_resultats' => [
                        'suivi_indicateurs' => ['view','edit','create','delete','validate']
                    ],
                    'suivi_marches' => [
                        'suivi_marches' => ['view','edit','create','delete','validate']
                    ],
                ],
                'cartographie' => [
                    'cartographie_realisations' => [
                        'suivi_realisations' => ['view','edit','create','delete','validate']
                    ],
                ],
                'administration' => [
                    'cadre_resultats' => [
                        'indicateur' => ['view','edit','create','delete','validate']
                    ],
                    'portefeuille_projets' => [
                        'projet' => ['view', 'edit', 'create', 'delete', 'validate']
                    ],
                ],
            ]
        ]
    ],

    'permissions-structure'=> [
        'suivi_projet' => [
            'dash_bord' => [
                'performances_projets' => ['details_projet' => ['view', 'edit', 'create', 'delete', 'validate']]
                ],
            'gestion_projet' => [
                'synthese_projet' => ['fiche_projet' => ['view', 'edit', 'create', 'delete', 'validate'],
                                      'fiche_financement' => ['view', 'edit', 'create', 'delete', 'validate']
                                     ],
                'definition_activites' =>['composante' => ['view', 'edit', 'create', 'delete', 'validate'],
                                          'sous_composante' => ['view', 'edit', 'create', 'delete', 'validate'],
                                          'activite' => ['view', 'edit', 'create', 'delete', 'validate']
                                         ],
                'rationnel_projet' => ['rationnel' => ['view', 'edit', 'create', 'delete', 'validate']],
                
                'cadre_resultats' => ['indicateur' => ['view', 'edit', 'create', 'delete', 'validate']],
                'documents_projet' => ['document' => ['view', 'edit', 'create', 'delete', 'validate'],
                                       'dossier' => ['view', 'edit', 'create', 'delete', 'validate']
                                      ]
            ],
            'espace_planification' => [
                'planification_activites' => ['planification_ptba' => ['view', 'edit', 'create', 'delete', 'validate'],
                                              'ptba' => ['view', 'edit', 'create', 'delete', 'validate'],
                                              'planification_ptba' => ['view', 'edit', 'create', 'delete', 'validate']
                                             ],
                'planification_rationnel' => ['planification_rationnel' => ['view', 'edit', 'create', 'delete', 'validate']],
                'planification_cadre_resultats' => ['planification_indicateur' => ['view', 'edit', 'create', 'delete', 'validate']],
                'passation_marches' => ['planification_marche' => ['view', 'edit', 'create', 'delete', 'validate']]
            ],
            'espace_suivi_execution' => [
                'suivi_execution_activites' => ['suivi_ptba' => ['view', 'edit', 'create', 'delete', 'validate'],
                                                'suivi_activites_ptba' => ['view', 'edit', 'create', 'delete', 'validate'],
                                               ],
                'suivi_rationnel' => ['suivi_rationnel' => ['view', 'edit', 'create', 'delete', 'validate']],
                'suivi_engagements_decaissements' => ['suivi_activites' => ['view', 'edit', 'create', 'delete', 'validate']],
                'suivi_cadre_resultats' =>  ['suivi_indicateurs' => ['view', 'edit', 'create', 'delete', 'validate']],
                'suivi_marches' =>  ['suivi_marches' => ['view', 'edit', 'create', 'delete', 'validate']],
            ],
            'cartographie' => [
                'cartographie_realisations' =>  ['suivi_realisations' => ['view', 'edit', 'create', 'delete', 'validate']],
            ],
            'administration' => [
                'cadre_resultats' => ['indicateur' => ['view', 'edit', 'create', 'delete', 'validate']],
                'portefeuille_projets' => ['projet' => ['view', 'edit', 'create', 'delete', 'validate']],
                'annuaire_ptf' => ['structure' => ['view', 'edit', 'create', 'delete', 'validate']],
                'sources_financement' => ['source_financement' => ['view', 'edit', 'create', 'delete', 'validate']],
                'parties_prenantes' => ['structure' => ['view', 'edit', 'create', 'delete', 'validate']],
                'personnel_eval_monitoring' => ['personnel' => ['view', 'edit', 'create', 'delete', 'validate']],
                'etape_passation' => ['etape_passation' => ['view', 'edit', 'create', 'delete', 'validate']],
                'parametres_agregation' => ['parametre_agregation' => ['view', 'edit', 'create', 'delete', 'validate']],
                'profils' => ['profil' => ['view', 'edit', 'create', 'delete', 'validate']],
                'utilisateurs' => ['utilisateur' => ['view', 'edit', 'create', 'delete', 'validate']],
                'parametres_de_base' => ['parametre_reference' => ['view', 'edit', 'create', 'delete', 'validate']],
            ],
        ],
    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'profil',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_profile',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'profile_has_permissions',
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related pivots other than defaults
         */
        'role_pivot_key' => null, // default 'role_id',
        'permission_pivot_key' => null, // default 'permission_id',

        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',

        /*
         * Change this if you want to use the teams feature and your related model's
         * foreign key is other than `team_id`.
         */

        'team_foreign_key' => 'team_id',
    ],

    /*
     * When set to true, the method for checking permissions will be registered on the gate.
     * Set this to false if you want to implement custom logic for checking permissions.
     */

    'register_permission_check_method' => true,

    /*
     * When set to true, Laravel\Octane\Events\OperationTerminated event listener will be registered
     * this will refresh permissions on every TickTerminated, TaskTerminated and RequestTerminated
     * NOTE: This should not be needed in most cases, but an Octane/Vapor combination benefited from it.
     */
    'register_octane_reset_listener' => false,

    /*
     * Events will fire when a role or permission is assigned/unassigned:
     * \Spatie\Permission\Events\RoleAttached
     * \Spatie\Permission\Events\RoleDetached
     * \Spatie\Permission\Events\PermissionAttached
     * \Spatie\Permission\Events\PermissionDetached
     *
     * To enable, set to true, and then create listeners to watch these events.
     */
    'events_enabled' => false,

    /*
     * Teams Feature.
     * When set to true the package implements teams using the 'team_foreign_key'.
     * If you want the migrations to register the 'team_foreign_key', you must
     * set this to true before doing the migration.
     * If you already did the migration then you must make a new migration to also
     * add 'team_foreign_key' to 'roles', 'model_has_roles', and 'model_has_permissions'
     * (view the latest version of this package's migration file)
     */

    'teams' => false,

    /*
     * The class to use to resolve the permissions team id
     */
    'team_resolver' => \Spatie\Permission\DefaultTeamResolver::class,

    /*
     * Passport Client Credentials Grant
     * When set to true the package will use Passports Client to check permissions
     */

    'use_passport_client_credentials' => false,

    /*
     * When set to true, the required permission names are added to exception messages.
     * This could be considered an information leak in some contexts, so the default
     * setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    /*
     * When set to true, the required role names are added to exception messages.
     * This could be considered an information leak in some contexts, so the default
     * setting is false here for optimum safety.
     */

    'display_role_in_exception' => false,

    /*
     * By default wildcard permission lookups are disabled.
     * See documentation to understand supported syntax.
     */

    'enable_wildcard_permission' => false,

    /*
     * The class to use for interpreting wildcard permissions.
     * If you need to modify delimiters, override the class and specify its name here.
     */
    // 'wildcard_permission' => Spatie\Permission\WildcardPermission::class,

    /* Cache-specific settings */

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'spatie.permission.cache',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],

 
    
];
