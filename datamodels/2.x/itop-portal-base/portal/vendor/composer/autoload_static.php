<?php
/**
 * Copyright (C) 2013-2021 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

use Combodo\iTop\Portal\Routing\ITopRouter;

class ComposerStaticInitdf408f3f8ea034d298269cdf7647358b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Combodo\\iTop\\Portal\\Tests\\' => 26,
            'Combodo\\iTop\\Portal\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Combodo\\iTop\\Portal\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Combodo\\iTop\\Portal\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
	    'Combodo\\iTop\\Portal\\Brick\\AbstractBrick' => __DIR__ . '/../..' . '/src/Brick/AbstractBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\AggregatePageBrick' => __DIR__ . '/../..' . '/src/Brick/AggregatePageBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\BrickCollection' => __DIR__ . '/../..' . '/src/Brick/BrickCollection.php',
	    'Combodo\\iTop\\Portal\\Brick\\BrickNotFoundException' => __DIR__ . '/../..' . '/src/Brick/BrickNotFoundException.php',
	    'Combodo\\iTop\\Portal\\Brick\\BrowseBrick' => __DIR__ . '/../..' . '/src/Brick/BrowseBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\CreateBrick' => __DIR__ . '/../..' . '/src/Brick/CreateBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\FilterBrick' => __DIR__ . '/../..' . '/src/Brick/FilterBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\ManageBrick' => __DIR__ . '/../..' . '/src/Brick/ManageBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\PortalBrick' => __DIR__ . '/../..' . '/src/Brick/PortalBrick.php',
	    'Combodo\\iTop\\Portal\\Brick\\PropertyNotFoundException' => __DIR__ . '/../..' . '/src/Brick/PropertyNotFoundException.php',
	    'Combodo\\iTop\\Portal\\Brick\\UserProfileBrick' => __DIR__ . '/../..' . '/src/Brick/UserProfileBrick.php',
	    'Combodo\\iTop\\Portal\\Controller\\AbstractController' => __DIR__ . '/../..' . '/src/Controller/AbstractController.php',
	    'Combodo\\iTop\\Portal\\Controller\\AggregatePageBrickController' => __DIR__ . '/../..' . '/src/Controller/AggregatePageBrickController.class.inc.php',
	    'Combodo\\iTop\\Portal\\Controller\\BrickController' => __DIR__ . '/../..' . '/src/Controller/BrickController.php',
	    'Combodo\\iTop\\Portal\\Controller\\BrowseBrickController' => __DIR__ . '/../..' . '/src/Controller/BrowseBrickController.php',
	    'Combodo\\iTop\\Portal\\Controller\\CreateBrickController' => __DIR__ . '/../..' . '/src/Controller/CreateBrickController.php',
	    'Combodo\\iTop\\Portal\\Controller\\DefaultController' => __DIR__ . '/../..' . '/src/Controller/DefaultController.php',
	    'Combodo\\iTop\\Portal\\Controller\\ManageBrickController' => __DIR__ . '/../..' . '/src/Controller/ManageBrickController.php',
	    'Combodo\\iTop\\Portal\\Controller\\ObjectController' => __DIR__ . '/../..' . '/src/Controller/ObjectController.php',
	    'Combodo\\iTop\\Portal\\Controller\\SessionMessageController' => __DIR__ . '/../..' . '/src/Controller/SessionMessageController.php',
	    'Combodo\\iTop\\Portal\\Controller\\UserProfileBrickController' => __DIR__ . '/../..' . '/src/Controller/UserProfileBrickController.php',
	    'Combodo\\iTop\\Portal\\DependencyInjection\\SilexCompatBootstrap\\PortalXmlConfiguration\\AbstractConfiguration' => __DIR__ . '/../..' . '/src/DependencyInjection/SilexCompatBootstrap/PortalXmlConfiguration/AbstractConfiguration.php',
	    'Combodo\\iTop\\Portal\\DependencyInjection\\SilexCompatBootstrap\\PortalXmlConfiguration\\Basic' => __DIR__ . '/../..' . '/src/DependencyInjection/SilexCompatBootstrap/PortalXmlConfiguration/Basic.php',
	    'Combodo\\iTop\\Portal\\DependencyInjection\\SilexCompatBootstrap\\PortalXmlConfiguration\\Forms' => __DIR__ . '/../..' . '/src/DependencyInjection/SilexCompatBootstrap/PortalXmlConfiguration/Forms.php',
	    'Combodo\\iTop\\Portal\\DependencyInjection\\SilexCompatBootstrap\\PortalXmlConfiguration\\Lists' => __DIR__ . '/../..' . '/src/DependencyInjection/SilexCompatBootstrap/PortalXmlConfiguration/Lists.php',
	    'Combodo\\iTop\\Portal\\EventListener\\ApplicationContextSetPluginPropertyClass' => __DIR__ . '/../..' . '/src/EventListener/ApplicationContextSetPluginPropertyClass.php',
	    'Combodo\\iTop\\Portal\\EventListener\\ApplicationContextSetUrlMakerClass' => __DIR__ . '/../..' . '/src/EventListener/ApplicationContextSetUrlMakerClass.php',
	    'Combodo\\iTop\\Portal\\EventListener\\CssFromSassCompiler' => __DIR__ . '/../..' . '/src/EventListener/CssFromSassCompiler.php',
	    'Combodo\\iTop\\Portal\\EventListener\\ExceptionListener' => __DIR__ . '/../..' . '/src/EventListener/ExceptionListener.php',
	    'Combodo\\iTop\\Portal\\EventListener\\UserProvider' => __DIR__ . '/../..' . '/src/EventListener/UserProvider.php',
	    'Combodo\\iTop\\Portal\\Form\\ObjectFormManager' => __DIR__ . '/../..' . '/src/Form/ObjectFormManager.php',
	    'Combodo\\iTop\\Portal\\Form\\PasswordFormManager' => __DIR__ . '/../..' . '/src/Form/PasswordFormManager.php',
	    'Combodo\\iTop\\Portal\\Form\\PreferencesFormManager' => __DIR__ . '/../..' . '/src/Form/PreferencesFormManager.php',
	    'Combodo\\iTop\\Portal\\Helper\\ApplicationHelper' => __DIR__ . '/../..' . '/src/Helper/ApplicationHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\BrickControllerHelper' => __DIR__ . '/../..' . '/src/Helper/BrickControllerHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\BrowseBrickHelper' => __DIR__ . '/../..' . '/src/Helper/BrowseBrickHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\ContextManipulatorHelper' => __DIR__ . '/../..' . '/src/Helper/ContextManipulatorHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\LifecycleValidatorHelper' => __DIR__ . '/../..' . '/src/Helper/LifecycleValidatorHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\NavigationRuleHelper' => __DIR__ . '/../..' . '/src/Helper/NavigationRuleHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\ObjectFormHandlerHelper' => __DIR__ . '/../..' . '/src/Helper/ObjectFormHandlerHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\RequestManipulatorHelper'                 => __DIR__ . '/../..' . '/src/Helper/RequestManipulatorHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\ScopeValidatorHelper'                     => __DIR__ . '/../..' . '/src/Helper/ScopeValidatorHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\SecurityHelper'                           => __DIR__ . '/../..' . '/src/Helper/SecurityHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\SessionMessageHelper'                     => __DIR__ . '/../..' . '/src/Helper/SessionMessageHelper.php',
	    'Combodo\\iTop\\Portal\\Helper\\UIExtensionsHelper'                       => __DIR__ . '/../..' . '/src/Helper/UIExtensionsHelper.php',
	    'Combodo\\iTop\\Portal\\Kernel'                                           => __DIR__ . '/../..' . '/src/Kernel.php',
	    'Combodo\\iTop\\Portal\\Routing\\ItopExtensionsExtraRoutes'               => __DIR__ . '/../..' . '/src/Routing/ItopExtensionsExtraRoutes.php',
	    'Combodo\\iTop\\Portal\\Routing\\UrlGenerator'                            => __DIR__ . '/../..' . '/src/Routing/UrlGenerator.php',
	    'Combodo\\iTop\\Portal\\Routing\\UrlGeneratorPass'                        => __DIR__ . '/../..' . '/src/Routing/UrlGeneratorPass.php',
	    'Combodo\\iTop\\Portal\\Twig\\AppExtension'                               => __DIR__ . '/../..' . '/src/Twig/AppExtension.php',
	    'Combodo\\iTop\\Portal\\Twig\\GlobalAccessor'                             => __DIR__ . '/../..' . '/src/Twig/GlobalAccessor.php',
	    'Combodo\\iTop\\Portal\\Twig\\AppVariable'                                => __DIR__ . '/../..' . '/src/Twig/AppVariable.php',
	    'Combodo\\iTop\\Portal\\UrlMaker\\AbstractPortalUrlMaker'                 => __DIR__ . '/../..' . '/src/UrlMaker/AbstractPortalUrlMaker.php',
	    'Combodo\\iTop\\Portal\\VariableAccessor\\AbstractStringVariableAccessor' => __DIR__ . '/../..' . '/src/VariableAccessor/AbstractStringVariableAccessor.php',
	    'Combodo\\iTop\\Portal\\VariableAccessor\\AbstractVariableAccessor'       => __DIR__ . '/../..' . '/src/VariableAccessor/AbstractVariableAccessor.php',
	    'Combodo\\iTop\\Portal\\VariableAccessor\\CombodoCurrentContactPhotoUrl'  => __DIR__ . '/../..' . '/src/VariableAccessor/CombodoCurrentContactPhotoUrl.php',
	    'Combodo\\iTop\\Portal\\VariableAccessor\\CombodoPortalInstanceConf'      => __DIR__ . '/../..' . '/src/VariableAccessor/CombodoPortalInstanceConf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdf408f3f8ea034d298269cdf7647358b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdf408f3f8ea034d298269cdf7647358b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdf408f3f8ea034d298269cdf7647358b::$classMap;

        }, null, ClassLoader::class);
    }
}
