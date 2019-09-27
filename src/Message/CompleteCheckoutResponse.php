<?php

namespace Omnipay\Payson\Message;

use Omnipay\Common\Message\AbstractResponse;

class CompleteCheckoutResponse extends AbstractResponse
{

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getData()['status'] = 'readyToShip';
    }
}
