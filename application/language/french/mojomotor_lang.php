<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$lang = array(

// Site wide Language vars
'no_such_page' 				=> "La page que vous avez demandé n'a pas été trouvée",
'submit'					=> "Soumettre",
'email'						=> "Email", // used as username also
'site_title'				=> "Titre du site",
'continue'					=> "Continuer",
'yes'						=> "Oui",
'no'						=> "Non",
'or'						=> 'ou',
'help'						=> 'Aide',
'account'					=> 'Compte',
'close'						=> 'Fermer',
'back_to'					=> 'Revenir à ',
'edit'						=> 'Éditer',
'insert'					=> 'Insérer',
'delete'					=> 'Supprimer',
'view_mode'					=> 'Mode Vue',
'id'						=> 'id',
'local'						=> 'Local',
'global'					=> 'Global',
'super_global'				=> 'Super Global',
'alpha_dash_exp'			=> 'Un seul mot, sans espaces. Lettres, tirets et underscores autorisés.',
'comma_separated'			=> 'Liste de mots séparé par des virgules.',
'refresh'					=> 'Refresh',

'layouts'					=> 'Dispositions',
'pages'						=> 'Pages',
'files'						=> 'Fichiers',
'members'					=> 'Membres',
'settings'					=> 'Paramètres',
'utilities'					=> 'Utilitaires',

'edit_mode'					=> 'Mode Édition',
'plain_text'				=> 'Texte simple',
'wysiwyg'					=> 'Graphique',
'welcome_back'				=> 'Bienvenue ',
'delete_confirm'			=> 'Êtes-vous sûr de vouloir supprimer %?',



// Login
'password'					=> "Mot de passe",
'remember_me'				=> "Se rappeler de mes identifiants",
'login_greeting'			=> "Bienvenue dans MojoMotor! Une idée simple et puissante.",
'login'						=> "Connexion",
'logout'					=> "Déconnexion",
'logout_confirm'			=> "Êtes-vous sûr de vouloir vous déconnecter?",
'email_password_warning'	=> "Veuillez saisir votre email et mot de passe pour vous connecter.",
'login_again'				=> "Me reconnecter",
'login_sub_greeting'		=> "Veuillez vous connecter ci-dessous. Vous êtes sur le point de vous amuser!",
'login_failure'				=> "Utilisateur et/ou mot de passe incorrect. Veuillez réessayer.",
'login_result_failure'		=> 'System unable to send result. Try removing \"www.\" from your URL.',
'forgotten_password'		=> "Mot de passe oublié?",
'forgotten_password_instructions'	=> "Veuillez saisir votre email. Les instructions pour réinitialiser votre mot de passe vous seront rapidement envoyées par email.",
'logout_success_message'	=> "Vous avez bien été déconnecté de MojoMotor.",
'forgotten_password_sent'	=> "Une confirmation de réinitialisation de mot de passe a été envoyée à <em>%email</em>.",
'trouble_sending_email'		=> 'Un problème est survenu lors de l\'envoi de l\'email. Veuillez activer le débogage et contacter le support.',
'password_email1'			=> 'Votre mot de passe a été changé avec succès. Votre nouveau mot de passe est ',
'password_email2'			=> ' et peut maintenant être utilisé pour se connecter.',
'password_change_success'	=> 'Votre mot de passe a été changé avec succès, et votre nouveau mot de passe vous a été envoyé par email.',
'password_change_fail'		=> 'Une erreur est survenue lors du changement de votre mot de passe.',
'password_reset_unable'		=> 'Impossible de réinitialiser votre mot de passe. Veuillez réessayer.',
'password_reset'			=> 'Réinitialisation du mot de passe',
'password_reset_email1'		=> 'Quelqu\'un (probablement vous), a demandé un nouveau mot de passe pour votre compte sur ',
'password_reset_email2'		=> 'Pour le réinitialiser, suivez ce lien sur notre site Internet:',
'password_reset_email3'		=> "Si vous n'êtes pas à l'origine de cette requête, ne tenez pas compte de cet email, et nous sommes désolés de vous avoir dérangé.",
'no_record'					=> 'Il n\'y a aucun enregistrement pour cette article.',


// General Errors and such
'missing_js_file'			=> "Le fichier jQuery demandé n'a pas pu être trouvé.",
'no_permissions'			=> "Vous n'avez pas les droits suffisants pour effectuer cette action",
'last_item_delete'			=> 'IMPORTANT! <br/> MojoMotor nécessite au moins une disposition et une page pour fonctionner correctement. Si vous supprimez la dernière, votre site peut devenir instable. Soyez absolument sûr que vous voulez le faire.',
'page_not_found'			=> "MojoMotor ne trouve pas de page à charger. Assurez-vous d'avoir défini une disposition et une page.",


// Layouts
'layout'					=> 'Disposition',
'layout_name'				=> 'Nom de la disposition',
'layout_type'				=> 'Type de disposition',
'layout_content'			=> 'Contenu',
'layout_add'				=> 'Ajouter une disposition',
'layout_edit'				=> 'Éditer la disposition',
'layout_delete'				=> 'Supprimer la disposition',
'layout_webpage'			=> 'Page Web',
'layout_embed'				=> 'Embed Content',
'layout_css'				=> 'Feuille de style CSS',
'layout_js'					=> 'Javascript',
'layout_add_successful'		=> 'La disposition a été ajoutée avec succès.',
'layout_add_fail'			=> "Un problème est survenu lors de l'ajout de cette disposition.",
'layout_edit_successful'	=> 'Disposition mise à jour avec succès.',
'layout_edit_fail'			=> 'Un problème est survenu lors de la mise à jour de la disposition.',
'layout_delete_successful'	=> 'Disposition supprimée avec succès.',
'layout_delete_fail'		=> 'Un problème est survenu lors de la suppression de la disposition.',
'layout_nonexistent'		=> 'Disposition introuvable.',
'layout_name_taken'			=> 'Ce nom de disposition est déjà utilisé.',
'layout_type_message'		=> 'Changer ceci après que les pages aient été construites peut produire des résultats inattendus.',
'layout_type_message_warning'	=> 'Des pages ont été construites avec cette disposition, changer son type peut conduire à des dysfonctionnements du site.',
'layout_delete_message_warning' => 'Any Pages using this layout will also be deleted.',
'layout_region_warning_title'	=> 'Les régions ont été supprimées',
'layout_region_warning'		=> ' a été supprimé. Si vous continuez, ceci <em>peut entrainer une perte de données</em>. Êtes-vous sûr de vouloir enregistrer cette disposition avec les régions supprimées ?',
'layout_embed_p_region'		=> 'Page regions are not allowed in Embed Content type layouts.',
'layout_save'				=> 'Enregistrer la disposition',
'global_region_comment'		=> 'MojoMotor will replace this content dynamically with the contents of the Global Region',
'page_region_comment'		=> 'MojoMotor will replace this content dynamically with the contents of the Page Region',


// Pages
'page'						=> 'Page',
'page_add'					=> 'Ajouter une page',
'page_edit'					=> 'Éditer la page',
'page_delete'				=> 'Supprimer la page',
'subpage_delete'			=> 'Cette page a des pages enfant. Si vous la supprimez, vous les supprimerez aussi de manière PERMANENTE. Cette action ne peut pas être annulée. Assurez-vous de vouloir continuer.',
'page_new'					=> 'Nouvelle Page',
'page_settings'				=> 'Paramètres de la page',
'page_title'				=> 'Titre de la page',
'url_title'					=> 'Titre URL',
'include_in_page_list'		=> 'Inclure à la liste des pages.',
'include_in_page_list_exp'	=> "Si décochée, cette page, <em>ainsi que toutes ses sous-pages</em>, n'apparaîtront pas lorsqu'une liste de page sera appelée.",
'meta_keywords'				=> 'Mots-clés',
'meta_description'			=> 'Description',
'page_add_successful'		=> 'Cette page a été ajoutée avec succès.',
'page_add_fail'				=> "Un problème est survenu lors de l'ajout de cette page.",
'page_edit_successful'		=> 'Page mise à jour avec succès.',
'page_edit_fail'			=> 'Un problème est survenu lors de la mise à jour de cette page.',
'page_delete_successful'	=> 'Page supprimée avec succès.',
'page_delete_fail'			=> 'Un problème est survenu lors de la suppression de cette page.',
'page_nonexistent'			=> 'Page introuvable.',
'site_structure_update_successful'	=> 'Structure de page mise à jour avec succès.',
'site_structure_update_fail'=> 'Un problème est survenu lors de la mise à jour de la structure de page.',
'url_title_taken'			=> 'Ce titre URL est déjà utilisé.',
'visit_page'				=> 'Visit Page',


// Member stuff
'invalid_email'				=> "Impossible de continuer avec l'adresse email fournie",
'duplicate_email'			=> 'Email already in use',
'user_cannot_be_deleted'	=> 'Cet utilisateur ne peut pas être supprimé',
'cannot_delete_self'		=> 'Vous ne pouvez pas supprimer votre propre compte',
'change_password'			=> 'Changer le mot de passe',
'password_old'				=> 'Ancien mot de passe',
'password_new'				=> 'Nouveau mot de passe',
'password_new_confirm'		=> 'Confirmation du nouveau mot de passe',
'password_confirm'			=> 'Confirmation du mot de passe',
'leave_blank'				=> 'Laisser blanc pour ne rien modifier',
'password_wrong'			=> 'Le mot de passe est incorrect.',
'password_too_long'			=> 'Le mot de passe est trop long.',
'password_required'			=> 'Les nouveaux membres doivent avoir un mot de passe',
'passwords_no_match'		=> 'Les mots de passe ne correspondent pas.',
'member_register'			=> 'Inscrire un membre',
'member_add'				=> 'Ajouter un membre',
'member_edit'				=> 'Éditer le membre',
'member_delete'				=> 'Supprimer le membre',
'member_group'				=> 'Groupe de membre',
'member'					=> 'Membre',
'member_add_successful'		=> 'Membre ajouté avec succès',
'member_add_fail'			=> 'Un problème est survenu lors de l\'ajout de ce membre',
'member_edit_successful'	=> 'Membre édité avec succès.',
'member_edit_fail'			=> "Un problème est survenu lors de l'édition de ce membre.",
'member_delete_successful'	=> 'Membre supprimé avec succès.',
'member_delete_fail'		=> 'Un problème est survenu lors de la suppression de ce membre.',
'notify_member'				=> "Notifier l'utilisateur?",
'notify_member_exp'			=> "Le nom d'utilisateur/mot de passe seront envoyés par email.",
'mojo_account_activation'	=> '%site_name compte créé',
'mojo_account_activation_body'	=> "Un compte vient de vous être créé sur %site_name. Vous pouvez vous connecter avec \nEmail: %email \nmot de passe: %password \n\n%login_page",
'notification_success'		=> ' et la notification a bien été envoyée',
'notification_failure'		=> " mais l'email de notification n'a pas pu être envoyé",
'member_save'				=> 'Enregistrer le membre',


// Settings stuff
'site_name'					=> 'Nom du site',
'default_page'				=> 'Page par défaut',
'in_page_login'				=> 'Connexion dans la page?',
'site_path'					=> 'Chemin du site',
'setting_update_successful'	=> 'Paramètres du site mis à jour',
'setting_update_lang_failure' => "Paramètres du site mis à jour, mais la langue n'a pu l'être",
'setting_update_failure'	=> 'Impossible de mettre à jour les paramètres du site',
'theme'						=> 'Thème MojoMotor',
'save_settings'				=> 'Enregistrer les paramètres',
'language'					=> 'Langue',


// Utilities
'new_version'				=> 'New version of MojoMotor available',
'run_update'				=> 'Perform MojoMotor Update',
'new_version_exp'			=> '<em>There is a new version of MojoMotor available.</em> We recommend keeping your versions current. Please visit the <a href="%x">MojoMotor download area</a> to get a copy of the latest release.',
'export_to_ee'				=> "Exporter vers ExpressionEngine ",
'import_site'				=> 'Importer un site',
'export_ee_description'		=> 'MojoMotor peut être exporté vers <a href="http://expressionengine.com">ExpressionEngine 2</a>. Le fichier résultant de l\'exportation pourra être importé dans ExpressionEngine via un module d\'importation. Veuillez consulter <a href="#">la documentation d\'exportation</a> pour plus d\'informations sur l\'utilisation de cette fonctionnalité, incluant les <em>notes importantes</em>.',
'php_info'					=> 'PHP Info',
'php_info_exp'				=> ' can be used to help debugging or technical support issues.',


// Help
'version'					=> 'Version',
'help_verbiage1'			=> 'Si vous avez besoin d\'aide, les <a href="http://mojomotor.com/forums/">forums de support de MojoMotor</a> sont là pour vous.',
'help_verbiage2'			=> 'MojoMotor est synonyme de possibilités. Nous voulons vous donner la possibilité d\'améliorer MojoMotor. Vous avez trouvé un bug? Merci de nous <a href="http://mojomotor.com/bug_tracker/">le signaler</a>. Une idée ou une suggestion? Retrouvez-vous sur les <a href="http://mojomotor.com/forums/">forums MotorMotor</a>. Nous sommes là pour vous!',


// File Manager
'filename'					=> "Name",
'size'						=> "Taille",
'date'						=> 'Date',
'no_files_found1'			=> 'Il n\'y a aucun fichiers dans le dossier d\'upload ', // space after
'no_files_found2'			=> 'Pour ajouter des fichier, fermez cette fenêtre et sélectionnez l\'onglet "Upload" depuis la boîte de dialogue des Propriétés d\'Image; sélectionnez un fichier et choisissez "Envoyer vers le serveur".', // space after
'file_delete_confirm'		=> 'Êtes-vous sûr de vouloir supprimer de manière permanente ', // space after
'problem_deleting_file'		=> 'Un problème est survenu lors de la suppression du fichier.',
'unable_read_upload_dir'	=> 'MojoMotor n\'a pas pu lire votre dossier d\'upload. Cette erreur peut survenir si le chemin du dossier d\'upload n\'est pas valide ou si le dossier ne peut pas être ouvert en raison de droits d\'accès insuffissants, ou suite à des erreurs du système de fichiers.',
'open_in_new_window'		=> 'Ouvrir le lien dans une nouvelle fenêtre?',


// Addons
'unable_to_locate_addon'	=> 'Unable to locate the addon you have specified: ',
'invalid_addon'				=> 'Invalid Addon',
'invalid_addon_call'		=> 'Invalid Addon call',
'contact_default_subject' 	=> 'contact form', // gets preceded with site name
'contact_send_failure'		=> 'There was a problem sending this contact form.',


// Editor
'enter_url'					=> 'Ajouter une URL à laquelle se connecter',
'or_choose_page'			=> 'Choisir une page du site',
'or_choose_page_dropdown'	=> '-- choose a site page from below --',
'page_save'					=> 'Enregistrer la page',


// we're done, leave this last one in place
"" => ""
);

/* End of file mojo_lang.php */
/* Location: system/mojomotor/languages/english/mojo_lang.php */