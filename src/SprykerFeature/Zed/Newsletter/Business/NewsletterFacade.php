<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Newsletter\Business;

use Generated\Shared\Newsletter\NewsletterSubscriberInterface;
use Generated\Shared\Newsletter\NewsletterSubscriptionRequestInterface;
use Generated\Shared\Newsletter\NewsletterSubscriptionResponseInterface;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method NewsletterDependencyContainer getDependencyContainer()
 */
class NewsletterFacade extends AbstractFacade
{

    /**
     * @param NewsletterSubscriptionRequestInterface $newsletterSubscriptionRequest
     *
     * @return NewsletterSubscriptionResponseInterface
     */
    public function subscribeWithSingleOptIn(NewsletterSubscriptionRequestInterface $newsletterSubscriptionRequest)
    {
        $optInHandler = $this->getDependencyContainer()->createSingleOptInHandler();

        $subscriptionResponse = $this->getDependencyContainer()
            ->createSubscriptionRequestHandler()
            ->processNewsletterSubscriptions($newsletterSubscriptionRequest, $optInHandler)
        ;

        return $subscriptionResponse;
    }

    /**
     * @param NewsletterSubscriptionRequestInterface $newsletterSubscriptionRequest
     *
     * @return NewsletterSubscriptionResponseInterface
     */
    public function subscribeWithDoubleOptIn(NewsletterSubscriptionRequestInterface $newsletterSubscriptionRequest)
    {
        $optInHandler = $this->getDependencyContainer()->createDoubleOptInHandler();

        $subscriptionResponse = $this->getDependencyContainer()
            ->createSubscriptionRequestHandler()
            ->processNewsletterSubscriptions($newsletterSubscriptionRequest, $optInHandler)
        ;

        return $subscriptionResponse;
    }

    /**
     * @param NewsletterSubscriberInterface $newsletterSubscriber
     */
    public function approveDoubleOptInSubscriber(NewsletterSubscriberInterface $newsletterSubscriber)
    {
        $this->getDependencyContainer()
            ->createDoubleOptInHandler()
            ->approveSubscriberByKey($newsletterSubscriber)
        ;
    }

    public function checkSubscription()
    {
        // TODO: implement checkSubscription() method
    }

    /**
     * @param NewsletterSubscriptionRequestInterface $newsletterUnsubscriptionRequest
     *
     * @return NewsletterSubscriptionResponseInterface
     */
    public function unsubscribe(NewsletterSubscriptionRequestInterface $newsletterUnsubscriptionRequest)
    {
        $subscriptionResponse = $this->getDependencyContainer()
            ->createSubscriptionRequestHandler()
            ->processNewsletterUnsubscriptions($newsletterUnsubscriptionRequest)
        ;

        return $subscriptionResponse;
    }

}
