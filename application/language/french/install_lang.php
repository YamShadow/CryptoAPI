<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang = array(

// Installation Errors
'db_unable_to_connect'		=> "Impossible de se connecter à votre serveur de base de données en utilisant les paramètres fournis.",
'install_warning'			=> "Avertissement d'installation",
'warnings_encountered'		=> "Avant de pouvoir installer MojoMotor, nous avons besoin de résoudre les problèmes suivants.",
'db_file_not_stock'			=> "Le fichier de configuration de la base de données ne correspond pas à celui de MojoMotor. <em>Si vous continuez, vous <span class=\"error\">écraserez ce fichier</span> et <span class=\"error\">supprimerez toute installation antérieure de MojoMotor</span></em>. Si vous êtes sûr de vouloir le faire, vous pouvez continuer.",
'unreadable_config'			=> "Votre fichier config.php est illisible. Assurez-vous que le fichier existe et que les droits du fichier sont définis à 666 (ou les droits d'écriture équivalents pour votre serveur) sur le fichier suivant: application/config/config.php.",
'unwritable_config'			=> 'Votre fichier config.php ne semble pas avoir les droits appropriés.',
'unwritable_routes'			=> 'Votre fichier routes.php ne semble pas avoir les droits appropriés. Veuillez définir les droits du fichier à 666 (ou les droits d\'écriture équivalents pour votre serveur) sur le fichier suivant: application/config/routes.php. Vous pouvez aussi définir manuellement $route["default_controller"] à "page" pour continuer.',
'unreadable_database'		=> 'Votre fichier database.php ne peut pas être lu depuis application/config/database.php.',
'unwritable_database'		=> 'Votre fichier database.php ne semble pas avoir les droits appropriés.',
'unwritable_cache_folder'	=> 'Votre dossier cache ne semble pas avoir les droits appropriés. Veuillez définir les droits du dossier à 777 (ou les droits d\'écriture équivalents pour votre serveur) sur le dossier suivant: system/cache.',
'min_php_version'			=> 'MojoMotor nécessite PHP 5, ce serveur utilise '.phpversion().'.',
'add_site_data_fail'		=> "Impossible d'insérer les données par défaut du site",
'config_override'			=> "Les fichiers config.php et/ou database.php ne sont pas accessibles en écriture. Vous pouvez, si vous le souhaitez, saisir les informations manuellement dans ces fichiers, sinon veuillez définir les droits des fichiers à 666 (ou les droits d'écriture équivalents pour votre serveur) sur les fichiers suivants:<br />- system/mojomotor/config/config.php;<br />- system/mojomotor/config/database.php.",
'install_lock_true'			=> 'L\'installation est actuellement verrouillée. Pour réinstaller, vous devez supprimer<br /><br /><code>$config["install_lock"] = "locked";</code><br /><br /> dans system/mojomotor/config/config.php.',

// Setup (Install, Update)
'license'					=> 'Contrat de Licence',
'agree_continue'			=> 'Pour installer MojoMotor, vous devez accepter de respecter les termes de la licence et les conditions ci-dessus.',
'i_agree'					=> "J'accepte",
'errors_addressed'			=> 'Après avoir résolu ces problèmes, vous pourrez continuer ci-dessous.',
'install'					=> "Installer",
'install_explanation'		=> "Afin de pouvoir effectuer l'installation, nous aurons besoin de recueillir quelques informations sur votre site et vous.",
'database_settings'			=> "Paramètres de base de données",
'site_settings'				=> "Paramètres de site",
'show_advanced_options'		=> "Afficher les options avancées",
'hide_advanced_options'		=> "Masquer les options avancées",
'advanced_install_options'	=> "Options avancées",
'install_email_exp'			=> "Votre email est utilisé comme identifiant de connexion.",
'site_title_exp'			=> "Le titre de votre site Internet.",

'site_content'				=> 'Contenu du site',
'site_content_exp_blank'	=> 'Un site presque vierge; idéal si vous savez ce que vous faites',
'site_content_exp_default'	=> 'Site par défaut - prérempli avec dispositions, pages et contenu',
'site_content_exp_import'	=> 'Importation - Importe vos pages HTML dans MojoMotor',
'import_site'				=> "Importer le site ",
'default_site'				=> "Installer le site par défaut",
'blank_site'				=> "Installer un site vierge",

'install_success'			=> "MojoMotor est installé",
'routes_change'				=> "Vous pouvez maintenant changer manuellement votre controleur par défaut à \"page\" dans  system/mojomotor/config/routes.php",
'success_exp'				=> "Seriously, that's all there was to it.",
'important_info_blank_pass' => "Vous pouvez maintenant commencer à utiliser votre nouveau site en vous connectant. Vous pouvez commencer par lire les tutoriels en ligne. Le mot de passe ci-dessous a été généré aléatoirement pour vous, mais vous voudrez probablement le changer pur un mot de passe plus facile à retenir. Pour ce faire, connectez-vous et cliquez sur le lien compte, dans la barre d'outils.",
'important_info_user_picked_pass' => "Vous pouvez maintenant commencer à utiliser votre nouveau site en vous connectant. Vous pouvez commencer par lire les tutoriels en ligne.",
'set_installation_lock'		=> 'Il est très important, pour assurer la sécurité de votre site, d\'ouvrir le fichier system/mojomotor/config/config.php et d\'y ajouter <br /><br /><code>$config["install_lock"] = "locked";</code><br /><br />.',
'login_with_email'			=> "Vous vous connecterez avec votre email",
'login_options_1'			=> "Vous pouvez soit vous connecter depuis le panneau central ",
'login_options_2'			=> ", ou grâce au lien \"connexion\" situé dans le pied de page de chaque page de votre site.",
'enjoy'						=> "Avant tout, profitez de votre ",
'new_site'					=> "nouveau site Internet",

'database_settings'			=> "Paramètres de base de données",
'db_name'					=> "Nom de base de données",
'db_name_exp'				=> "Nom de la base de données sur laquelle MojoMotor sera exécuté. Si la base de données n'existe pas, MojoMotor essaiera de la créer pour vous - selon les privilèges dont vous disposez, vous aurez peut-être besoin de la créer manuellement.",
'db_user'					=> "Nom d'utilisateur de la base de données",
'db_user_exp'				=> "Votre nom d'utilisateur de base de données.",
'db_password'				=> "Mot de passe de la base de données",
'db_password_exp'			=> "Votre mot de passe de base de données",
'db_host'					=> "Serveur de base de données",
'db_host_exp'				=> "Généralement défini à \"localhost\".",
'db_prefix'					=> "Préfixe des tables",
'db_prefix_exp'				=> "Utile si vous partagez cette base de données avec d'autres applications Web.",

'advanced_install_options_exp'	=> "Ces options vous permettent d'affiner le contrôle sur le processus d'installation.",
'sqlite_db'					=> "SQLite",
'mysql_db'					=> "MySQL",
'database_type'				=> "Type de base de données",
'database_type_exp'			=> "MojoMotor supporte MySQL et SQLite. L'installation SQLite ne nécessite pas de serveur de base de données, ni d'informations sur votre base de données.",
'base_url'					=> "URL du Site",
'base_url_exp'				=> "Adresse à laquelle votre site peut être accédé. Nous avons essayé de la deviner pour vous.",
'password'					=> "Mot de passe",
'password_exp'				=> "Mot de passe de votre compte. Si vous ne le saisissez pas, MojoMotor choisira un mot de passe difficile à deviner.",
'pconnect'					=> "Connexions persistantes",
'pconnect_exp'				=> "Connexion persistante à la base de données.",

// we're done, leave this last one in place
"" => ""
);

/* End of file mojo_lang.php */
/* Location: system/mojomotor/languages/english/mojo_lang.php */