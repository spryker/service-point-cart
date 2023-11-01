<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointCart\Zed;

use Generated\Shared\Transfer\QuoteReplacementResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToZedRequestClientInterface;

class ServicePointCartStub implements ServicePointCartStubInterface
{
    /**
     * @var \Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToZedRequestClientInterface
     */
    protected ServicePointCartToZedRequestClientInterface $zedRequestClient;

    /**
     * @param \Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ServicePointCartToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @uses \Spryker\Zed\ServicePointCart\Communication\Controller\GatewayController::replaceQuoteItemsAction()
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteReplacementResponseTransfer
     */
    public function replaceQuoteItems(QuoteTransfer $quoteTransfer): QuoteReplacementResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\QuoteReplacementResponseTransfer $quoteReplacementResponseTransfer */
        $quoteReplacementResponseTransfer = $this->zedRequestClient->call('/service-point-cart/gateway/replace-quote-items', $quoteTransfer);

        return $quoteReplacementResponseTransfer;
    }
}
