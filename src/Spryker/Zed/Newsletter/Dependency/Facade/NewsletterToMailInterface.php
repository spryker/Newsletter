<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Newsletter\Dependency\Facade;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\SendMailResponsesTransfer;

interface NewsletterToMailInterface
{

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     *
     * @return \Generated\Shared\Transfer\SendMailResponsesTransfer
     */
    public function sendMail(MailTransfer $mailTransfer);

    /**
     * @param \Generated\Shared\Transfer\SendMailResponsesTransfer $mailResponses
     *
     * @return bool
     */
    public function isMailSent(SendMailResponsesTransfer $mailResponses);

}
