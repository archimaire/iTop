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

namespace Combodo\iTop\Portal\Routing;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class UrlGeneratorPass implements CompilerPassInterface
{
	public function process(ContainerBuilder $container): void
	{
		$definition = $container->getDefinition('router.default');
		$options = $definition->getArgument(2);
		$options['generator_class'] = UrlGenerator::class;
		$options['generator_base_class'] = UrlGenerator::class;
		$definition->setArgument(2, $options);

		$container->setDefinition('router.default', $definition);
	}
}