<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointCart\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ServicePointCart\Business\Replacer\QuoteItemReplacer;
use Spryker\Zed\ServicePointCart\Business\Replacer\QuoteItemReplacerInterface;
use Spryker\Zed\ServicePointCart\Business\Validator\QuoteItemServicePointValidator;
use Spryker\Zed\ServicePointCart\Business\Validator\QuoteItemServicePointValidatorInterface;
use Spryker\Zed\ServicePointCart\Dependency\Facade\ServicePointCartToCartFacadeInterface;
use Spryker\Zed\ServicePointCart\Dependency\Facade\ServicePointCartToServicePointFacadeInterface;
use Spryker\Zed\ServicePointCart\ServicePointCartDependencyProvider;

/**
 * @method \Spryker\Zed\ServicePointCart\ServicePointCartConfig getConfig()
 */
class ServicePointCartBusinessFactory extends AbstractBusinessFactory
{
    public function createQuoteItemReplacer(): QuoteItemReplacerInterface
    {
        return new QuoteItemReplacer(
            $this->getCartFacade(),
            $this->getServicePointQuoteItemReplaceStrategyPlugins(),
        );
    }

    public function createQuoteItemServicePointValidator(): QuoteItemServicePointValidatorInterface
    {
        return new QuoteItemServicePointValidator(
            $this->getServicePointFacade(),
        );
    }

    public function getCartFacade(): ServicePointCartToCartFacadeInterface
    {
        return $this->getProvidedDependency(ServicePointCartDependencyProvider::FACADE_CART);
    }

    public function getServicePointFacade(): ServicePointCartToServicePointFacadeInterface
    {
        return $this->getProvidedDependency(ServicePointCartDependencyProvider::FACADE_SERVICE_POINT);
    }

    /**
     * @return list<\Spryker\Zed\ServicePointCartExtension\Dependency\Plugin\ServicePointQuoteItemReplaceStrategyPluginInterface>
     */
    public function getServicePointQuoteItemReplaceStrategyPlugins(): array
    {
        return $this->getProvidedDependency(ServicePointCartDependencyProvider::PLUGINS_SERVICE_POINT_QUOTE_ITEM_REPLACE_STRATEGY);
    }
}
