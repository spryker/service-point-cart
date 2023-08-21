<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointCart\Replacer;

use Generated\Shared\Transfer\QuoteResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToQuoteClientInterface;
use Spryker\Client\ServicePointCart\Zed\ServicePointCartStubInterface;

class QuoteItemReplacer implements QuoteItemReplacerInterface
{
    /**
     * @var \Spryker\Client\ServicePointCart\Zed\ServicePointCartStubInterface
     */
    protected ServicePointCartStubInterface $servicePointCartStub;

    /**
     * @var \Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToQuoteClientInterface
     */
    protected ServicePointCartToQuoteClientInterface $quoteClient;

    /**
     * @param \Spryker\Client\ServicePointCart\Zed\ServicePointCartStubInterface $servicePointCartStub
     * @param \Spryker\Client\ServicePointCart\Dependency\Client\ServicePointCartToQuoteClientInterface $quoteClient
     */
    public function __construct(
        ServicePointCartStubInterface $servicePointCartStub,
        ServicePointCartToQuoteClientInterface $quoteClient
    ) {
        $this->servicePointCartStub = $servicePointCartStub;
        $this->quoteClient = $quoteClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteResponseTransfer
     */
    public function replaceQuoteItems(QuoteTransfer $quoteTransfer): QuoteResponseTransfer
    {
        $quoteResponseTransfer = $this->servicePointCartStub->replaceQuoteItems($quoteTransfer);
        $this->quoteClient->setQuote($quoteResponseTransfer->getQuoteTransferOrFail());

        return $quoteResponseTransfer;
    }
}