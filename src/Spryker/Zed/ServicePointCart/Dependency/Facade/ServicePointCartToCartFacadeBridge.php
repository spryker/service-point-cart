<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointCart\Dependency\Facade;

use Generated\Shared\Transfer\QuoteResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class ServicePointCartToCartFacadeBridge implements ServicePointCartToCartFacadeInterface
{
    /**
     * @var \Spryker\Zed\Cart\Business\CartFacadeInterface
     */
    protected $cartFacade;

    /**
     * @param \Spryker\Zed\Cart\Business\CartFacadeInterface $cartFacade
     */
    public function __construct($cartFacade)
    {
        $this->cartFacade = $cartFacade;
    }

    public function reloadItemsInQuote(QuoteTransfer $quoteTransfer): QuoteResponseTransfer
    {
        return $this->cartFacade->reloadItemsInQuote($quoteTransfer);
    }
}
