<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointCart\Zed;

use Generated\Shared\Transfer\QuoteReplacementResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

interface ServicePointCartStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteReplacementResponseTransfer
     */
    public function replaceQuoteItems(QuoteTransfer $quoteTransfer): QuoteReplacementResponseTransfer;
}
