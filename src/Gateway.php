<?php

namespace Omnipay\Payson;

use Omnipay\Common\AbstractGateway;
use Omnipay\Payson\Message\CheckoutRequest;
use Omnipay\Payson\Message\CompleteCheckoutRequest;

/**
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    /** Get gateway display name
    *
    * This can be used by carts to get the display name for each gateway.
    * @return string
    */
    public function getName()
    {
        return 'Payson';
    }

    public function getDefaultParameters()
    {
        return [
            'apiKey' => '',
            'agentId' => '',
            'testMode' => false,
        ];
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getAgentId()
    {
        return $this->getParameter('agentId');
    }

    public function setAgentId($value)
    {
        return $this->setParameter('agentId', $value);
    }

    public function purchase($parameters)
    {
        return $this->createRequest(CheckoutRequest::class, $parameters);
    }

    public function completePurchase($parameters)
    {
        return $this->createRequest(CompleteCheckoutRequest::class, $parameters);
    }
}
