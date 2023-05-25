<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitFiles_External
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OCA\\Files_External\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OCA\\Files_External\\' => 
        array (
            0 => __DIR__ . '/..' . '/../lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'OCA\\Files_External\\AppInfo\\Application' => __DIR__ . '/..' . '/../lib/AppInfo/Application.php',
        'OCA\\Files_External\\BackgroundJob\\CredentialsCleanup' => __DIR__ . '/..' . '/../lib/BackgroundJob/CredentialsCleanup.php',
        'OCA\\Files_External\\Command\\Applicable' => __DIR__ . '/..' . '/../lib/Command/Applicable.php',
        'OCA\\Files_External\\Command\\Backends' => __DIR__ . '/..' . '/../lib/Command/Backends.php',
        'OCA\\Files_External\\Command\\Config' => __DIR__ . '/..' . '/../lib/Command/Config.php',
        'OCA\\Files_External\\Command\\Create' => __DIR__ . '/..' . '/../lib/Command/Create.php',
        'OCA\\Files_External\\Command\\Delete' => __DIR__ . '/..' . '/../lib/Command/Delete.php',
        'OCA\\Files_External\\Command\\Export' => __DIR__ . '/..' . '/../lib/Command/Export.php',
        'OCA\\Files_External\\Command\\Import' => __DIR__ . '/..' . '/../lib/Command/Import.php',
        'OCA\\Files_External\\Command\\ListCommand' => __DIR__ . '/..' . '/../lib/Command/ListCommand.php',
        'OCA\\Files_External\\Command\\MigrateOc' => __DIR__ . '/..' . '/../lib/Command/MigrateOc.php',
        'OCA\\Files_External\\Command\\Notify' => __DIR__ . '/..' . '/../lib/Command/Notify.php',
        'OCA\\Files_External\\Command\\Option' => __DIR__ . '/..' . '/../lib/Command/Option.php',
        'OCA\\Files_External\\Command\\Verify' => __DIR__ . '/..' . '/../lib/Command/Verify.php',
        'OCA\\Files_External\\Config\\ConfigAdapter' => __DIR__ . '/..' . '/../lib/Config/ConfigAdapter.php',
        'OCA\\Files_External\\Config\\ExternalMountPoint' => __DIR__ . '/..' . '/../lib/Config/ExternalMountPoint.php',
        'OCA\\Files_External\\Config\\IConfigHandler' => __DIR__ . '/..' . '/../lib/Config/IConfigHandler.php',
        'OCA\\Files_External\\Config\\SimpleSubstitutionTrait' => __DIR__ . '/..' . '/../lib/Config/SimpleSubstitutionTrait.php',
        'OCA\\Files_External\\Config\\SystemMountPoint' => __DIR__ . '/..' . '/../lib/Config/SystemMountPoint.php',
        'OCA\\Files_External\\Config\\UserContext' => __DIR__ . '/..' . '/../lib/Config/UserContext.php',
        'OCA\\Files_External\\Config\\UserPlaceholderHandler' => __DIR__ . '/..' . '/../lib/Config/UserPlaceholderHandler.php',
        'OCA\\Files_External\\Controller\\AjaxController' => __DIR__ . '/..' . '/../lib/Controller/AjaxController.php',
        'OCA\\Files_External\\Controller\\ApiController' => __DIR__ . '/..' . '/../lib/Controller/ApiController.php',
        'OCA\\Files_External\\Controller\\GlobalStoragesController' => __DIR__ . '/..' . '/../lib/Controller/GlobalStoragesController.php',
        'OCA\\Files_External\\Controller\\StoragesController' => __DIR__ . '/..' . '/../lib/Controller/StoragesController.php',
        'OCA\\Files_External\\Controller\\UserGlobalStoragesController' => __DIR__ . '/..' . '/../lib/Controller/UserGlobalStoragesController.php',
        'OCA\\Files_External\\Controller\\UserStoragesController' => __DIR__ . '/..' . '/../lib/Controller/UserStoragesController.php',
        'OCA\\Files_External\\Lib\\Auth\\AmazonS3\\AccessKey' => __DIR__ . '/..' . '/../lib/Lib/Auth/AmazonS3/AccessKey.php',
        'OCA\\Files_External\\Lib\\Auth\\AuthMechanism' => __DIR__ . '/..' . '/../lib/Lib/Auth/AuthMechanism.php',
        'OCA\\Files_External\\Lib\\Auth\\Builtin' => __DIR__ . '/..' . '/../lib/Lib/Auth/Builtin.php',
        'OCA\\Files_External\\Lib\\Auth\\IUserProvided' => __DIR__ . '/..' . '/../lib/Lib/Auth/IUserProvided.php',
        'OCA\\Files_External\\Lib\\Auth\\InvalidAuth' => __DIR__ . '/..' . '/../lib/Lib/Auth/InvalidAuth.php',
        'OCA\\Files_External\\Lib\\Auth\\NullMechanism' => __DIR__ . '/..' . '/../lib/Lib/Auth/NullMechanism.php',
        'OCA\\Files_External\\Lib\\Auth\\OAuth1\\OAuth1' => __DIR__ . '/..' . '/../lib/Lib/Auth/OAuth1/OAuth1.php',
        'OCA\\Files_External\\Lib\\Auth\\OAuth2\\OAuth2' => __DIR__ . '/..' . '/../lib/Lib/Auth/OAuth2/OAuth2.php',
        'OCA\\Files_External\\Lib\\Auth\\OpenStack\\OpenStackV2' => __DIR__ . '/..' . '/../lib/Lib/Auth/OpenStack/OpenStackV2.php',
        'OCA\\Files_External\\Lib\\Auth\\OpenStack\\OpenStackV3' => __DIR__ . '/..' . '/../lib/Lib/Auth/OpenStack/OpenStackV3.php',
        'OCA\\Files_External\\Lib\\Auth\\OpenStack\\Rackspace' => __DIR__ . '/..' . '/../lib/Lib/Auth/OpenStack/Rackspace.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\GlobalAuth' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/GlobalAuth.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\LoginCredentials' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/LoginCredentials.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\Password' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/Password.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\SessionCredentials' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/SessionCredentials.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\UserGlobalAuth' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/UserGlobalAuth.php',
        'OCA\\Files_External\\Lib\\Auth\\Password\\UserProvided' => __DIR__ . '/..' . '/../lib/Lib/Auth/Password/UserProvided.php',
        'OCA\\Files_External\\Lib\\Auth\\PublicKey\\RSA' => __DIR__ . '/..' . '/../lib/Lib/Auth/PublicKey/RSA.php',
        'OCA\\Files_External\\Lib\\Auth\\PublicKey\\RSAPrivateKey' => __DIR__ . '/..' . '/../lib/Lib/Auth/PublicKey/RSAPrivateKey.php',
        'OCA\\Files_External\\Lib\\Auth\\SMB\\KerberosApacheAuth' => __DIR__ . '/..' . '/../lib/Lib/Auth/SMB/KerberosApacheAuth.php',
        'OCA\\Files_External\\Lib\\Auth\\SMB\\KerberosAuth' => __DIR__ . '/..' . '/../lib/Lib/Auth/SMB/KerberosAuth.php',
        'OCA\\Files_External\\Lib\\Backend\\AmazonS3' => __DIR__ . '/..' . '/../lib/Lib/Backend/AmazonS3.php',
        'OCA\\Files_External\\Lib\\Backend\\Backend' => __DIR__ . '/..' . '/../lib/Lib/Backend/Backend.php',
        'OCA\\Files_External\\Lib\\Backend\\DAV' => __DIR__ . '/..' . '/../lib/Lib/Backend/DAV.php',
        'OCA\\Files_External\\Lib\\Backend\\FTP' => __DIR__ . '/..' . '/../lib/Lib/Backend/FTP.php',
        'OCA\\Files_External\\Lib\\Backend\\InvalidBackend' => __DIR__ . '/..' . '/../lib/Lib/Backend/InvalidBackend.php',
        'OCA\\Files_External\\Lib\\Backend\\LegacyBackend' => __DIR__ . '/..' . '/../lib/Lib/Backend/LegacyBackend.php',
        'OCA\\Files_External\\Lib\\Backend\\Local' => __DIR__ . '/..' . '/../lib/Lib/Backend/Local.php',
        'OCA\\Files_External\\Lib\\Backend\\OwnCloud' => __DIR__ . '/..' . '/../lib/Lib/Backend/OwnCloud.php',
        'OCA\\Files_External\\Lib\\Backend\\SFTP' => __DIR__ . '/..' . '/../lib/Lib/Backend/SFTP.php',
        'OCA\\Files_External\\Lib\\Backend\\SFTP_Key' => __DIR__ . '/..' . '/../lib/Lib/Backend/SFTP_Key.php',
        'OCA\\Files_External\\Lib\\Backend\\SMB' => __DIR__ . '/..' . '/../lib/Lib/Backend/SMB.php',
        'OCA\\Files_External\\Lib\\Backend\\SMB_OC' => __DIR__ . '/..' . '/../lib/Lib/Backend/SMB_OC.php',
        'OCA\\Files_External\\Lib\\Backend\\Swift' => __DIR__ . '/..' . '/../lib/Lib/Backend/Swift.php',
        'OCA\\Files_External\\Lib\\Config\\IAuthMechanismProvider' => __DIR__ . '/..' . '/../lib/Lib/Config/IAuthMechanismProvider.php',
        'OCA\\Files_External\\Lib\\Config\\IBackendProvider' => __DIR__ . '/..' . '/../lib/Lib/Config/IBackendProvider.php',
        'OCA\\Files_External\\Lib\\DefinitionParameter' => __DIR__ . '/..' . '/../lib/Lib/DefinitionParameter.php',
        'OCA\\Files_External\\Lib\\DependencyTrait' => __DIR__ . '/..' . '/../lib/Lib/DependencyTrait.php',
        'OCA\\Files_External\\Lib\\FrontendDefinitionTrait' => __DIR__ . '/..' . '/../lib/Lib/FrontendDefinitionTrait.php',
        'OCA\\Files_External\\Lib\\IFrontendDefinition' => __DIR__ . '/..' . '/../lib/Lib/IFrontendDefinition.php',
        'OCA\\Files_External\\Lib\\IIdentifier' => __DIR__ . '/..' . '/../lib/Lib/IIdentifier.php',
        'OCA\\Files_External\\Lib\\IdentifierTrait' => __DIR__ . '/..' . '/../lib/Lib/IdentifierTrait.php',
        'OCA\\Files_External\\Lib\\InsufficientDataForMeaningfulAnswerException' => __DIR__ . '/..' . '/../lib/Lib/InsufficientDataForMeaningfulAnswerException.php',
        'OCA\\Files_External\\Lib\\LegacyDependencyCheckPolyfill' => __DIR__ . '/..' . '/../lib/Lib/LegacyDependencyCheckPolyfill.php',
        'OCA\\Files_External\\Lib\\MissingDependency' => __DIR__ . '/..' . '/../lib/Lib/MissingDependency.php',
        'OCA\\Files_External\\Lib\\Notify\\SMBNotifyHandler' => __DIR__ . '/..' . '/../lib/Lib/Notify/SMBNotifyHandler.php',
        'OCA\\Files_External\\Lib\\PersonalMount' => __DIR__ . '/..' . '/../lib/Lib/PersonalMount.php',
        'OCA\\Files_External\\Lib\\PriorityTrait' => __DIR__ . '/..' . '/../lib/Lib/PriorityTrait.php',
        'OCA\\Files_External\\Lib\\SessionStorageWrapper' => __DIR__ . '/..' . '/../lib/Lib/SessionStorageWrapper.php',
        'OCA\\Files_External\\Lib\\StorageConfig' => __DIR__ . '/..' . '/../lib/Lib/StorageConfig.php',
        'OCA\\Files_External\\Lib\\StorageModifierTrait' => __DIR__ . '/..' . '/../lib/Lib/StorageModifierTrait.php',
        'OCA\\Files_External\\Lib\\Storage\\AmazonS3' => __DIR__ . '/..' . '/../lib/Lib/Storage/AmazonS3.php',
        'OCA\\Files_External\\Lib\\Storage\\FTP' => __DIR__ . '/..' . '/../lib/Lib/Storage/FTP.php',
        'OCA\\Files_External\\Lib\\Storage\\FtpConnection' => __DIR__ . '/..' . '/../lib/Lib/Storage/FtpConnection.php',
        'OCA\\Files_External\\Lib\\Storage\\OwnCloud' => __DIR__ . '/..' . '/../lib/Lib/Storage/OwnCloud.php',
        'OCA\\Files_External\\Lib\\Storage\\SFTP' => __DIR__ . '/..' . '/../lib/Lib/Storage/SFTP.php',
        'OCA\\Files_External\\Lib\\Storage\\SFTPReadStream' => __DIR__ . '/..' . '/../lib/Lib/Storage/SFTPReadStream.php',
        'OCA\\Files_External\\Lib\\Storage\\SFTPWriteStream' => __DIR__ . '/..' . '/../lib/Lib/Storage/SFTPWriteStream.php',
        'OCA\\Files_External\\Lib\\Storage\\SMB' => __DIR__ . '/..' . '/../lib/Lib/Storage/SMB.php',
        'OCA\\Files_External\\Lib\\Storage\\StreamWrapper' => __DIR__ . '/..' . '/../lib/Lib/Storage/StreamWrapper.php',
        'OCA\\Files_External\\Lib\\Storage\\Swift' => __DIR__ . '/..' . '/../lib/Lib/Storage/Swift.php',
        'OCA\\Files_External\\Lib\\VisibilityTrait' => __DIR__ . '/..' . '/../lib/Lib/VisibilityTrait.php',
        'OCA\\Files_External\\Listener\\GroupDeletedListener' => __DIR__ . '/..' . '/../lib/Listener/GroupDeletedListener.php',
        'OCA\\Files_External\\Listener\\LoadAdditionalListener' => __DIR__ . '/..' . '/../lib/Listener/LoadAdditionalListener.php',
        'OCA\\Files_External\\Listener\\StorePasswordListener' => __DIR__ . '/..' . '/../lib/Listener/StorePasswordListener.php',
        'OCA\\Files_External\\Listener\\UserDeletedListener' => __DIR__ . '/..' . '/../lib/Listener/UserDeletedListener.php',
        'OCA\\Files_External\\Migration\\DummyUserSession' => __DIR__ . '/..' . '/../lib/Migration/DummyUserSession.php',
        'OCA\\Files_External\\Migration\\Version1011Date20200630192246' => __DIR__ . '/..' . '/../lib/Migration/Version1011Date20200630192246.php',
        'OCA\\Files_External\\Migration\\Version1015Date20211104103506' => __DIR__ . '/..' . '/../lib/Migration/Version1015Date20211104103506.php',
        'OCA\\Files_External\\Migration\\Version1016Date20220324154536' => __DIR__ . '/..' . '/../lib/Migration/Version1016Date20220324154536.php',
        'OCA\\Files_External\\Migration\\Version22000Date20210216084416' => __DIR__ . '/..' . '/../lib/Migration/Version22000Date20210216084416.php',
        'OCA\\Files_External\\MountConfig' => __DIR__ . '/..' . '/../lib/MountConfig.php',
        'OCA\\Files_External\\NotFoundException' => __DIR__ . '/..' . '/../lib/NotFoundException.php',
        'OCA\\Files_External\\ResponseDefinitions' => __DIR__ . '/..' . '/../lib/ResponseDefinitions.php',
        'OCA\\Files_External\\Service\\BackendService' => __DIR__ . '/..' . '/../lib/Service/BackendService.php',
        'OCA\\Files_External\\Service\\DBConfigService' => __DIR__ . '/..' . '/../lib/Service/DBConfigService.php',
        'OCA\\Files_External\\Service\\GlobalStoragesService' => __DIR__ . '/..' . '/../lib/Service/GlobalStoragesService.php',
        'OCA\\Files_External\\Service\\ImportLegacyStoragesService' => __DIR__ . '/..' . '/../lib/Service/ImportLegacyStoragesService.php',
        'OCA\\Files_External\\Service\\LegacyStoragesService' => __DIR__ . '/..' . '/../lib/Service/LegacyStoragesService.php',
        'OCA\\Files_External\\Service\\StoragesService' => __DIR__ . '/..' . '/../lib/Service/StoragesService.php',
        'OCA\\Files_External\\Service\\UserGlobalStoragesService' => __DIR__ . '/..' . '/../lib/Service/UserGlobalStoragesService.php',
        'OCA\\Files_External\\Service\\UserStoragesService' => __DIR__ . '/..' . '/../lib/Service/UserStoragesService.php',
        'OCA\\Files_External\\Service\\UserTrait' => __DIR__ . '/..' . '/../lib/Service/UserTrait.php',
        'OCA\\Files_External\\Settings\\Admin' => __DIR__ . '/..' . '/../lib/Settings/Admin.php',
        'OCA\\Files_External\\Settings\\Personal' => __DIR__ . '/..' . '/../lib/Settings/Personal.php',
        'OCA\\Files_External\\Settings\\PersonalSection' => __DIR__ . '/..' . '/../lib/Settings/PersonalSection.php',
        'OCA\\Files_External\\Settings\\Section' => __DIR__ . '/..' . '/../lib/Settings/Section.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitFiles_External::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitFiles_External::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitFiles_External::$classMap;

        }, null, ClassLoader::class);
    }
}
