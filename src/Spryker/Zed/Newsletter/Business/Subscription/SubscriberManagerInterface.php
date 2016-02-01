<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Newsletter\Business\Subscription;

use Generated\Shared\Transfer\NewsletterSubscriberTransfer;

interface SubscriberManagerInterface
{

    /**
     * @param string $email
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriberTransfer
     */
    public function loadSubscriberByEmail($email);

    /**
     * @param NewsletterSubscriberTransfer $newsletterSubscriberTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriberTransfer
     */
    public function createSubscriberFromTransfer(NewsletterSubscriberTransfer $newsletterSubscriberTransfer);

    /**
     * @param NewsletterSubscriberTransfer $subscriber
     *
     * @return void
     */
    public function assignCustomerToExistingSubscriber(NewsletterSubscriberTransfer $subscriber);

}
