<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = $vendorDir;

return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'OCA\\Files\\Activity\\FavoriteProvider' => $baseDir . '/../lib/Activity/FavoriteProvider.php',
    'OCA\\Files\\Activity\\Filter\\Favorites' => $baseDir . '/../lib/Activity/Filter/Favorites.php',
    'OCA\\Files\\Activity\\Filter\\FileChanges' => $baseDir . '/../lib/Activity/Filter/FileChanges.php',
    'OCA\\Files\\Activity\\Helper' => $baseDir . '/../lib/Activity/Helper.php',
    'OCA\\Files\\Activity\\Provider' => $baseDir . '/../lib/Activity/Provider.php',
    'OCA\\Files\\Activity\\Settings\\FavoriteAction' => $baseDir . '/../lib/Activity/Settings/FavoriteAction.php',
    'OCA\\Files\\Activity\\Settings\\FileActivitySettings' => $baseDir . '/../lib/Activity/Settings/FileActivitySettings.php',
    'OCA\\Files\\Activity\\Settings\\FileChanged' => $baseDir . '/../lib/Activity/Settings/FileChanged.php',
    'OCA\\Files\\Activity\\Settings\\FileFavoriteChanged' => $baseDir . '/../lib/Activity/Settings/FileFavoriteChanged.php',
    'OCA\\Files\\App' => $baseDir . '/../lib/App.php',
    'OCA\\Files\\AppInfo\\Application' => $baseDir . '/../lib/AppInfo/Application.php',
    'OCA\\Files\\BackgroundJob\\CleanupDirectEditingTokens' => $baseDir . '/../lib/BackgroundJob/CleanupDirectEditingTokens.php',
    'OCA\\Files\\BackgroundJob\\CleanupFileLocks' => $baseDir . '/../lib/BackgroundJob/CleanupFileLocks.php',
    'OCA\\Files\\BackgroundJob\\DeleteExpiredOpenLocalEditor' => $baseDir . '/../lib/BackgroundJob/DeleteExpiredOpenLocalEditor.php',
    'OCA\\Files\\BackgroundJob\\DeleteOrphanedItems' => $baseDir . '/../lib/BackgroundJob/DeleteOrphanedItems.php',
    'OCA\\Files\\BackgroundJob\\ScanFiles' => $baseDir . '/../lib/BackgroundJob/ScanFiles.php',
    'OCA\\Files\\BackgroundJob\\TransferOwnership' => $baseDir . '/../lib/BackgroundJob/TransferOwnership.php',
    'OCA\\Files\\Capabilities' => $baseDir . '/../lib/Capabilities.php',
    'OCA\\Files\\Collaboration\\Resources\\Listener' => $baseDir . '/../lib/Collaboration/Resources/Listener.php',
    'OCA\\Files\\Collaboration\\Resources\\ResourceProvider' => $baseDir . '/../lib/Collaboration/Resources/ResourceProvider.php',
    'OCA\\Files\\Command\\DeleteOrphanedFiles' => $baseDir . '/../lib/Command/DeleteOrphanedFiles.php',
    'OCA\\Files\\Command\\RepairTree' => $baseDir . '/../lib/Command/RepairTree.php',
    'OCA\\Files\\Command\\Scan' => $baseDir . '/../lib/Command/Scan.php',
    'OCA\\Files\\Command\\ScanAppData' => $baseDir . '/../lib/Command/ScanAppData.php',
    'OCA\\Files\\Command\\TransferOwnership' => $baseDir . '/../lib/Command/TransferOwnership.php',
    'OCA\\Files\\Controller\\ApiController' => $baseDir . '/../lib/Controller/ApiController.php',
    'OCA\\Files\\Controller\\DirectEditingController' => $baseDir . '/../lib/Controller/DirectEditingController.php',
    'OCA\\Files\\Controller\\DirectEditingViewController' => $baseDir . '/../lib/Controller/DirectEditingViewController.php',
    'OCA\\Files\\Controller\\DownloadController' => $baseDir . '/../lib/Controller/DownloadController.php',
    'OCA\\Files\\Controller\\OpenLocalEditorController' => $baseDir . '/../lib/Controller/OpenLocalEditorController.php',
    'OCA\\Files\\Controller\\TemplateController' => $baseDir . '/../lib/Controller/TemplateController.php',
    'OCA\\Files\\Controller\\TransferOwnershipController' => $baseDir . '/../lib/Controller/TransferOwnershipController.php',
    'OCA\\Files\\Controller\\ViewController' => $baseDir . '/../lib/Controller/ViewController.php',
    'OCA\\Files\\Db\\OpenLocalEditor' => $baseDir . '/../lib/Db/OpenLocalEditor.php',
    'OCA\\Files\\Db\\OpenLocalEditorMapper' => $baseDir . '/../lib/Db/OpenLocalEditorMapper.php',
    'OCA\\Files\\Db\\TransferOwnership' => $baseDir . '/../lib/Db/TransferOwnership.php',
    'OCA\\Files\\Db\\TransferOwnershipMapper' => $baseDir . '/../lib/Db/TransferOwnershipMapper.php',
    'OCA\\Files\\DirectEditingCapabilities' => $baseDir . '/../lib/DirectEditingCapabilities.php',
    'OCA\\Files\\Event\\LoadAdditionalScriptsEvent' => $baseDir . '/../lib/Event/LoadAdditionalScriptsEvent.php',
    'OCA\\Files\\Event\\LoadSidebar' => $baseDir . '/../lib/Event/LoadSidebar.php',
    'OCA\\Files\\Exception\\TransferOwnershipException' => $baseDir . '/../lib/Exception/TransferOwnershipException.php',
    'OCA\\Files\\Helper' => $baseDir . '/../lib/Helper.php',
    'OCA\\Files\\Listener\\LegacyLoadAdditionalScriptsAdapter' => $baseDir . '/../lib/Listener/LegacyLoadAdditionalScriptsAdapter.php',
    'OCA\\Files\\Listener\\LoadSidebarListener' => $baseDir . '/../lib/Listener/LoadSidebarListener.php',
    'OCA\\Files\\Migration\\Version11301Date20191205150729' => $baseDir . '/../lib/Migration/Version11301Date20191205150729.php',
    'OCA\\Files\\Migration\\Version12101Date20221011153334' => $baseDir . '/../lib/Migration/Version12101Date20221011153334.php',
    'OCA\\Files\\Notification\\Notifier' => $baseDir . '/../lib/Notification/Notifier.php',
    'OCA\\Files\\Provider\\FileDownloadProvider' => $baseDir . '/../lib/Provider/FileDownloadProvider.php',
    'OCA\\Files\\Search\\FilesSearchProvider' => $baseDir . '/../lib/Search/FilesSearchProvider.php',
    'OCA\\Files\\Service\\DirectEditingService' => $baseDir . '/../lib/Service/DirectEditingService.php',
    'OCA\\Files\\Service\\OwnershipTransferService' => $baseDir . '/../lib/Service/OwnershipTransferService.php',
    'OCA\\Files\\Service\\TagService' => $baseDir . '/../lib/Service/TagService.php',
    'OCA\\Files\\Service\\UserConfig' => $baseDir . '/../lib/Service/UserConfig.php',
    'OCA\\Files\\Settings\\PersonalSettings' => $baseDir . '/../lib/Settings/PersonalSettings.php',
);
