<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Customer;

use Spryker\Client\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;
use Spryker\Client\Kernel\Container;

class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{
    const CART_CLIENT = 'cart client';
    const CLIENT_PAYONE = 'CLIENT_PAYONE';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container[self::CART_CLIENT] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        $container[static::CLIENT_PAYONE] = function (Container $container) {
            return $container->getLocator()->payone()->client();
        };

        return $container;
    }
}
